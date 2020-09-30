@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Prodouct</h2>
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

    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" >

                <div class="form-group">
                    <strong>Select Category Name:</strong>
                    <select name="category_id[]" class="form-control" multiple="">


                        @foreach($categories as $category)
                            @if(in_array($category['id'],$new_array))
                            <option value="{{$category['id'] }}{{old('id')}}" selected>{{$category['v_name'] }} {{old('$category->name')}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="v_product_name" value="{{ $product->v_product_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="main_image">
                    <p>
                            @foreach($main_images as $image)
                            <img src="/images/product/{{$image->v_image}}"  style="width: 50px; height: 50px;" >
                            @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="other_image">
                    <p>
                        @foreach($other_images as $image)
                            <img src="/images/product/{{$image->v_image}}"  style="width: 50px; height: 50px;" >
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" name="v_product_code" value="{{ $product->v_product_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="i_price" value="{{ $product->i_price }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sale Price:</strong>
                    <input type="number" name="i_sale_price" value="{{ $product->i_sale_price }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" name="f_quantity" value="{{ $product->f_quantity }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order:</strong>
                    <input type="number" name="i_order" class="form-control" placeholder="order" value="{{$product->i_order}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input id="status" type="radio" class="" name="i_status" value="0"{{$product->i_status == '0' ? 'checked':''}}><span class="form-group">active</span>
                    <input id="status" type="radio" class="" name="i_status" value="1"{{ $product->i_status == '1' ? 'checked' : ''}}> inactive
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
