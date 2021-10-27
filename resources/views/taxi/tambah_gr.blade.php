@extends('layouts.master')
@section('title', 'Tambah Data Gemah Ripah')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Taksi Gemah Ripah</h1>
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
                        <form method="post" action="{{ url('/data/taxi_gr/simpan') }}">
                            @csrf
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="NO_POL" class="form-control @error('NO_POL') is-invalid @enderror" value="{{ old('NO_POL') }}">
                                @error('NO_POL') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Uji</label>
                                <input type="text" name="NO_kir" class="form-control @error('NO_kir') is-invalid @enderror" value="{{ old('NO_kir') }}">
                                @error('NO_kir') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="MERK_TYPE" class="form-control @error('MERK_TYPE') is-invalid @enderror" value="{{ old('MERK_TYPE') }}">
                                @error('MERK_TYPE') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="TAHUN_PEMBUATAN" class="form-control @error('TAHUN_PEMBUATAN') is-invalid @enderror" value="{{ old('TAHUN_PEMBUATAN') }}">
                                @error('TAHUN_PEMBUATAN') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Izin Trayek</label>
                                <input type="text" name="IZIN_TRAYEK" class="form-control @error('IZIN_TRAYEK') is-invalid @enderror" value="{{ old('IZIN_TRAYEK') }}">
                                @error('IZIN_TRAYEK') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Reg Izin Pengawas</label>
                                <input type="text" name="NOKARTU_PENGAWASAN" class="form-control @error('NOKARTU_PENGAWASAN') is-invalid @enderror" value="{{ old('NOKARTU_PENGAWASAN') }}">
                                @error('NOKARTU_PENGAWASAN') <label class="text-danger">{{ $message }}</label> @enderror
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
    </section>
</div>
@endsection