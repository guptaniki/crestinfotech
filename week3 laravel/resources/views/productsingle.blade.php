@extends('layout')

@section('content')

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
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-2">
                                        @foreach($main_images as $image)
                                            <img src="/images/product/{{$image->v_image}}"  style="width: 50px; height: 50px;"  onclick="showIt(this.src)"><br>
                                        @endforeach
                                        @foreach($other_images as $image)
                                            <img src="/images/product/{{$image->v_image}}"  style="width: 50px; height: 50px;"  onclick="showIt(this.src)"><br>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        @foreach($main_images as $image)
                                            <img src="/images/product/{{$image->v_image}}" id="imageshow" style="width: 200px; height: 200px;"><br>
                                        @endforeach

                                    </div>
                                    <div class="col-md-6">
                                        <strong>Name:</strong>

                                        {{ $product->v_product_name }}<br>
                                        <strong>Price:</strong>
                                        {{ $product->i_price }}<br>
                                        <strong>Sale Price:</strong>
                                        {{ $product->i_sale_price }}
                                        <br>
                                        <form action="{{url('addToCart')}}" method="get" class="custom-control-form" style="margin-top:3%">
                                        <strong>quantity:</strong>

                                        <input type="number" value="{{$product->f_quantity}}" class="" id="qty" name="quantity" onkeyup="multiply()" />

                                        <br><strong>PRICE</strong>
                                        <input type="text" name="price" id="price" value="{{$product->i_price}}" readonly/>
                                        <br>
                                        <strong>Total</strong>
                                        <input type="text" name="total" id="total" />
                                            {{session()->put('f_quantity',$product->f_quantity)}}
                                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button" >Add to cart</a> </p>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                    </div>
                                </div>


                                @endforeach



                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showIt(imgsrc)
        {
            document.getElementById('imageshow').src=imgsrc;
            document.getElementById('imageshow').style.display='block';
        }

        function hideIt()
        {
            document.getElementById('imageshow').style.display='none';
        }
        function multiply() {
            a = Number(document.getElementById('qty').value);
            b = Number(document.getElementById('price').value);
                c = a * b;
            document.getElementById('total').value = c;

        }


    </script>
@endsection
