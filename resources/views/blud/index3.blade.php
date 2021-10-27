
@extends('layouts.master')
@section('title', 'Data Bus Sekolah')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Bus Sekolah</h1>
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
                   {{-- Data Bus Sekolah --}}
                    <a href="{{url('/data/bs/tambah')}}" class="btn btn-primary btn-fill float-right"><i class="fa fa-plus-square"></i> Tambah Data Bus Sekolah</a>
                </div>
                @endcan
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table data-table">
                                <thead>
                                    <tr>
                                        <th>No. Kendaraan</th>
                                        <th>JENIS PEMILIK</th>
                                        <th>JURUSAN</th>
                                        <th>KODE JURUSAN</th>
                                        <th>MERK TYPE</th>
                                        <th>WARNA KENDARAAN</th>
                                        <th>JENIS BUS</th>
                                        <th>NOMOR BPKB</th>
                                        <th>NAMA PEMILIK</th>
                                        <th>TAHUN</th>
                                        @can('isAdmin')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
								<div class="form-group row">
												<div class="col-sm-3">
													<select data-column="2" class="form-control jurusan" name="jurusan" id="jurusan" required>
														<option value="" >Pilih Jurusan</option>	
														@foreach($jurusan as $jurusan_tmb)								
														<option value="{{$jurusan_tmb->JURUSAN}}"> {{$jurusan_tmb->JURUSAN}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-3">

													<select data-column="4" class="form-control merk" name="merk" id="merk" required>
														<option value="" >Pilih Merk</option>	
														@foreach($merk as $merk_taxi)								
														<option value="{{$merk_taxi->MERK_TYPE}}"> {{$merk_taxi->MERK_TYPE}}</option>	
														@endforeach
													</select>
												</div>
												<div class="col-sm-3">

													<select data-column="9" class="form-control tahun" name="tahun" id="tahun" required>
														<option value="" >Pilih Tahun</option>	
														@foreach($tahun as $tahun_tmb)								
														<option value="{{$tahun_tmb->TAHUN}}"> {{$tahun_tmb->TAHUN}}</option>	
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
            ajax: "{{ route('data.bs.get') }}",
            columns: [

                {data: 'PLAT_NO', name: 'PLAT_NO'},
                {data: 'JENIS_PEMILIK', name: 'JENIS_PEMILIK'},
                {data: 'JURUSAN', name: 'JURUSAN'},
                {data: 'KODE_JURUSAN', name: 'KODE_JURUSAN'},
                {data: 'MERK_TYPE', name: 'MERK_TYPE'},
                {data: 'WARNA_KENDARAAN', name: 'WARNA_KENDARAAN'},
                {data: 'JENIS_BUS', name: 'JENIS_BUS'},
                {data: 'NOMOR_BPKB', name: 'NOMOR_BPKB'},
                {data: 'NAMA_PEMILIK', name: 'NAMA_PEMILIK'},
                {data: 'TAHUN', name: 'TAHUN'},
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
            ajax: "{{ route('data.bs.get') }}",
            columns: [

                {data: 'PLAT_NO', name: 'PLAT_NO'},
                {data: 'JENIS_PEMILIK', name: 'JENIS_PEMILIK'},
                {data: 'JURUSAN', name: 'JURUSAN'},
                {data: 'KODE_JURUSAN', name: 'KODE_JURUSAN'},
                {data: 'MERK_TYPE', name: 'MERK_TYPE'},
                {data: 'WARNA_KENDARAAN', name: 'WARNA_KENDARAAN'},
                {data: 'JENIS_BUS', name: 'JENIS_BUS'},
                {data: 'NOMOR_BPKB', name: 'NOMOR_BPKB'},
                {data: 'NAMA_PEMILIK', name: 'NAMA_PEMILIK'},
                {data: 'TAHUN', name: 'TAHUN'}

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
		$('.filter').click(function () {
				table.column( $('.jurusan').data('column'))
				.search( $('.jurusan').val() )
				.draw();
			});
    });
</script>
@endcan
@endpush

