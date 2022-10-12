<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laboratorium ({{ $laboratorium->nomor }}) </title>
    <script>
        window.print()
    </script>
    <style>
        table {
            table-layout: fixed;
            border-collapse: collapse;
            border-spacing: 0;
            font-size: 12px
        }

        td {
            padding: 0.25em;

        }

        th {
            border: 1px solid black;
            padding: 0.25em;
        }

        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            /* background-color: #FAFAFA; */
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            /* border: 1px #D3D3D3 solid; */
            border-radius: 5px;
            background: white;
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

    <div class="page">
        <center>
            <h4 style="margin:0px;">DAFTAR INVENTARIS LABORATORIUM {{ $laboratorium->nomor }}</h4>
            <h5 style="margin:5px 0">PROGRAM STUDI TEKNOLOGI INFORMASI POLITEKNIK ACEH</h5>
        </center>
        <table width='100%' border="1" style="margin-top: 40px">
            <thead>
                <tr>
                    <th rowspan='2' width="30" align='center'>No.</th>
                    <th rowspan='2' width="300" align='center'>Nama Barang</th>
                    <th rowspan="2" align='center'>Jumlah</th>
                    <th align='center' colspan="3">Keadaan</th>
                </tr>
                <tr>
                    <th align='center'>Baik</th>
                    <th align='center'>Rusak</th>
                    <th align='center'>Hilang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                    <tr>
                        <td align='center'>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td align='center'>{{ $item['jumlah'] }}</td>
                        <td align='center'>{{ $item['baik'] }}</td>
                        <td align='center'>{{ $item['rusak'] }}</td>
                        <td align='center'>{{ $item['hilang'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="display: flex; padding: 20px; margin-top: 40px">
            <table border='0' width='100%'>
                <tr>
                    <td>Kepala Laboratorium</td>
                </tr>
                <tr>
                    <td>Program Studi Teknologi Informasi</td>
                </tr>
                <tr>
                    <td height='70'></td>
                </tr>

                <tr>
                    <td><b><u>{{ $general->kalab }}</u></b></td>
                </tr>
                <tr>
                    <td>NRP. {{ $general->nrp_kalab }}</td>
                </tr>
            </table>
            <div style="width: 40px"></div>
            <table border='0' width='100%'>
                <tr>
                    <td>Banda Aceh, {{ date('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Kepala Program Studi Teknologi Informasi</td>
                </tr>
                <tr>
                    <td height='70'></td>
                </tr>

                <tr>
                    <td><b><u>{{ $general->kaprodi }}</u></b></td>
                </tr>
                <tr>
                    <td>NRP. {{ $general->nrp_kaprodi }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
