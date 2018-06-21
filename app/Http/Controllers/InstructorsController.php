<?php

namespace App\Http\Controllers;

use Auth;
use App\Year;
use App\Course;
use App\Faculty;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\RegistersInstructors;
use App\Mail\InstructorEmailToClass;
use Illuminate\Support\Facades\Storage;

class InstructorsController extends Controller
{

    use RegistersInstructors;

    public function __construct()
    {
        $this->middleware(['guest:admin'])->only(['create', 'store']);
        $this->middleware(['guest:instructor'])->only(['create', 'store']);
        $this->middleware(['guest:web'])->only(['create', 'store']);
    }

    public function all()
    {
        $instructors = Instructor::paginate(10);

        return view('instructors.all', compact('instructors'));
    }

    public function index()
    {
        $faculties = auth()->user()->faculties;

        return view('instructor-dashboard', compact('faculties'));
    }

    public function create()
    {
        $faculties = Faculty::pluck('name', 'id');
        $courses = Course::orderBy('name', 'asc')->pluck('name', 'id');
        return view('auth.instructor-register', compact('faculties', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validateInstructor($request);

        $this->recordInstructor($request);

        return redirect('/instructor');
    }

    public function myCourses()
    {
        $courses = Auth::user()->courses;

        return view('instructors.mycourses', compact('courses'));
    }

    public function myProfile($id)
    {
        $instructor = Instructor::findOrFail($id);

        // dd($instructor);

        return view('profiles.instructor_profile', compact('instructor'));
    }

    public function edit($id)
    {
        if (Auth::guard('instructor')->check()) {
            $instructor = Instructor::findOrFail($id);
            return view('profiles.instructor_profile_edit', compact('instructor'));
        } else {
            return redirect('/home');
        }
    }

    public function update(Request $request)
    {
        $instructor = auth()->user();

        $this->validate($request, [
            'first_name' => 'required|max:30|unique:instructors,first_name'.$instructor->id,
            'last_name' => 'required|max:30|unique:instructors,last_name'.$instructor->id,
            'email' => 'required|email|unique:instructors,email,'.$instructor->id,
            'phone_number' => 'required|digits:11|unique:instructors,phone_number,'.$instructor->id,
            'office_location' => 'required|max:4',
            'about' => 'max:140'
        ]);


        if($request->hasFile('avatar')) {
            if($instructor->avatar !== 'public/defaults/avatars/male.png' && $instructor->avatar !== 'public/defaults/avatars/female.png') {
                $lastavatar = $instructor->avatar;
                Storage::delete($lastavatar);
            }
            $instructor->update([
                'avatar' => $request->avatar->store('public/uploads/avatars')
            ]);
        }

        $instructor->first_name = ucfirst($request->first_name);
        $instructor->last_name = ucfirst($request->last_name);
        $instructor->full_name = $instructor->first_name . ' ' . $instructor->last_name;
        $instructor->slug = str_slug($instructor->first_name . ' ' . $instructor->last_name, '-');
        $instructor->email = $request->email;
        $instructor->phone_number = $request->phone_number;
        $instructor->office_location = $request->office_location;

        if($request->has('password')) {
            $instructor->password = bcrypt($request->password);
        }

        if($request->has('about')) {
            $instructor->about = $request->about;
        }

        $instructor->save();

        $request->session()->flash('success', 'Your profile was updated succesfully!');
        return redirect(route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]));
    }

    public function showCourse($slug)
    {
        $course = Course::whereSlug($slug)->with('students')->first();

        return view('instructors.show_course', compact('course'));
    }

    public function classMail()
    {
        $years = Year::all();
        $faculties = auth()->user()->faculties;


        return view('instructors.emailForms.SendMailToClass', compact('years', 'faculties'));
    }

    public function prepareClassMail(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:10',
            'year_id' => 'required',
            'faculty_id' => 'required',
            'subject' => 'max:100'
        ]);

        $instructor = auth()->user();
        $students = Faculty::where('id', $request->faculty_id)->first()->students->where('year_id', $request->year_id);

        foreach($students as $student){
            \Mail::to($student)->queue(new InstructorEmailToClass($student, $request->body, $request->subject, $instructor));
        }

        \Session::flash('success', 'Emails Dispatched!');

        return redirect()->back();
    }
}
