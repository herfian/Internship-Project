@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">    
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container-fluid">
                 <div class="card">
                   
                        <table id="example" class=" table table-stripe" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Kendaraan</th>
                                    <th>Pemilik</th>
                                    <th>No Uji</th>
                                    <th>Tanggal Uji</th>
                                    <th>Uji Terakhir</th>
                                    <th>Merk</th>
                                    <th>jenis</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $angkot)
                                <tr>
                                    <td>{{$angkot->no_kendaraan}}</td>
                                    <td>{{$angkot->pemilik}}</td>
                                    <td>{{$angkot->no_uji}}</td>
                                    <td>{{$angkot->tgl_uji}}</td>
                                    <td>{{$angkot->uji_Sebelumnya}}</td>
                                    <td>{{$angkot->merk}}</td>
                                    <td>{{$angkot->jenis}}</td>
                                    <td>{{$angkot->status}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                 </div>  
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();

    });
</script>
@endpush

