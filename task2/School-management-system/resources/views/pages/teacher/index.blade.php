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
                    <h1 class="h3 mb-2 text-gray-800">Teachers</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Teachers Details</h6>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @if( count($teachers) > 0)
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID Number</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Qualification</th>
                                            <th>Blood Group</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->teacher_identity_number }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->gender }}</td>
                                                <td>{{ $teacher->qualification }}</td>
                                                <td>{{ $teacher->blood_group }}</td>
                                                <td>
                                                    @if(Auth::user()->type == 1)
                                                    <a href="{{ URL('teacher/edit/'.$teacher->id) }}"><i class="fa fa-edit" style="color:#0066FF;font-size:18px;"
                                                                                                      aria-hidden="true"></i></a>/
                                                    <a class="confirmationToDeleteDonor" href="javascript:void(0);" data-id="{{ $teacher->id }}"><i
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



