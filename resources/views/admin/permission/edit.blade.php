@extends('admin.layout.app')

@section('main-content')
  
          
          <!-- /.box -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Permission</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.errormessage')
            <form role="form" method="post" action="{{route('permission.update',$permission->id)}}">
              @csrf
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}">
                </div>

                <div class="form-group">
                  <label for="for">Permission For</label>
                  <select name="for" id="for" class="form-control">
                    <option selected disable >Select Permission For</option>
                    <option value="post">Post</option>
                    <option value="user">User</option>
                    <option value="others">Others</option>
                  </select>
                </div>


                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('permission.index')}}" class="btn btn-primary" style="margin-left: 15px">Back</a>
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