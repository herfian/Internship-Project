@extends('layouts.master')
@section('title', 'Edit Data Trayek')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3>Edit Data Trayek</h3>
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
                        <form method="post" action="{{ url('data/trayek/update') }}">
                            @csrf
                            <input type="text" name="id_trayek" value="{{ $data_trayek->id }}" hidden="">
                            <div class="form-group">
                                <label>Kode Trayek</label>
                                <input type="text" name="kd_trayek"
                                    class="form-control @error('kd_trayek') is-invalid @enderror"
                                    value="{{ $data_trayek->kd_trayek }}">
                                @error('kd_trayek') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Rute</label>
                                <input type="text" name="rute" class="form-control @error('rute') is-invalid @enderror"
                                    value="{{ $data_trayek->rute }}">
                                @error('rute') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Alokasi</label>
                                <input type="text" name="alokasi"
                                    class="form-control @error('alokasi') is-invalid @enderror"
                                    value="{{ $data_trayek->alokasi }}">
                                @error('alokasi') <label class="text-danger">{{ $message }}</label> @enderror
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