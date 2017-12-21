<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Student;
use App\Instructor;
use App\Notifications\PostNotification;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function feed($id)
    {
        return Instructor::find($id)->posts()->get();
    }

    public function store(Request $request, $id)
    {

        $this->validate($request, [
            'body' => 'required|min:5'
        ]);

        $post = Post::create([
            'body' => $request->body,
            'instructor_id' => $id
        ]);

        // $students = Instructor::find($id)->first()->followers;

        // \Notification::send($students, new PostNotification($post));

        return $post;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
