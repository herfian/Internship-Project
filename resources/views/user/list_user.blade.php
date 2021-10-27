@extends('layouts.master')

@section('title', 'Daftar User')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3><i class="nc-icon nc-notes"></i>Daftar User</h3>
        </div>
        <div class="section-body">
            @if (session('status1'))
                <div class="alert alert-success mb-2 alert-has-icon" role="alert">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                      <div class="alert-title">Saved</div>
                      {{ session('status1') }}
                    </div>
                  </div>
            @endif
            @if (session('status3'))
            <div class="alert alert-danger mb-2 alert-has-icon" role="alert">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Deleted</div>
                  {{ session('status3') }}
                </div>
              </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/user/tambah_user') }}" class="btn btn-primary btn-fill float-right"><i
                            class="fa fa-plus-square"></i> Tambah User</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ url('user/edit/' . $user->id) }}"
                                        class="btn btn-info">Edit</a>
                                    <a href="{{ url ('/user/delete', $user->id) }}"
                                        onclick="return confirm ('Hapus user {{ $user->name}}')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('sweet_alert')
{{-- <script src="{{asset('/assets/modules/sweetalert/sweetalert.min.js')}}"></script> --}}
@endpush

@section('js')
<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();

    });
</script>
@endsection