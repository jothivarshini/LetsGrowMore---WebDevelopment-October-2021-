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
                    <h1 class="h3 mb-2 text-gray-800">Result</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Result Details</h6>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="#">
                                <input id="_token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Batch">Batch</label>
                                        <select class="form-control" id="result_batch" name="batch" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                            <option value="">--SELECT--</option>
                                            @foreach($batches as $batch)
                                                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Deportment">Deportment</label>
                                        <select class="form-control" id="result_deportment" name="deportment" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                            <option value="">--SELECT--</option>
                                            @foreach($deportment as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Student ID">Student ID</label>
                                        <select class="form-control" id="result_student_id" name="student_id" style="border-radius:10rem;font-size: .8rem;height: 50px;" disabled>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Exam">Exam</label>
                                        <select class="form-control" id="result_exam_id" name="exam_id" style="border-radius:10rem;font-size: .8rem;height: 50px;" disabled>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            {{--Tahle--}}
                            <div class="result_table" style="display: none">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Subject Code</th>
                                            <th>Mark</th>
                                        </tr>
                                        </thead>
                                        <tbody id="body_exam_result">

                                        </tbody>
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



