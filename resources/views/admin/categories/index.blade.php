@extends('layouts.app')
@section('title', 'Sports Warehouse Manage Categories')
@section('content')

{{-- Defines admin content --}}
@adminOnly


    <section class="site-main__section featured-products">

        <h2 class="site-main__h2 admin-heading">Manage Categories<a class="admin-heading__button" href="{{ route("admin.categories.create") }}">Add Category</a></h2>

        
        
        <div class="featured-products-wrapper admin-centre-table">

            @if ($categories->count()===0)

            <div>
                <span>
                    No categories to display
                </span>
            </div>

            @else
            
            {{-- <table>
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
                            <div class="table-actions">
                            <a class="action-buttons" href="{{ route("admin.categories.edit", $category->slug) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                            {{-- Delete link button --}}
                            {{-- <form method="post" action="{{ route("admin.categories.destroy", $category->slug) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method("DELETE")
                                <button class="action-buttons" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}

            {{-- With styling --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">
                        @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $category->categoryId }}
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $category->categoryName }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.categories.edit', $category->slug) }}"
                                        title="Edit"
                                        class="action-buttons"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.categories.destroy', $category->slug) }}"
                                        onsubmit="return confirm('Warning: Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')

                                        <button
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
            @endif
            
        </div>

@endAdminOnly
    
    </section>

@endsection