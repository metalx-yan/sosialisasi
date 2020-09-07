@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Barang Masuk</li>
            </ol>
        </div>
    </div>
@php
    $no = 1;
@endphp
    <div class="card">
        <div class="card-title">
           
        </div>
        <div class="card-body">
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
            <br><br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masuk as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                            <td>{{ $item->purchase->name }}</td>
                            <td>{{ $item->total_masuk }}</td>
                            @if ($item->status == 0)
                                <td> <span class="badge badge-warning">Belum Diproses</span></td>
                            @elseif ($item->status == 1)
                                <td> <span class="badge badge-success">Diterima</span></td>
                            @else
                                <td> <span class="badge badge-danger">Ditolak</span></td>
                            @endif                            
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
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['pdf']
            });
        } );
    </script>

@endsection