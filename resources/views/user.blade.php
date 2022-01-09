@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Blogs</h2>
          </div>
          <div class="card-body">
            <table id="users-table" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                      @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->title}}</td>
                            <td>{!! $blog->content !!}</td>
                            <td><a href="#" ><button class="btn btn-primary"> View More</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection