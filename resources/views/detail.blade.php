<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/Bootstrap.css')}}">

    <title>Detail Pembeli</title>
  </head>
  <body background="img/d.jpg">
    <!-- Image and text -->


    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card shadow-lg my-5">
              <div class="card-header">
                <!-- https://www.freepik.com/free-photo/high-angle-view-fresh-ingredients-raw-italian-pasta_4085702.htm#index=29 -->
                <div class="text-center">
                  <h3 class="display-4.9 font-weight-bold my-2">~ Detail Pembeli ~</h3>
                  <p class="lead">Tempat beli Laptop terpercaya!</p>
                </div>
              </div>

                  		<div class="card-body px-5 py-3">

                  			<div class="row mx-3">

                          <table class="table table-responsive table-hover bg-light">

                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Harga Per Unit</th>
                                <th scope="col">Alamat </th>
                                <th scope="col">Email</th>
                                <th scope="col">No</th>
                                <th scope="col">Sub Total</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $a)
                              <tr>
                                <th scope="row">1</th>
                                <td>{{$a -> pembeli}}</td>
                                <td>{{$a -> nama}}</td>
                                <td>{{$a -> qty}}</td>
                                <td> Rp. {{$a -> harga}}</td>
                                <td>{{$a->alamat}}</td>
                                <td>{{$a -> email}}</td>
                                <td>{{$a -> telp}}</td>
                                <td>{{$a ->sub_total}}</td>
                                <td><a href="/detail/hapus/{{$a ->id_order }}" class="btn btn-danger">Hapus</a></td>

                              </tr>

                            </tbody>
                                @endforeach
                          </table>


    			</div>
          <br>
    		    <div class="card-footer bg-dark text-light py-0">
              <p class="text-center my-3">&copy; 2019 Rifky</p>
            </div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  </body>
</html>
