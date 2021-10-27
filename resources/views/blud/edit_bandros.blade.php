@extends('layouts.master')
@section('title', 'Edit Data Bus Bandros')


@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Bus Bandros</h1>
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
                        <form method="post" action="{{ url('data/bandros/update') }}">
                            @csrf
                            <input type="text" name="NO" value="{{ $data_bandros->NO }}" hidden="">
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="PLAT_NO" class="form-control @error('PLAT_NO') is-invalid @enderror" value="{{ $data_bandros->PLAT_NO }}">
                                @error('PLAT_NO') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk Type</label>
                                <input type="text" name="MERK_TYPE" class="form-control @error('MERK_TYPE') is-invalid @enderror" value="{{ $data_bandros->MERK_TYPE }}">
                                @error('MERK_TYPE') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Warna Kendaraan</label>
                                <input type="text" name="WARNA_KENDARAAN" class="form-control @error('WARNA_KENDARAAN') is-invalid @enderror" value="{{ $data_bandros->WARNA_KENDARAAN }}">
                                @error('WARNA_KENDARAAN') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Bus</label>
                                <input type="text" name="JENIS_BUS" class="form-control @error('JENIS_BUS') is-invalid @enderror" value="{{ $data_bandros->JENIS_BUS }}">
                                @error('JENIS_BUS') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Nomor BPKB</label>
                                <input type="text" name="NOMOR_BPKB" class="form-control @error('NOMOR_BPKB') is-invalid @enderror" value="{{ $data_bandros->NOMOR_BPKB }}">
                                @error('NOMOR_BPKB') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" name="NAMA_PEMILIK" class="form-control @error('NAMA_PEMILIK') is-invalid @enderror" value="{{ $data_bandros->NAMA_PEMILIK }}">
                                @error('NAMA_PEMILIK') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="TAHUN" class="form-control @error('TAHUN') is-invalid @enderror" value="{{ $data_bandros->TAHUN }}">
                                @error('TAHUN') <label class="text-danger">{{ $message }}</label> @enderror
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