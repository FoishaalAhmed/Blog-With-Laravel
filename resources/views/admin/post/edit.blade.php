@extends('admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('main-content')


<!-- /.box -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Edit Post
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">Edit</li>
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
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('post.update',$post->id)}}">
        @csrf
        {{method_field('PUT')}}
        <div class="box-body">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
              <label for="sub_title">Post Sub Title</label>
              <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$post->sub_title}}">
            </div>

            <div class="form-group">
              <label for="slug">Post Slug</label>
              <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
            </div>

          </div>
          <div class="col-lg-6">

            {{--<img src="{{$post->image}}" alt="no" width="40px" height="50px">--}}
            <div class="form-group">
              <label for="image">Choose Image</label>
              <input type="file" id="image" name="image">
            </div>
            <div class="pull-right">
              <img src="{{$post->image}}" alt="no Image">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="status" value="1" @if ($post->status == 1) checked @endif> Publish
              </label>
            </div>

            <div class="form-group">
                <label>Select Tag</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                  @foreach ($tags as $tag)
                  <option value="{{$tag->id}}"
                    @foreach ($post->tags as $postTag)
                      @if ($postTag->id == $tag->id)
                        selected
                      @endif
                    @endforeach
                    >{{$tag->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Select Category</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}"
                  @foreach ($post->categories as $postCategory)
                      @if ($postCategory->id == $category->id)
                        selected
                      @endif
                    @endforeach
                    >{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
          </div>
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Post Body
              <small>Simple and fast</small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea   name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$post->body}}</textarea>
            </div>
          </div>

          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('post.index')}}" class="btn btn-primary" style="margin-left: 15px">Back</a>
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

@section('footerSection')
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    });
  </script>

  <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection