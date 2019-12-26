<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_admin==1) {
            $users = \DB::table("users")->where("id","!=",\Auth::user()->id)->paginate(10);
            return view('Backend.AdminInterface.content.Users.index',compact("users"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $password = \Hash::make(Input::post('user_password_val'));
        $user->name = Input::post('user_name_val');
        $user->email = Input::post('user_email_val');
        $user->password = $password;
        $user->is_admin = Input::post('user_admin_val');
        $user->is_teacher = Input::post('user_teacher_val');

        $user->save();

        return \Redirect::route("Users");

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $name = Input::post('user_name_val');
        $email = Input::post('user_email_val');
        $password = Input::post('user_password_val');
        $admin = Input::post('user_admin_val');
        $teacher  = Input::post('user_teacher_val');

        \DB::table("users")->where("id","=",$id)->update(["name"=>$name,"email"=>$email,"password"=>\Hash::make($password),"is_admin"=>$admin,"is_teacher"=>$teacher]);
        return \Redirect::route("Users");
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
        \DB::table("users")->where("id","=",$id)->delete();

        return \Redirect::route("Users");
    }
}
