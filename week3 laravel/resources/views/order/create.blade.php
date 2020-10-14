@extends('layout')

{{--@section('title', 'Cart')--}}

@section('content')

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <form action="{{route('order.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
        <table>
            <tr>
                <th>First name :</th>
                <td><input name="v_firstname" type="text" class="form-control"></td>

                <th>Last name :</th>

                <td><input name="v_lastname" type="text" class="form-control" ></td>

            </tr>

            <tr>

                <th>Email</th>
                <td>
                    <br> <input name="v_email" type="email" class="form-control" value="{{$user->email}}">
                </td>
            </tr>
            <tr>

                <th>Address</th>
                <td>
                    <br> <textarea cols="20" rows="2" name="v_address"></textarea>
                </td>
            </tr>
        </table>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>

        <tbody>


        <tr>
                @foreach($product as $p)
            <td data-th="Product">
                <div class="row">
                    @foreach($main_images as $image)
                        @if($p->id==$image->f_product_id)
                    <div class="col-sm-3 hidden-xs"><img src="/images/product/{{ $image->v_image }}" width="100" height="100" class="img-responsive" /></div>
                        @endif

                    @endforeach
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $p->v_product_name }}</h4>
                    </div>
                </div>
            </td>

            <td data-th="Price">${{ $p->i_price }}</td>
            <td data-th="Quantity" class="text-center" >




                @foreach($qty as $s)
                    @if($p->id == $s[0])
                    {{ $s[1] }}
                    @endif
                @endforeach


            </td>
            <td data-th="Subtotal" class="text-center">$
                @foreach($qty as $s)
                    @if($p->id == $s[0])
                        {{ $subtotal[]=$p->i_price * $s[1] }}
                    @endif
                @endforeach

            </td>
            <td class="actions" data-th="">
            </td>
        </tr>


        </tbody>
        @endforeach




        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total $   {{ $t }}</strong></td>
            {{session()->put('subtotal', $subtotal)}}


            <td> <button type="submit" class="btn btn-primary">Place order</button></td>

        </tr>
    </table>

        </form>
@endsection


@section('scripts')




@endsection
