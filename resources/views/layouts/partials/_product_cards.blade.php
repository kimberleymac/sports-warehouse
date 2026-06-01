@if ($items->count() === 0)

  <div>
    <span>No products to display.</span>
  </div>

@else
    
    @foreach ($items as $item)

    {{-- Product Card --}}
            
                <article class="featured-products__product-card">
                    <a href="{{ route("products.show", $item->itemId) }}" class="product-card">

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
                </article>
                
            
            @endforeach 

@endif

