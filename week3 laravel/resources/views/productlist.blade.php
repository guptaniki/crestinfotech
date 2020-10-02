@extends('layouts.app')

@section('content')
    <head>
        <script src='{{asset('HTWF/scripts/script.js')}}' type='text/javascript'></script>

        <!-- CSS -->
        <link href="{{asset('HTWF/scripts/bootstrap/css/bootstrap.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('HTWF/scripts/jquery.min.js')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('HTWF/style.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('HTWF/css/components.css')}}" type="text/css" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($products as $product)

                            <div class="adv-img-double-content">
                                <div class="img-box adv-img adv-img-half-content" data-anima="fade-bottom" data-trigger="hover" data-anima-out="hide">
                                    <i class="fa fa-clock-o anima anima-fade-left"></i>
                                    <a class="img-box img-fade-bottom" href="#">
                                        @foreach($main_images as $image)
                                        @if($product->id==$image->f_product_id)

                                                <img src="/images/product/{{$image->v_image}}"  style="width: 300px; height: 300px;" >
                                      @endif

                                        @endforeach

                                    </a>

                                </div>
                                <div class="caption-bottom">
                                    <h2>Product Name:{{$product->v_product_name}}</h2>
                                    <h2>Price:<del>{{$product->i_price}}</del></h2>
                                    <h2>Sale price:{{$product->i_sale_price}}</h2>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
