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
                    <p align="center"><img src="{{url('/images/bus.jpg')}}" width="290px" height="160px"></p>

                  <div class="row"> --}}
                    @foreach ($data as $angkot)
                    <div class="column">
                        <h3 class="bg-primary" style="color: aliceblue">Data Bus</h3>
                        <div class="row" style="margin-left: 0px">
                        <table align="justify-content-center" style="margin-right: 510px">  
                        <tr>
                            <td><label>Plat No :</label></td>
                            <td><label>{{$angkot->PLAT_NO}}</label></td>
                        </tr> 
                        <tr>
                            <td><label>Jurusan :</label></td>
                            <td><label>{{$angkot->JURUSAN}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Kode Jurusan :</label></td>
                            <td><label>{{$angkot->KODE_JURUSAN}}</label></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td><label>Jenis Pemilik :</label></td>
                            <td><label>{{$angkot->JENIS_PEMILIK}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Merk :</label></td>
                            <td><label>{{$angkot->MERK_TYPE}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Jenis Bus :</label></td>
                            <td><label>{{$angkot->JENIS_BUS}}</label></td>
                        </tr>
                         </table>
                        <p align="center"><img src="{{url('/images/TMB.jpg')}}" width="290px" height="160px"></p>
                    </div>
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                        <tr>
                        <h3 class="bg-primary" style="color: aliceblue">Data Uji Kir</h3>
                        </tr>
                        <table align="justify-content-center" style="margin-right: 400px">
                        
                        <tr>
                            <td><label>Uji Kir Pertama :</label></td>
                            <td><label></label></td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>Uji Kir Terbaru :</label></td>
                            <td><label></label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Uji Kir :</label></td>
                            <td><label></label></td>
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
                        <table align="justify-content-center" style="margin-right: 400px">
                        <tr>
                            <td><label>No Rangka:</label></td>
                            <td><label>{{$angkot->NOMOR_RANGKA}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Mesin</label></td>
                            <td><label>{{$angkot->NOMOR_MESIN}}</label></td>
                              <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td><label>BPKB</label></td>
                            <td><label>{{$angkot->NOMOR_BPKB}}</label></td>
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
                            <td><label></label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB TNKB</label></td>
                            <td><label></label></td>
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
                            <td><label>KEMILIKAN: </label></td>
                            <td><label>{{$angkot->NAMA_PEMILIK}}</label></td>
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
</div>

      
@endsection

@push('js')

<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endpush