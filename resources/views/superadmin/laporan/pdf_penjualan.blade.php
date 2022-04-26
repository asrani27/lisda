<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Untitled 1</title>
    {{-- <style type="text/css">
        .auto-style1 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: x-small;
        }
    </style> --}}
    <style>
        @page {
            margin-top: 80px;
            margin-left: 50px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 0px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white;
            text-align: center; 
            line-height: 35px;*/
        }

        tr,
        th,
            {
            border: 2px solid #000;
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        td {
            font-weight: bold;
            border: 2px solid #000;
            font-size: 10px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 8px;
            font-family: Arial, Helvetica, sans-serif;
            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px; */
        }
    </style>
</head>

<body>
    <header>
        <table border="0" width="100%">
            <tr>
                <td style="border: 0px;" valign="top" align="center">
                    <span style="font-size: 16px;"><strong>PT. GRIYA BANUA <br /> Jl. Puntik Luar Kec. Mandastana
                            Kabupaten Barito Kuala</strong></span><strong>
                </td>
            </tr>
        </table>
        <hr>
        <p style="text-align: center"><span><strong>LAPORAN DATA PENJUALAN RUMAH </strong></span></p>
    </header>
    <footer>
        <hr>
        <p>Tanggal Cetak : {{\Carbon\Carbon::now()->format('d-m-Y H:i:s')}}
        </p>
    </footer>
    <br />
    <br />
    <main>
        <table cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Tgl</th>
                    <th>Nama Karyawan</th>
                    <th>Nama Pembeli</th>
                    <th>Kode & Type Rumah</th>
                    <th>No Rumah</th>
                    <th>Jenis</th>
                    <th>Pembayaran</th>

                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>T.0{{$item->id}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>
                    <td>{{$item->karyawan->nama}}<br />NIK:{{$item->karyawan->nik}}</td>
                    <td>{{$item->pembeli->nama}}<br />NIK:{{$item->pembeli->nik}}</td>
                    <td>{{$item->rumah->kode_rumah}}, Type:{{$item->rumah->type}} <br />
                        Luas Tanah : {{$item->rumah->luas_tanah}}<br />
                        Luas Bangunan : {{$item->rumah->luas_bangunan}}<br />
                    </td>
                    <td>{{$item->no_rumah}}</td>
                    <td>{{$item->jenis == 'K' ? 'Kredit':'Tunai'}}</td>
                    <td>
                        @if ($item->jenis == 'K')
                        Lama Kredit : {{$item->lama_kredit}} Th<br />
                        Cicilan : {{number_format($item->cicilan)}}/Bln<br />
                        @else
                        Cash : {{number_format($item->cash)}}
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <table width="100%" border="0" style="border:0px solid white;">
            <tr style="border:0px solid white;">
                <td width="70%" style="border:0px solid white;"></td>
                <td style="text-align: right; border:0px solid white;">Pimpinan<br /><br /><br /><br /><br />
                    (.................)</td>
            </tr>
        </table>

    </main>
</body>

</html>