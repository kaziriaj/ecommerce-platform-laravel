@extends('admin.layouts.app')
@section('title', 'Web Slide Show')
@section('contain')
   <div class="col-12 col-md-12 col-lg-12">
                <div class="card d-flex">
                  <div class="card-header d-flex justify-content-between">
                    <h4>Website Slideshow List</h4>
                    <a href="{{ route('slider.create') }}" class="btn btn-success"> Add New Slider </a>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                          <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($slideshow as $key => $slide)
                        <tr>
                          <td>{{$key +1 }}</td>
                          <td>{{ $slide->title_1 }}</td>
                          <td>
                            <img src="{{ asset('storage/slideshow/' . $slide->photo) }}" alt="">
                          </td>
                          <td>
                            <div class="badge {{ $slide->status == 1 ? 'badge-success' : 'badge-danger' }}  text-capitalize">
                                {{ $slide->status == 1 ? 'Published' : 'Unpublished' }}
                            </div>
                          </td>
                          <td>
                            <a href="{{ route('slider.edit', $slide->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('slider.destroy', $slide->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
@endsection
