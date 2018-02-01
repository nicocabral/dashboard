<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Validator;
class AuthController extends Controller
{
    // login user
    public function login(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return view('auth.index');
    }
    // register user
    public function register(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
           return view('auth.register'); 
    }
    //forgot password
    public function forgotPassword(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return view('auth.forgot-password');
    }

    public function postLogIn(Request $request){
   
       if(Auth::attempt(['email' => $request['email'], 'password'=> $request['password']])){
            return redirect('/dashboard');
        }

        return redirect()->back()->with('errors','Invalid username and/or password');

    }

    public function postRegister(Request $request){

         
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:125',
            'lastname' => 'required|max:125',
            'email' => 'required|unique:users',
            'password' => 'required:password|min:8|same:confirm_password',
            'confirm_password' => 'required:confirm_password|min:8|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User();
        $user->fname = $request['firstname'];
        $user->lname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        if($user){
            return back()->with('success','Register successfully');
        }

        return back()->with('errors');
    
    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
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
