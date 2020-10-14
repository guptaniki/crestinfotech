@extends('layouts.app')
{{--@extends('layout')--}}

@section('content')
    <head>
            <link href="{{asset('HTWF/scripts/bootstrap/css/bootstrap.css')}}" type="text/css" rel="stylesheet">

    </head>


    <div class="container-fluid">

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            @foreach($products as $product)
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="col-md-4">
                                    <a class="img-box img-fade-bottom" href="{{url('productsingle/?pro_id='.$product->id)}}">
                                        @foreach($main_images as $image)
                                        @if($product->id==$image->f_product_id)

                                                <img src="/images/product/{{$image->v_image}}"  style="width: 300px; height: 300px;" >
                                      @endif

                                        @endforeach

                                    </a>


                                </div>

                                <div class="col-md-4">
                                    <h2>Product Name:{{$product->v_product_name}}</h2>
                                    <h2>Price:<del>{{$product->i_price}}</del></h2>
                                    <h2>Sale price:{{$product->i_sale_price}}</h2>

                                </div>
                                    <div class="col-md-4">
                                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button" >Add to cart</a> </p>


                                    </div>
                            </div>
                            @endforeach

                    </div>
                </div>

    </div>
@endsection
