@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Pemulung</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('pemulung.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kode</label>
                        <input type="text" name="kode" class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control" required>
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('kecamatan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kelurahan</label>
                        <select name="kelurahan" id="kelurahan" class="form-control" required>
                            <option value="">Pilih Kelurahan</option>
                        </select>
                        {!! $errors->first('kelurahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        {!! $errors->first('tahun', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nama', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Orang Tua</label>
                        <input type="text" name="orangtua" class="form-control {{ $errors->has('orangtua') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('orangtua', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">NIK</label>
                        <input type="number" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nik', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tempat/Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="tempat" class="form-control {{ $errors->has('tempat') ? 'is-invalid' : ''}}" required>
                                {!! $errors->first('tempat', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            /
                            <div class="col-md-5">
                                <input type="date" name="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" required>
                                {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                    </div>


                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                        {!! $errors->first('jenis_kelamin', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('alamat', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Pelayanan yang Diterima</label>
                        <input type="text" name="pelayanan" class="form-control {{ $errors->has('pelayanan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('pelayanan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('pemulung.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#kecamatan').on('change', function(e){
            var year = e.target.value;
            console.log(year);

                $.get('http://localhost:8000/api/kelurahan?kecamatan_id=' + year , function(data){
                    console.log(data);

                    $('#kelurahan').empty();
                    $('#kelurahan').append('<option value="" selected="true">Pilih Kelurahan</option>');
                    $.each(data, function(index, kelurahansObj) {
                        console.log(kelurahansObj);
                        $('#kelurahan').append('<option value="' + kelurahansObj.id + '" >' + kelurahansObj.name + '</option>');
                    });
                });
        });
    });
</script>
@endsection
