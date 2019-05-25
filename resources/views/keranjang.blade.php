<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/keranjang.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body >
    <!-- Image and text -->
    <nav class="navbar bg-dark">
      <a class="navbar-brand" href="#">
        <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Keranjang Belanja
      </a>
    </nav>
    <!--  End Image and text -->

    <div class="a">
      <h2>Detail Keranjang Belanja</h2><hr><hr>
    </div>

    <!--  Table Keranjang -->
    <table class="table responsive col-sm-8 table-hover bg-light">

      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Satuan</th>
          <th scope="col">Qty</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>




      <tbody>
        @foreach($keranjang as $a)
        <tr>
          <th scope="row">1</th>
          <td>{{$a->nama}}</td>
          <td>{{$a->harga}}</td>
          <td>{{$a->qty}}</td>
          <td>{{$a->sub_total}}</td>
          <td><a href="/barang/keranjang/{{$a->id}}" class="btn btn-warning">Hapus</a>
              <a href="/" class="btn btn-success">Tambah</a></td>
        </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Total : Rp. {{$total = DB::table('keranjang')->where('id_order',$id_order)->sum('sub_total')}}</td>
          <td></td>
        </tr>
      </tfoot>
    </table>
    <div class="row justify-content-center my-5">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        CheckOut
      </button>
      <a href="/" class="btn btn-success" style="margin-left:30px;">Kembali</a>
    </div>
  </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Data Diri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/checkout" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Atas nama</label>
                  <input type="text" name="pembeli" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                  <label for="nama">Alamat Lengkap</label>
                  <input type="text" name="alamat" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                  <label for="telp">No.Telepon</label>
                  <input type="text" name="telp" class="form-control" id="telp" placeholder="+62" required>
                </div>
                <input type="hidden" name="id_order" value="{{$id_order}}">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">CheckOut</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    <!--   End Table Keranjang -->

    <div class="container-fluid">
      <nav class="navbar z ">
        <a class="navbar-brand" href="#">
          Buy
        </a>
      </nav>


      <div class="card q" style="width: 18rem;">
        <div class="card-header">
          <h5 class="card-title">Tentang  Shop Kami</h5>
        </div>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
        <div class="card e" style="width: 18rem;">
          <div class="card-header">
            <h5 class="card-title">Follow Us</h5>
          </div>
        <div class="card-body">
          <h5 class="card-title"><h1><i class="fab fa-twitter"></i>  <i class="fab fa-twitter"></i>    <i class="fab fa-twitter"></i></h1></h5>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1987.9255143621035!2d104.4894678!3d-4.795611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e389b3933b436a7%3A0x5465f4354acf2c5!2sBanjit+Cell!5e0!3m2!1sid!2sid!4v1558411671569!5m2!1sid!2sid" width="500" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
