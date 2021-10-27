@extends('layouts.master')
@section('title', 'Edit Data Damri')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Damri</h1>
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
                        <form method="post" action="{{ url('data/damri/update') }}">
                            @csrf
                            <input type="text" name="NO" value="{{ $data_damri->NO }}" hidden="">
                            <div class="form-group">   
                                <label>Kode</label>
                                <input type="number" name="CODE" class="form-control @error('CODE') is-invalid @enderror" value="{{ $data_damri->CODE }}">
                                @error('CODE') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Kendaraan</label>
                                <input type="text" name="PLATNO" class="form-control @error('PLATNO') is-invalid @enderror" value="{{ $data_damri->PLATNO }}">
                                @error('PLATNO') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Trayek</label>
                                <input type="text" name="TRAYEK" class="form-control @error('TRAYEK') is-invalid @enderror" value="{{ $data_damri->TRAYEK }}">
                                @error('TRAYEK') <label class="text-danger">{{ $message }}</label> @enderror
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

@push('js')




@endpush

