@extends('layouts.app')
@section('title', 'Edit an item')
@section('content')

{{-- Defines admin content --}}
@adminOnly

    <section class="site-main__section featured-products">

        <h2 class="site-main__h2">Edit item: {{ $item->itemName}}</h2>

        {{-- <form action="{{ route("admin.items.update", $item) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")

                        <div>
                <label for="itemName">Name:
                </label>
                <input type="text" name="itemName" id="itemName" value="{{$item->itemName}}">
            
            @error('itemName')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="price">Price:
                </label>
                <input type="text" name="price" id="price" value="{{$item->price}}">
            
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="salePrice">Sale Price:
                </label>
                <input type="text" name="salePrice" id="salePrice" value="{{$item->salePrice}}">
            
            @error('salePrice')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="featured">Featured:
                </label>
                <input type="checkbox" name="featured" id="featured" value="1" @checked($item->featured)>
            
            @error('featured')
            <div class="error">{{ $message }}</div>
            @enderror
            </div> --}}
            {{-- <div>
                <label for="category">Category:
                </label>
                <input type="text" name="category" id="category" value="{{ old('category') }}">
            
            @error('category')
            <div class="error">{{ $message }}</div>
            @enderror
            </div> --}}
            {{-- <div>
            <label for="categoryId">Category:</label>
                <select name="categoryId" class="">
                    <option value="">-- Select a category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->categoryId }}" @selected($category->categoryId == $item->categoryId)>
                            {{ $category->categoryName }}
                        </option>
                    @endforeach
                </select>
            @error('categoryId')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="photo">Photo:
                </label>
                <img src="{{ $item->image_url }}" alt="{{ $item->itemName }}" width="100">
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/webp">            
            @error('photo')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>

            <div>
                <label for="description">Description:
                </label>
                <textarea name="description" id="description">{{ $item->description }}</textarea>
            
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>
        

        <div>
        <button type="submit" class="overlay__button">
            Update
        </button>
        </div>

    </form>
    <a class="overlay__button" href="{{ route('admin.items.index') }}">Cancel</a> --}}
    <form action="{{ route('admin.items.update', $item) }}"
      method="POST"
      enctype="multipart/form-data"
      class="max-w-4xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')

    <div class="space-y-6">

        {{-- Name --}}
        <div>
            <label
                for="itemName"
                class="mb-2 block text-sm font-medium text-gray-700"
            >
                Product Name
            </label>

            <input
                type="text"
                name="itemName"
                id="itemName"
                value="{{ old('itemName', $item->itemName) }}"
                class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('itemName')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Price Row --}}
        <div class="grid gap-6 md:grid-cols-2">

            {{-- Price --}}
            <div>
                <label
                    for="price"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Price
                </label>

                <input
                    type="text"
                    name="price"
                    id="price"
                    value="{{ old('price', $item->price) }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sale Price --}}
            <div>
                <label
                    for="salePrice"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Sale Price
                </label>

                <input
                    type="text"
                    name="salePrice"
                    id="salePrice"
                    value="{{ old('salePrice', $item->salePrice) }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('salePrice')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>


        {{-- Category --}}
        <div>
            <label
                for="categoryId"
                class="mb-2 block text-sm font-medium text-gray-700"
            >
                Category
            </label>

            <select
                name="categoryId"
                id="categoryId"
                class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">-- Select a category --</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->categoryId }}"
                        @selected($category->categoryId == $item->categoryId)
                    >
                        {{ $category->categoryName }}
                    </option>
                @endforeach
            </select>

            @error('categoryId')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Featured --}}
        <div>
            <label class="flex items-center gap-3">
                <input
                    type="checkbox"
                    name="featured"
                    value="1"
                    @checked($item->featured)
                    class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                >

                <span class="text-sm font-medium text-gray-700">
                    Featured Product
                </span>
            </label>

            @error('featured')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Photo --}}
        <div>
            <label
                for="photo"
                class="mb-2 block text-sm font-medium text-gray-700"
            >
                Photo
            </label>

            <div class="mb-4">
                <img
                    src="{{ $item->image_url }}"
                    alt="{{ $item->itemName }}"
                    class="h-32 w-32 rounded-md border border-gray-200 object-contain"
                >
            </div>

            <input
                type="file"
                name="photo"
                id="photo"
                accept="image/png, image/jpeg, image/webp"
                class="block w-full text-sm text-gray-700 file:mr-4 file:rounded-md file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:font-medium hover:file:bg-gray-200"
            >

            @error('photo')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Description --}}
        <div>
            <label
                for="description"
                class="mb-2 block text-sm font-medium text-gray-700"
            >
                Description
            </label>

            <textarea
                name="description"
                id="description"
                rows="6"
                class="w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('description', $item->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Buttons --}}
        <div class="flex gap-3">
            <button
                type="submit"
                class="overlay__button"
            >
                Update
            </button>

            <a
                href="{{ route('admin.items.index') }}"
                class="overlay__button"
            >
                Cancel
            </a>
        </div>

    </div>
</form>

            
@endAdminOnly
    </section>

@endsection