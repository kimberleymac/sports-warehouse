{{-- CAN REPLACE The list WITH A FOREACH LOOP  --}}

{{-- <ul class="product-categories__ul">
    <li><a href="/categories/1">Shoes</a></li>
    <li><a href="/categories/2">Helmets</a></li>
    <li><a href="/categories/3">Pants</a></li>
    <li><a href="/categories/4">Tops</a></li>
    <li><a href="/categories/5">Balls</a></li>
    <li><a href="/categories/6">Equipment</a></li>
    <li><a href="/categories/7">Training gear</a></li>
</ul> --}}
        
{{-- When you are using the route function, it does not necessarily need the specific ID for the route, you can use the whole category and it will take the ID from that --}}
<nav class="product-categories" aria-label="product-categories">
    <ul class="product-categories__ul">
        @foreach ($categories as $category)
        
        <li><a href="{{ route("categories.show", $category) }}">{{$category->categoryName}}</a></li>
        
        @endforeach 
    </ul>

</nav>