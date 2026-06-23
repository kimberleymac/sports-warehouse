<div class="featured-products-wrapper">
    

    {{-- Product Card --}}
            
                <article class="product-card-large">
                    <div class="product-card-large__image">

                    

                    <img src="{{ $item->image_url }}"
                        alt="{{ $item->itemName }}" width="400"
                        class="product-card-large__img">
                    
                        
                </div>
                
                <div class="product-card-large__info">

                    <div class="product-card-large__title-price">
                    <h3 class="product-card-large__title">{{ $item->itemName }}</h3>
                    
                    
                    <p class="product-card-large__price product-price">
                                

                            @if ($item->salePrice)
                            {{-- SALE formatting --}}

                            <span class="discounted-price"><ins>{{ $item->sale_price_formatted }}</ins></span>

                            <span class="original-price"><span class="original-price__was">was</span><del
                                class="original-price__del">{{ $item->price_formatted }}</del></span>
                            
                            @else
                            {{-- Normal price formatting --}}
                            <span class="current-price">
                                ${{ $item->price }}
                            </span>
                            @endif
                        </p>
                    </div>
                    
                    <p class="product-card-large__description">{{ $item->description }}</p>

                    {{-- Button --}}

                    <form method="post" class="button__cart" action="{{ route('products.save', $item) }}">
                        @csrf
                        <button type="submit" title="Add to cart">Add to cart</button>
                    </form>


            
                </div>

                </article>
                
            

            
            </div>

