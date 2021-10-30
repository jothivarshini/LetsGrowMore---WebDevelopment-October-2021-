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
                    <h1 class="h3 mb-2 text-gray-800">Student</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Student Details</h6>
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

                            <form class="user" method="post" action="{{ route('student.update') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $student->id}}">

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input id="student_identity_number" type="text" class="form-control form-control-user @error('student_identity_number') is-invalid @enderror" name="student_identity_number" value="{{ $student->student_identity_number }}" required autocomplete="student_identity_number" placeholder="ID Number" readonly>

                                        @error('student_identity_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="Father's Name">Father's Name</label>
                                    <input class="form-control form-control-user" id="father_name" type="text" name="father_name" placeholder="Enter Father's Name"  value= "{{ $student->father_name }}"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <select id="gender" class="form-control" name="gender" required style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                            <option value="">--SELECT--</option>
                                            <option value="Male" @if ($student->gender == "Male") {{ 'selected' }} @endif>Male</option>
                                            <option value="Female" @if ($student->gender == "Female") {{ 'selected' }} @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="Phone Number">Phone Number</label>
                                    <input class="form-control form-control-user" id="number" type="text" name="number" placeholder="Enter Phone Number" value= "{{ $student->number }}"/>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="Address">Address</label>
                                    <textarea class="form-control form-control-user" id="address" type="text" name="address" placeholder="Address">{{ $student->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="blood_group">Blood Group</label>
                                    <input class="form-control form-control-user" id="blood_group" type="text" name="blood_group" placeholder="Enter Blood Group" value= "{{ $student->blood_group }}" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="Deportment">Deportment</label>
                                    <select class="form-control" id="deportment" name="deportment" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                        <option value="">--SELECT--</option>
                                    @foreach($deportment as $dep)
                                        <option value="{{ $dep->id }}" @if ($dep->id == $student->deportment) {{ 'selected' }} @endif>{{ $dep->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="Batch">Batch</label>
                                    <select class="form-control" id="batch" name="batch" style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                        <option value="">--SELECT--</option>
                                        @foreach($batches as $batch)
                                            <option value="{{ $batch->id }}" @if ($batch->id == $student->batch) {{ 'selected' }} @endif>{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
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



