<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Faculty;
use App\SecretIds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function create()
    {
        $faculties = Faculty::orderBy('name', 'asc')->pluck('name', 'id');

        return view('admin.profiles.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'admin_id' => 'required|exists:secret_ids,secret_id',
            'gender' => 'required|bool',
            'email' => 'required|unique:admins,email|email',
            'faculty_id' => 'required|exists:faculties,id',
            'phone_number' => 'required|unique:admins,phone_number|digits:11',
            'password' => 'required|min:4|confirmed'
        ]);

        $valid_ids = SecretIds::where(['owner_type' => 'App\Admin', 'owner_id' => null])->get()->pluck('id')->toArray();

        if(!in_array($request->admin_id, $valid_ids)) {
            \Session::flash('fail', 'Error, Admin ID is invalid!');
            return redirect()->back()->withInput();
        }

        $avatar = $request->gender ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png';

        $admin = new Admin();
        $admin->first_name = ucfirst($request->first_name);
        $admin->last_name = ucfirst($request->last_name);
        $admin->full_name = $admin->first_name . ' ' . $admin->last_name;
        $admin->slug = str_slug($admin->first_name . ' ' . $admin->last_name, '-');
        $admin->gender = $request->gender;
        $admin->avatar = $avatar;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->password = bcrypt($request->password);
        $admin->creator_id = auth()->user()->id;
        $admin->faculty()->associate($request->faculty_id);
        $admin->save();

        SecretIds::where('secret_id', $request->admin_id)->first()->update(['owner_id' => $admin->id]);

        \Session::flash('success', 'Account Created!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $faculties = Faculty::pluck('name', 'id')->reject(function ($value, $key) use ($admin) {
            return $value == $admin->faculty->name;
        });

        return view('admin.profiles.admin_profile', compact('admin', 'faculties'));
    }

    public function update(Request $request)
    {
        $admin = auth()->user();

        $this->validate($request, [
            'first_name' => 'required|max:30|unique:admins,first_name'.$admin->id,
            'last_name' => 'required|max:30|unique:admins,last_name'.$admin->id,
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'faculty_id' => 'required',
        ]);

        if($request->hasFile('avatar')) {
            if($admin->avatar !== 'public/defaults/avatars/male.png' && $admin->avatar !== 'public/defaults/avatars/female.png') {
                $lastavatar = $admin->avatar;
                Storage::delete($lastavatar);
            }
            $admin->update([
                'avatar' => $request->avatar->store('public/uploads/avatars')
            ]);
        }

        $admin->first_name = ucfirst($request->first_name);
        $admin->last_name = ucfirst($request->last_name);
        $admin->full_name = $admin->first_name . ' ' . $admin->last_name;
        $admin->slug = str_slug($admin->first_name . ' ' . $admin->last_name, '-');
        $admin->email = $request->email;
        $admin->faculty_id = $request->faculty_id;

        if($request->has('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        \Session::flash('success', 'Profile updated successfully');

        return redirect()->back();
    }

    public function showDeactivateForm($slug)
    {
        $admin = Admin::whereSlug($slug)->first();

        if(auth()->user()->id !== $admin->id) {
            \Session::flash('fail', 'Unauthorized');

            return redirect()->back();
        }

        return view('admin.pages.deactivate_account');
    }

    public function deactivate(Request $request,$slug)
    {
        $this->validateAdmin($request);

        $admin = auth()->user();

        \Session::flash('success', 'Account Deactivated Successfully');

        Auth::logout();

        $admin->delete();

        return redirect('/');
    }

    public function trashed()
    {
        $trashedAccounts = Admin::onlyTrashed()->get();

        return view('admin.profiles.trashed', compact('trashedAccounts'));
    }

    public function showRestoreForm($slug)
    {
        $trashedAccount = Admin::onlyTrashed()->whereSlug($slug)->first();


        return view('admin.pages.restore_account', compact('trashedAccount'));
    }

    public function restore(Request $request, $slug)
    {
        $this->validateAdmin($request);

        $trashedAccount = Admin::onlyTrashed()->whereSlug($slug)->first();

        $trashedAccount->restore();

        \Session::flash('success', 'Account was successfully restored.');

        return redirect()->route('admin.trashed.accounts');
    }

    public function showDeleteForm($slug)
    {
        $trashedAccount = Admin::onlyTrashed()->whereSlug($slug)->first();

        return view('admin.pages.delete_account', compact('trashedAccount'));
    }

    public function destroy(Request $request, $slug)
    {
        $this->validateAdmin($request);

        $trashedAccount = Admin::onlyTrashed()->whereSlug($slug)->first();

        $trashedAccount->forceDelete();

        \Session::flash('success', 'Account Deleted');

        return redirect()->route('admin.trashed.accounts');
    }

    private function validateAdmin(Request $request)
    {
        $admin = auth()->user();

        $this->validate($request, [
            'admin_id' => 'required|exists:secret_ids,secret_id',
            'password' => 'required|string'
        ]);

        if($request->admin_id !== $admin->secret_id->secret_id) {
            \Session::flash('fail', 'Invalid ID');

            return redirect()->back();
        }

        if(!Hash::check($request->password, $admin->password)) {
            \Session::flash('fail', 'Invalid Password');

            return redirect()->back();   
        }
    }
}
