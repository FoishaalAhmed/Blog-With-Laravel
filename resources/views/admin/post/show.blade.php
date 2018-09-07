@extends('admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">

@endsection

@section('main-content')
		<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  @can('posts.update', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('posts.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->sub_title}}</td>
                  <td>{{$post->slug}}</td>
                  @can('posts.update', Auth::user())
                  <td><a href="{{route('post.edit',$post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                  @endcan
                  @can('posts.delete', Auth::user())
                  <td>
                    <form action="{{route('post.destroy',$post->id)}}" method="post" style="display: none;" id="delete-form-{{ $post->id}}">
                      @csrf
                      {{method_field('DELETE')}}

                    </form>
                    <a href="" onclick="if(confirm('Are You Sure To Delete?')){
                      event.preventDefault();
                      getElementById('delete-form-{{ $post->id}}').submit();
                    }else{
                        event.preventDefault();
                      }"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                  @endcan
                </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footerSection')

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection