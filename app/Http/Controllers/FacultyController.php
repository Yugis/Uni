<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class FacultyController extends Controller
{
  public function create()
  {
      $faculties = Faculty::all();

      return view('createfaculty', compact('faculties'));
  }

  public function store(Request $request)
  {
      $faculty = Faculty::create(['name' => $request->createFaculty]);
      $faculty->years()->syncWithoutDetaching([1,2,3,4]);

      return redirect('create.faculty');
  }
}
