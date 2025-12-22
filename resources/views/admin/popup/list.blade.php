@extends('admin.layouts.app')
@section('title', 'Newsletter popup')
@section('contain')
   <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                        <h4>Popup List</h4>
                        <a href="{{ route('websitepopup.create') }}" class="btn btn-primary">Add New Popup</a>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                          <tr>
                          <th>#</th>
                          <th style="width: 25%">Name</th>
                          <th style="width: 20%">Description</th>
                          <th style="width: 20%">Image</th>
                          <th style="width: 20%">Status</th>
                          <th style="width: 25%">Action</th>
                        </tr>
                        @foreach ($popups as $key => $popup)
                        <tr>
                          <td>{{$key +1 }}</td>
                          <td>{{ $popup->name }}</td>
                          <td>{{ $popup->short_description }}</td>
                          <td>
                            <img src="{{ asset('storage/website/popup/' . $popup->image) }}" alt="" style="width: 100px">
                          </td>
                          <td>
                            <div class="badge {{ $popup->status === 'inactive' ? 'badge-danger' : 'badge-success'}}  text-capitalize">{{ $popup->status }}</div>
                          </td>
                          <td>
                            <a href="{{ route('websitepopup.edit', $popup->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('websitepopup.destroy', $popup->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
