@extends('admin.layout.app')

@section('main-content')
  
          
          <!-- /.box -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Role
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Role</li>
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
            <form role="form" method="post" action="{{route('role.update',$role->id)}}">
              @csrf
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
                </div>

                  <div class="col-lg-4">
                    <label for="name"style="margin-left: -15px">User Permission</label>
                    @foreach ($permissions as $permission)
                    @if ($permission->for == 'post')
                    <div class="checkbox">
                      <lebel style="margin-left: 5px"><input type="checkbox" name="permission[]" value="{{$permission->id}}" 
                        @foreach ($role->permissions as $role_premt)
                          @if ($role_premt->id == $permission->id)
                            checked
                          @endif
                        @endforeach
                        >{{$permission->name}}</lebel>
                    </div>
                     @endif
                    @endforeach
                  </div>
                  <div class="col-lg-4">
                    <label for="name"style="margin-left: -15px">Role Permission</label>
                   @foreach ($permissions as $permission)
                    @if ($permission->for == 'user')
                    <div class="checkbox">
                      <lebel style="margin-left: 5px"><input type="checkbox" name="permission[]" value="{{$permission->id}}" 
                       @foreach ($role->permissions as $role_premt)
                          @if ($role_premt->id == $permission->id)
                            checked
                          @endif
                        @endforeach 
                        >{{$permission->name}}</lebel>
                    </div>
                     @endif
                    @endforeach
                  </div>
                  <div class="col-lg-4">
                    <label for="name"style="margin-left: -15px">Other Permission</label>
                   @foreach ($permissions as $permission)
                    @if ($permission->for == 'others')
                    <div class="checkbox">
                      <lebel style="margin-left: 5px"><input type="checkbox" name="permission[]" value="{{$permission->id}}" 
                        @foreach ($role->permissions as $role_premt)
                          @if ($role_premt->id == $permission->id)
                            checked
                          @endif
                        @endforeach
                        >{{$permission->name}}</lebel>
                    </div>
                     @endif
                    @endforeach
                  </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('role.index')}}" class="btn btn-primary" style="margin-left: 15px">Back</a>
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