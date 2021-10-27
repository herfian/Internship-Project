@extends('layouts.master')
@section('title', 'Tambah Data Bluebird')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Taksi Bluebird</h1>
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
                        <form method="post" action="{{ url('/data/taxi_bb/simpan') }}">
                            @csrf
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="NO_KEND" class="form-control @error('NO_KEND') is-invalid @enderror" value="{{ old('NO_KEND') }}">
                                @error('NO_KEND') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Lambung</label>
                                <input type="text" name="no_lambung" class="form-control @error('no_lambung') is-invalid @enderror" value="{{ old('no_lambung') }}">
                                @error('no_lambung') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Uji</label>
                                <input type="text" name="NO_UJI" class="form-control @error('NO_UJI') is-invalid @enderror" value="{{ old('NO_UJI') }}">
                                @error('NO_UJI') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="MERK" class="form-control @error('MERK') is-invalid @enderror" value="{{ old('MERK') }}">
                                @error('MERK') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="THN" class="form-control @error('THN') is-invalid @enderror" value="{{ old('THN') }}">
                                @error('THN') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Izin Trayek</label>
                                <input type="text" name="no_regIzin_trayek" class="form-control @error('no_regIzin_trayek') is-invalid @enderror" value="{{ old('no_regIzin_trayek') }}">
                                @error('no_regIzin_trayek') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Reg Izin Pengawas</label>
                                <input type="text" name="no_reg_kartu_pengawas" class="form-control @error('no_reg_kartu_pengawas') is-invalid @enderror" value="{{ old('no_reg_kartu_pengawas') }}">
                                @error('no_reg_kartu_pengawas') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Pengemudi</label>
                                <input type="text" name="nama_pengemudi" class="form-control @error('nama_pengemudi') is-invalid @enderror" value="{{ old('nama_pengemudi') }}">
                                @error('nama_pengemudi') <label class="text-danger">{{ $message }}</label> @enderror
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