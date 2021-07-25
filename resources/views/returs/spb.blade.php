@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data SPB</li>
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
            <br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Po</th>
                        <th>Tanggal Terima Retur</th>
                        <th>No Retur</th>
                        <th>Customer</th>
                        <th>Jenis Barang</th>
                        <th>Qty Retur</th>
                        <th>Satuan</th>
                        <th>Berat/Lbr</th>
                        <th>Total Bahan(Kg)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->po }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->retur }}</td>
                            <td>{{ $item->customer }}</td>
                            <td>{{ $item->barang->jenis }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->barang->bahans->sum('qty') }}</td>
                            <td>{{ $item->qty * $item->barang->bahans->sum('qty') }}</td>
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

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                // 'scrollX': true
            });
        } );
    </script>

@endsection
