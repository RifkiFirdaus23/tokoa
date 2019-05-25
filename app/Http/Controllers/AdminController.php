<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function admin(){
        //Mengambil Data Dati table Barang
        $barang = DB::table('barang')->get();
        return view('admin', ['barang' => $barang]);
  }

  public function proses(Request $request){
    $file = $request->file('gambar');
    $nama_file = time().'_'.$file->getClientOriginalName();
    $tujuan_upload = 'img';
    $file->move($tujuan_upload,$nama_file);

  DB::table('barang')->insert([
      'nama' =>$request->nama,
      'gambar' => $nama_file,
      'stok' => $request->stok,
      'harga' =>$request->harga,
      'deskripsi' =>$request->deskripsi

    ]);
    return redirect('/admin');
  }
  public function edit($id){
    $barang = DB::table('barang')->where('id_barang', $id)->get();
    return view('edit', ['barang' => $barang]);
  }


  public function hapus($id){
    $gambar = DB::table('barang')->where('id_barang',$id)
    ->select('gambar')
    ->first();
    unlink('img/'.$gambar->gambar);

      $hapusfile = DB::table('barang')->where('id_barang',$id)->delete();

    return redirect('/admin');

}
public function chat(){


  return view('chat');
}

}


 ?>
