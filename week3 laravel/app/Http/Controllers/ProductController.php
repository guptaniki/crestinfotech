<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Product_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $c=Product::query();
        if(isset($request['name'])&&$request['name']!='') {
            $c->where('v_product_name', $request['name']);
        }

        if((isset($request['status'])&& $request['status']==0)||(isset($request['status'])&& $request['status']==1))
        {
            if(is_numeric($request['status']))
            {

                $c->where('i_status', $request['status']);

            }

        }
        if((isset($request['min_price'])&&$request['min_price']!='')&&(isset($request['max_price'])&&$request['max_price']!='')) {
            $min = $request['min_price'];
            $max = $request['max_price'];
            $c->whereBetween('i_price',[$min,$max]);
        }
        if((isset($request['minqty'])&&$request['minqty']!='')&&(isset($request['maxqty'])&&$request['maxqty']!='')) {
            $min = $request['minqty'];
            $max = $request['maxqty'];
            $c->whereBetween('f_quantity',[$min,$max]);
        }
        if((isset($request['pordering']))&& !empty($request['pordering']))
        {
            if($request['pordering'] == 'priceorderasc'){ $c->orderBy('i_price','ASC')
                                                                ->orderBy('i_sale_price','ASC');}
            if($request['pordering'] == 'priceorderdesc'){ $c->orderBy('i_price','DESC')
                ->orderBy('i_sale_price','DESC');}
        }
        if((isset($request['qordering']))&& !empty($request['qordering']))
        {
            if($request['qordering'] == 'qtyorderasc'){ $c->orderBy('f_quantity','ASC');}
            if($request['qordering'] == 'qtyorderdesc'){ $c->orderBy('f_quantity','DESC');}
        }

            $products = $c->get();





        return view('product.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        foreach($categories as $category)
        {
            $category_name[]=$category->id;
        }
        return view('product.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'v_product_name' => 'required',
            'main_image' => 'required|mimes:jpeg,png,jpg',
            'other_image' => 'required',
            'v_product_code' => 'required|unique:products',
            'i_price' => 'required',
            'i_sale_price'=>'required',
            'f_quantity'=>'required',
            'i_order'=>'required',
            'i_status'=>'required',
        ]);
        $product=Product::create($request->all());
        $cat=$request['category_id'];
        foreach ($cat as $row)
        {
            DB::table('product__categories')->insert([
                'f_product_id' => $product->id,
                'f_category_id' => $row
            ]);
        }
        if ($request->hasFile('main_image')) {
                $file = $request->main_image;
                $imageName =  rand(11111, 99999) . '.'  .$request->main_image->extension();
                $file->move(public_path().'/images/product/', $imageName);
                DB::table('product_images')->insert([
                    'f_product_id' => $product->id,
                    'v_image' => $imageName,
                    'i_main'=>1
                ]);
        }
        $files=$request->file('other_image');
        $image=array();
        if ($request->hasFile('other_image')) {
            foreach ($files as $row) {
                $imageName = rand(11111, 99999) . '.' .$row->extension();
                $row->move(public_path() . '/images/product/', $imageName);
                $image[]=$imageName;
                DB::table('product_images')->insert([
                    'f_product_id' => $product->id,
                    'v_image' => $imageName,
                    'i_main' => 0
                ]);
            }
        }

        return redirect()->route('product.index')
            ->with('success','product created successfully.');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product  $product)
    {
        $new_array=array();
        $Product_Categories=Product_Category::where('f_product_id',$product->id)->get();
        foreach ($Product_Categories as $Product_Category)
        {
            $new_array[]=$Product_Category['f_category_id'];
        }
        $categories = Category::all();
        $main_images=DB::table('product_images')->where(['f_product_id' => $product->id])
            ->where('i_main',1)
            ->get();
        $other_images=DB::table('product_images')->where(['f_product_id' => $product->id])
            ->where('i_main',0)
            ->get();
        return view('product.show',compact('product','categories','main_images','new_array','other_images'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   $new_array=array();
        $Product_Categories=Product_Category::where('f_product_id',$product->id)->get();
        foreach ($Product_Categories as $Product_Category)
        {
            $new_array[]=$Product_Category['f_category_id'];
        }
        $categories = Category::all();
        $main_images=DB::table('product_images')->where(['f_product_id' => $product->id])
            ->where('i_main',1)
            ->get();
        $other_images=DB::table('product_images')->where(['f_product_id' => $product->id])
            ->where('i_main',0)
            ->get();
        return view('product.edit',compact('product','categories','main_images','new_array','other_images'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $product->update($request->all());
        $cat_id=$request['category_id'];
        if($cat_id!='') {
            $cat_del = Product_Category::find($product->id)->delete();
            $cat = $request['category_id'];
            foreach ($cat as $row) {
                DB::table('product__categories')->insert([
                    'f_product_id' => $product->id,
                    'f_category_id' => $row
                ]);
            }
        }
        if($request['main_image']!=null)
        {
                $main_images=DB::table('product_images')->where(['f_product_id' => $product->id])
                    ->where('i_main',1)
                    ->get();
                foreach ($main_images as $image){
                $image_path = public_path('images/product/' .$image->v_image);
                if (unlink($image_path)) {
                    echo "file deleted";

                } else {
                    echo "not deleted";
                }

                }
                $main_images=DB::table('product_images')->where(['f_product_id' => $product->id])
                    ->where('i_main',1)
                    ->delete();
                $file = $request->main_image;
                $imageName =  rand(11111, 99999) . '.' .$request->main_image->extension();
                $file->move(public_path().'/images/product/', $imageName);
                DB::table('product_images')->insert([
                    'f_product_id' => $product->id,
                    'v_image' => $imageName,
                    'i_main'=>1
                ]);
        }
        if($request['other_image']!=null)
        {
            $other_images=DB::table('product_images')->where(['f_product_id' => $product->id])
                ->where('i_main',0)
                ->get();
            foreach ($other_images as $image) {
                $image_path = public_path('images/product/' . $image->v_image);
                if (unlink($image_path)) {
                    echo "file deleted";

                } else
                {
                    echo "not deleted";
                }
            }
            $other_images=DB::table('product_images')->where(['f_product_id' => $product->id])
                ->where('i_main',0)
                ->delete();
            $files=$request->file('other_image');
            $image=array();

            if ($request->hasFile('other_image')) {
                foreach ($files as $row) {
                    $imageName = rand(11111, 99999) . '.' .$row->extension();
                    $row->move(public_path() . '/images/product/', $imageName);
                    $image[]=$imageName;
                    DB::table('product_images')->insert([
                        'f_product_id' => $product->id,
                        'v_image' => $imageName,
                        'i_main' => 0
                    ]);

                }
            }
        }
        return redirect()->route('product.index')
            ->with('success','product Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success','product deleted successfully');
    }
}
