<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {

        $category_data = Category::all();

        return view('admin.category', compact('category_data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        return view('admin.category');

    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function view_product()
    {
        $category =Category::all();

        return view('admin.products', compact('category'));
    }

    public function add_product(Request $req)
    {
        $products = new Product;
        $products->title=$req->title;
        $products->description=$req->description;
        $products->category=$req->category;
        $products->quantity=$req->quantity;
        $products->price=$req->price;
        $products->discount_price=$req->discount_price;

        // for image store
        
        $image= $req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product', $imagename);
        $products->image=$imagename;
        $products->save();

        return redirect()->back();
    }

    public function show_product()
    {
        $products = Product::all();

        return view('admin.productlist', compact('products'));
    }

    public function delete_product($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->back();
    }

    public function update_product($id)
    {
        $products = Product::find($id);
        $category = Category::all();
       
        return view('admin.update_product', compact('products', 'category'));

    }


    public function update_product_confirm(Request $req, $id)
    {
        $products =Product::find($id);
        


        $products->title=$req->title;
        $products->description=$req->description;
        $products->category=$req->category;
        $products->quantity=$req->quantity;
        $products->price=$req->price;
        $products->discount_price=$req->discount_price;

        // for image store
        
        $image= $req->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product', $imagename);
        $products->image=$imagename;
        }
        
        $products->save();

        return view('admin.productlist');
    }



    public function order()
    {
        $orders = Order::all();

        return view('admin.order', compact('orders'));
    }

    public function delivered($id)
    {
        $orders = Order::find($id);
        $orders->delivery_status = "delivered";
        $orders->save();

        return redirect()->back();
    }

    public function contact_info()
    {
        $contact = Contact::all();
        
        return view('admin.user_feedback', compact('contact'));
    }


}
    
