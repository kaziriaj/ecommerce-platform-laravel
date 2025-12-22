@extends('admin.layouts.app')
@section('title', 'Popup Create')
@section('contain')
    <section>
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @php
                        $isEdit = isset($popups);
                    @endphp
                  <form action="{{$isEdit ? route('websitepopup.update', $popups->id) : route('websitepopup.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif
                    <div class="card-header">
                      <h4>{{ $isEdit ? 'Edit popup' : 'popup Create' }}</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Popup Title</label>
                        <input type="text" name="name" class="form-control" value="{{old('name', $isEdit ? $popups->name : '')}}" required="">
                      </div>
                      <div class="form-group">
                        <label>Popup Short Description</label>
                        <textarea name="short_description" id="" class="form-control" cols="30"value="{{old('short_description', $isEdit ? $popups->short_description : '')}}" rows="10">{{old('short_description', $isEdit ? $popups->short_description : '')}}
                        </textarea>
                      </div>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                       @if ($isEdit && $popups->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/website/popup/' . $popups->image) }}"
                                        alt="{{ $popups->name }}" width="150">
                                </div>
                        @endif
                    </div>
                    &nbsp;
                    <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="status">
                        <option value="1" class="text-success" {{ ($isEdit && $popups->status === '1') ? 'selected' : '' }}>Active</option>
                        <option value="0" class="text-danger" {{ ($isEdit && $popups->status === '0') ? 'selected' : '' }}>Inactive</option>
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
