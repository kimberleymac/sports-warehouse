@extends('layouts.app')
@section('title', 'Add new category')
@section('content')

{{-- Defines admin content --}}
@adminOnly

    <section class="site-main__section featured-products">

        <h2 class="site-main__h2">Edit Category: {{ $category->categoryName}}</h2>

        {{-- <form action="{{ route("admin.categories.update", $category) }}" method="post">
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
    <a class="overlay__button" href="{{ route('admin.categories.index') }}">Cancel</a> --}}
    <div class="">
        <form action="{{ route('admin.categories.update', $category) }}" method="post"
        class="max-w-2xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')

        <div class="space-y-6">

            {{-- Category Name --}}
            <div>
                <label
                    for="categoryName"
                    class="mb-2 block text-sm font-medium text-gray-700">
                    Category Name
                </label>
                <input
                    type="text"
                    name="categoryName"
                    id="categoryName"
                    value="{{ old('categoryName', $category->categoryName) }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">

                @error('categoryName')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="overlay__button">
                    Update
                </button>
                <a
                    href="{{ route('admin.categories.index') }}"
                    class="overlay__button">
                    Cancel
                </a>
            </div>

        </div>
    </form>

</div>  


@endAdminOnly            

    </section>

@endsection