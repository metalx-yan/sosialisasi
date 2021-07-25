@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Retur Penjualan</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('returpenjualan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">No Po</label>
                        <input type="text" name="po" class="form-control {{ $errors->has('po') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('po', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tanggal Terima Retur</label>
                        <input type="date" name="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">No Retur</label>
                        <input type="text" name="retur" class="form-control {{ $errors->has('retur') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('retur', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Customer</label>
                        <input type="text" name="customer" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('customer', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Jenis Barang</label>
                        <select name="barang_id" id="" class="form-control {{ $errors->has('barang_id') ? 'is-invalid' : ''}}" required>
                            <option value="">Pilih Jenis Barang</option>
                            @foreach (App\Barang::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('barang_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Qty Retur</label>
                        <input type="number" min="0" name="qty" class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Keterangan Retur</label>
                        <input type="text" name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Harga Jual (Satuan) Inc Tax</label>
                        <input type="number" min="0" name="harga_jual" class="form-control {{ $errors->has('harga_jual') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('harga_jual', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('returpenjualan.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
