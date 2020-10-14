@extends('layout')

{{--@section('title', 'Cart')--}}

@section('content')

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

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

{{--        <form action="{{ route('store') }}" method="POST"  enctype="multipart/form-data">--}}

        <?php $total = 0 ?>



                <tr>

                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="/images/product/{{ $details['photo'] }}" width="100" height="100" class="img-responsive" name="photo""/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin"><input value="{{ $details['name'] }}" name="name"></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity" class="text-center" >
                        {{ $details['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                    </td>
                </tr>
{{--            @endforeach--}}
{{--        @endif--}}

        </tbody>
        <tfoot>
        <?php $total += $details['price'] * $details['quantity'] ?>

        <tr class="visible-xs">
{{--            <td class="text-center"><strong>Total{{$total}}--}}
                </strong>
            <td data-th="Total" class="text-center">
                {{ $details['Total'] }}
            </td>
{{--            </td>--}}
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            {{session()->put('quantity', $details['quantity'])}}
{{--            {{session()->put('t/otal', $total)}}--}}

            <td><a href="{{ url('order.index/?id='.$id) }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Place order </a></td>
            <td> <button type="submit" class="btn btn-primary">Place order</button></td>

        </tr>
        </tfoot>
    </table>
{{--   >--}}

{{--    </form>--}}
@endsection


@section('scripts')




@endsection
