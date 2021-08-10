<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\User;
use App\Models\cart;
use App\Models\checkout;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;

class ProductController extends Controller
{
  function index(){

    $product = products::all();
  
    return view('products',compact('product'));

  }

  function detail($id){

    $data = products::find($id);

    return view('detail',['product'=>$data]);
  }

  function addCart(Request $req){
    if($req->session()->has('user')){

      $cart = new cart;
      
      $cart -> product_id = $req->productid;
      $cart -> user_id = $req->session()->get('user')['id'];
      $cart -> save();
      return redirect('/');
    }
    else {
      return redirect('login');
    }
  }

  static function cartItem(){
    $userId = Session::get('user')['id'];
    return cart::where('user_id',$userId)->count(); 
  }

  function viewCart(){

    $userId = $userId = Session::get('user')['id'];
    $cartData = DB::table('carts')
               ->join('products','carts.product_id','=','products.id')
               ->where('carts.user_id',$userId)
               ->select('products.*','carts.id as cart_id')
               ->get();
                return view('cart',['cartList'=>$cartData]);
           
  }

  function removeCart($id){
    cart::destroy($id);

     return redirect('cart');
  }

  function order(){
    $userId = $userId = Session::get('user')['id'];
    $total = DB::table('carts')
               ->join('products','carts.product_id','=','products.id')
               ->where('carts.user_id',$userId)
               ->select('products.*','carts.id as cart_id')
               ->get();
  
                 return view('order', [
                  'orderList' => $total,
                  'totalprice' => $total->sum('Price')
              ]);
  }

function payment(Request $req){
    $userId = $userId = Session::get('user')['id'];
    $allcart = DB::table('carts')
               ->join('products','carts.product_id','=','products.id')
               ->where('carts.user_id',$userId)
               ->select('products.*','carts.user_id as user_id','carts.product_id as product_id')
               ->get();

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $req->total_price * 100,
                "currency" => "USD",
                "source" => $req->stripeToken,
                "description" => "Test payment from".$req->email_address
        ]);

      
    //$array = json_decode(json_encode($allcart), true);

      foreach($allcart as $cartlist){
        $checkout = new checkout;
        $checkout -> user_id = $cartlist->user_id;
        $checkout -> user_name = $req->first_name;
        $checkout -> user_email = $req->email_address;
        $checkout -> product_id = $cartlist->product_id;
        $checkout -> product_name = $cartlist->ProductName;
        $checkout -> product_price = $cartlist->Price;
        $checkout -> ship_address = $req->address;
        $checkout -> payment_method = $req->CreditCardType; 
        $checkout -> status = 'pending';
        $checkout -> created_at = now();
        $checkout -> updated_at = now();
        $checkout->save();
        cart::where('user_id',$userId)->delete();

       

      }


    
    return redirect('/');
  }

}

