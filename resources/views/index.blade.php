
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Laptop Cell</title>
  </head>

  <body background="img/d.jpg">
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand ya " href="#">Laptop Cell</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
                <a href="/barang/keranjang" class="btn btn-primary" style="width:70px; margin-left:40px;"><img src="img/g.png" alt="" style="height:30px;"></a>

                </li>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/cari" method="get">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="cari">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card shadow-lg my-4">

              <div class="card-header">
                <img src="/img/Leptop Cell.png" alt="">
              </div>



    		<div class="card-body px-0 py-3">
    			<div class="row mx-3">
              @foreach ($barang as $a)
      					<form action="/order" method="post" class="col-lg-4 col-md-6 mb-4">
                  @csrf
      					  	<div class="card shadow-sm"><br>
                  <input type="hidden" name="id_order" value="{{$id_order}}">
      						  <img class="card-img-top" name="gambar" src="{{'img/'.$a->gambar}}"  style="height:220px;">
      						  <div class="card-body pb-1">
      						    <h4 class="card-title">{{$a -> nama}}</h4>
      						    <div class="form-group row px-3">
      						      <p class="card-text col-6">Rp. {{$a -> harga}}</p><br>
                        <p class="card-text col-6"> Stock : {{$a -> stok}}</p>
                        <p ><input type="number"  class="form-control" name="qty" placeholder="Berapa Unit"  min="1" max="100" required style="width:200px;"></p>
      						    </div>
                      <div class="form-group row px-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                          Deskripsi Barang
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Deskripsi Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p class="card-text col-12">Deskripsi Barang: {{$a -> nama}}<br><hr>{{$a -> deskripsi}}</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                     </div>
      						  </div>
      						  <button type="submit" name="id" value="{{$a->id_barang}}" class="ca card-footer btn " >Tambah Ke Keranjang</button>
      						</div>
      					</form>
                @endforeach
    			</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
