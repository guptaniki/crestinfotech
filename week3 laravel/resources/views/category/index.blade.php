@extends('category.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{url('category')}}" method="get" class="custom-control-form" style="margin-top:3%">

    <div class="form-group">

        <label><strong>Status :</strong></label>

        <select id='status' name="status" class="form-control" style="width: 200px">

            <option value="">--Select Status--</option>
            <option value="0" >Active</option>
            <option value="1" >Deactive</option>

        </select>
        <input name ="name" type="text" >
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Order</th>
            <th>Status</th>

            <th width="280px">Action</th>
        </tr>
{{--        {{dd($categorys)}}--}}
        @foreach ($categorys as $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->v_name }}</td>
                <td> <img src="/images/category/{{$category->v_image}}"  style="width: 100px; height: 100px;" ></td>
                <td>{{ $category->i_order }}</td>
                <td>@if($category->i_status == 1)
                        <?php echo "Inactive";?>
                    @else
                        <?php echo "active";?>
                    @endif</td>

                <td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{--    {!! $categorys->links() !!}--}}
    <script>
        $(document).ready(function(){

            // Initialize select2
            $("#status").select2();
            $("#name").select2();


            // Read selected option
            $('#submit').click(function(){
                var status = $('#status option:selected').text();
                // var v_name = $('#v_name option:selected').text();


                $('#result').html( " status : " + status);
            });

        });


    </script>
@endsection
