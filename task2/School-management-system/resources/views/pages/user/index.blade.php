@extends('layout.base')
@section('content')
    <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
    @include('layout.side-bar')
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
            @include('layout.nav')
            <!-- nav end-->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(Auth::user()->type == 1)
                        <div class = "add-button">
                            <a href="{{ route('user.create') }}" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px; margin-left: 20px;">Create User</a>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @if( count($users) > 0)
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @if($user->type == 1)
                                                <?php $type = "Admin" ?>
                                            @elseif($user->type == 2)
                                                <?php $type = "Teacher" ?>
                                            @elseif($user->type == 3)
                                                <?php $type = "Student" ?>
                                            @else
                                                <?php $type = "Others" ?>
                                            @endif
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $type }}</td>
                                                <td>
                                                @if(Auth::user()->type == 1 & Auth::user()->id != $user->id)
                                                    <a href="{{ URL('user/edit/'.$user->id) }}"><i class="fa fa-edit" style="color:#0066FF;font-size:18px;"
                                                                                                      aria-hidden="true"></i></a>/
                                                    <a class="confirmationToDeleteUser" href="javascript:void(0);" data-id="{{ $user->id }}" ><i
                                                            class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                @else
                                                    @if(Auth::user()->type == 1)
                                                    <span class="text-primary">MY ACCOUNT</span>
                                                    @else
                                                        <span class="text-primary"> Readonly </span>
                                                    @endif
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <p>No data found.</p>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- end content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- footer end -->
        </div>
    </div>
    </body>
@endsection



