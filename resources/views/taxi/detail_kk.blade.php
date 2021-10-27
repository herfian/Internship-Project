@extends('layouts.master')

@push('css')
{{-- CSS --}}
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card" style="margin-top: 100px">
               <div class="container-fluid">
                {{-- <br>
                    <p align="center"><img src="{{url('/images/taksi.png')}}" width="290px" height="160px"></p>

                  <div class="row"> --}}
                    @foreach ($data as $taksi)
                    <div class="column">
                        <h3 class="bg-primary" style="color: aliceblue">Data Taxi Kota Kembang</h3>
                        <div class="row" style="margin-left: 0px">
                        <table align="justify-content-center" style="margin-right: 400px">  
                        <tr>
                          <td rowspan="28" align="center"> </td>
                        </tr>                    
                        <tr>
                            <td><label>PLAT NOMOR  :</label></td>
                            <td><label>{{$taksi->NO_KENDARAAN}}</label></td>
                        </tr> 
                        <tr>
                            <td><label>NOMOR LAMBUNG :</label></td>
                            <td><label>{{$taksi->NO_LAMBUNG}}</label></td>
                        </tr>
                        <tr>
                            <td><label>PERUSAHAAN :</label></td>
                            <td><label>{{$taksi->PERUSAHAAN_TAXI}}</label></td>
                        </tr>
                        <tr>
                            <td><label>TAHUN </label></td>
                            <td><label>{{$taksi->TAHUN_TAXI}}</label></td>
                        </tr>
                        <tr>
                            <td><label>TGL SUBMIT </label></td>
                            <td><label>{{$taksi->TGL_SUBMIT_DATA}}</label></td>
                        </tr>
                        <tr><td></td></tr>
                         </table>
                        <p align="right"><img src="{{url('/images/taksi.png')}}" width="290px" height="160px"></p>
                        </div>
                        <tr>
                          <td colspan="3"><hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">DATA UJI KIR</h3>
                        <div class="row" style="margin-left: 0px">
                        <table align="justify-content-center">
                        <tr>
                            <td><label>NO Uji:</label></td>
                            <td><label>{{$taksi->NO_UJI_KIR_TAXI}}</label></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>NO REG IJIN TRAYEK  :</label></td>
                            <td><label>{{$taksi->NO_REG_IZIN_TRAYEK_TAXI}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>MASA BERLAKU AWAL        :</label></td>
                            <td><label>{{$taksi->MASA_BERLAKU_IZIN_TAXI_AWAL}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td><label>MASA BERLAKU AKHIR        :</label></td>
                            <td><label>{{$taksi->MASA_BERLAKU_IZIN_TAXI_AKHIR}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>NO REG PENGAWAS :</label></td>
                            <td><label>{{$taksi->NO_REG_KARTU_PENGAWAS}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </table>
                        </div>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <h3 class="bg-primary" style="color: aliceblue">DATA PAJAK</h3>
                        <div class="row" style="margin-left: 0px">
                        <table align="justify-content-center">
                        <tr>
                            <td><label>Merk :</label></td>
                            <td><label>{{$taksi->MERK_TAXI}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Model :</label></td>
                            <td><label>{{$taksi->MODEL_TAXI}}</label></td>
                        </tr>
                        
                        <tr>
                            <td><label>No Rangka:</label></td>
                            <td><label>-</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Mesin</label></td>
                            <td><label>-</label></td>
                              <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td><label>PKB POK</label></td>
                            <td><label>{{$taksi->PKB_POK}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PKB DEN</label></td>
                            <td><label>{{$taksi->PKB_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ POK</label></td>
                            <td><label>{{$taksi->SWDKLJJ_POK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ DEN</label></td>
                            <td><label>{{$taksi->SWDKLJJ_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB STNK</label></td>
                            <td><label>{{$taksi->PNB_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB TNKB</label></td>
                            <td><label>{{$taksi->PNB_TNKB}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TOTAL</label></td>
                            <td><label>{{$taksi->TOTAL}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$taksi->TGL_PAJAK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$taksi->TGL_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>MILIK KE </label></td>
                            <td><label>{{$taksi->MILIK_KE}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                        </div>
                                        

                    @endforeach

                    </div>    
               </div>
           </div>
           
       </div>
   </div>

      
@endsection

@push('js')

<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endpush