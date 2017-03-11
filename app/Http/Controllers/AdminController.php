<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/login');
    }

    public function adminLoginCheck(Request $request){

       $admin_email_address = $request->admin_email_address;
       $admin_password = $request->admin_password;


/* $admin_password =  Input::get('admin_password');
$admin_email_address =  Input::get('admin_email_address');*/

$user = DB::table('tbl_admin')->where('admin_email_address', $admin_email_address)->where('admin_password', $admin_password)->first();

if(isset($user)){
    Session::put('admin_name',$user->admin_name);
    return redirect('/dashboard');

}else{

    Session::put('exception','Mail or Password Incorrect');

    return redirect('/admin-login');
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
