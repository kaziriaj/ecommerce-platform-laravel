@extends('admin.layouts.app')
@section('title', 'Categoy Create')
@section('contain')
    <section>
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @php
                        $isEdit = isset($category);
                    @endphp
                  <form action="{{$isEdit ? route('category.update', $category->slug) : route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif
                    <div class="card-header">
                      <h4>{{ $isEdit ? 'Edit Category' : 'Category Create' }}</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name', $isEdit ? $category->name : '')}}" required="">

                      </div>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      &nbsp;
                      @if ($isEdit && $category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/category/' . $category->image) }}"
                                        alt="{{ $category->name }}" width="150">
                                </div>
                        @endif
                    </div>
                    &nbsp;
                    <p>&nbsp;</p>
                    <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="status">
                        <option value="active" class="text-success" {{ ($isEdit && $category->status === 'active') ? 'selected' : '' }}>Active</option>
                        <option value="inactive" class="text-danger" {{ ($isEdit && $category->status === 'inactive') ? 'selected' : '' }}>Inactive</option>
                      </select>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit">{{ $isEdit ? 'Update' : 'Create' }}</button>
                    </div>
                  </form>
                </div>
              </div>
    </section>
@endsection
