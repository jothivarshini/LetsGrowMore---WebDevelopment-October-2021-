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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <form method="post" action="{{ route('student.save') }}">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="Student Name">Student Name</label>
                                <input class="form-control form-control-user" id="name" type="text" name="name" placeholder="Enter Name of Student"  value= "{{ old('name') }}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Father's Name">Father's Name</label>
                                <input class="form-control form-control-user" id="father_name" type="text" name="father_name" placeholder="Enter Father's Name"  value= "{{ old('father_name') }}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Kidney">E-mail</label>
                                <input class="form-control form-control-user" id="email" type="text" name="email" placeholder="Enter Email Id"  value= "{{ old('email') }}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Phone Number">Phone Number</label>
                                <input class="form-control form-control-user" id="number" type="text" name="number" placeholder="Enter Phone Number" value= "{{ old('number') }}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Address">Address</label>
                                <textarea class="form-control form-control-user" id="address" type="text" name="address" placeholder="Address">{{ old('address') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="blood_group">Blood Group</label>
                                <select class="form-control form-control-user" id="blood_group" type="text" name="blood_group">
                                    <option value="">--SELECT--</option>
                                    <option value="1">O+</option>
                                    <option value="2">O-</option>
                                    <option value="3">A+</option>
                                    <option value="4">A-</option>
                                    <option value="1">B+</option>
                                    <option value="2">B-</option>
                                    <option value="3">AB+</option>
                                    <option value="4">AB-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Deportment">Deportment</label>
                                <select class="form-control form-control-user" id="deportment" type="text" name="deportment">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Bsc Mathematics</option>
                                    <option value="2">Bsc Science</option>
                                    <option value="3">Bsc Chemistry</option>
                                    <option value="4">Bsc Biology</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="Year">Year</label>
                                <select class="form-control form-control-user" id="year" type="text" name="year">
                                    <option value="">--SELECT--</option>
                                    <option value="1">1'st Year</option>
                                    <option value="2">2'st Year</option>
                                    <option value="3">3'st Year</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-user btn-block" style="float:right;">Submit</button>
                            </div>
                        </form>
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



