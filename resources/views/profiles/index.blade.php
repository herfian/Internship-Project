@extends('layouts.master')

@push('css')
    <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
  <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css') }}">
@endpush

@section('content')
     <!-- Main Content -->
     <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Profile</h1>
          <div class="section-header-breadcrumb">
            <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div> -->
          </div>
        </div>
        <div class="section-body">
          <h2 class="section-title">Hi, Admin</h2>
          <p class="section-lead">
            Change information about yourself on this page.
          </p>

          <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card profile-widget">
                <div class="profile-widget-header">
                  <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                  <div class="card-header">
                    <h4>Profile Info</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Nickname :</label>
                        <input type="text" class="form-control" value="Admin 007" required="">
                        <div class="invalid-feedback">
                          Please fill in the Nickname
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Username :</label>
                        <input type="text" class="form-control" value="admindishub" required="">
                        <div class="invalid-feedback">
                          Please fill in the Username
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Email :</label>
                        <input type="email" class="form-control" value="admin123@gmai.com" required="">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Level Hak Akses :</label>
                        <input type="tel" class="form-control" value="admin">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Pilih Foto :</label> <br>
                        <input type="file" name="file">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <div class="footer-left">
      </div>
      <div class="footer-right">
      </div>
    </footer>

@endsection
     
@push('js')
    <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  {{-- <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script> --}}
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
@endpush