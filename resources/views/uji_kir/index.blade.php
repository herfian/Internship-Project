@extends('layouts.master')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@section('content')


<div class="main-content">
    <section class="section">  
        <div class="section-header">
            <h3><i class="nc-icon nc-notes"></i>Data Uji KIR</h3>
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
                        <a href="{{ url('data/uji_kir/tambah') }}" class="btn btn-primary btn-fill float-right"><i
                                class="fa fa-plus-square"></i> Tambah Data KIR</a>
                </div>
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class=" table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Uji Terkini</th>
                                    <th>No kendaraan</th>
                                    <th>No Uji</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Jenis</th>
                                    <th>Tahun</th>
                                    <th>Tanggal Uji Sebelumnya</th>
                                    @can('isAdmin')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
								<div class="form-group row">
												<div class="col-sm-3">
													<select data-column="4" class="form-control merk" name="merk" id="merk" required>
														<option value="" >Pilih Merk</option>	
														@foreach($merk as $merk_1)								
														<option value="{{$merk_1->merk}}"> {{$merk_1->merk}}</option>	
														@endforeach
													</select>
															
												</div>
												<div class="col-sm-3">

													<select data-column="6" class="form-control jenis" name="jenis" id="jenis" required>
														<option value="" >Pilih Jenis</option>	
														@foreach($jenis as $jenis_1)								
														<option value="{{$jenis_1->jenis}}"> {{$jenis_1->jenis}}</option>	
														@endforeach
													</select>
												</div>
												<div class="col-sm-3">

													<select data-column="7" class="form-control tahun" name="tahun" id="tahun" required>
														<option value="" >Pilih Tahun</option>	
														@foreach($tahun as $tahun_tmb)								
														<option value="{{$tahun_tmb->tahun}}"> {{$tahun_tmb->tahun}}</option>	
														@endforeach
													</select>
												</div>
												<div class="col-sm-2">
													<button class="btn btn-success filter"> Cari </button>
												</div>
											</div>
                             


                            <tbody>
                                @php $no=1 ; @endphp
                            @foreach($data as $uji_kir)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$uji_kir->tgl_uji}}</td>
                                    <td>{{$uji_kir->no_kendaraan}}</td>
                                    <td>{{$uji_kir->no_uji}}</td>
                                    <td>{{$uji_kir->merk}}</td>
                                    <td>{{$uji_kir->type}}</td>
                                    <td>{{$uji_kir->jenis}}</td>
                                    <td>{{$uji_kir->tahun}}</td>
                                    <td>{{$uji_kir->uji_Sebelumnya}}</td>
                                    @can('isAdmin')
                                    <td><a href="{{ url('data/uji_kir/edit/' . $uji_kir->id) }}" 
                                        class="btn btn-info">Edit</a>
                                        <a href="{{ route('uji_kir.destroy', $uji_kir->id) }}" onclick="return confirm ('Hapus data {{ $uji_kir->no_kendaraan}}')" 
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
        </div>
    </section>
</div>


@endsection
@section('js')
<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
		table=$('#example').DataTable();
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
				table.column( $('.jenis').data('column'))
				.search( $('.jenis').val() )
				.draw();
			});
    });
</script>
@endsection

