<?php

namespace App\Http\Controllers;

use App\Material;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_teacher==1){
            $subjects = DB::table('subjects')->paginate(10);
            $courses = DB::table('courses')->paginate(10);
            $materials = DB::table('materials')->paginate(10);
            return view('Backend.TeacherInterface.content.Materials.index',compact("subjects"))->with('courses',$courses)->with('materials',$materials);
        }

        $subjects = DB::table('subjects')->paginate(10);
        $courses = DB::table('courses')->select("name")->whereJsonContains("students",Auth::user()->name)->paginate(10);

        $materials = DB::table('materials')->WhereJsonContains("class",$courses)->paginate(10);
        return view('Backend.StudentInterface.content.Materials.index',compact("subjects"))->with('courses',$courses)->with('materials',$materials);

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
        $user = \Auth::user()->name;
        $material = new Material();
        $material->title = Input::get('material_name_val');
        $material->content = Input::get('material_content_val');
        $material->subject = Input::get('subjectsArray');
        $material->class = json_encode(Input::get('coursesArray'));

        /*Work with files*/
        $cover = $request->file('material_file_val');
        $extension = $cover->getClientOriginalExtension();
        $destination_path = "materials/".$user."/".Input::get('coursesArray');
        \Storage::disk('public')->put($destination_path.'/'.$cover->getFilename().'.'.$extension, \File::get($cover));

        $material->filename = $cover->getFilename().'.'.$extension;
        $material->original_filename = $cover->getClientOriginalName();
        $material->author = Input::get('material_author_val');

        $material->save();
        return \Redirect::route("Materials");

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
        DB::table('materials')->where('id','=', $id)->delete();

        return \Redirect::route("Materials");
    }

    public function download($file){
        return response()->download(storage_path("app/public/materials".'\\'.$file));
    }
}
