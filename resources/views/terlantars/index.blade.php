@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Terlantar</li>
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
            <a href="{{ route('terlantar.create') }}" class="btn btn-primary btn-sm">Tambah Terlantar</a>
            <br>
            <br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Tahun</th>
                        <th>Nama</th>
                        <th>Orang Tua</th>
                        <th>NIK</th>
                        <th>Tempat/Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat Lengkap</th>
                        <th>Pelayanan yang Pernah Diterima</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->kecamatan }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->orangtua }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tempat }}/{{ $item->tanggal }}</td>
                            <td>{{ $item->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->pelayanan }}</td>
                            <td>{{ $item->keterangan }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ route('terlantar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('terlantar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
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
                "scrollX" : true
            });
        } );
    </script>

@endsection
