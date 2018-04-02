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

    // public function test()
    // {
    //     //
    // }
    //This is how you update pivot table attributes
    // public function testing(Request $request)
    // {
    //     $grades = Auth::user()->courses->first()->pivot;
    //     $grades->grades += 10;
    //     $grades->save();
    //     dd($grades->grades);
    // }

    public function check($id)
    {
        if (Auth::user()->isFollowing()->where('instructor_id', $id)->first()) {
            return ['status' => 'Followed'];
        } else {
            return ['status' => 'Unfollowed'];
        }
    }

    public function toggle($id)
    {
        $student = Auth::user();

        if ($student->isFollowing()->where('instructor_id', $id)->first()) {
            $student->isFollowing()->detach($id);
            return ['status' => 'Unfollowed'];
        } else {
            $student->isFollowing()->syncWithoutDetaching([$id]);
            return ['status' => 'Followed'];
        }
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
}
