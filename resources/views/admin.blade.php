<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DashBoard Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  </head>
  <body>

    @extends('layouts.dash')
    <!-- Sidebar -->
    @section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                        <table class="table table-bordered ">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Gambar</th>
                              <th>Stock</th>
                              <th>Harga</th>
                              <th>Deskripsi</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($barang as $a)
                          <tr>
                            <td>{{$a->nama}}</td>
                            <td><img src="{{'img/'.$a->gambar}}"  style="height:100px;" alt=""></td>
                            <td>{{$a->stok}}</td>
                            <td>{{$a->harga}}</td>
                            <td>{{$a->deskripsi}}</td>
                            <td>
                            <a href="/admin/hapus/{{$a->id_barang}}" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Barang</button>
                        <a href="/detail" class="btn btn-success">Detaile Pembelian</a>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="/admin/proses" method="post" enctype="multipart/form-data">

                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nama</label>
                                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="gambar">Gambar</label>
                                      <input type="file" name="gambar">

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Stock</label>
                                        <input type="number" name="stok" class="form-control" id="exampleInputEmail1"  required>
                                      </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Harga</label>
                                      <input type="number" name="harga" class="form-control" id="exampleInputEmail1"  required>
                                    </div>
                                    <div class="form-group">
                                      <label for="deskripsi">Deskripsi Barang</label>
                                      <textarea name="deskripsi" rows="8" cols="50"></textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" name="submit" value="Input Barang" class="btn btn-success">
                                      </div>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    <div class="col-sm-8">
              <div class="page-header float-right">
                  <div class="page-title">
                      <ol class="breadcrumb text-right">
                          <li><a href="#">Dashboard</a></li>
                          <li><a href="#">Table</a></li>
                          <li class="active">Data table</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content mt-3">
          <div class="animated fadeIn">
              <div class="row">

                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Data Table</strong>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="bootstrap-data-table-export" class="table table-striped table-bordered " >
                                  <thead>
                                      <tr>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($barang as $a)
                                      <tr>
                                        <td>{{$a->nama}}</td>
                                        <td><img src="{{'img/'.$a->gambar}}"  style="height:100px;" alt=""></td>
                                        <td>{{$a->stok}}</td></td>
                                        <td>{{$a->harga}}</td>
                                        <td>{{$a->deskripsi}}</td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                            </div>
                          </div>
                      </div>
                  </div>
      @endsection
  </body>
</html>
