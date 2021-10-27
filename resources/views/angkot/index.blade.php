
@extends('layouts.master')

@section('title', 'Data Angkot')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">   
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Angkot</h1>
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
                    {{-- Data Angkot --}}
                    <a href="{{ url('data/angkot/tambah') }}" class="btn btn-primary btn-fill float-right"><i
                            class="fa fa-plus-square"></i> Tambah Data Angkot</a>
                </div>
                @endcan
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table data-table">
                                <thead>
                                    <tr>
                                        <th>No. Kendaraan</th>
                                        <th>Pemilik</th>
                                        <th>No. Uji</th>
                                        <th>Trayek</th>
                                        <th>Status</th>
                                        <th>Tahun Pajak</th>
                                        <th>Tahun Uji Kir</th>
                                        @can('isAdmin')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
								<div class="form-group row">
												<div class="col-sm-3">
													<select data-column="3" class="form-control trayek" name="trayek" id="trayek" required>
														<option value="" >Pilih Trayek</option>		
														<option value="" >ALL</option>		
														@foreach($trayek as $trayek_angkot)								
														<option value="{{$trayek_angkot->TRAYEK}}"> {{$trayek_angkot->TRAYEK}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-3">
													<select data-column="4" class="form-control status" name="status" id="status" required>
														<option value="" >Pilih Status</option>	
														<option value="" >ALL</option>	
														@foreach($status as $status_angkot)								
														<option value="{{$status_angkot->status}}"> {{$status_angkot->status}}</option>	
														@endforeach
													</select>
															
												</div>
												
												<div class="col-sm-2">
													<select data-column="5" class="form-control tahun" name="tahun" id="tahun" required>
														<option value="" >Pilih Tahun Pajak</option>	
														<option value="" >ALL</option>	
														@foreach($tahun as $tahun_angkot)								
														<option value="{{$tahun_angkot->tahun}}"> {{$tahun_angkot->tahun}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-2">

													<select data-column="6" class="form-control tahun_ujikir" name="tahun_ujikir" id="tahun_ujikir" required>
														<option value="" >Pilih Tahun Uji KIR</option>	
														<option value="" >ALL</option>	
														@foreach($tahun as $tahun_angkot)								
														<option value="{{$tahun_angkot->tahun}}"> {{$tahun_angkot->tahun}}</option>	
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

<script type="text/javascript">
		
</script>

@can('isAdmin')
<script type="text/javascript">
    $(document).ready(function() {

        var table = $(".data-table").DataTable({

            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('data.angkot.get') }}",
            columns: [
                {data: 'no_kendaraan', name: 'no_kendaraan'},
                {data: 'pemilik', name: 'pemilik'},
                {data: 'no_uji', name: 'no_uji'},
                {data: 'TRAYEK', name: 'TRAYEK'},
                {data: 'status', name: 'status'},
                {data: 'tahun_pajak', name: 'tahun_pajak'},
                {data: 'tahun_uji', name: 'tahun_uji'},
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
				table.column( $('.tahun_ujikir').data('column'))
				.search( $('.tahun_ujikir').val() )
				.draw();
			});

		$('.filter').click(function () {
				table.column( $('.status').data('column'))
				.search( $('.status').val() )
				.draw();
			});

		$('.filter').click(function () {
				table.column( $('.trayek').data('column'))
				.search( $('.trayek').val() )
				.draw();
			});
	
    });
</script>
@else
<script type="text/javascript">
    $(document).ready(function() {
	$.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $(".data-table").DataTable({

            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('data.angkot.get') }}",
            columns: [
                {data: 'no_kendaraan', name: 'no_kendaraan'},
                {data: 'pemilik', name: 'pemilik'},
                {data: 'no_uji', name: 'no_uji'},
                {data: 'merk', name: 'merk'},
                {data: 'tahun', name: 'tahun'}
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

    $('body').on('click', '.deleteItem', function () {
        var Item_id = $(this).data("id");
        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "angkot/destroy/"+ Item_id,
            success: function (data) {
                window.location.href = "{{ url('/data/angkot') }}";
                alert("Data Angkot Telah Terhapus");
            },
            error: function (data) {
            console.log('Error:', data);
        }
        });
    });
</script>
@endcan

@endpush

