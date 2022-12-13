@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Bahan
                    </div>
                    <div>
                        <a href="{{ route('bahan.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('bahan.update', $bahan->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Kode Bahan</label>
                            <input type="text" name="kode_bahan" value="{{ $bahan->kode_bahan }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Bahan</label>
                            <input type="text" name="nama_bahan" id="" value="{{ $bahan->nama_bahan }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <input type="text" name="satuan" value="{{ $bahan->satuan }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok Bahan</label>
                            <input type="number" name="stok" value="{{ $bahan->stok }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Beli</label>
                            <input type="number" name="harga_beli" value="{{ $bahan->harga_beli }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_jual" value="{{ $bahan->harga_jual }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Beli</label>
                            <input type="date" name="tanggal_beli" value="{{ $bahan->tanggal_beli }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" id="" value="{{ $bahan->jenis }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
