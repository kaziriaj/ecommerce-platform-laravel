@extends('admin.layouts.app')
@section('title', 'Slideshow Create')
@section('contain')
    <section>
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @php
                        $isEdit = isset($slideshow);
                    @endphp
                  <form action="{{$isEdit ? route('slider.update', $slideshow->id) : route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif
                    <div class="card-header">
                      <h4>{{ $isEdit ? 'Edit slideshow' : 'slideshow Create' }}</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Slide Category Type</label>
                        <input type="text" name="category" class="form-control" value="{{old('category', $isEdit ? $slideshow->name : '')}}" required="">

                      </div>
                      <div class="form-group">
                        <label>Slide Title 1</label>
                        <input type="text" name="title_1" class="form-control" value="{{old('title_1', $isEdit ? $slideshow->name : '')}}" required="">
                      </div>
                      <div class="form-group">
                        <label>Slide Title 2</label>
                        <input type="text" name="title_2" class="form-control" value="{{old('title_2', $isEdit ? $slideshow->name : '')}}" required="">
                      </div>
                      <div class="custom-file">
                        &nbsp;
                      <input type="file" class="custom-file-input" name="photo" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <label>Note/Old Price</label>
                        <input type="text" name="sub" class="form-control" value="{{old('sub', $isEdit ? $slideshow->name : '')}}" required="">
                      </div>
                    <div class="form-group">
                        <label>Current Price/Offer Price/Display Price</label>
                        <input type="text" name="price" class="form-control" value="{{old('price', $isEdit ? $slideshow->name : '')}}" required="">
                      </div>
                    <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="status">
                        <option value="1" class="text-success" {{ ($isEdit && $slideshow->status === '0') ? 'selected' : '' }}>Active</option>
                        <option value="0" class="text-danger" {{ ($isEdit && $slideshow->status === '1') ? 'selected' : '' }}>Inactive</option>
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
