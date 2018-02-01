<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Product;
use Validator;
class ProductController extends Controller
{
    //
    public function index(){
    	if(Auth::check()){
    		$products = new Product;
    		$products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
            return view('Dashboard.products.index', ['products' => $products]);
        }else{
        return redirect('/login');
        }
    }
    protected $rules = ['prodname' => 'required|max:250', 'prodstat' => 'required'];
    public function create(Request $request){
    	if(Auth::check()){
    		$validator =Validator::make($request->all(), $this->rules);
    		if($validator->fails()){
    			return back()->withErrors($validator)->withInput();
    		}
    		$products = new Product;
    		$products->product_name = $request['prodname'];
    		$products->prod_stat = $request['prodstat'];
    		$products->save();
    		if($products){
    			return back()->with('success',$request['prodname'].' product created succesfully');
    		}
    		else{
    			return back()->with('errors', 'Error');
    		}

    	}
    	else{
    		return view('/login');
    	}
    }
    //delete product

    public function destroy($id){
    	if(Auth::check()){
    	$a = Crypt::decrypt($id);
    	$products = Product::find($a);
        $products->delete();
        return redirect('/products')->with('success', 'Product has been deleted successfully');
    }
    return redirect('/login')->with('errors','Un-Authorized access');

    }
    //edit product

    public function update(Request $request, $id){
    	if(Auth::check()){
  
    		$validator = Validator::make($request->all(),$this->rules);
    	
    		if($validator->fails()){
    			return redirect('/products')->withErrors($validator->messages())->withInput();
    		}

	        $prodname = $request['prodname'];
	        $prodstat = $request['prodstat'];
	        $products = Product::where('id', Crypt::decrypt($id))->update(array('product_name' => $prodname, 'prod_stat'=>$prodstat));
    		if($products){
    			return redirect('/products')->with('success', 'Product updated successfully');
    		}
    	}	
    }
    //Search Product
    public function search(Request $request){
    	if(Auth::check()){

    		$products = Product::where('product_name', 'LIKE','%'. $request['search'].'%')->paginate();
    		if($products){
    		return view('dashboard.products.index', compact('products'));
    		}

    		
    	}
    }
       
}
