<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_teacher==1){
            return view('Backend.TeacherInterface.content.Settings.index');
        }if(\Auth::user()->is_admin==1){
        return view('Backend.AdminInterface.content.Settings.index');
    }
        return view('Backend.StudentInterface.content.Settings.index');
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
        //
    }

    /*Functions for changing profile settings*/

    public function username(Request $request,$id){
        DB::table("users")->where("id","=",$id)->update(["name"=>$request['userName_edit_val']]);

        return \Redirect::route("Settings");
    }
    public function email(Request $request,$id){
        DB::table("users")->where("id","=",$id)->update(["email"=>$request['userEmail_edit_val']]);

        return \Redirect::route("Settings");
    }
    public function password(Request $request,$id){
        $request->validate([
            'oldPassword_edit_val' => ['required', new MatchOldPassword],
            'newPassword_edit_val' => ['required'],
            'newPassword2_edit_val' => ['same:newPassword_edit_val'],
        ]);

        $password = \Hash::make($request->newPassword_edit_val);

        DB::table("users")->where("id","=",$id)->update(["password"=>$password]);

        return \Redirect::route("Settings");

    }
}
