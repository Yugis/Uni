<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Year;
use App\Faculty;
use App\Student;
use App\Http\Requests;
use App\Http\RegistersStudents;


class StudentsController extends Controller
{

    use RegistersStudents;

    public function __construct()
    {
        $this->middleware(['guest:admin'])->only(['create', 'store']);
        $this->middleware(['guest:instructor'])->only(['create', 'store']);
        $this->middleware(['guest:web'])->only(['create', 'store']);
    }

    public function index()
    {
        $students = Student::paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $faculties = Faculty::pluck('name', 'id');
        $years = Year::pluck('name', 'id');

        return view('auth.register', compact('faculties', 'years'));
    }

    public function store(Request $request)
    {
        $this->validateStudent($request);

        $valid_ids = \App\SecretIds::where(['owner_type' => 'App\Student', 'owner_id' => null])->get()->pluck('secret_id')->toArray();

        if (! in_array($request->student_id, $valid_ids)) {
            \Session::flash('fail', 'Error, student ID is invalid!');
            return redirect()->back()->withInput();
        }

        $this->recordStudent($request);

        return redirect('/home');
    }

    public function myProfile($id)
    {
        if (Auth::guard('web')->check()) {
            $student = Auth::user();
            return view('profiles.student_profile_edit', compact('student'));
        } else {
            return redirect('/instructor');
        }
        
    }

    public function update(Request $request)
    {
        $student = auth()->user();

        $this->validate($request, [
            'first_name' => 'required|max:30|unique:students,first_name'.$student->id,
            'last_name' => 'required|max:30|unique:students,last_name'.$student->id,
            'email' => 'required|email|unique:students,email,'.$student->id,
            'phone_number' => 'required|digits:11|unique:students,phone_number,'.$student->id,
        ]);

        if($request->hasFile('avatar')) {
            if($student->avatar !== 'public/defaults/avatars/male.png' && $student->avatar !== 'public/defaults/avatars/female.png') {
                $lastavatar = $student->avatar;
                Storage::delete($lastavatar);
            }
            $student->update([
                'avatar' => $request->avatar->store('public/uploads/avatars')
            ]);
            return redirect(route('student.profile', ['id' => $student->id, 'slug' => $student->slug ]));
        }

        $student->first_name = ucfirst($request->first_name);
        $student->last_name = ucfirst($request->last_name);
        $student->full_name = $student->first_name . ' ' . $student->last_name;
        $student->slug = str_slug($student->first_name . ' ' . $student->last_name, '-');
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;

        if($request->has('password')) {
            $student->password = bcrypt($request->password);
        }

        $student->save();

        $request->session()->flash('success', 'Your profile was updated succesfully!');
        return redirect(route('student.profile', ['id' => $student->id, 'slug' => $student->slug ]));
    }
}
