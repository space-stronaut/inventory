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
                        <a href="{{ route('bahan.create') }}" class="btn btn-primary">Buat Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Bahan</th>
                                <th>Nama Bahan</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Tanggal Beli</th>
                                <th>Tanggal Jual Terakhir</th>
                                <th>Jenis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bahans_semua as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_bahan }}</td>
                                    <td>{{ $item->nama_bahan }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td> @currency($item->harga_beli) </td>
                                    <td> @currency($item->harga_jual) </td>
                                    <td>{{ $item->tanggal_beli }}</td>
                                    <td>{{ $item->tanggal_jual_terakhir == NULL ? 'Belum Ada Riwayat Transaksi' : $item->tanggal_jual_terakhir }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('bahan.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                        <a href="{{ route('bahan.show', $item->id) }}" class="btn btn-info">Lihat</a>
                                            <form action="{{ route('bahan.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger ms-2" onclick="confirm('Yakin ingin menghapusnya?')">
                                                Hapus
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th>Data Belum Ada</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
