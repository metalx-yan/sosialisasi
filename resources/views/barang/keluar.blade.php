@extends('main')

@section('content')

<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Barang Keluar</li>
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Barang Keluar
            </button>
        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('keluarpost') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Nama Barang</label>
                                        <select name="" id="keluar" class="form-control">
                                            <option value="">Pilih Barang</option>
                                            @foreach (App\Requestt::all() as $item)                                        
                                                <option value="{{ $item->id }}">{{ ucwords($item->item->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Jumlah Barang</label>
                                        <div id="masuk">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Stok</label>
                                        <div id="stock">
        
                                        </div>
                                    </div>
                                    <div id="hid">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="form-control btn btn-success btn-sm" style="color:black">Submit</button>
                        </form>
                    </div>
                    
                </div>
                </div>
            </div>
            <br><br>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keluar as $item)
                        @if ($item->total_keluar == null)
                            
                        @else
                            
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ Carbon\Carbon::parse($item->date_keluar)->format('d-m-Y') }}</td>
                            <td>{{ $item->purchase->name }}</td>
                            <td>{{ $item->total_keluar }}</td>
                        </tr>
                        @endif
                            
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

    <script>
        $(document).ready(function(){
            $('#keluar').on('change', function(e){
                console.log(e.target.value);
                var region_id = e.target.value;
                $.get('/api/keluar?id=' + region_id , function(data){
                    console.log(data);
                    
                    
                    $.each(data, function(index, branchesObj) {
                        console.log(branchesObj);
                        $('#masuk').append('<input type="number" name="total_keluar" max="' + branchesObj.total_masuk +'" class="form-control" required>');
                        $('#stock').append('<span style="color:red;">'+ branchesObj.total_masuk +'</span>');                                        
                        $('#hid').append('<input type="hidden" name="id" id="" value="'+ branchesObj.id +'">');
                    });
                });
            });
        });
    </script>

@endsection