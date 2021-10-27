
@extends('layouts.master')
@section('title', 'Data Taksi')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">    
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Taksi Bluebird</h1>
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
                   {{-- Data Taksi Bluebird --}}
                    <a href="{{ url('/data/taxi_bb/tambah') }}" class="btn btn-primary btn-fill float-right"><i class="fa fa-plus-square"></i> Tambah Data Taksi Bluebird</a>
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
								<div class="form-group row">
												<div class="col-sm-4">
													<select data-column="7" class="form-control tahun" name="tahun" id="tahun" required>
														<option value="" >Pilih Tahun Pajak</option>	
														@foreach($tahun as $tahun_bb)								
														<option value="{{$tahun_bb->tahun_pajak}}"> {{$tahun_bb->tahun_pajak}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-4">

													<select data-column="3" class="form-control merk" name="merk" id="merk" required>
														<option value="" >Pilih Merk</option>	
														@foreach($merk as $merk_angkot)								
														<option value="{{$merk_angkot->MERK}}"> {{$merk_angkot->MERK}}</option>	
														@endforeach
													</select>
												</div>
												<div class="col-sm-4">
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
            ajax: "{{ route('data.taxi.get') }}",
            columns: [

                {data: 'NO_KEND', name: 'NO_KEND'},
                {data: 'no_lambung', name: 'no_lambung'},
                {data: 'NO_UJI', name: 'NO_UJI'},
                {data: 'MERK', name: 'MERK'},
                {data: 'THN', name: 'THN'},
                {data: 'no_regIzin_trayek', name: 'no_regIzin_trayek'},
                {data: 'no_reg_kartu_pengawas', name: 'no_reg_kartu_pengawas'},
                {data: 'nama_pengemudi', name: 'nama_pengemudi'},
                {data: 'tahun_pajak', name: 'tahun_pajak'},
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
            ajax: "{{ route('data.taxi.get') }}",
            columns: [

                {data: 'NO_KEND', name: 'NO_KEND'},
                {data: 'no_lambung', name: 'no_lambung'},
                {data: 'NO_UJI', name: 'NO_UJI'},
                {data: 'MERK', name: 'MERK'},
                {data: 'THN', name: 'THN'},
                {data: 'no_regIzin_trayek', name: 'no_regIzin_trayek'},
                {data: 'no_reg_kartu_pengawas', name: 'no_reg_kartu_pengawas'},
                {data: 'nama_pengemudi', name: 'nama_pengemudi'},
                {data: 'tahun_pajak', name: 'tahun_pajak'},

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

