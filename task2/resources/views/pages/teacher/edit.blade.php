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
                    <h1 class="h3 mb-2 text-gray-800">Teacher</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Teacher Details</h6>
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

                            <form class="user" method="post" action="{{ route('teacher.update') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $teacher->id}}">
{{--                                <div class="form-group row">--}}
{{--                                    <div class="col-sm-12 mb-3 mb-sm-0">--}}
{{--                                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="{{ __('Name') }}">--}}

{{--                                        @error('name')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input id="teacher_identity_number" type="text" class="form-control form-control-user @error('teacher_identity_number') is-invalid @enderror" name="teacher_identity_number" value="{{ $teacher->teacher_identity_number }}" required autocomplete="teacher_identity_number" placeholder="ID Number">

                                        @error('teacher_identity_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <select id="gender" class="form-control" name="gender" required style="border-radius:10rem;font-size: .8rem;height: 50px;">
                                            <option value="">--SELECT--</option>
                                            <option value="Male" @if ($teacher->gender == "Male") {{ 'selected' }} @endif>Male</option>
                                            <option value="Female" @if ($teacher->gender == "Female") {{ 'selected' }} @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="qualification" type="text" class="form-control form-control-user @error('qualification') is-invalid @enderror" value="{{ $teacher->qualification }}" required autocomplete="qualification" name="qualification" placeholder="Qualification">

                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="blood_group" type="text" class="form-control form-control-user @error('blood_group') is-invalid @enderror" value="{{ $teacher->blood_group }}" required autocomplete="blood_group" name="blood_group" placeholder="Blood Group">

                                    @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-user btn-block" type="submit" style="float:right;">Update</button>
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



