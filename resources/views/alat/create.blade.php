@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Alat
                    </div>
                    <div>
                        <a href="{{ route('alat.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('alat.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Alat</label>
                            <input type="text" name="kode_alat" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Alat</label>
                            <input type="text" name="nama_alat" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <input type="text" name="satuan" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok Alat</label>
                            <input type="number" name="stok" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Beli</label>
                            <input type="number" name="harga_beli" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_jual" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Beli</label>
                            <input type="date" name="tanggal_beli" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
