@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Terlantar</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('terlantar.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kode</label>
                        <input type="text" name="kode" value="{{ $get->kode }}" class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control" required>
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $kecamat)
                            <option value="{{ $kecamat->id }}" {{ $kecamat->name == $get->kecamatan ? 'selected' : '' }}>{{ $kecamat->name }}</option>
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
                            <option value="2019" {{ $get->tahun == '2019' ? 'selected' : '' }}>2019</option>
                            <option value="2020" {{ $get->tahun == '2020' ? 'selected' : '' }}>2020</option>
                            <option value="2021" {{ $get->tahun == '2021' ? 'selected' : '' }}>2021</option>
                        </select>
                        {!! $errors->first('tahun', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" value="{{ $get->nama }}" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nama', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Orang Tua</label>
                        <input type="text" value="{{ $get->orangtua }}" name="orangtua" class="form-control {{ $errors->has('orangtua') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('orangtua', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">NIK</label>
                        <input type="number" value="{{ $get->nik }}" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nik', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tempat/Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="tempat" value="{{ $get->tempat }}" class="form-control {{ $errors->has('tempat') ? 'is-invalid' : ''}}" required>
                                {!! $errors->first('tempat', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            /
                            <div class="col-md-5">
                                <input type="date" name="tanggal" value="{{ $get->tanggal }}" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" required>
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
                            <option value="0" {{ $get->jenis_kelamin == 0 ? 'selected' : '' }}>Laki-laki</option>
                            <option value="1" {{ $get->jenis_kelamin == 1 ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        {!! $errors->first('jenis_kelamin', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" value="{{ $get->alamat }}" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('alamat', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Pelayanan yang Diterima</label>
                        <input type="text" name="pelayanan" value="{{ $get->pelayanan }}" class="form-control {{ $errors->has('pelayanan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('pelayanan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $get->keterangan }}" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <input type="hidden" id="hidkelurahan" value="{{ $get->kelurahan }}">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('terlantar.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $.get('http://localhost:8000/api/kel' , function(data){
        var kelu = document.getElementById('hidkelurahan').value;
            console.log(kelu);
            console.log(data);

            $('#kelurahan').empty();
            $('#kelurahan').append('<option value="" selected="true">Pilih Kelurahan</option>');
            $.each(data, function(index, kelurahansObj) {
                console.log(kelurahansObj);
                $('#kelurahan').append("<option value='" + kelurahansObj.id + "' "+ (kelurahansObj.name == kelu ? 'selected' : '') +">" + kelurahansObj.name + "</option>");
            });
        });

        $('#kecamatan').on('change', function(e){
            var year = e.target.value;
            console.log(year);

                $.get('http://localhost:8000/api/kelurahan?id=' + year , function(data){
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
