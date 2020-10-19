@extends('category.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order</h2>
                <a class="btn btn-primary" href="{{ url('cart') }}"> Back</a>

            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Order_id</th>
            <th>Final Total </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address </th>
            <th>Product name</th>
            <th>price</th>
            <th>qty </th>

            <th>subtotal</th>

        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->v_order_id }}</td>
                <td>{{ $order->f_final_total }}</td>
                <td>{{ $order->v_firstname }}</td>
                <td>{{ $order->v_lastname }}</td>
                <td>{{ $order->v_email }}</td>
                <td>{{ $order->v_address }}</td>



        @endforeach
        @foreach ($order_items as $items)
                <td>{{ $items->v_product_name }}</td>
                <td>{{ $items->f_price }}</td>
                <td>{{ $items->f_qty }}</td>
                <td>{{ $items->f_subtotal }}</td>


                    <td>
                        <form action="{{ route('order.destroy',$order->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('orderdetail',$order->id) }}">Show</a>


                        </form>
                    </td>
            </tr>
        @endforeach
    </table>

    {{--    {!! $categorys->links() !!}--}}

@endsection
