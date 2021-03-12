<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Onkir</title>

    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap');

    * {
        font-family: 'Akaya Telivigala', cursive;
    }

    a:hover{
        text-decoration: none;
    }
    .logo_kurir{
        border-radius: 10px;
    }

    @media only screen and (max-width: 600px) {
        .logo_kurir{
            display: none;
        }
    }

</style>

<body class="bg-dark">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-terminal"></i> Cek<strong>Ongkir</strong><br></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://juanmths.com/fkippeduli/">Juan Mths</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.omjuan.com/">Tutorial Programming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="#">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.facebook.com/juanmatheus3798/"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/juanmthss/"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     {{-- End Navbar --}}

    <div class="container" style="margin-top: 80px; margin-bottom: 100px; padding:25px;">
        <form action="{{ url('/') }}" method="GET">
            @csrf
            <div class="card shadow">
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Nama Anda</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Kota Asal</label>
                                <select name="province_from" class="form-control">
                                    <option value="" holder>Provinsi Asal</option>
                                    @foreach($provinsi as $result)
                                    <option value="{{$result->id}}">{{ $result->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="origin" class="form-control">
                                    <option value="" holder>Kota Asal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Kota Tujuan</label>
                                <select name="province_to" class="form-control">
                                    <option value="" holder>Provinsi Tujuan</option>
                                    @foreach($provinsi as $result)
                                    <option value="{{$result->id}}">{{ $result->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="destination" class="form-control">
                                    <option value="" holder>Kota Tujuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Berat Paket</label>
                            <input name="weight" type="text" class="form-control">
                            <small>Dalam gram Contoh = 1700/1,7Kg</small>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Pilih Kurir</label>
                            <select name="courier" name="" id="" class="form-control">
                                <option value="" holder>Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">Pos Indonesia</option>
                            </select>
                            <small>Dalam gram Contoh = 1700/1,7Kg</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block shadow">Cek Ongkir</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if ($cekOngkir)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Estimasi</th>
                                        <th scope="col">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cekOngkir as $hasil )
                                    <tr>
                                        <td>{{$hasil['service']}}</td>
                                        <td>{{$hasil['description']}}</td>
                                        <td>{{$hasil['cost'][0]['value']}}</td>
                                        <td>{{$hasil['cost'][0]['etd']}}</td>
                                        <td>{{$hasil['cost'][0]['note']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="logo_kurir bg-light shadow-sm p-3" style="margin-top: 100px">
            <div class="row justify-content-around">
                <div class="col-sm-4"><img src="{{ asset('logo_kurir/pos.png') }}" alt="" width="50%" height="100px"></div>
                <div class="col-sm-4"><img src="{{ asset('logo_kurir/jne.png') }}" alt="" width="50%" height="100px"></div>
                <div class="col-sm-4"><img src="{{ asset('logo_kurir/tiki.png') }}" alt="" width="100%" height="100px"></div>
            </div>
        </div>

    </div>

    <!-- Akhir Contact Us -->

    <!-- Footer -->
    <footer class="text-white text-center pt-3 fixed-bottom bg-info shadow">
      <p>Created with <i class="fa fa-coffee"></i> by <a class="text-white font-weight-bold" href="https://www.instagram.com/juanmthss/" target="_blank" title="Juan Matheus">Juan Matheus</a></p>
    </footer>
    <!-- Akhir Footer -->
    {{-- Bootstrap Js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="province_from"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="origin"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });

            $('select[name="province_to"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });

        });

    </script>
</body>

</html>
