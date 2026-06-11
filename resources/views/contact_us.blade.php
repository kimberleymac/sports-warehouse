@extends('layouts.app')
@section('title', 'Sports Warehouse')
@section('content')

            <section class="site-main__section brand-partnerships">
                <h2 class="site-main__h2 brand-partnerships__h2">Contact Us</h2>
                <div class="brand-partnerships-wrapper">
                    <div class="brand-partnerships__h2_p">
                        <p class="brand-partnerships__p brand-partnerships__p--blue contact-us-text">Receive a 15% discount on your
                            first order when you sign up for our newsletter.</p>
                    </div>
                    <div class="brand-partnerships__imgs">
                        <div id="newsletter-form">

                            <form action="{{ route('contactus.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <label for="firstName">First name:</label>
                                    <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" required>
                                    @error('firstName')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="lastName">Last name:</label>
                                    <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required>
                                    @error('lastName')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="contactNumber">Contact number:</label>
                                    <input type="text" id="contactNumber" name="contactNumber" value="{{ old('contactNumber') }}">
                                    @error('contactNumber')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="email" placeholder="name@email.com.au" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="question"> Question? </label>
                                    <textarea name="question"
                                        id="question">{{ old('question') }}</textarea>
                                    @error('question')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <label>
                                        <input class="checkbox" type="checkbox" name="newsletter" value="yes">
                                        Sign up to our newsletter
                                    </label>
                                    @error('checkbox')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>
                                
                                
                                <div class="form-row">
                                    <label>
                                        <input class="checkbox" type="checkbox" name="termsAndConditions" value="yes" required>
                                        Agree to terms &amp; conditions
                                    </label>
                                    @error('checkbox')
                                    <span class="error-message">{{$message}}</span>                                        
                                    @enderror
                                </div>

                                <div class="form-row">

                                    <button type="submit" name="submitRegister" class="contact-button">Submit</button>
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