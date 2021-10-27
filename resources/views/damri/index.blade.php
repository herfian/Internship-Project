
@extends('layouts.master')

@section('title', 'Data Damri')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">   
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Damri</h1>
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
                    <a href="{{ url('data/damri/tambah') }}" class="btn btn-primary btn-fill float-right"><i
                            class="fa fa-plus-square"></i> Tambah Data Damri</a>
                </div>
                @endcan
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table data-table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>No. Kendaraan</th>
                                        <th>Trayek</th>
                                        @can('isAdmin')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
										<div class="form-group row">
												<div class="col-sm-3">
													<select data-column="2" class="form-control jurusan" name="jurusan" id="jurusan" required>
														<option value="" >Pilih Jurusan</option>	
														@foreach($jurusan as $jurusan_1)								
														<option value="{{$jurusan_1->TRAYEK}}"> {{$jurusan_1->TRAYEK}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-2">
													<button class="btn btn-success filter"> Cari </button>
												</div>
										</div>
                             
                                <tbody>
								
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<script src="{{asset('assets/js/jquery.min.js') }}"></script>
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="{{asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@can('isAdmin')
<script type="text/javascript">
    $(document).ready(function() {

        var table = $(".data-table").DataTable({

            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('data.damri.get') }}",
            columns: [
                {data: 'CODE', name: 'CODE'},
                {data: 'PLATNO', name: 'PLATNO'},
                {data: 'TRAYEK', name: 'TRAYEK'},
                {data: 'aksi', name: 'aksi', orderable: false, serachable: false}
            ]
        });
		
		$('.filter').click(function () {
				table.column( $('.jurusan').data('column'))
				.search( $('.jurusan').val() )
				.draw();
			});
    });
</script>
@else
<script type="text/javascript">
    $(document).ready(function() {

        var table = $(".data-table").DataTable({

            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('data.damri.get') }}",
            columns: [
                {data: 'CODE', name: 'CODE'},
                {data: 'PLATNO', name: 'PLATNO'},
                {data: 'TRAYEK', name: 'TRAYEK'},
            ]
        });
		
		$('.filter').click(function () {
				table.column( $('.jurusan').data('column'))
				.search( $('.jurusan').val() )
				.draw();
			});
    });
</script>
@endcan

@endpush

