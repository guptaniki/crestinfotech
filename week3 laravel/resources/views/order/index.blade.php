@extends('order.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order</h2>
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
            <th>User id</th>
            <th>Order_id</th>
            <th>Final Total </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address </th>
            <th>Order Status</th>
            <th>Payment Status</th>

            <th width="280px">Action</th>
        </tr>
{{--                {{dd($order)}}--}}
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$order->i_customar_id }}</td>
                <td>{{ $order->v_order_id }}</td>
                <td>{{ $order->f_final_total }}</td>
                <td>{{ $order->v_firstname }}</td>
                <td>{{ $order->v_lastname }}</td>
                <td>{{ $order->v_email }}</td>
                <td>{{ $order->v_address }}</td>
                <td>{{ $order->v_order_status }}</td>
                <td>{{ $order->v_payment_status }}</td>

                <td>
                    <form action="{{ route('order.destroy',$order->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('order.show',$order->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('order.edit',$order->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{--    {!! $categorys->links() !!}--}}

@endsection
