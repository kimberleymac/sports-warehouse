@extends('layouts.app')
@section('title', 'Sports Warehouse Manage Items')
@section('content')

{{-- Defines admin content --}}
@adminOnly

    <section class="site-main__section featured-products">

        <h2 class="site-main__h2 admin-heading">Manage Items<a class="admin-heading__button" href="{{ route("admin.items.create") }}">Add item</a></h2>

        
        
        <div class="featured-products-wrapper">

            @if ($items->count()===0)

            <div>
                <span>
                    No items to display
                </span>
            </div>

            @else
            
            {{-- <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sale Price</th>--}}
                        {{-- <th>Description</th> --}}
                        {{-- <th>Featured</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td><img src="{{$item->image_url}}" alt="{{ $item->itemName }}" width="64"></td>
                        <td>{{$item->itemId}}</td>
                        <td>{{$item->itemName}}</td>
                        <td>${{$item->price}}</td>
                        <td>${{$item->salePrice}}</td> --}}
                        {{-- <td>{{$item->description}}</td> --}}
                        {{-- <td>{{$item->featured ? "✔️" : ""}}</td>
                        <td>{{$item->category->categoryName}}</td>
                        <td>
                            <div class="table-actions">
                            <a class="action-buttons" href="{{ route("admin.items.edit", $item->itemId) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                            {{-- Delete link button --}}
                            {{-- <form method="post" action="{{ route("admin.items.destroy", $item->slug) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method("DELETE")
                                <button class="action-buttons" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            <a class="overlay__button" href="{{ route("admin.items.edit", $item->slug) }}"><i class="fa-solid fa-magnifying-glass"></i>TODO</a>
                            
                        </div>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">


    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Photo
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Description
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Price
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Sale Price
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Featured
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Category
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                @foreach ($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">

                    {{-- Photo --}}
                    <td class="px-6 py-4">
                        <img
                            src="{{ $item->image_url }}"
                            alt="{{ $item->itemName }}"
                            class="h-full w-full object-contain"
                        >
                    </td>

                    {{-- ID --}}
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $item->itemId }}
                    </td>

                    {{-- Name --}}
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $item->itemName }}
                    </td>

                    {{-- Description --}}
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 line-clamp-2" title="{{ $item->description }}">
                        {{ $item->description }}
                    </td>

                    {{-- Price --}}
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ ($item->price_formatted) }}
                    </td>

                    {{-- Sale Price --}}
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ ($item->sale_price_formatted) }}
                    </td>

                    {{-- Featured --}}
                    <td class="px-6 py-4 text-center text-sm">
                        @if($item->featured)
                            <span class="text-green-600 font-semibold">✔</span>
                        @endif
                    </td>

                    {{-- Category --}}
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $item->category->categoryName }}
                    </td>

                    {{-- Actions --}}
                    <td class="px-6 py-4">
                        <div class="flex flex-col items-end gap-2">

                            {{-- View --}}
                            {{-- <a
                                href="{{ route('admin.items.show', $item->slug) }}"
                                title="View" class="action-buttons">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a> --}}

                            {{-- Edit --}} 
                            <a
                                href="{{ route('admin.items.edit', $item->slug) }}"
                                title="Edit"
                                class="action-buttons"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            {{-- Delete --}}
                            <form
                                method="POST"
                                action="{{ route('admin.items.destroy', $item->slug) }}"
                                onsubmit="return confirm('Warning: Are you sure you want to delete this item?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                id="warningMessage"
                                    type="submit"
                                    title="Delete"
                                    class="action-buttons"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
            @endif
            
        </div>
        
        
@endAdminOnly
    </section>

@endsection