@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Bahan</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('bahan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Bahan</label>
                        <input type="text" name="bahan" class="form-control {{ $errors->has('bahan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('bahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Qty/Lbr(Kg)</label>
                        <input type="number" step="0.01" name="qty" class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Jenis Barang</label>
                        <select name="barang_id" id="" class="form-control {{ $errors->has('barang_id') ? 'is-invalid' : ''}}" required>
                            <option value="">Pilih Kategori</option>
                            @foreach (App\Barang::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('barang_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('bahan.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
