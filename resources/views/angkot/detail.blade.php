@extends('layouts.master')

@push('css')
{{-- CSS --}}
@endpush


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card" style="margin-top: 70px">
               <div class="container-fluid">
                <br>
                    @foreach ($data as $angkot)
                  <div class="column">
                    <h3 class="bg-primary" style="color: aliceblue">Data Angkot</h3>
                    <div class="row" style="margin-left: 0px">
                    <table align="justify-content-center" style="margin-right: 640px">  
                        <tr>
                            <td><label>Plat No :</label></td>
                            <td><label>{{$angkot->no_kendaraan}}</label></td>
                            <input type="hidden" id="plat" value="{{$angkot->no_kendaraan}}">
                        </tr> 
                        <tr>
                            <td><label>Jurusan :</label></td>
                            <td><label>{{$angkot->rute}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Kode Jurusan :</label></td>
                            <td><label>{{$angkot->kode_trayek}}</label></td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <tr>
                            <td><label>Model :</label></td>
                            <td><label>{{$angkot->model}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Warna Angkot :</label></td>
                            <td><label>{{$angkot->warna}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Status :</label></td>
                            <td><label>{{$angkot->status}}</label></td>
                        </tr>
                    </table>
                    
                    <p align="right"><img src="{{url($angkot->url_gambar.'.png')}}" width="90px" height="90px"></p>
                    
                    </div>
                        <tr>
                            <td colspan="4"> <hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">Data Pemilik</h3>
                        <table align="justify-content-center">
                        <tr>
                           <td><label>Nama Pemilik :</label></td>
                            <td><label>{{$angkot->pemilik}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Tahun Pembuatan :</label></td>
                            <td><label>{{$angkot->TAHUN}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Merk :</label></td>
                            <td><label>{{$angkot->MERK}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Nama Koperasi :</label></td>
                            <td><label>{{$angkot->NAMA_KOPERASI}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Nama Supir 1:</label></td>
                            <td><label>{{$angkot->NAMA_SUPIR1}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Nama Supir 2:</label></td>
                            <td><label>{{$angkot->NAMA_SUPIR2}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Nama Supir 3:</label></td>
                            <td><label>{{$angkot->NAMA_SUPIR3}}</label></td>
                        </tr>
                        </table>
                        <tr>
                          <td colspan="3"><hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">Data Uji Kir</h3>
                        <table align="justify-content-center">
                        <tr>
                            <td><label>Uji Kir Pertama :</label></td>
                            <td><label>{{$angkot->uji_Sebelumnya}}</label></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>Uji Kir Terbaru :</label></td>
                            <td><label>{{$angkot->tgl_uji}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Uji Kir :</label></td>
                            <td><label>{{$angkot->no_uji}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </table>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">Data Ijin Trayek</h3>
                        <table align="justify-content-center">
                        <tr>
                           <td colspan="2"><label>TANGGAL PENETAPAN:</label></td>
                           <td><label>{{$angkot->Tanggal_Penetapan}}</label></td>
                             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                        </tr>
                        <tr>
                           <td colspan="2"><label>NO IJIN:</label> </td>
                           <td ><label>{{$angkot->Nomor_Izin}}</label></td>
                             <td></td>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                        </tr>
                        <tr>
                           <td colspan="2"><label>JENIS IJIN: </label></td>
                           <td><label>{{$angkot->Jenis_Izin}}</label></td>
                             <td></td>
                            <td></td>
                        </tr>
                        <tr>
                           <td colspan="2"><label>NAMA PEMOHON:</label></td>
                           <td><label>{{$angkot->Nama_Pemohon}}</label></td>
                             <td></td>
                            <td></td>
                        </tr>
                        <tr>
                           <td colspan="2"><label>NAMA PERUSAHAAN:</label></td>
                           <td><label>{{$angkot->Nama_Perusahaan}}</label></td>
                             <td></td>
                            <td></td>
                        </tr>
                        </table>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">Data Pajak</h3>
                        <table align="justify-content-center">
                        <tr>
                            <td><label>No Rangka:</label></td>
                            <td><label>{{$angkot->NO_RANGKA}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Mesin</label></td>
                            <td><label>{{$angkot->NO_MESIN}}</label></td>
                              <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td><label>PKB POK</label></td>
                            <td><label>{{$angkot->PKB_POK}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PKB DEN</label></td>
                            <td><label>{{$angkot->PKB_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ POK</label></td>
                            <td><label>{{$angkot->SWDKLJJ_POK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ DEN</label></td>
                            <td><label>{{$angkot->SWDKLJJ_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB STNK</label></td>
                            <td><label>{{$angkot->PNB_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB TNKB</label></td>
                            <td><label>{{$angkot->PNB_TNKB}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TOTAL</label></td>
                            <td><label>{{$angkot->TOTAL}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$angkot->TGL_PAJAK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$angkot->TGL_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>MILIK KE </label></td>
                            <td><label>{{$angkot->MILIK_KE}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                      
                    </table>
                                        

                    @endforeach
                  
                    </div>    
               </div>
           </div>
             
       </div>
       <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div id="container"></div>                                       
                    </div>
                </div>
        </div>
   </div>

      
@endsection

@push('js')

<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">  
$.ajaxSetup({
                    headers : {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
var plat =$('#plat').val() ;

$.ajax({
        url : "{{url('/data/graf_survey_angkot')}}",
        type: 'POST',
        data:{'plat': plat},
        dataType: 'json',
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
            },
            success : function(data){
                var tgl = [];
                var total = [];
             
                    for (var i = 0; i < data.length; i++){
                        var obj = data[i];
                        console.log(obj);
                        tgl[i] = obj.TANGGAL;
                        total[i] = parseInt(obj.JUMLAH_PENUMPANG);
                        }
                        Highcharts.chart('container', {
                            chart: { type: 'column' },
                            title: { text: 'Data Survey Angkot' },
                            yAxis: {
                                enabled: true,
                                title: {
                                        text: ''
                                    }
                                },
                                xAxis: {
                                    categories: tgl
                                },
                                plotOptions: {
                                    column: {
                                        dataLabels: {
                                            enabled: true
                                        }
                                    }
                                },
                                series: [{
                                    name: 'Kode Trayek',
                                    data: total,
                                }]
                            });
                        
                    },
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    }
                });


</script>
@endpush