<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use App\Models\DetailPemesanan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $belum_dibayar = Pemesanan::where('status', 'menunggu pembayaran')->get();
        $sudah_dibayar = Pemesanan::where('status', 'dibayar')->get();
        $pesanan_selesai = Pemesanan::where('status', 'selesai')->get();
        $semuas = Pemesanan::all();

        return view('pemesanan.index', compact('belum_dibayar', 'sudah_dibayar', 'pesanan_selesai', 'semuas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = User::where('role', 'petugas')->get();
        $bahans = Bahan::where('stok', '>', 0)->get();

        return view('pemesanan.create', compact('petugas', 'bahans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->jumlah_barang > Bahan::find($request->id_bahan)->stok) {
        //     return redirect()->back()->with('gagal', 'Jumlah barang melebihi stok bahan!');
        // }else{
        //     $harga = Bahan::find($request->id_bahan)->harga_jual;
        // $pemesanan = Pemesanan::create([
        //     'id_pengguna' => $request->id_pengguna,
        //     'durasi_pemakaian' => $request->durasi_pemakaian,
        //     'id_bahan' => $request->id_bahan,
        //     'id_petugas' => $request->id_petugas,
        //     'tanggal_beli' => now(),
        //     'harga_beli' => $harga * $request->jumlah_barang,
        //     'jumlah_barang' => $request->jumlah_barang,
        //     'status' => 'menunggu pembayaran'
        // ]);

        // $stok = Bahan::find($request->id_bahan)->stok;

        // Bahan::find($request->id_bahan)->update([
        //     'tanggal_jual_terakhir' => $pemesanan->tanggal_beli,
        //     'stok' => $stok - $pemesanan->jumlah_barang
        // ]);

        // Alert::success('Congrats', 'Pemesanan Berhasil');
        // dd(count($request->id_bahan));
        $pemesanan = Pemesanan::create([
            'id_pengguna' => $request->id_pengguna,
            'id_petugas' => $request->id_petugas,
            'tanggal_beli' => now(),
            'status' => 'menunggu pembayaran'
        ]);

        for ($i=0; $i < count($request->id_bahan); $i++) { 
            if ($request->jumlah[$i] > Bahan::find($request->id_bahan[$i])->stok) {
                // $bahan = Bahan::find($request->id_bahan[$i - 1])
                Pemesanan::find($pemesanan->id)->delete();
                return redirect()->back()->with('gagal', 'Jumlah barang melebihi stok bahan!');
            }else{
                $barang = Bahan::find($request->id_bahan[$i])->harga_jual;
                $bahan = Bahan::find($request->id_bahan[$i])->stok;
                Bahan::find($request->id_bahan[$i])->update([
                    'stok' => $bahan - $request->jumlah[$i]
                ]);

                DetailPemesanan::create([
                    'id_pemesanan' => $pemesanan->id,
                    'durasi_pemakaian' => $request->durasi_pemakaian[$i],
                    'id_bahan' => $request->id_bahan[$i],
                    'jumlah_barang' => $request->jumlah[$i],
                    'harga_beli' => $barang * $request->jumlah[$i]
                ]);
            }
        }
        // count($request->id_bahan);

        return redirect()->route('pemesanan.show', $pemesanan->id)->with('berhasil', 'Pemesanan Berhasil');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::find($id);
        $details = DetailPemesanan::where('id_pemesanan', $pemesanan->id)->get();

        return view('pemesanan.show', compact('pemesanan', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::find($id);

        return view('pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pemesanan::find($id)->update($request->all());

        return redirect()->route('pemesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemesanan::find($id)->delete();

        return redirect()->back();
    }
}
