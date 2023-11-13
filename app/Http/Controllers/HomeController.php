<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

public function index()
{

    $products = Product::paginate(6);
    return view('home.userpage', compact('products'));
}

    public function redirect()
    {
        $usertype = Auth::User()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {

            $products = Product::paginate(6);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_detail($id)
    {
        $products = Product::find($id);

        return view('home.product_details', compact('products'));
    }

    

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {

            $user = Auth::user();
            $products= Product::find($id);

            $cart = new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$products->title;
            
            if($products->discount_price != null)
            {
            $cart->price=$products->discount_price * $request->quantity;

            }
            else
            {
                $cart->price=$products->price * $request->quantity;

            }

            $cart->image=$products->image;
            $cart->product_id=$products->id;
            $cart->quantity=$request->quantity;

            $cart->save();

            // dd($products);
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }




    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to the home page or any URL you prefer
    }



    public function showcart()
    {

        if(Auth::id())
        {   
        $id = Auth::user()->id;
        // dd($id);
        $carts= Cart::where('user_id', '=', $id)->get();
        // dd($cart);
        return view('home.show_cart', compact('carts'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $carts = Cart::find($id);

        $carts->delete();

        return redirect()->back();
    }


    public function cash_order()
    {
            $user = Auth::user();

            $userid = $user->id;

            $data = Cart::Where('user_id', '=', $userid)->get();
            // dd($data);

            foreach($data as $data)
            {
                $order = new Order;
                
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;
                $order->user_id = $data->user_id;
                $order->product_title = $data->product_title;
                $order->price = $data->price;
                $order->quantity = $data->quantity;
                $order->image = $data->image;
                $order->product_id = $data->product_id;
                
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';

                $order->save();

                $cart_id =  $data->id;
                $cart = Cart::find($cart_id);

                $cart->delete();

            }

            return redirect()->back()->with('message', 'We Recived your order, we will connect with you soon....');

    }



    public function contact()
    {
        return view('home.contact');
    }
    
    
    public function contact_us(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject= $request->subject;
        $contact->message= $request->message;
        $contact->save();

        return redirect()->back();
    }


}