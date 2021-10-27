@extends('layouts.master')
@section('title', 'Edit Data User')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3>Edit Data User</h3>
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
                        <form method="post" action="{{ url('user/update') }}">
                            @csrf
                            <input type="text" name="id" value="{{ $data->id }}" hidden="">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $data->name }}">
                                @error('name') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $data->email }}">
                                @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ $data->password }}">
                                @error('password') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <label>Role User</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="{{$data->role}}">User ini sekarang ({{$data->role}})</option>
                                    <option>admin</option>
                                    <option>supervisor</option>
                                </select>
                                @error('role') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    @foreach($list_status as $status => $value)
                                    <option>{{ $value->status }}</option>
                                    @endforeach
                                </select>
                                @error('status') <label class="text-danger">{{ $message }}</label> @enderror
                            </div> --}}
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