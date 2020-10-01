@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                            <a class="btn btn-success" href="{{ url('category') }}">Category</a>
                            <a class="btn btn-success" href="{{ url('product') }}">Product</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
