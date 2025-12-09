@extends('admin.layouts.app')
@section('title', 'Categoy Create')
@section('contain')
    <section>
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="card-header">
                      <h4>Category Create</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required="">
                        
                      </div>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
    </section>
@endsection