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
              <h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Assigned Role</th>
                  <th>Status</th>
                  @can('users.update', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('users.update', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>@foreach ($user->roles as $user_role)
                        {{$user_role->name}},
                      @endforeach</td>
                  <td>{{$user->status? 'Active': 'Not Active'}}</td>
                  @can('users.update', Auth::user())
                  <td><a href="{{route('user.edit',$user->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                  @endcan
                  @can('users.delete', Auth::user())
                  <td>
                    <form action="{{route('user.destroy',$user->id)}}" method="post" style="display: none;" id="delete-form-{{ $user->id}}">
                      @csrf
                      {{method_field('DELETE')}}

                    </form>
                    <a href="" onclick="if(confirm('Are You Sure To Delete?')){
                      event.preventDefault();
                      getElementById('delete-form-{{ $user->id}}').submit();
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