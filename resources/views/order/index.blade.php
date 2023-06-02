@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('List Order') }}
                <a href="{{route('product.index')}}" class="btn btn-sm btn-warning text-white float-right mr-2">Product List</a>
                </div>
                <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Purchase Qty</th>
                            <th>Total Price</th>
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
        ajax: "{{ route('order.getdata') }}",
        order : [0 , 'desc'],
        columns: [
            {data: 'id', name: 'id'}, 
            {data: 'user_id', name: 'user_id'},
            {data: 'product_id', name: 'product_id'},
            {data: 'product_qty', name: 'product_qty'},
            {data: 'price', name: 'price'},
        ]
    });
    
  });
</script>
@endpush