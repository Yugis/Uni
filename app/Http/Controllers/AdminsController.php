<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $courses = Course::where('faculty_id', auth()->user()->faculty_id)->orderBy('name', 'asc')->get()->groupBy('year_id');
        $admin = auth()->user();

        return view('admin-dashboard', compact('courses', 'admin'));
    }
}
