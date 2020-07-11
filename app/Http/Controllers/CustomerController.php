<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Cart_store;
use DB;

class CustomerController extends Controller
{
    public function index(){
    	$obj = DB::table('items')
                   ->select('items.id','items.name','items.desc','items.price','items.filename','items.status')
                   ->where(['status'=>1])
                   ->get();
    	return view('customer.pages.index',compact('obj'));
    }
    public function cart($id){
        $obj = Item::find($id);
        return view('customer.pages.cart',compact('obj'));
    }
    public function cart_store(Request $request){
    	$obj = new Cart_store();
    	$obj->name = $request->name;
    	$obj->desc = $request->desc;
        $obj->price = $request->price;
        $obj->filename = $request->filename;
        $obj->quantity = $request->quantity;
        if ($obj->save()) {
        	return redirect()->to('cart-store');
        }
    }
    public function cart_view(){
    	$obj = DB::table('cart_stores')
                  ->select('cart_stores.id','cart_stores.name','cart_stores.desc','cart_stores.price','cart_stores.quantity','cart_stores.filename',DB::raw('quantity*price as subtotal'))
                  ->get();
    	return view('customer.pages.cart_store',compact('obj'));
    }

    public function cart_store_delete($id){
        $obj = Cart_store::find($id);
        if ($obj->delete()) {
            return redirect()->to('cart-store');
        }
    }
}
