<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Category;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat=Category::query();
        $cat->withCount('categoryProduct')->where('i_status',1);
        $categorys=$cat->get();

        return view('home',compact('categorys'));
    }
    public function productlist(Product $product)
    {
        $cat=Category::query();
        $cat->withCount('categoryProduct')->where('i_status',1);
        $categorys=$cat->get();

//        $pro=all();
        $pro=Product::all();
//        $produc=$pro->get();
//        dd($pro);
        foreach($pro as $p)
        {
//            dd($p->id);
            $procat=DB::table('product__categories')->where('f_product_id',$p->id);
            dd($procat);

        }




        return view('home',compact('categorys'));
    }
}
