@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Proses Retur</li>
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
                        <th>Keterangan Retur</th>
                        <th>Status</th>
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
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                @if ($item->status == 0)
                                <form action="{{ route('prosesretacc',$item->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="retur_penjualan_id" value="{{ $item->retur_penjualan_id }}">
                                    <input type="hidden" name="process" value="1">
                                        <button type="submit" class="btn btn-sm btn-primary">Process</button>
                                    </form>
                                    <br>
                                    <form action="{{ route('prosesretdec',$item->id ) }}" method="post">
                                        @csrf
                                       @method('PUT')

                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="decline" value="0">
                                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                    </form>
                                @endif
                                @if($item->status == 1)
                                <span style="color:green">Proses</span>
                                @endif
                                @if($item->status == 2)
                                <span style="color:red">Decline</span>
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

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                'scrollX': true
            });
        } );
    </script>

@endsection
