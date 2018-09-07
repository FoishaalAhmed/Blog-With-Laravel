@extends('admin.layout.app')

@section('main-content')
  
          
          <!-- /.box -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Tag
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Tag</li>
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
            <form role="form" method="post" action="{{route('tag.update',$tag->id)}}">
              @csrf
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Tag Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
                </div>

                <div class="form-group">
                  <label for="slug">Tag Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{$tag->slug}}">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('tag.index')}}" class="btn btn-primary" style="margin-left: 15px">Back</a>
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