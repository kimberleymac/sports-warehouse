@extends('layouts.app')
@section('title', 'Sports Warehouse Checkout')
@section('content')


            <section class="site-main__section featured-products">
                
                <h2 class="site-main__h2">Order confirmaton</h2>

                <h3 class="heading_h3">Thank you for your order!</h3>

                <h4 class="heading_h4">Your order number is: <strong>{{$order->orderNumber}}</strong></h4>

                <a class="confirmation-button" href="/">Continue shopping</a>

                
               
        </section>

@endsection