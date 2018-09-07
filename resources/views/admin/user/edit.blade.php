@extends('admin.layout.app')

@section('main-content')


<!-- /.box -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Edit User
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">Admin User</li>
  </ol>
</section>

@include('includes.errormessage')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('user.update',$user->id)}}" method="post">
          @csrf
          {{method_field('PUT')}}
          <div class="box-body">
            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter name">
            </div>

            <div class="form-group">
              <label for="email">User Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="phone">User Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="Enter phone">
            </div>

            <div class="form-group">
              <label for="password">User Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>

            <div class="form-group">
              <label for="password_confirmation">User Status</label>
              <div class="checkbox">
                <lebel style="margin-left: 20px"><input type="checkbox" @if ($user->status == 1)
                  checked 
                @endif value="1" name="status">Status</lebel>
              </div>
            </div>

            <div class="form-group">
              <label>User Role</label>
              <div class="row">
                @foreach ($roles as $role)
                <div class="col-lg-3">
                  <div class="checkbox">
                    <label><input type="checkbox" name="role[]" value="{{$role->id}}"
                      @foreach ($user->roles as $user_role)
                       @if ($user_role->id == $role->id)
                         checked
                       @endif
                      @endforeach>{{$role->name}}</label>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>


      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection