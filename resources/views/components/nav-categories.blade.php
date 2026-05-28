<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->

    <p style="color:red;">Category listing goes here</p>

</div>

<div>
    <ul>
        @foreach ($categories as $category)
        {{-- When you are using the route function, it does not necessarily need the specific ID for the route, you can use the whole category and it will take the ID from that --}}
        <li><a href="{{ route("categories.show", $category) }}">{{$category->categoryName}}</a></li>
        @endforeach
    </ul>
</div>