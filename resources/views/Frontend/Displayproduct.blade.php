@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="row">
                @if(!empty($products))   
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card  m-2">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->product_name}}</h5>
                                <p class="card-text"></p>
                                <a href="{{route('product_details',$product->id)}}" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-4">
                        <div class="card  m-2">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">No Product</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection