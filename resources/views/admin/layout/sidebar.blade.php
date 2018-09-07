<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('posts.create', Auth::user())
            <li class="active"><a href="{{route('post.create')}}"><i class="fa fa-circle-o"></i> Add Post</a></li>
            @endcan
            <li class="active"><a href="{{route('post.index')}}"><i class="fa fa-circle-o"></i> View Post</a></li>
          </ul>
        </li>
         @can('posts.category', Auth::user())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Catagory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="active"><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Add Catagory</a></li>
            <li class="active"><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> View Catagory</a></li>
          </ul>
        </li>
        @endcan
        @can('posts.permission', Auth::user())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Permission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="active"><a href="{{route('permission.create')}}"><i class="fa fa-circle-o"></i> Add Permission</a></li>
            <li class="active"><a href="{{route('permission.index')}}"><i class="fa fa-circle-o"></i> View Permission</a></li>
          </ul>
        </li>
        @endcan
        @can('posts.role', Auth::user())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('role.create')}}"><i class="fa fa-circle-o"></i> Add Role</a></li>
            <li class="active"><a href="{{route('role.index')}}"><i class="fa fa-circle-o"></i> View Role</a></li>
          </ul>
        </li>
        @endcan
         @can('posts.tag', Auth::user())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('tag.create')}}"><i class="fa fa-circle-o"></i> Add Tag</a></li>
            <li class="active"><a href="{{route('tag.index')}}"><i class="fa fa-circle-o"></i> View Tag</a></li>
          </ul>
        </li>
        @endcan
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('users.create', Auth::user())
            <li class="active"><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
            @endcan
            <li class="active"><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> View User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>E-mail</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Inbox</a></li>
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Reply</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>