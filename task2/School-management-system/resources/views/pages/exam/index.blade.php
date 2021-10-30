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
                    <h1 class="h3 mb-2 text-gray-800">Exams</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Exams Details</h6>
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
                        <div class = "add-button">
                            <a href="{{ route('exam.create') }}" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px; margin-left: 20px;">Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @if( count($exams) > 0)
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1; ?>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>
                                                        <a href="{{ URL('exam/edit/'.$exam->id) }}"><i class="fa fa-edit" style="color:#0066FF;font-size:18px;"
                                                                                                       aria-hidden="true"></i></a>/
                                                        <a class="confirmationToDeleteUser" href="javascript:void(0);" data-id="{{ $exam->id }}" ><i
                                                                class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <?php $count++; ?>
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



