@extends('layouts.master')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3>Tambah Data KIR</h3>
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
                        <form method="post" action="{{ url('data/uji_kir/simpan') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tanggal Uji Terkini</label>
                                <input type="text" name="tgl_uji"
                                    class="form-control @error('tgl_uji') is-invalid @enderror"
                                    value="{{ old('tgl_uji') }}">
                                @error('tgl_uji') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No Kendaraan</label>
                                <input type="text" name="no_kendaraan"
                                    class="form-control @error('no_kendaraan') is-invalid @enderror"
                                    value="{{ old('no_kendaraan') }}">
                                @error('no_kendaraan') <label class="text-danger">{{ $message }}</label> @enderror
                            </div> 
                            <div class="form-group">
                                <label>No Uji</label>
                                <input type="text" name="no_uji"
                                    class="form-control @error('no_uji') is-invalid @enderror"
                                    value="{{ old('no_uji') }}">
                                @error('no_uji') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk"
                                    class="form-control @error('merk') is-invalid @enderror"
                                    value="{{ old('merk') }}">
                                @error('merk') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type"
                                    class="form-control @error('type') is-invalid @enderror"
                                    value="{{ old('type') }}">
                                @error('type') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="jenis"
                                    class="form-control @error('jenis') is-invalid @enderror"
                                    value="{{ old('jenis') }}">
                                @error('jenis') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun"
                                    class="form-control @error('tahun') is-invalid @enderror"
                                    value="{{ old('tahun') }}">
                                @error('tahun') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Uji Sebelumnya</label>
                                <input type="text" name="uji_Sebelumnya"
                                    class="form-control @error('uji_Sebelumnya') is-invalid @enderror"
                                    value="{{ old('uji_Sebelumnya') }}">
                                @error('uji_Sebelumnya') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-fill float-right">Simpan</button>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-fill float-right mr-2" onclick="window.history.back();">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        {{-- </div> --}}
    </section>
</div>

@endsection
@section('js')




@endsection