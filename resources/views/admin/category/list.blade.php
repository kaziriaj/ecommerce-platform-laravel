@extends('admin.layouts.app')
@section('title', 'Categoy')
@section('contain')
   <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Category List</h4>
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
                        @foreach ($category as $cate)
                        <tr>
                          <td>1</td>
                          <td>{{ $cate->name }}</td>
                          <td>2017-01-09</td>
                          <td>
                            <div class="badge badge-success">Active</div>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
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