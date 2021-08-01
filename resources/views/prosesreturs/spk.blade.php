@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data SPK</li>
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
                        <th>Qty Retur</th>
                        <th>No. Mesin</th>
                        <th>Plan Produksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->po }}</td>
                            <td>{{ $item->retur }}</td>
                            <td>{{ $item->customer }}</td>
                            <td>{{ $item->barang->jenis }}</td>
                            <td>{{ $item->qty * $item->barang->bahans->sum('qty') }}</td>
                            <td>{{ $item->mesin }}</td>
                            <td>{{ $item->planproduksi }}</td>
                            <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Create
                            </button>
                            <br>
                            <br>
                                @php
                                    $d1 = App\SpkProduksi::where('retur_penjualan_id', $item->id)->first();
                                @endphp
                            @if ($d1 == null)

                            <form action="{{ route('spkproduksi.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="po" value="{{ $item->po }}">
                                <input type="hidden" name="retur" value="{{ $item->retur }}">
                                <input type="hidden" name="customer" value="{{ $item->customer }}">
                                <input type="hidden" name="jenis" value="{{ $item->barang->jenis }}">
                                <input type="hidden" name="satuan" value="{{ $item->satuan }}">
                                <input type="hidden" name="mesin" value="{{ $item->mesin }}">
                                <input type="hidden" name="berat" value="{{ $item->barang->bahans->sum('qty') }}">
                                <button type="submit" class="btn btn-primary btn-sm">Kirim ke Produksi</button>
                            </form>

                            @else
                                @if ($d1->status == 1)
                                    <span style="color: green">Terkirim ke Produksi</span>
                                @endif

                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('data',$item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <label for="">No Mesin</label>
                                        <input type="text" class="form-control" name="mesin" required>
                                        <br>
                                        <br>
                                        <label for="">Plan Produksi</label>
                                        <input type="text" class="form-control" name="produksi" required>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </form>
                                    </div>

                                </div>
                                </div>
                            </div>
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

            });
        } );
    </script>

@endsection
