<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class BarangController extends Controller
{
    public function index()
    {

      //mengambil data dari table barang
      $id_order = DB::table('transaksi')->select('id_order')->count()+1;
      $total = DB::table('barang')->join('keranjang', 'barang.id_barang', '=', 'keranjang.id_barang')->where('id_order',$id_order)->sum('harga');
      $barang = DB::table('barang')->get();
      $transaksi = DB::table('transaksi')->get();


      //mengirim data data barang ke index
      return view('index', ['barang' => $barang, 'transaksi' => $transaksi, 'id_order' =>  $id_order]);

    }
    public function keranjang(){
        $id_order = DB::table('transaksi')->select('id_order')->count()+1;
        $keranjang = DB::table('keranjang')->join('barang', 'barang.id_barang', '=', 'keranjang.id_barang')->where('id_order',$id_order)->get();
      return view('keranjang', ['keranjang' => $keranjang, 'id_order' =>  $id_order]);
    }

    public function cari(Request $request){
      $cari = $request->cari;
      $barang = DB::table('barang')->where('nama','like',"%".$cari."%")->paginate();
      $id_order = DB::table('transaksi')->select('id_order')->count()+1;
      $keranjang = DB::table('keranjang')->join('barang', 'barang.id_barang', '=', 'keranjang.id_barang')->where('id_order',$id_order)->get();
      $total = DB::table('barang')->join('keranjang', 'barang.id_barang', '=', 'keranjang.id_barang')->where('id_order',$id_order)->sum('harga');
      $barang = DB::table('barang')->get();
      $transaksi = DB::table('transaksi')->get();
        return view('index', ['barang' => $barang, 'transaksi' => $transaksi,'keranjang' => $keranjang, 'id_order' =>  $id_order,]);

    }


    public function order(Request $request)

    {
      $a = DB::table('barang')->where('id_barang', $request->id)->get();
      $b = json_decode(json_encode($a), true)[0]['stok'];

      $c = $request->qty;
      $d = $b - $c;
      $e = DB::table('barang')->where('id_barang',  $request->id)->update([
        'stok' => $d
      ]);
    

      $barang = DB::table('barang')
      ->where('id_barang',$request->id)
      ->get();

      $harga = json_decode(json_encode($barang), true)[0]['harga'];

      $qty = $request->qty;
      $sub = $harga*$qty;
      $stok = DB::table('barang')->select('stok')->where('id_barang',$request->id)->get();
      $stok1 = json_decode(json_encode($stok), true)[0]['stok'];
      $transaksi = DB::table('transaksi')->get();

      if ($qty <= $stok1) {
        DB::table('keranjang')->insert([
         'id_barang'=>$request->id,
         'qty' => $request->qty,
         'id_order'=>$request->id_order,
         'sub_total' => $sub
       ]);
        if ($transaksi) {

          echo "<script>alert('Pesanan Sudah Dikeranjang, Pilih Checkout Bila Ingin Membeli')</script>";
          echo "<script>location='/'</script>";
        }
      }else {
        echo "<script>alert('Pesanan Melebihi Stok')</script>";
        echo "<script>location='/'</script>";
      }



    }

    public function checkout(Request $request){
      $id_o= $request->id_order;
      $total = DB::table('keranjang')->where('id_order',$id_o)->sum('sub_total');
      $input = DB::table('transaksi')->insert([

      'pembeli'=>$request->pembeli,
      'alamat' =>$request->alamat,
      'email'=>$request->email,
      'telp'=>$request->telp,
      'total'=>$total,
      'id_order'=>$request->id_order

    ]);
    if ($input) {
      echo "<script>alert('CheckOut Telah Berhasil, Tunggu Konfirmasi Oleh Admin Melalui Email')</script>";
      echo "<script>location='/'</script>";

    }

    }

    public function hapus($id){
      $v = DB::table('keranjang')->where('id', $id)->select('qty','id_barang')->get();
      $qty = json_decode(json_encode($v), true)[0]['qty'];
      $idb = json_decode(json_encode($v), true)[0]['id_barang'];
      $v = DB::table('barang')->where('id_barang', $idb)
      ->select('stok')
      ->get();
      $qty1 = json_decode(json_encode($v), true)[0]['stok'];
      $hasil = $qty + $qty1;

      DB::table('barang')->where('id_barang', $idb)->update([
        'stok' => $hasil
      ]);

      DB::table('keranjang')->where('id', $id)->delete();

      return redirect('/barang/keranjang');

    }
}
