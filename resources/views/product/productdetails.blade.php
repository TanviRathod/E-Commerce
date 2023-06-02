@extends('layouts.app')

@section('content')
<style>
    .product-counter {
    display: flex;
    align-items: center;
}

.btn-minus,
.btn-plus {
    width: 30px;
    height: 30px;
    padding: 0;
    font-size: 14px;
}

.counter-input {
    width: 40px;
    text-align: center;
}
</style>
<div class="container">
    <div class="row justify-content-center">
           

         <div class="message"></div>
        <div class="col-md-12">
            <div class="card m-2">
                <div class="card-body">
                    <input type="hidden" class="product_id" value="{{$productview->id}}">
                    <h5 class="card-title">Product Details</h5>
                    <p class="card-text">
                        Product Name : {{$productview->product_name}} <br>
                        Product Price : <span class="price">{{$productview->price}}</span> <br>
                        Product Quantity : 
                        <div class="product-counter">
                            <button class="btn btn-sm btn-minus">-</button>
                            <input type="text" class="form-control counter-input" value="1" readonly>
                            <button class="btn btn-sm btn-plus">+</button>
                        </div>
                     </div>
                     Total Price : <span class="totalprice"></span>
                    </p>
                    <a class="btn btn-success buynow text-white">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('script')
    <script>
      $(document).ready(function() {
    $('.product-counter').each(function() {
        var counterInput = $(this).find('.counter-input');
        var minusButton = $(this).find('.btn-minus');
        var plusButton = $(this).find('.btn-plus');

        minusButton.click(function(e) {
            e.preventDefault();
            var value = parseInt(counterInput.val());
            if (value > 1) {
                value--;
                counterInput.val(value);
            }
            totalPrice();
        });

        plusButton.click(function(e) {
            e.preventDefault();
            var value = parseInt(counterInput.val());
            value++;
            counterInput.val(value);
            totalPrice();
        });
    });

    function totalPrice()
    {
        var qty_val=$('.counter-input').val();
            var price = $('.price').text();
            var totalprice = (qty_val) * (price);
            $('.totalprice').text(totalprice);
    }
    totalPrice();
    $('.buynow').on('click',function(){

        var product_id = $('.product_id').val();
        var qty = $('.counter-input').val();
        var totalprice =$('.totalprice').text();
        $.ajax({
        type: "post",
        url: "{{route('product.buy')}}",
        data: {
            product_id:product_id,
            qty:qty,
            totalprice :totalprice,
            _token:"{{csrf_token()}}",
        },
        dataType: "json",
        success: function (response) {
            if(response.status == true)
            {
                $('.message').html(`<div class="alert alert-danger alert-block message_alert">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong class="">order Placed successfully</strong>
            </div>`);
            }
        }
    });
    });
   
});
    </script>
    @endpush