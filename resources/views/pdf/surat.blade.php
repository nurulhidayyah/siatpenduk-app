<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar SKCK</title>
    <style>
        @page {
            size: 8.3in 11.7in
        }

        #judul {
            text-align: center;
        }

        #halaman {
            width: 630px;
            height: auto;
            position: absolute;
            margin-left: 40px
        }

        .isi {
            padding-left: 30px;
            padding-right: 30px;
            text-align: justify;
        }

        hr {
            display: block;
            margin-top: 2px;
            margin-bottom: 2px;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>
</head>

<body>
    <div id="halaman">
        <table style="line-height: 24px">
            <tr>
                <td colspan="2">
                    <center><img src="assets/img/logoDesaDukuh.jpeg" width="80" alt=""></center>
                </td>
                <!-- <td></td> -->
                <td colspan="10" width="700">
                    <center>
                        <font style="line-height: 30px; font-size: 24px;">PEMERINTAH KABUPATEN SERANG</font><br>
                        <font style="line-height: 30px; font-size: 24px">KECAMATAN KRAGILAN</font><br>
                        <font style="line-height: 30px; font-size: 24px">DESA DUKUH</font> <br>
                        <font style="line-height: 30px; font-size: 15px;">Alamat : Kp.Dukuh Rt.014/05 Ds.Dukuh Kec.Kragilan
                            Kode Pos 42184</font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <hr><br>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <center>
                        <p style="line-height: 0; font-size: 24px; font-style: bold"><u>{{ $data->jenis_surat }}</u></p>
                        <p style="line-height: 0; font-size: 15px" size="2">Nomor : {{ $data->id }} / Pem /
                            {{ $bulan }}/ 2023</p>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="12" style="text-align: justify;">
                    <font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini
                        Kepala Desa Dukuh Kecamatan Kragilan Kabupaten Serang, dengan ini menerangkan dengan
                        sesungguhnya bahwa :</font><br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Nama</td>
                <td colspan="9">: {{ $data->user->nama }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" width="300">Tempat,Tgl Lahir/Umur</td>
                <td colspan="9">: {{ $data->user->tempat_lahir }}, {{ date('d-m-Y', $data->user->tanggal_lahir) }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Jenis Kelamin</td>
                <td colspan="9">: {{ $data->user->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Agama</td>
                <td colspan="9">: {{ $data->user->agama }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Pekerjaan</td>
                <td colspan="9">: {{ $data->user->pekerjaan }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Alamat</td>
                <td colspan="9">: {{ $data->user->alamat }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">NIK</td>
                <td colspan="9">: {{ $data->user->nik }}</td>
            </tr><br><br>
            <tr>
                <td colspan="12" style="text-align: justify;">
                    <font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini
                        dibuat agar pihak yang berkepentingan mengetahui dan untuk dipergunakan sebagaimana mestinya.
                    </font><br><br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="6" style="text-align: center">Dukuh, {{ $data->created_at->format('d F Y') }} <br>A/n
                    Kepala Desa Dukuh <br>Kasi
                    Pemerintahan
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u>ANTON WIJAYA RISMAWAN</u>
                    <br>
                    NRPD.060421994031701
                </td>
            </tr>
        </table>
    </div>
</body>
