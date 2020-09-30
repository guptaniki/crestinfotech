<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $c = Category::latest();
        if(isset($request['name'])&&$request['name']=='') {
            $c->where('v_name', $request['name']);
        }

        if(isset($request['status'])&& $request['status']==0 || isset($request['status'])&& $request['status']==1)
        {
            $c->where('i_status', $request['status']);

        }

        $categorys = $c->get();




        return view('category.index',compact('categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');

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
            'v_name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png,jpg',
            'order'=>'required',
            'status'=>'required'
        ]);

        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {

                $file = $request->image;
                $imageName =  rand(11111, 99999) . '.'  .$request->image->extension();
                $file->move(public_path().'/images/category/', $imageName);
                $request->v_image =$imageName;

            }
        }
        $data=[

            'v_name' => $request->v_name,
            'v_image' => $imageName,
            'i_order' => $request->order,
            'i_status' => $request->status,

        ];
        Category::create($data);

        return redirect()->route('category.index')
            ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('category.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $category->v_image;

        $request->validate([
            'v_name' => 'required|unique:categories',
            'order'=>'required',
            'status'=>'required'
        ]);
            if($category->v_image!=null) {
                $image_path = public_path('images/category/' . $category->v_image);
                if (unlink($image_path)) {
                    echo "file deleted";

                } else {
                    echo "not deleted";
                }
                $file = $request->image;
                $imageName =  rand(11111, 99999) . '.' .$request->image->extension();
                $file->move(public_path().'/images/category/', $imageName);
                $request->image =$imageName;
            }
        $data=[
            'v_name' => $request->v_name,
            'v_image' => $imageName,
            'i_order' => $request->order,
            'i_status' => $request->status,
        ];
        $category->update($data);
        return redirect()->route('category.index')
            ->with('success','Category Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success','category deleted successfully');
    }
}
