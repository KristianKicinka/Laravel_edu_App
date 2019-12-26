<?php

namespace App\Http\Controllers;

use App\Post;
use App\Subject;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = DB::table('subjects')->paginate(10);

        return view('Backend.AdminInterface.content.Subjects.index',compact("subjects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = new Subject;

        $subject->name = Input::get('subject_name_val');
        $subject->shortcut = Input::get('subject_shortcut_val');
        $subject->description = Input::get('subject_description_val');
        $subject->save();

        return \Redirect::route("Subjects");
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
        $subject = Subject::findOrFail($id);
        // return $post->user;
        // return $post;
        return view('Subject.show')->with('post',$subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name = Input::get('subject_name_val');
        $shortcut = Input::get('subject_shortcut_val');
        $description = Input::get('subject_description_val');
        DB::table("subjects")->where("id","=",$id)->update(["name"=>$name,"shortcut"=>$shortcut,"description"=>$description]);
        return \Redirect::route("Subjects");
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subjects')->where('id','=', $id)->delete();

        return \Redirect::route("Subjects");


    }
}
