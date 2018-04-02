<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Mail\EmailNotificationToClass;
use App\Mail\EmailNotificationToIndividual;

class AdminSendEmailController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function classMail()
    {
    	$years = auth()->user()->faculty->years;

    	return view('admin.emailForms.SendMailToClass', compact('years', 'admin'));
    }

    public function prepareClassMail(Request $request)
    {
    	$this->validate($request, [
    		'body' => 'required|min:10',
    		'year_id' => 'required',
    		'subject' => 'max:100'
    	]);

    	$admin = auth()->user();
    	$students = auth()->user()->faculty->students->where('year_id', $request->year_id);

    	foreach($students as $student){
    		\Mail::to($student)->queue(new EmailNotificationToClass($student, $request->body, $request->subject, $admin));
    	}

    	\Session::flash('success', 'Emails Dispatched!');

    	return redirect()->back();
    }

    public function individualMail()
    {
    	return view('admin.emailForms.SendMailToIndividual');
    }

    public function prepareIndividualMail(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email|exists:students,email',
    		'body' => 'required|min:10',
    		'subject' => 'max:100'
    	]);

    	$admin = auth()->user();
    	$student = Student::where('email', $request->email)->first();

		\Mail::to($student)->queue(new EmailNotificationToIndividual($student, $request->body, $request->subject, $admin));

    	\Session::flash('success', 'Email Sent!');

    	return redirect()->back();
    }
}
