@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Barang</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
           
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kode</label>
                        <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}" required>
                            <option value="">Pilih Kategori</option>
                            @foreach (App\Category::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}" required> --}}
                        {!! $errors->first('category_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Stok</label>
                        <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('stock', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('barang.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection