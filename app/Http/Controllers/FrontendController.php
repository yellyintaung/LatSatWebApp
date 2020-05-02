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
use App\Township;
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
        public  $townships;
        
        public function __construct()
        {
            //   $this->middleware('auth');
            $this->menu_categories = Category::all();
            $this->townships       = Township::where('t_status',0)->get();
            //    dd($this->townships);
        }
        public function index()
        {
            $product = Product::all();
            return view('frontend.index')->with('product',$product)
            ->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
        
        
        public function product($id) {
            $category = category::find($id);
            // dd($category->category);
            return view('frontend.product')->with('category',$category)
            ->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function product_detail($id) {
            $product = Product::find($id);
            return view('frontend.product_detail')->with('product',$product)
            ->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function addCart(Request $rq)
        {
            $product = Product::find($rq->id);
            $row = ShoppingCart::add($rq->id, $product->product_name,$rq->qty, $product->price,['product_img' => $product->product_img, 'type' => $product->type->type_name]);
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
            
            // $townships = Township::all();
            
            return view('frontend.shopping_cart')->with('cart',$cart)
            ->with('rows',$rows)
            ->with('total',$total)
            // ->with('townships',$townships)
            ->with('townships',$this->townships)
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
            // $townships = Township::all();
            $total = ShoppingCart::total();
            return view('frontend.checkout')->with('total',$total)
            // ->with('townships',$townships)
            ->with('townships',$this->townships)
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
            $payment->total = $request->total_price;
            $payment->township_id = $request->township_id;
            $payment->address = $request->address;
            $payment->want_date = $request->want_date;
            $payment->time = $request->time;
            $payment->save();
            
            
            $sproduct = ShoppingCart::all();
            foreach ($sproduct as $sp) {
                $order = new Order();
                $order->payment_id = $payment->id;
                $order->product_id = $sp->id;
                $order->quantity = $sp->qty;
                $order->pricepereach = $sp->price;
                $order->type = $sp->type;
                $order->total_amount = $sp->total;
                $order->save();
            }
            $cart = ShoppingCart::destroy();
            
            return redirect('/');
        }
        
        public function userLogin()
        {
            return view('frontend.user_login')
            ->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function login(Request $req){
            $customers = Customer::where('phone',$req->phone)->where('password',$req->password)->get();
            $sc = ShoppingCart::all();
            if($customers->count()<>0){
                foreach($customers as $customer){
                    Session::put('customer',$customer->name);
                    Session::put('customer_id',$customer->id);
                }
                if($sc->count()<>0){
                    return redirect('/showShoppingCartview');
                }else
                return redirect('/');
            }else{
                Session::put('customer_id',null);
                return redirect('/user_login');
            }
        }
        
        public function userRegister()
        {
            return view('frontend.user_register')->with('menu_categories',$this->menu_categories)
            ->with('townships',$this->townships);
        }
        
        public function register(Request $request)
        {
            
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->password = $request->password;
            // $customer->region = $request->region;
            $customer->save();
            return redirect('/user_login');
        }
        
        
        
        public function checkUser()
        {
            $usercheck = Session::get('customer_id');
            // dd($usercheck);
            if($usercheck<>null){
                return redirect('/showCheckoutview')->with('menu_categories',$this->menu_categories);
            }else{
                Session::put('customer_id',null);
                return redirect('/useracc_check')->with('menu_categories',$this->menu_categories);
            }
        }
        
        public function logout()
        {
            Session::forget('customer');
            Session::forget('customer_id');
            return redirect('/')->with('menu_categories',$this->menu_categories);
        }
        
        public function useraccCheck()
        {
            return view('frontend.user_check')->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
        
        public function getDelivery($id)
        {
            $total = ShoppingCart::total();
            $township = Township::where('id',$id)->get();
            return response()->json(['success'=>true,'townships'=>$township,"total"=>$total]);
        }
        
        public function orderHistroy(){
            $user = Session::get('customer_id');
            $customer = Customer::where('id',$user)->get();
            
            foreach($customer as $cu){
                $cpayment = Payment::where('customer_id',$cu->id)->orderBy('created_at', 'desc')->first();
            }
            Session::put('cp',$cpayment);
            return view('frontend.order_history')->with('cpayment',$cpayment)
            ->with('townships',$this->townships)
            ->with('menu_categories',$this->menu_categories);
        }
      
       
       
    }