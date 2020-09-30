@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{url('product')}}" method="get" class="custom-control-form" style="margin-top:3%">

        <div class="form-group">

            <label><strong>Status :</strong></label>

            <select id='status' name="status" class="form-control" style="width: 200px">

                <option value="">--Select Status--</option>
                <option value="0" >Active</option>
                <option value="1" >Deactive</option>

            </select>
            <input name ="name" type="text" >

            <button type="submit" class="btn btn-primary">Submit</button>
            <br>
            <br>
            <input type="number" name="min_price" placeholder="min price">
            <input type="number" name="max_price" placeholder="max price">
            <button type="submit" class="btn btn-primary">filter price</button>
            <br>
            <br>
            <input type="number" name="minqty" placeholder="min quantity">
            <input type="number" name="maxqty" placeholder="max quantity">
            <button type="submit" class="btn btn-primary">filter quantity</button>
            <br><br>

            Sort By price :
            <input type="radio" name="pordering" value="priceorderasc">Lowest price
            <input type="radio" name="pordering" value="priceorderdesc">Higest price
            <input name="priceordring " type="submit" value="price order" class="moreinfobutton" />
        </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sale Price</th>
            <th>Quantity </th>
            <th>Order</th>
            <th>Status</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>

                    <td>{{ $product->v_product_name }}</td>

                <td>{{ $product->i_price  }}</td>
                <td>{{ $product->i_sale_price }}</td>
                <td>{{ $product->f_quantity }}</td>

                <td>{{ $product->i_order }}</td>
                <td>@if($product->i_status == 1)
                        <?php echo "Inactive";?>
                    @else
                        <?php echo "active";?>
                    @endif</td>

                <td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{--    {!! $categorys->links() !!}--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}

{{--            // Initialize select2--}}
{{--            $("#status").select2();--}}
{{--            $("#name").select2();--}}


{{--            // Read selected option--}}
{{--            $('#submit').click(function(){--}}
{{--                var status = $('#status option:selected').text();--}}
{{--                // var v_name = $('#v_name option:selected').text();--}}


{{--                $('#result').html( " status : " + status);--}}
{{--            });--}}

{{--        });--}}


{{--    </script>--}}
@endsection
