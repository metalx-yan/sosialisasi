@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data SPB/SPK</li>
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
                        <th>No Retur</th>
                        <th>Customer</th>
                        <th>Jenis Barang</th>
                        <th>Satuan</th>
                        <th>Mesin</th>
                        <th>Berat/Lbr</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spk as $spsp)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $spsp->po }}</td>
                            <td>{{ $spsp->retur }}</td>
                            <td>{{ $spsp->customer }}</td>
                            <td>{{ $spsp->jenis }}</td>
                            <td>{{ $spsp->satuan }}</td>
                            <td>{{ $spsp->mesin }}</td>
                            <td>{{ $spsp->berat }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <table class="table border" id="myTablex">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Po</th>
                        <th>Tanggal</th>
                        <th>No Retur</th>
                        <th>Customer</th>
                        <th>Jenis Barang</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Berat/Lbr</th>
                        <th>Total Bahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spb as $sps)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $sps->po }}</td>
                            <td>{{ $sps->tanggal }}</td>
                            <td>{{ $sps->retur }}</td>
                            <td>{{ $sps->customer }}</td>
                            <td>{{ $sps->jenis }}</td>
                            <td>{{ $sps->qty }}</td>
                            <td>{{ $sps->satuan }}</td>
                            <td>{{ $sps->berat }}</td>
                            <td>{{ $sps->total_bahan }}</td>
                            <td></td>
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
            $('#myTable').DataTable();
            $('#myTablex').DataTable();
        } );
    </script>

@endsection
