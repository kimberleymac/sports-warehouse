@extends('layouts.app')
@section('title', 'Sports Warehouse Checkout')
@section('content')


            <section class="site-main__section featured-products">
                
                <h2 class="site-main__h2">Checkout items</h2>

                <div class="">

                <div>
                @include('layouts.partials._product_cards_checkout', ['items'=> $items])

                
                <div class="">

                    {{-- Display errors --}}
                    @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                
                </div>

                <div class="brand-partnerships__imgs checkout-form">
                    
                    <div id="newsletter-form">

                        <form action="/checkout" method="post">
                            @csrf
                                <div class="form-row">
                                    <label class="form-label" for="firstName">First name:</label>
                                    <input class="form-input" type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="John">
                                    @error('firstName')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="lastName">Last name:</label>
                                    <input class="form-input" type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="Smith" required>
                                    @error('lastName')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="address">Address:</label>
                                    <input class="form-input" type="text" id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="contactNumber">Contact number:</label>
                                    <input class="form-input" type="text" id="contactNumber" name="contactNumber" value="{{ old('contactNumber') }}" required>
                                    @error('contactNumber')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="email">Email: </label>
                                    <input class="form-input" type="email" id="email" name="email" placeholder="name@email.com.au" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="creditCardNumber">Credit Card Number: </label>
                                    <input class="form-input" type="creditCardNumber" id="creditCardNumber" name="creditCardNumber" placeholder="" value="{{ old('creditCardNumber') }}" required>
                                    @error('creditCardNumber')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="nameOnCard">Name on Card: </label>
                                    <input class="form-input" type="nameOnCard" id="nameOnCard" name="nameOnCard" placeholder="John Smith" value="{{ old('nameOnCard') }}" required>
                                    @error('nameOnCard')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="expiryDate">Expiry Date: </label>
                                    <input class="form-input" type="expiryDate" id="expiryDate" name="expiryDate" placeholder="" value="{{ old('expiryDate') }}" required>
                                    @error('expiryDate')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="csv">CSV: </label>
                                    <input class="form-input" type="csv" id="csv" name="csv" placeholder="" value="{{ old('csv') }}" required>
                                    @error('csv')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>

                                <div class="form-row">

                                    <button type="submit" name="submitRegister" class="contact-button">Complete Checkout</button>
                                    {{-- If the form is submitted show the success message --}}
                                        @if (session('success'))
                                            <div class="message">{{session('success')}}</div>
                                        @endif
                                    
                                </div>
                        </form>
                    </div>
                </div>
            
            </div>    
        </section>

@endsection