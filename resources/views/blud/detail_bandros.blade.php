@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
               <div class="container-fluid">
                <br>
                    <p align="center"><img src="{{url('/images/bus.jpg')}}" width="290px" height="160px"></p>

                  <div class="row">
                    @foreach ($data as $bus_blud)
                    <table align="justify-content-center">  
                        <tr>
                          <td rowspan="28" align="center"> </td>
                        </tr>                    
                        <tr>
                          <td colspan="3"><h3>Data Bandros</h3></td>

                        </tr>
                        <tr>
                            <td><label>Plat No :</label></td>
                            <td><label>{{$bus_blud->PLATNO}}</label></td>
                        </tr> 
                        <tr>
                            <td><label>Jurusan :</label></td>
                            <td><label>{{$bus_blud->TRAYEK}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Kode Jurusan :</label></td>
                            <td><label></label></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td><label>Tahun Pembuatan :</label></td>
                            <td><label>{{$bus_blud->TAHUN}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Merk :</label></td>
                            <td><label>{{$bus_blud->MERK}}</label></td>
                        </tr>
                        <tr>
                            <td><label>Model :</label></td>
                            <td><label>{{$bus_blud->MODEL}}</label></td>
                        </tr>
                        <tr>
                          <td colspan="3"><hr></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label><b>Data Uji Kir :</b></label></td>
                        </tr>
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
                        <tr>
                          <td colspan="4"><hr></td>
                        </tr>
                                            

                        <tr>
                            <td colspan="2"><label><strong>Data Pajak</strong> </label></td>

                        </tr>
                        <tr>
                            <td><label>No Rangka:</label></td>
                            <td><label>{{$bus_blud->NO_RANGKA}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>No Mesin</label></td>
                            <td><label>{{$bus_blud->NO_MESIN}}</label></td>
                              <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td><label>PKB POK</label></td>
                            <td><label>{{$bus_blud->PKB_POK}}</label></td>
                              <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PKB DEN</label></td>
                            <td><label>{{$bus_blud->PKB_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ POK</label></td>
                            <td><label>{{$bus_blud->SWDKLJJ_POK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>SWDKLJJ DEN</label></td>
                            <td><label>{{$bus_blud->SWDKLJJ_DEN}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB STNK</label></td>
                            <td><label>{{$bus_blud->PNBP_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>PNB TNKB</label></td>
                            <td><label>{{$bus_blud->PNBP_TNKB}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TOTAL</label></td>
                            <td><label>{{$bus_blud->TOTAL}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$bus_blud->TGL_PAJAK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>TGL PAJAK</label></td>
                            <td><label>{{$bus_blud->TGL_STNK}}</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>MILIK KE </label></td>
                            <td><label>{{$bus_blud->MILIK_KE}}</label></td>
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