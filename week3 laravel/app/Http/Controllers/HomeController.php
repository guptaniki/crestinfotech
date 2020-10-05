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
    public function productlist(Request $request)
    {
        if ($request['cat_id'] != '') {
            $proc = DB::table('product__categories')
                ->where('f_category_id', $request['cat_id'])
                ->select('f_product_id')
                ->pluck('f_product_id')
                ->toArray();
            $products = Product::whereIn('id', $proc)
                ->get();
            $main_images = DB::table('product_images')->whereIn('f_product_id', $proc)
                ->where('i_main', 1)
                ->get();
        } else {
            $products = Product::all();
            $pro = DB::table('products')
                ->select('id')
                ->pluck('id')
                ->toArray();

            $main_images = DB::table('product_images')->whereIn('f_product_id', $pro)
                ->where('i_main', 1)
                ->get();

        }
        return view('productlist',compact('products','main_images'));

    }

        public function search(Request $request)
    {
        $p=Product::query();
        if(isset($request['name'])&&$request['name']!='') {
            $p->where('v_product_name','LIKE', '%'.$request['name'].'%');
        }

        $products=$p->get();
            $pro= DB::table('products')
                ->select('id')
                ->pluck('id')
                ->toArray();

            $main_images=DB::table('product_images')->whereIn('f_product_id',$pro)
                ->where('i_main',1)
                ->get();

        return view('search',compact('products','main_images'));
    }
    public function productsingle(Request $request)
    {
            $products = Product::where('id', $request['pro_id'])
                ->get();

        foreach ($products as $p)
            {
                $main_images = DB::table('product_images')->where('f_product_id', $p->id)
                    ->where('i_main', 1)
                    ->get();
                $other_images=DB::table('product_images')->where(['f_product_id' => $p->id])
                    ->where('i_main',0)
                    ->get();
            }

        return view('productsingle',compact('products','main_images','other_images'));


    }
}
