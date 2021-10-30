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
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            <form class="user" method="POST" name="result_form" action="{{ route('result.save') }}">
                                <input id="_token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="small mb-1" for="Batch">Batch</label>
                                    <select class="form-control" id="batch" name="batch" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                        <option value="">--SELECT--</option>
                                        @foreach($batches as $batch)
                                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="Deportment">Deportment</label>
                                    <select class="form-control" id="deportment" name="deportment" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                        <option value="">--SELECT--</option>
                                        @foreach($deportment as $dep)
                                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="Student ID">Student ID</label>
                                    <select class="form-control" id="student_id" name="student_id" style="border-radius:10rem;font-size: .8rem;height: 50px;" disabled>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="Exam">Exam</label>
                                    <select class="form-control" id="exam_id" name="exam_id" style="border-radius:10rem;font-size: .8rem;height: 50px;" disabled>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Subject">Subject</label>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="Mark">Mark</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control" id="subject_id" name="subject_id" style="border-radius:10rem;font-size: .8rem;height: 50px;" disabled>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="mark" class="form-control form-control-user @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" required autocomplete="mark" placeholder="Mark" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-user btn-block" style="float:right;">Submit</button>
                                </div>
                            </form>
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



