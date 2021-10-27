@extends('layouts.master')
@section('title', 'Tambah Data Kota Kembang')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Taksi Kota Kembang</h1>
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
                        <form method="post" action="{{ url('/data/taxi_kk/simpan') }}">
                            @csrf
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="NO_KENDARAAN" class="form-control @error('NO_KENDARAAN') is-invalid @enderror" value="{{ old('NO_KENDARAAN') }}">
                                @error('NO_KENDARAAN') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Uji</label>
                                <input type="text" name="NO_UJI_KIR_TAXI" class="form-control @error('NO_UJI_KIR_TAXI') is-invalid @enderror" value="{{ old('NO_UJI_KIR_TAXI') }}">
                                @error('NO_UJI_KIR_TAXI') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="MERK_TAXI" class="form-control @error('MERK_TAXI') is-invalid @enderror" value="{{ old('MERK_TAXI') }}">
                                @error('MERK_TAXI') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="TAHUN_TAXI" class="form-control @error('TAHUN_TAXI') is-invalid @enderror" value="{{ old('TAHUN_TAXI') }}">
                                @error('TAHUN_TAXI') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Izin Trayek</label>
                                <input type="text" name="NO_REG_IZIN_TRAYEK_TAXI" class="form-control @error('NO_REG_IZIN_TRAYEK_TAXI') is-invalid @enderror" value="{{ old('NO_REG_IZIN_TRAYEK_TAXI') }}">
                                @error('NO_REG_IZIN_TRAYEK_TAXI') <label class="text-danger">{{ $message }}</label> @enderror
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