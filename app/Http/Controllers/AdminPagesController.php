<?php

namespace App\Http\Controllers;

use Storage;
use App\Faculty;
use Illuminate\Http\Request;
use App\Mail\NewScheduleMail;

class AdminPagesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:admin']);
	}

    public function showSchedules()
    {
    	$faculty = auth()->user()->faculty;

    	return view('admin.pages.schedules', compact('faculty'));
    }

    public function uploadSchedule(Request $request)
    {
    	$this->validate($request, [
    		'schedule' => 'image|file',
    		'schedule_type' => 'required|string'
	    ]);

	    $faculty = auth()->user()->faculty;

	    if($request->hasFile('schedule') && $request->schedule_type == 'lecture_schedule') {
	    	$this->uploadLectureSchedule($request, $faculty);
        }

        if($request->hasFile('schedule') && $request->schedule_type == 'exam_schedule') {
	    	$this->uploadExamSchedule($request, $faculty);
        }

        foreach($faculty->students as $student){
    		\Mail::to($student)->queue(new NewScheduleMail($request->schedule_type));
    	}

        \Session::flash('success', 'Schedule Uploaded!');

        return redirect()->back();
    }

    private function uploadLectureSchedule(Request $request, Faculty $faculty)
    {
        if($faculty->lecture_schedule) {
	  	    $lastSchedule = $faculty->lecture_schedule;
	    	Storage::delete($lastSchedule);
        } 
        $faculty->update([
            'lecture_schedule' => $request->schedule->store('public/uploads/schedules')
        ]);
    }

    private function uploadExamSchedule(Request $request, Faculty $faculty)
    {
        if($faculty->exam_schedule) {
	  	    $lastSchedule = $faculty->exam_schedule;
	    	Storage::delete($lastSchedule);
        } 
        $faculty->update([
            'exam_schedule' => $request->schedule->store('public/uploads/schedules')
        ]);
    }
}
