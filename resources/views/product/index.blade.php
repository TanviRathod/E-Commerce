@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('List Product') }}
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-warning  text-white float-right">Create Product</a>
                    <a href="{{route('order.index')}}" class="btn btn-sm btn-warning text-white float-right mr-2">OrderList</a>
                
                </div>
                <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SKU</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.getdata') }}",
        order : [0 , 'desc'],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'sku', name: 'sku'},
            {data: 'product_name', name: 'product_name'},
            {data: 'price', name: 'price'},
            {data: 'qty', name: 'qty'},
        ]
    });
    
  });
</script>
@endpush