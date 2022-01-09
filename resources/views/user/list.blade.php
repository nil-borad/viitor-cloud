@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Users</h2>
            <a class="btn btn-primary btn-sm float-sm-right" href="{{route('users.create')}}">Add User</a>
          </div>
          <div class="card-body">
            <table id="users-table" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Of Birth</th>
                <th>Account Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("users.list_data")}}',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            {data: 'dob', name: 'dob'},
            {data: 'account_status', name: 'account_status'},
            {data: 'action', name: 'action'},
        ]
    });    
});
</script>
@endsection