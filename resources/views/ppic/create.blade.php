@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Permintaan Barang</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
           
        </div>
        <div class="card-body">
            <form action="{{ route('request.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Barang</label>
                        <select name="item_id" id="" class="form-control {{ $errors->has('item_id') ? 'is-invalid' : ''}}" required>
                            <option value="">Pilih Barang</option>
                            @foreach (App\Item::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" required> --}}
                        {!! $errors->first('item_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        <select name="purchase_id" id="" class="form-control {{ $errors->has('purchase_id') ? 'is-invalid' : ''}}" required>
                            <option value="">Pilih Supplier</option>
                            @foreach (App\Purchase::all() as $purchase)
                                <option value="{{ $purchase->id }}">{{ $purchase->name }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="purchase_id" class="form-control {{ $errors->has('purchase_id') ? 'is-invalid' : ''}}" required> --}}
                        {!! $errors->first('purchase_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Total</label>
                        <input type="number" name="total_masuk" class="form-control {{ $errors->has('total_masuk') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('total_masuk', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tanggal Order</label>
                        <input type="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('date', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    
                </div>
<br>
                <div class="row">
                        <div class="col-md-3">
                            <label for="">Deskripsi</label>
                            <textarea name="description" id="" cols="10" rows="2" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"></textarea>
                            {{-- <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" required> --}}
                            {!! $errors->first('description', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('request.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    var today = new Date().toISOString().split('T')[0];
document.getElementsByName("date")[0].setAttribute('min', today);</script>
@endsection