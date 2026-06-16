@extends('layouts.app')
@section('title', 'Sports Warehouse Manage Categories')
@section('content')


    <section class="site-main__section featured-products">

        <h2 class="site-main__h2">Manage Categories</h2>

        <a class="overlay__button" href="{{ route("admin.categories.create") }}"> add category</a>
        
        <div class="featured-products-wrapper">

            @if ($categories->count()===0)

            <div>
                <span>
                    No categories to display
                </span>
            </div>

            @else
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->categoryId}}</td>
                        <td>{{$category->categoryName}}</td>
                        <td>
                            <a class="overlay__button" href="{{ route("admin.categories.edit", $category->slug) }}">Edit</a>

                            {{-- Delete link button --}}
                            <form method="post" action="{{ route("admin.categories.destroy", $category->slug) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method("DELETE")
                                <button class="overlay__button">
                                    Delete
                                </button>
                            </form>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            
        </div>
    </section>

@endsection