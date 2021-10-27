@extends('layouts.master')

@section('title', 'Tambah Data Trayek')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3><i class="nc-icon nc-notes"></i>Data Trayek</h3>
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
            @if (session('status2'))
                <div class="alert alert-info mb-2 alert-has-icon" role="alert">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                      <div class="alert-title">Updated</div>
                      {{ session('status2') }}
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
            @if (session('status4'))
            <div class="alert alert-warning mb-2 alert-has-icon" role="alert">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Attention!</div>
                  {{ session('status4') }}
                </div>
              </div>
            @endif
            <div class="card">
                @can('isAdmin')
                <div class="card-header">
                    <a href="{{ url('data/trayek/tambah') }}" class="btn btn-primary btn-fill float-right"><i
                            class="fa fa-plus-square"></i> Tambah Data Trayek</a>
                </div>
                @endcan
                <div class="card-body">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rute</th>
                                <th>Alokasi</th>
                                @can('isAdmin')
                                <th>Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $trayek)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $trayek->rute }}</td>
                                <td>{{ $trayek->alokasi }}</td>
                                @can('isAdmin')
                                <td>
                                    <a href="{{ url('data/trayek/edit/' . $trayek->id) }}"
                                        class="btn btn-info">Edit</a>
                                    <a href="{{ route('trayek.delete', $trayek->id) }}"
                                        onclick="return confirm ('Hapus data {{ $trayek->rute}}')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                                @endcan
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