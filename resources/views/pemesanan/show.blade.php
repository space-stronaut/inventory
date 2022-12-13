@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Detail Pemesanan
                    </div>
                    <div>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('berhasil'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                      </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Pengguna</th>
                            <th>:</th>
                            <td>{{ $pemesanan->pengguna->name }}</td>
                        </tr>
                        {{-- <tr>
                            <th>Durasi Pemakaian</th>
                            <th>:</th>
                            <td>{{ $pemesanan->durasi_pemakaian }}</td>
                        </tr> --}}
                        <tr>
                            <th>Petugas</th>
                            <th>:</th>
                            <td>{{ $pemesanan->petugas->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Beli</th>
                            <th>:</th>
                            <td>{{ $pemesanan->tanggal_beli }}</td>
                        </tr>
                        {{-- <tr>
                            <th>Harga Beli</th>
                            <th>:</th>
                            <td>@currency($pemesanan->harga_beli)</td>
                        </tr>
                        <tr>
                            <th>Jumlah Barang</th>
                            <th>:</th>
                            <td>{{ $pemesanan->jumlah_barang }}</td>
                        </tr> --}}
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>
                                @if ($pemesanan->status == 'menunggu pembayaran')
                                            <div class="badge bg-danger text-uppercase">{{ $pemesanan->status }}</div>
                                        @elseif($pemesanan->status == 'dibayar')
                                            <div class="badge bg-warning text-uppercase">{{ $pemesanan->status }}</div>
                                        @else
                                            <div class="badge bg-success text-uppercase">{{ $pemesanan->status }}</div>
                                        @endif
                            </td>
                        </tr>
                        {{-- <tr>
                            <th>Pengguna</th>
                            <th>:</th>
                            <td>{{ $pemesanan->pengguna->name }}</td>
                        </tr> --}}
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Bahan Yang Dibeli
                    </div>
                    {{-- <div>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-primary">Kembali</a>
                    </div> --}}
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Bahan</th>
                                <th>Durasi Pemakaian</th>
                                <th>Harga Beli</th>
                                <th>Jumlah Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $item)
                                <tr>
                                    <td>
                                        {{ $item->bahan->nama_bahan }}
                                    </td>
                                    <td>
                                        {{$item->durasi_pemakaian}}
                                    </td>
                                    <td>
                                        @currency($item->harga_beli)
                                    </td>
                                    <td>
                                        {{$item->jumlah_barang}}
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
