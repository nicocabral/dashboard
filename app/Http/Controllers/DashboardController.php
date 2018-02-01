<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

use App\User;
use Validator;
use DB;
class DashboardController extends Controller
{
    //
    protected $rules = ['firstname' => 'required|max:125',
            'lastname' => 'required|max:125',
            'email' => 'required|unique:users',
            'password' => 'required:password|min:8|same:confirm_password',
            'confirm_password' => 'required:confirm_password|min:8|same:password'];
            
    public function index(){
    	if(Auth::check()){
    	$id = Auth::user()->id;
    	$users = new User();
    	$users = User::where('id', '!=' ,$id)->paginate(5);
    
    	return view('Dashboard.index', ['users' => $users]);
    	}
    	return view('auth.login');
    }
    public function postLogOut(){
    	if(Auth::check()){
    		Auth::logout();
    		return redirect('/login');
    	}
    	return back()->with('errors','Error logging out');
    }
    public function create(Request $request){
    	$request->session()->forget('success');
    	 if(Auth::check()){ 
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect('/dashboard')
                        ->withErrors($validator)
                        ->withInput();
        }
    	$users = new User();
    	$users->fname = $request['firstname'];
    	$users->lname = $request['lastname'];
    	$users->email = $request['email'];
    	$users->password = bcrypt($request['password']);
    	$users->save();
    	if($users){
    		return back()->with('success','User created successfully');
    	}

    	}
    	return back()->with('errors', 'Error');

    }

    public function view($id){
    if(Auth::check()){
    	$a = Crypt::decrypt($id);
    	$users = User::where('id', '=', $a)->first();
    	return view('dashboard.view', compact('users', 'id'));

    }
    }
    public function destroy($id){
    	if(Auth::check()){
    	$a = Crypt::decrypt($id);
    	$users = User::find($a);
        $users->delete();
        return redirect('/dashboard')->with('success', 'User has been deleted successfully');
    }
    return redirect('/login')->with('errors','Un-Authorized access');
    }

    public function update(Request $request, $id){
    	$request->session()->forget('success');
    	if(Auth::check()){
    		$validator = Validator::make($request->all(),
    		 ['firstname' => 'required|max:125','lastname' => 'required|max:125']);
    	
    		if($validator->fails()){
    			return redirect('/'.$id)->withErrors($validator->messages())->withInput();
    		}

	        $fname = $request['firstname'];
	        $lname = $request['lastname'];
	        $users = User::where('id', Crypt::decrypt($id))->update(array('fname' => $fname, 'lname'=>$lname));
    		if($users){
    			return redirect('/dashboard')->with('success', 'User updated successfully');
    		}

    	}
    	return redirect('/'.$id)->with('errors', 'Error');
    }

    public function postUpdateMyAccount(Request $request, $id){
    	if(Auth::check()){

    	$request->session()->forget('success');
    	if(empty($request['password']) || empty($request['confirm_password'])){
    	$uid = Crypt::decrypt($id);
    	$users = User::find($uid);
  		$users->fname = $request['firstname'];
  		$users->lname = $request['lastname'];
  		$users->email = $request['email'];
  		$users->save();
  		if($users){
  			return redirect('/dashboard')->with('success','Your account updated successfully');
  		}
    	}else{
    	$uid = Crypt::decrypt($id);
    	$validator = Validator::make($request->all(), 
    			[ 'firstname' => 'required|max:125',
    			  'lastname' => 'required|max:125',
    			  'email' => 'required|unique:users,email,'.$uid,
    			  'password' => 'required:password| min:8 | same:confirm_password',
    			  'confirm_password' => 'required:confirm_password|min:8|same:password'
    			]);
    	if($validator->fails()){
    		return redirect('/dashboard')->withErrors($validator->messages())->withInput();
    	}
    	
    	$users = User::find($uid);
  		$users->fname = $request['firstname'];
  		$users->lname = $request['lastname'];
  		$users->email = $request['email'];
  		$users->password = $request['password'];
  		$users->save();
  		if($users){
  			return redirect('/dashboard')->with('success','Your account updated successfully');
  		}
  		}

    	}
    	return redirect('/dashboard')->with('errors', 'Error');

    }
   
    
}
