<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
body{
    font-size: 0.75em;
}

td{
    padding: 3px;
    margin: auto;
}

.judul{
    /* margin-left: 50px; */
}

.isi-laporan{
    margin-top: 10px;
}

.tanggal{
    margin-top: 25px;
}

hr{
    border: solid 1px #000;
}

</style>
<body>
    <page size="A4">
        <div class="judul">
            <h2>WP MART</h2>
            <p class="">Ruko Trivium Square No 1 , Jl. Kemang Raya No.3, Sukaresmi, Cikarang Sel., Bekasi, Jawa Barat 17530</p>
        </div>
        <hr >
        <div class="tanggal">
            <span>Tertanggal : {{$star}} - {{$end}}</span>
        </div>
        <div class="isi-laporan">
            <table class="" border="1">
                <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">Tanggal</td>
                    <td align="center">Nama Owner</td>
                    <td align="center">Barang</td>
                    <td align="center">Jumlah</td>
                    <td align="center">Harga/pcs</td>
                    <td align="center">Total</td>
                </tr>
                </thead>
                <tbody>
                    @php $total=0; @endphp
                    @php $no=1; @endphp
                    @foreach ($pemesanan as $pm)
                        @foreach ($pemesanan_detail->where('pemesanan_id',$pm->id) as $pd)
                        <tr>
                            <td align="center">{{$no++}}</td>
                            <td>{{ date('d-m-Y',strtotime($pm->pemesanan_tgl))}}</td>
                            <td>{{$pm->pemesan->name}}</td>
                            <td>{{$pd->nama_barang_details->nama_data_barang}}</td>
                            <td align="center">{{$pd->pemesanan_detail_jumlah}}</td>
                            <td>Rp. {{ number_format($pd->pemesanan_detail_harga,0,',','.')}}</td>
                            <td>Rp. {{ number_format($pd->pemesanan_detail_total,0,',','.')}}</td>
                        </tr>
                        @php $total = $total+$pd->pemesanan_detail_total @endphp
                        @endforeach
                    @endforeach
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>TOTAL</strong></td>
                    <td>Rp. {{ number_format($total,0,',','.')}}</td>
                </tr>
            </table>
        </div>
    </page>
</body>
</html>