@extends('layouts.master')
@section('title', 'Data Taksi')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Taksi  Kota Kembang</h1>
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
                   {{-- Data Taksi  Kota Kembang --}}
                    <a href="{{url('/data/taxi_kk/tambah')}}" class="btn btn-primary btn-fill float-right"><i class="fa fa-plus-square"></i> Tambah Data Taksi Kota Kembang</a>
                </div>
                @endcan
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table data-table">
                                <thead>
                                    <tr>
                                        <th>No. Kendaraan</th>
                                        <th>No Lambung</th>
                                        <th>No. Uji</th>
                                        <th>Merk</th>
                                        <th>Tahun</th>
                                        <th>No ijin Trayek</th>
                                        <th>No Reg Ijin Pengawas</th>
                                        <th>Pengemudi</th>
                                        <th>Tahun Pajak</th>
                                        @can('isAdmin')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                   		<div class="form-group row">
												<div class="col-sm-4">
													<select data-column="4" class="form-control tahun" name="tahun" id="tahun" required>
														<option value="" >Pilih Tahun</option>	
														@foreach($tahun as $tahun_bb)								
														<option value="{{$tahun_bb->TAHUN_TAXI}}"> {{$tahun_bb->TAHUN_TAXI}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-4">

													<select data-column="3" class="form-control merk" name="merk" id="merk" required>
														<option value="" >Pilih Merk</option>	
														@foreach($merk as $merk_taxi)								
														<option value="{{$merk_taxi->MERK_TAXI}}"> {{$merk_taxi->MERK_TAXI}}</option>	
														@endforeach
													</select>
												</div>
												<div class="col-sm-4">
													<button class="btn btn-success filter"> Cari </button>
												</div>
											</div>
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
            ajax: "{{ route('data.taxi_kk.get') }}",
            columns: [
                {data: 'NO_KENDARAAN', name: 'NO_KENDARAAN'},
                {data: 'NO_LAMBUNG', name: 'NO_LAMBUNG'},
                {data: 'NO_UJI_KIR_TAXI', name: 'NO_UJI_KIR_TAXI'},
                {data: 'MERK_TAXI', name: 'MERK_TAXI'},
                {data: 'TAHUN_TAXI', name: 'TAHUN_TAXI'},
                {data: 'NO_REG_IZIN_TRAYEK_TAXI', name: 'NO_REG_IZIN_TRAYEK_TAXI'},
                {data: 'NO_REG_KARTU_PENGAWAS', name: 'NO_REG_KARTU_PENGAWAS'},
                {data: 'NAMA_PENGEMUDI_TAXI', name: 'NAMA_PENGEMUDI_TAXI'},
                {data: 'TAHUN_TAXI', name: 'TAHUN_TAXI'},
                {data: 'aksi', name: 'aksi', orderable: false, serachable: false}
            ]
        });
		$('.filter').click(function () {
				console.log($('.tahun').val() );
				table.column( $('.tahun').data('column'))
				.search( $('.tahun').val() )
				.draw();
			});

		$('.filter').click(function () {
				table.column( $('.merk').data('column'))
				.search( $('.merk').val() )
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
            ajax: "{{ route('data.taxi_kk.get') }}",
            columns: [
                {data: 'NO_KENDARAAN', name: 'NO_KENDARAAN'},
                {data: 'NO_LAMBUNG', name: 'NO_LAMBUNG'},
                {data: 'NO_UJI_KIR_TAXI', name: 'NO_UJI_KIR_TAXI'},
                {data: 'MERK_TAXI', name: 'MERK_TAXI'},
                {data: 'TAHUN_TAXI', name: 'TAHUN_TAXI'},
                {data: 'NO_REG_IZIN_TRAYEK_TAXI', name: 'NO_REG_IZIN_TRAYEK_TAXI'},
                {data: 'NO_REG_KARTU_PENGAWAS', name: 'NO_REG_KARTU_PENGAWAS'},
                {data: 'NAMA_PENGEMUDI_TAXI', name: 'NAMA_PENGEMUDI_TAXI'}
            ]
        });
		$('.filter').click(function () {
				console.log($('.tahun').val() );
				table.column( $('.tahun').data('column'))
				.search( $('.tahun').val() )
				.draw();
			});

		$('.filter').click(function () {
				table.column( $('.merk').data('column'))
				.search( $('.merk').val() )
				.draw();
			});
    });
</script>
@endcan

@endpush