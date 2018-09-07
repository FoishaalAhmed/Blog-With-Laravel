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
              <h3 class="box-title">Role List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role)
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>{{$role->name}}</td>
                      <td><a href="{{route('role.edit',$role->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                  <td>
                    <form action="{{route('role.destroy',$role->id)}}" method="post" style="display: none;" id="delete-form-{{ $role->id}}">
                      @csrf
                      {{method_field('DELETE')}}

                    </form>
                    <a href="" onclick="if(confirm('Are You Sure To Delete?')){
                      event.preventDefault();
                      getElementById('delete-form-{{ $role->id}}').submit();
                    }else{
                        event.preventDefault();
                      }"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
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