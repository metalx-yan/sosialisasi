@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Retur Penjualan</li>
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
            <a href="{{ route('returpenjualan.create') }}" class="btn btn-primary btn-sm">Tambah Retur Penjualan</a>
            <br>
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
                        <th>Harga Jual (Satuan) Inc Tax</th>
                        <th>Total Retur</th>
                        <th>Action</th>
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
                            <td>{{ $item->harga_jual }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                @if ($item->status == 0)

                                    <div>
                                        <a href="{{ route('returpenjualan.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <br>
                                    <div >
                                        <form action="{{ route('returpenjualan.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                @else

                                @endif
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span style="color:green">Process</span>
                                @elseif ($item->status == 0)
                                    <span style="color:red">Decline</span>
                                @elseif ($item->status == 2)
                                    <span style="color:green">Terkirim ke PPIC</span>
                                @else
                                    <form action="{{ route('prosesret') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="po" value="{{ $item->po }}">
                                        <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                        <input type="hidden" name="retur" value="{{ $item->retur }}">
                                        <input type="hidden" name="customer" value="{{ $item->customer }}">
                                        <input type="hidden" name="barang_id" value="{{ $item->barang->id }}">
                                        <input type="hidden" name="qty" value="{{ $item->qty }}">
                                        <input type="hidden" name="satuan" value="{{ $item->satuan }}">
                                        <input type="hidden" name="keterangan" value="{{ $item->keterangan }}">
                                        <button type="submit" class="btn btn-sm btn-primary">Send to PPIC</button>
                                    </form>
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
