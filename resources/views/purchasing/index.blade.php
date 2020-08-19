@extends('main')

@section('links')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">   --}}
  <!--DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
  <!--Daterangepicker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />    
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> --}}

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <style>
  .dataTables_filter {
    display: none;
    }
    .header h2 {
      font-weight: lighter;
      text-align: center;
      margin: 0
    }
    .header h3 {
      font-weight: lighter;
      text-align: center;
      margin: 0
    }
    .number{
      text-align: right;
    }
</style>

@section('title', 'Export PDF')
    

@endsection

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Permintaan Barang</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
           
        </div>
        @php
            $no = 1;
        @endphp
        <div class="card-body">
            <a href="{{ route('request.create') }}" class="btn btn-primary btn-sm">Tambah Permintaan</a>
            <br>
            <br>
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">From</label>
                        <input type="date" name="from" id="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">To</label>
                        <input type="date" name="to" id="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">&nbsp;&nbsp;&nbsp;</label>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </div>
            </form>
            <br>
            {{-- <a href="{{ route('pdf') }}" class="btn btn-info btn-sm">PDF</a> --}}
              <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        {{-- <th>Tanggal Buat</th> --}}
                        <th>No</th>
                        <th>Barang</th>
                        <th>Tanggal Order</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                            <td>{{ $item->purchase->name }}</td>
                            <td>{{ $item->total_masuk }}</td>
                            <td>{{ Illuminate\Support\Str::limit($item->description, 20) }} </td>
                            @if ($item->status == 0)
                                <td> <span class="badge badge-warning">Belum Diproses</span></td>
                            @elseif ($item->status == 1)
                                <td> <span class="badge badge-success">Diterima</span></td>
                            @else
                                <td> <span class="badge badge-danger">Ditolak</span></td>
                            @endif
                            <td> 
                                @if ($item->status != 0)
                                    
                                @else
                                <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('request.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{ route('request.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <!--DateRangePicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript"> 
 //fungsi untuk filtering data berdasarkan tanggal 
 var start_date;
 var end_date;
 var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //nama depan = 0
    //nama belakang = 1
    //tanggal terdaftar =2
    var evalDate= parseDateValue(aData[2]);
      if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
           ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
           ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
           ( dateStart <= evalDate && evalDate <= dateEnd ) )
      {
          return true;
      }
      return false;
});

// fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
function parseDateValue(rawDate) {
    var dateArray= rawDate.split("/");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
    return parsedDate;
}    

$( document ).ready(function() {
//konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
 var $dTable = $('#example').DataTable({
    
//   "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
//     "<'row'<'col-sm-12'tr>>" +
//     "<'row'<'col-sm-5'i><'col-sm-7'p>>",    
        dom: 'Bfrtip',
        buttons: ['pdf']
    
 });

 //menambahkan daterangepicker di dalam datatables
 $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

 document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

 //konfigurasi daterangepicker pada input dengan id datesearch
 $('#datesearch').daterangepicker({
    autoUpdateInput: false
  });

 //menangani proses saat apply date range
  $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
     start_date=picker.startDate.format('DD/MM/YYYY');
     end_date=picker.endDate.format('DD/MM/YYYY');
     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
     $dTable.draw();
  });

  $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    start_date='';
    end_date='';
    $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    $dTable.draw();
  });
});
</script>
@endsection