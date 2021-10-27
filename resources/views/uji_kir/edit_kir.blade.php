@extends('layouts.master')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3>Edit Data Uji KIR</h3>
        </div>
        <div class="section-body">
            @if (session('status'))
            <div class="alert alert-success mb-2" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body row justify-content-center">
                    <div class="col-md-11">
                        <form method="post" action="{{ url('data/uji_kir/update') }}">
                            @csrf
                            <input type="text" name="id_uji_kir" value="{{ $data_uji_kir->id }}" hidden="">
                            <div class="form-group">
                                <label>Tanggal Uji Terkini</label>
                                <input type="text" name="tgl_uji"
                                    class="form-control @error('tgl_uji') is-invalid @enderror"
                                    value="{{ $data_uji_kir->tgl_uji }}">
                                @error('tgl_uji') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No Kendaraan</label>
                                <input type="text" name="no_kendaraan"
                                    class="form-control @error('no_kendaraan') is-invalid @enderror"
                                    value="{{ $data_uji_kir->no_kendaraan }}">
                                @error('no_kendaraan') <label class="text-danger">{{ $message }}</label> @enderror
                            </div> 
                            <div class="form-group">
                                <label>No Uji</label>
                                <input type="text" name="no_uji"
                                    class="form-control @error('no_uji') is-invalid @enderror"
                                    value="{{ $data_uji_kir->no_uji }}">
                                @error('no_uji') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk"
                                    class="form-control @error('merk') is-invalid @enderror"
                                    value="{{ $data_uji_kir->merk }}">
                                @error('merk') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type"
                                    class="form-control @error('type') is-invalid @enderror"
                                    value="{{ $data_uji_kir->type }}">
                                @error('type') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="jenis"
                                    class="form-control @error('jenis') is-invalid @enderror"
                                    value="{{ $data_uji_kir->jenis }}">
                                @error('jenis') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun"
                                    class="form-control @error('tahun') is-invalid @enderror"
                                    value="{{ $data_uji_kir->tahun }}">
                                @error('tahun') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Uji Sebelumnya</label>
                                <input type="text" name="uji_Sebelumnya"
                                    class="form-control @error('uji_Sebelumnya') is-invalid @enderror"
                                    value="{{ $data_uji_kir->uji_Sebelumnya }}">
                                @error('uji_Sebelumnya') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-fill float-right">Update</button>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-fill float-right mr-2" onclick="window.history.back();">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')




@endsection