@extends('order.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('order.index') }}"> Back</a>
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

    <form action="{{ route('order.update',$order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User id:</strong>
                    <input type="number" name="" value="{{ $order->i_customar_id }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order id:</strong>
                    <input type="text" name="v_order_id" class="form-control" placeholder="order" value="{{$order->v_order_id}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Final total:</strong>
                    <input type="number" name="f_final_total" class="form-control" placeholder="order" value="{{$order->f_final_total}}">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="v_firstname" class="form-control" placeholder="order" value="{{$order->v_firstname}}">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last name:</strong>
                    <input type="text" name="v_lastname" class="form-control" placeholder="order" value="{{$order->v_lastname}}">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="v_email" class="form-control" placeholder="order" value="{{$order->v_email}}">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="v_address" class="form-control" placeholder="order" value="{{$order->v_address}}">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order Status:</strong>
{{--                    <input type="text" name="v_order_status" class="form-control" placeholder="order" value="{{$order->v_order_status}}">--}}
                    <select name="v_order_status" >
                        <option value="pending">pending</option>
                        <option value="processing">processing</option>

                        <option value="completed">completed</option>
                        <option value="decline">decline</option>

                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment Status:</strong>
{{--                    <input type="text" name="v_payment_status" class="form-control" placeholder="order" value="{{$order->v_payment_status}}">--}}
                    <select name="v_payment_status" >
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                        <option value="decline">decline</option>

                    </select>


                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
