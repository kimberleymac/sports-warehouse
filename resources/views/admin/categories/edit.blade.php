@extends('layouts.app')
@section('title', 'Add new category')
@section('content')


    <section class="site-main__section featured-products">

        <h2 class="site-main__h2">Edit category: {{ $category->categoryName}}</h2>

        <form action="{{ route("admin.categories.update", $category) }}" method="post">
            @csrf
            @method("PUT")


            <div>
                <label for="categoryName">Name:
                </label>
                <input type="text" name="categoryName" id="categoryName" value="{{ old('categoryName', $category->categoryName) }}">
            </div>
            @error('categoryName')
            <div class="error">{{ $message }}</div>
            @enderror
        

        <div>
        <button type="submit" class="overlay__button">
            Update
        </button>
    
        
    </div>
    </form>
    <a class="overlay__button" href="{{ route('admin.categories.index') }}">Cancel</a>


            

    </section>

@endsection