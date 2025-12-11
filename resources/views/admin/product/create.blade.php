@extends('admin.layouts.app')
@section('title', 'Categoy Create')
@section('contain')
    <section>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @php
                    $isEdit = isset($product);
                @endphp
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ $isEdit ? route('product.update', $product->slug) : route('product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif
                    <div class="card-header">
                        <h4>{{ $isEdit ? 'Edit Product' : 'Create Product' }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $isEdit ? $product->name : '') }}" required>
                        </div>

                        <!-- Short Details -->
                        <div class="form-group">
                            <label for="short_details">Short Details</label>
                            <textarea id="short_details" name="short_details" class="form-control">{{ old('short_details', $isEdit ? $product->short_details : '') }}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="{{ old('price', $isEdit ? $product->price : '') }}" step="0.01" required>
                        </div>

                        <!-- Discount Price -->
                        <div class="form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="number" id="discount_price" name="discount_price" class="form-control"
                                value="{{ old('discount_price', $isEdit ? $product->discount_price : '') }}" step="0.01">
                        </div>

                        <!-- Stock -->
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" id="stock" name="stock" class="form-control"
                                value="{{ old('stock', $isEdit ? $product->stock : '') }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $isEdit ? $product->description : '') }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $isEdit && $product->category_id === $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Status -->
                        <div class="form-group">
                            <label for="status">Product Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="active" class="text-success"
                                    {{ $isEdit && $product->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" class="text-danger"
                                    {{ $isEdit && $product->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Product Image Upload -->
                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @if ($isEdit && $product->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/products/' . $product->image) }}"
                                        alt="{{ $product->name }}" width="150">
                                </div>
                            @endif
                        </div>

                        <!-- Multiple Images -->
                        <div class="form-group">
                            <label for="images">Additional Images</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple>
                            @if ($isEdit && $product->images)
                                <div class="mt-2">
                                    @foreach ($product->images as $image)
                                        <img src="{{ asset('storage/products/' . $image->image) }}" alt="Product Image"
                                            width="100">
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
