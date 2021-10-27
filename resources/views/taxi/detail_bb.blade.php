@extends('layouts.master')

@push('css')
{{-- CSS --}}
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card" style="margin-top: 100px">
               <div class="container-fluid">
                    @foreach ($data as $taksi)
                    
                    <div class="column">
                        <h3 class="bg-primary" style="color: aliceblue">Data Taxi BlueBird</h3>
                        <div class="row" style="margin-left: 0px">
                        <table align="justify-content-center" style="margin-right: 400px">
                        <tr>
                            <td><label>PLAT NOMOR  :</label></td>
                            <td><label>{{$taksi->NO_KEND}}</label></td>
                        </tr> 
                        <tr>
                            <td><label>NOMOR LAMBUNG :</label></td>
                            <td><label>{{$taksi->no_lambung}}</label></td>
                        </tr>
                        <tr>
                            <td><label>NAMA SUPIR :</label></td>
                            <td><label>{{$taksi->nama_pengemudi}}</label></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td><label>PEMILIK TAXI :</label></td>
                            <td><label>Blue Bird</label></td>
                        </tr>
                        </table>
                        <p align="right"><img src="{{url('/images/taksi.png')}}" width="290px" height="160px"></p>
                        </div>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <tr>
                            <h3 class="bg-primary" style="color: aliceblue">Data Uji Kir</h3>
                        </tr>
                        <table align="justify-content-center">
                        <tr>
                            <td><label>NO Uji:</label></td>
                            <td><label>{{$taksi->NO_UJI}}</label></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>NO REG IJIN TRAYEK  :</label></td>
                            <td><label>{{$taksi->no_regIzin_trayek}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>MASA BERLAKU        :</label></td>
                            <td><label>{{$taksi->masa_berlaku_Izin_trayek}}</label></td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td><label>NO REG PENGAWAS :</label></td>
                            <td><label>{{$taksi->no_reg_kartu_pengawas}}</label></td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td><label>MASA BERLAKU        :</label></td>
                            <td><label>-</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <tr>
                            <h3 class="bg-primary" style="color: aliceblue">Data Pajak</h3>

                        </tr>
                        <table align="justify-content-center">
                        <tr>
                            <td><label>Merk :</label></td>
                            <td><label>{{$taksi->MERK}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Model :</label></td>
                            <td><label>{{$taksi->MODEL}}</label></td>
                        </tr>
                        
                        <tr>
                            <td><label>No Rangka:</label></td>
                            <td><label>{{$taksi->NO_RANGKA}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Mesin</label></td>
                            <td><label>{{$taksi->NO_MESIN}}</label></td>
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