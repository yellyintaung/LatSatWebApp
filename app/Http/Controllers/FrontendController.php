<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Product;
use App\Payment;
use App\Order;
use App\Customer;
use App\User;
use Session;
use ShoppingCart;
use Hash;


class FrontendController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    // public function __construct()
    // {
        
        // }
        
        /**
        * Show the application dashboard.
        *
        * @return \Illuminate\Http\Response
        */
        
        public  $menu_categories;
        public function __construct()
        {
            //   $this->middleware('auth');
            $this->menu_categories = Category::all();
            //    dd($this->menu_categories);
        }
        public function index()
        {
            $product = Product::all();
            return view('frontend.index')->with('product',$product)
            ->with('menu_categories',$this->menu_categories);
        }
        
        
        public function product($id) {
            $category = category::find($id);
            // dd($category->category);
            return view('frontend.product')->with('category',$category)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function product_detail($id) {
            $product = Product::find($id);
            return view('frontend.product_detail')->with('product',$product)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function addCart(Request $rq)
        {
            $product = Product::find($rq->id);
            $row = ShoppingCart::add($rq->id, $product->product_name,$rq->qty, $product->price,['product_img' => $product->product_img]);
            $count=ShoppingCart::countRows();
            return response()->json(["count"=>$count]);
        }
        public function showCartCount()
        {
            return response()->json(['count'=>ShoppingCart::countRows()]);
        }
        
        public function view(){
            $cart = ShoppingCart::all();
            // dd($cart);
            $rows = ShoppingCart::countRows();
            
            $total = ShoppingCart::total();
            
            return view('frontend.shopping_cart')->with('cart',$cart)
            ->with('rows',$rows)
            ->with('total',$total)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function update($rawId,$qty)
        {
            
            ShoppingCart::update($rawId,$qty);
            $total = ShoppingCart::total();
            $item=ShoppingCart::get($rawId);
            return response()->json(["item"=>$item,"total"=>$total]);
        }
        
        public function trash(Request $req)
        {
            $cart = ShoppingCart::remove($req->id);
            return redirect('/showShoppingCartview');
        }
        
        
        
        public function checkoutView()
        {
            
            $total = ShoppingCart::total();
            return view('frontend.checkout')->with('total',$total)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function placeOrder(Request $request)
        {
            // $user = new User();
            // $user->name = $request->name;
            // $user->password = Hash::make($request->password);
            // $user->phone = $request->phone;
            // $user->type = 1 ;
            // $user->save();
            
            
            // $customer = new Customer();
            // $customer->user_id = $user->id;
            // $customer->name = $request->name;
            // $customer->phone = $request->phone;
            // $customer->region = $request->region;
            // $customer->township = $request->township;
            // $customer->address = $request->address;
            // $customer->save();
            
            $payment = new Payment();
            $payment->customer_id= Session::get('customer_id');
            $payment->total = ShoppingCart::total();
            $payment->want_date = $request->want_date;
            $payment->time = $request->time;
            $payment->save();
            
            
            $sproduct = ShoppingCart::all();
            foreach ($sproduct as $sp) {
                $order = new Order();
                $order->payment_id = $payment->id;
                $order->product_id = $sp->id;
                $order->quantity = $sp->qty;
                $order->total_amount = $sp->total;
                $order->save();
            }
            $cart = ShoppingCart::destroy();
            
            return redirect('/');
        }
        
        public function userLogin()
        {
            return view('frontend.user_login')->with('menu_categories',$this->menu_categories);
        }
        
        public function login(Request $req){
            $customers = Customer::where('phone',$req->phone)->where('password',$req->password)->get();
            if($customers->count()<>0){
                foreach($customers as $customer){
                    Session::put('customer',$customer->name);
                    Session::put('customer_id',$customer->id);
                }
                return redirect('/')->with('menu_categories',$this->menu_categories);
            }else{
                Session::put('customer_id',null);
                return redirect('/user_login')->with('menu_categories',$this->menu_categories);
            }
        }

        public function userRegister()
        {
            return view('frontend.user_register')->with('menu_categories',$this->menu_categories);
        }

        public function register(Request $request)
        {
            
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->password = $request->password;
            // $customer->region = $request->region;
            $customer->township = $request->township;
            $customer->address = $request->address;
            $customer->save();
            return redirect('/user_login');
        }

        
        
        public function checkUser()
        {
            $usercheck = Session::get('customer_id');
            if($usercheck<>null){
                return redirect('/showCheckoutview')->with('menu_categories',$this->menu_categories);
            }else{
                return redirect('/user_login')->with('menu_categories',$this->menu_categories);
            }
        }
        
        public function logout()
        {
            Session::forget('customer');
            return redirect('/')->with('menu_categories',$this->menu_categories);
        }
    }