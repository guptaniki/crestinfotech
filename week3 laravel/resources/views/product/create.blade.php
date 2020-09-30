@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" >

                <div class="form-group">
                    <strong>Select Category Name:</strong>
                    <select name="category_id[]" class="form-control" multiple="">
                        @foreach($categories as $category)
                            <option value="{{$category['id'] }}{{old('id')}}">{{$category['v_name'] }} {{old('$category->name')}}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="v_product_name" class="form-control" placeholder="Name" value="{{ old('v_product_name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Main Image:</strong>
                    <input type="file" name="main_image" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Other Image:</strong>
                    <input type="file" name="other_image[]"  multiple="multiple" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" name="v_product_code" class="form-control" placeholder="Product code" value="{{ old('v_product_code')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="i_price" class="form-control" placeholder="Price" value="{{ old('i_price')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sale Price:</strong>
                    <input type="number" name="i_sale_price" class="form-control" placeholder="Sale Price" value="{{ old('i_sale_price')}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity :</strong>
                    <input type="number" name="f_quantity" class="form-control" placeholder="quantity" value="{{ old('f_quantity')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order:</strong>
                    <input type="number" name="i_order" class="form-control" placeholder="order" value="{{ old('i_order')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input id="status" type="radio" class="" name="i_status" value="0"  ><span class="form-group">active</span>
                    <input id="status" type="radio" class="" name="i_status" value="1"> <span class="form-group">inactive</span>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
