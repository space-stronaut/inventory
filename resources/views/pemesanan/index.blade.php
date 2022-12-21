@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Pemesanan
                    </div>
                    @if (Auth::user()->role == 'pengguna')
                    <div>
                        <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Pesan</a>
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Pengguna</th>
                                {{-- <th>Durasi Pemakaian</th> --}}
                                <th>Petugas</th>
                                {{-- <th>Nama Bahan</th>
                                <th>Tanggal Beli</th>
                                <th>Harga Beli</th>
                                <th>Jumlah Barang</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semuas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->pengguna->name }}</td>
                                    {{-- <td>{{ $item->durasi_pemakaian }}</td> --}}
                                    <td>{{ $item->petugas->name }}</td>
                                    {{-- <td>{{ $item->bahan->nama_bahan }}</td>
                                    <td>{{ $item->tanggal_beli }}</td>
                                    <td> @currency($item->harga_beli) </td>
                                    <td>{{ $item->jumlah_barang }}</td> --}}
                                    <td>
                                        @if ($item->status == 'menunggu pembayaran')
                                            <div class="badge bg-danger text-uppercase">{{ $item->status }}</div>
                                        @elseif($item->status == 'dibayar')
                                            <div class="badge bg-warning text-uppercase">{{ $item->status }}</div>
                                        @else
                                            <div class="badge bg-success text-uppercase">{{ $item->status }}</div>
                                        @endif

                                        @if (Auth::user()->role == 'petugas')
                                            <th>
                                                <form action="/validasi/pemesanan/{{ $item->id }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Validasi</button>
                                                </form>
                                            </th>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('pemesanan.show', $item->id) }}" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th>Data Belum Ada</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if (Auth::user()->role != 'pengguna')
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Bahan</th>
                                <th>Total Penjualan</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raws as $item)
                                <tr>
                                    <th>{{ $item->nama_bahan }}</th>
                                    <th>{{ $item->count }}</th>
                                    <th>@currency($item->harga)</th>
                                    {{-- {{$item}} --}}
                                </tr>
                            @endforeach
                            {{-- {{$raws}} --}}
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
