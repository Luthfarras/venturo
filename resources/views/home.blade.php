<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Tes Venturo</title>
    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="card mb-3">
            <div class="card-header">
                Menu - Laporan Penjualan Tahunan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <form action="" method="post">
                            @csrf
                            <div class="">
                                <select name="tahun" class="form-select" id="">
                                    <option selected disabled>Pilih Tahun Penjualan</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
                    </form>
                </div>
                <hr>
                <div class="">
                    @isset($tahun)
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-dark">
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu
                                    </th>
                                    <th colspan="12" style="text-align: center;">Periode Pada {{ $tahun }}
                                    </th>
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total
                                    </th>
                                </tr>
                                <tr class="table-dark">
                                    <th style="text-align: center;width: 75px;">Jan</th>
                                    <th style="text-align: center;width: 75px;">Feb</th>
                                    <th style="text-align: center;width: 75px;">Mar</th>
                                    <th style="text-align: center;width: 75px;">Apr</th>
                                    <th style="text-align: center;width: 75px;">Mei</th>
                                    <th style="text-align: center;width: 75px;">Jun</th>
                                    <th style="text-align: center;width: 75px;">Jul</th>
                                    <th style="text-align: center;width: 75px;">Ags</th>
                                    <th style="text-align: center;width: 75px;">Sep</th>
                                    <th style="text-align: center;width: 75px;">Okt</th>
                                    <th style="text-align: center;width: 75px;">Nov</th>
                                    <th style="text-align: center;width: 75px;">Des</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-secondary" id="kategori" colspan="14"><b>Makanan</b></td>
                                </tr>
                                @foreach ($data1 as $item)
                                    @if ($item->kategori == 'makanan')
                                        <tr>
                                            <td>{{ $item->menu }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                            @if ($result[$item->menu][$i] == 0)
                                                <td></td>
                                            @else
                                                <td>{{ number_format($result[$item->menu][$i]) }}</td>
                                            @endif
                                            @endfor
                                            <td>{{ number_format($jumlahm[$item->menu]) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td class="table-secondary" id="kategori" colspan="14"><b>Minuman</b></td>
                                </tr>
                                @foreach ($data1 as $item)
                                    @if ($item->kategori == 'minuman')
                                        <tr>
                                            <td>{{ $item->menu }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                            @if ($result[$item->menu][$i] == 0)
                                                <td></td>
                                            @else
                                                <td>{{ number_format($result[$item->menu][$i]) }}</td>
                                            @endif
                                            @endfor
                                            <td>{{ number_format($jumlahm[$item->menu]) }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                            <tfoot class="table-dark">
                                <tr>
                                    <td>Total</td>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <td>{{ number_format($jumlah[$i]) }}</td>
                                    @endfor
                                    <td>{{ number_format($nilai) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</body>

</html>