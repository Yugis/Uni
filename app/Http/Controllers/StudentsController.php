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
        $this->middleware(['guest:instructor,web'])->except(['index', 'check']);
    }

    public function test()
    {
        //
    }

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

        $this->recordStudent($request);

        return redirect('/home');
    }
}
