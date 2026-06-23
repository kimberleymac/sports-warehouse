@if ($items->count() === 0)

  <div>
    <span>No products to display.</span>
  </div>

@else
    
    @foreach ($items as $item)


    {{-- Product Card --}}
            
                <article class="featured-products__product-card">
                    <div class="product-card">
                    <a href="{{ route("products.show", $item) }}" >
                    <h3 class="product-card__title">{{ $item->itemName }}</h3>

                    <img src="{{ $item->image_url }}"
                        alt="{{ $item->itemName }}" width="125"
                        class="product-card__img">
                        
                        

                    
                        <p class="product-card__price product-price">
                            

                        @if ($item->salePrice)
                        {{-- SALE formatting --}}

                        <span class="discounted-price"><ins>${{ $item->salePrice }}</ins></span>

                        <span class="original-price"><span class="original-price__was">was</span><del
                            class="original-price__del">${{ $item->price }}</del></span>
                        
                        @else
                        {{-- Normal price formatting --}}
                        <span class="current-price">
                            ${{ $item->price }}
                        </span>

                        
                        @endif
                        
                        </p>
                    </a>
                    
                    {{-- @php
                        $cart = Session::get('cart',[]);
                        $itemId = $item->itemId ?? null;
                        $inCart = isset($cart[$item->$itemId]);
                    @endphp
                    
                    @if ($inCart)
                    <form method="post" action="{{ route("products.unsave", $item)  }}">
                        @csrf
                        <button type="submit" class="add-to-cart-button add-to-cart-button-40" aria-label="remove_from_cart" title="Remove from cart">
                            -
                        </button>
                    </form>
                    @else
                    <form method="post" action="{{ route("products.save", $item)  }}">
                        @csrf
                        <button type="submit" class="add-to-cart-button" aria-label="add_to_cart" title="Add to cart">
                            +
                        </button>
                    </form>
                    @endif --}}

                    {{-- Check if item is in cart + Add/Remove button --}}
                    @php
                        $cart = Session::get('cart', []);
                        $itemId = $item->itemId ?? null;
                        $inCart = $itemId && isset($cart[$itemId]);
                    @endphp

                    @if ($inCart)
                        <form method="post" action="{{ route('products.unsave', $item) }}">
                            @csrf
                            <button type="submit" class="add-to-cart-button add-to-cart-button-40" title="Remove from cart">-</button>
                        </form>
                    @else
                        <form method="post" action="{{ route('products.save', $item) }}">
                            @csrf
                            <button type="submit" class="add-to-cart-button" title="Add to cart">+</button>
                        </form>
                    @endif
                </div>
                </article>
                
            
            @endforeach 

@endif

