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
                        <a href="{{ route('alat.create') }}" class="btn btn-primary">Buat Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Alat</th>
                                <th>Nama Alat</th>
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
                            @forelse ($alats as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_alat }}</td>
                                    <td>{{ $item->nama_alat }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td> @currency($item->harga_beli) </td>
                                    <td> @currency($item->harga_jual) </td>
                                    <td>{{ $item->tanggal_beli }}</td>
                                    <td>{{ $item->tanggal_jual_terakhir == NULL ? 'Belum Ada Riwayat Transaksi' : $item->tanggal_jual_terakhir }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('alat.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                        <a href="{{ route('alat.show', $item->id) }}" class="btn btn-info">Lihat</a>
                                            <form action="{{ route('alat.destroy', $item->id) }}" method="post">
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
