<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function detail(){
    $id_order = DB::table('transaksi')->select('id_order')->count()+1;
    $transaksi=DB::table('transaksi')->join('keranjang', 'transaksi.id_order', '=', 'keranjang.id_order')->join('barang','keranjang.id_barang','=','barang.id_barang')->get();
      return view('detail', ['transaksi' => $transaksi, 'id_order' => $id_order ]);
    }
    public function hapus($id_order){
        DB::table('transaksi')->where('id_order', $id_order)->delete();
        DB::table('keranjang')->where('id_order', $id_order)->delete();
        return redirect('detail');
    }


}
