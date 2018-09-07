@extends('admin.layout.app')

@section('main-content')


<!-- /.box -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Add User
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
        <form role="form" action="{{route('user.store')}}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter name">
            </div>

            <div class="form-group">
              <label for="email">User Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="phone">User Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone">
            </div>

            <div class="form-group">
              <label for="password">User Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>

            <div class="form-group">
              <label for="password_confirmation">User confirm password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password">
            </div>

            <div class="form-group">
              <label for="password_confirmation">User Status</label>
              <div class="checkbox">
                <lebel style="margin-left: 20px"><input type="checkbox" value="1" name="status">Status</lebel>
              </div>
            </div>

            <div class="form-group">
              <label>User Role</label>
              <div class="row">
                @foreach ($roles as $role)
                <div class="col-lg-3">
                  <div class="checkbox">
                    <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}</label>
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