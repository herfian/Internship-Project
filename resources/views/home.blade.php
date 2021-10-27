@extends('layouts.master')

@push('css')
{{-- CSS --}}
@endpush

@push('js')
{{-- Javascript --}}
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="card-body text-center">
      <h1 style="color: #1F79AD">Database Angkutan Umum Kota Bandung</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <table id="example" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>No Kendaraan</th>
                <th>Pemilik/Supir</th>
                <th>No Uji</th>
                <th>Tanggal Uji</th>
                <th>Uji Terakhir</th>
                <th>Merk</th>
                <th>jenis</th>
                <th>status</th>
              </tr>
            </thead>
            <div class="card-body text-center">
              <h6 style="color: #1F79AD">Masukan plat nomor kendaraan angkutan umum</h6>
            </div>
            <div class="input-group">
              <input type="text" id="address" class="form-control data_search" placeholder="Enter your ID number">
              <div class="input-group-append">
                <button class="btn btn-primary cari" id="cari" type="button">Search</button>
              </div>
            </div>
            <br>
            <tbody id="data" class="data">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

{{-- @include('layouts/advsearch') --}}

@section('js')

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    // $('.data').DataTable();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(this).on('click', '.cari', function (e) {
     // alert("Hello! I am an alert box!!");

      var data_search = $('.data_search').val();


      $.ajax({
        url: "{{url('/pencarian')}}",
        type: 'POST',
        data: {
          'data_search': data_search
        },
        dataType: 'json',
        beforeSend: function () {
          $('.ajax-loader').css("visibility", "visible");
        },
        success: function (r) {
          var t = '';
          var no = 1;
          var na = 0;
          var tn;
          $('.data tr').remove();
          $.each(r, function (k, v) {
            console.log(v);

            t += '<tr>';
            t += '<td style="text-align:center">' + no + '</td>';
            t += '<td ><a href="{{url("/detail_kendaraan")}}/' + v.no_kendaraan + '">' + v
              .no_kendaraan + '</a></td>';
            t += '<td>' + v.pemilik + '</td>';
            t += '<td>' + v.no_uji + '</td>';
            t += '<td>' + v.tgl_uji + '</td>';
            t += '<td>' + v.uji_Sebelumnya + '</td>';
            t += '<td style="text-align:center">' + v.merk + '</td>';
            t += '<td style="text-align:center">' + v.jenis + '</td>';
            t += '<td style="text-align:center">' + v.status + '</td>';
            t += '</tr>';

            no++;
          });


          $('.data').append(t);
        },
        complete: function () {
          $('.ajax-loader').css("visibility", "hidden");
        }


      });
    });
  });
</script>
@stop