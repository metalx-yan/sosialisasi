@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Supplier</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
           
        </div>
        <div class="card-body">
            <form action="{{ route('purchase.store') }}" method="post">
                @csrf
                <div class="row">
                    
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Alamat</label>
                        <textarea name="address" id="address" cols="40" rows="2" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" required></textarea>                                                
                        {!! $errors->first('address', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('purchase.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection