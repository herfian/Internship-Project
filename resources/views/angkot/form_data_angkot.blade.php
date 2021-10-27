@extends('layouts.master')
@section('title', 'Tambah Data Angkot')


@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Angkot</h1>
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
                        <form method="post" action="{{ url('data/angkot/simpan') }}">
                            @csrf
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="no_kendaraan" class="form-control @error('no_kendaraan') is-invalid @enderror" value="{{ old('no_kendaraan') }}">
                                @error('no_kendaraan') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Pemilik</label>
                                <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" value="{{ old('pemilik') }}">
                                @error('pemilik') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Uji</label>
                                <input type="text" name="no_uji" class="form-control @error('no_uji') is-invalid @enderror" value="{{ old('no_uji') }}">
                                @error('no_uji') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk') }}">
                                @error('merk') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                                @error('tahun') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    @foreach($list_status as $status => $value)
                                    <option>{{ $value->status }}</option>
                                    @endforeach
                                </select>
                                @error('status') <label class="text-danger">{{ $message }}</label> @enderror
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

@push('js')




@endpush

