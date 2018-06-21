<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        if($name == 'introducing-the-acadmey') {
            return view('pages.introducing_academy');
        }

        if($name == 'international-academy-links') {
            return view('pages.international_links');
        }

        if($name == 'admission-system-in-the-academy') {
            return view('pages.admission_system');
        }

        if($name == 'student-facility') {
            return view('pages.student_facility');
        }

        if($name == 'library-of-the-academy') {
            return view('pages.academy_library');
        }

        if($name == 'the-student\'s-union') {
            return view('pages.students_union');
        }

        if($name == 'training-center') {
            return view('pages.training_center');
        }

        if($name == 'journalism') {
            return view('pages.journalism');
        }

        if($name == 'business-administration') {
            return view('pages.business');
        }

        if($name == 'computer-science') {
            return view('pages.computer_science');
        }

        if($name == 'mechanical-engineering') {
            return view('pages.mechanical_engineering');
        }

        if($name == 'electrical-engineering') {
            return view('pages.electrical_engineering');
        }

        if($name == 'deans-word') {
            return view('pages.deans_word');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
