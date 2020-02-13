<?php

namespace App\Http\Controllers;

use App\Actuality;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ActualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualities = \DB::table("actuality")->paginate(10);
        return view("Backend.AdminInterface.content.Actuality.index")->with("actualities",$actualities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'actuality_title_val.unique:actuality,title' => 'The :attribute is already used'
        ];

        $validate = \Validator::make($request->all(),[
            'actuality_title_val'=> 'required|unique:actuality,title'
        ], $messages)->validated();


        $actuality = new Actuality();
        $actuality->title = $validate['actuality_title_val'];
        $actuality->description = Input::post("actuality_description_val");

        /*Work with files*/
        $cover = $request->file('actuality_image_val');
        $extension = $cover->getClientOriginalExtension();
        $destination_path = "actualities/";
        \Storage::disk('public')->put($destination_path.'/'.$cover->getFilename().'.'.$extension, \File::get($cover));

        $actuality->filename = $cover->getFilename().'.'.$extension;
        $actuality->original_filename = $cover->getClientOriginalName();
        $actuality->author = Input::get('actuality_author_val');

        $actuality->save();

        return \Redirect::route("Actuality");

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
        $file = \DB::table("actuality")->select("filename")->where("id","=",$id)->get();
        \Storage::delete(url("../storage/app/public/actualities/".$file));
        \DB::table("actuality")->where("id","=",$id)->delete();
        return \Redirect::route("Actuality");
    }
}
