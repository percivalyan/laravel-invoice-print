<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            padding: 1cm;
            box-sizing: border-box;
        }

        .invoice-header {
            margin-bottom: 20px;
        }

        /* .invoice-header img {
            max-width: 1000px; /* Larger images */
        }

        */ .invoice-table th,
        .invoice-table td {
            text-align: center;
            vertical-align: middle;
        }

        .invoice-footer {
            margin-top: 20px;
        }

        @media print {
            .container {
                padding: 0;
                margin: 0;
            }

            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header row" style="position: relative;">
            <div class="col-12">
                <div id="kop-brand">
                    <img src="{{ asset('company/images/penawaran/penawaran.png') }}" alt="Brand Image"
                        style="width: 1100px; height: auto;">
                </div>
                <div id="kop-info" class="container" style="margin-top: -60px; margin-left: 20px;">
                    <div>
                        <p style="margin: 2px 0; font-size: 18px;">Jl Pemuda No 65</p>
                        <p style="margin: 2px 0; font-size: 18px;">Rawamangun, Kota Jakarta Timur</p>
                        <p style="margin: 2px 0; font-size: 18px;">Phone: 021-22471134, Email:
                            indo.mutiara.global@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container row py-3" style="margin-left: 2px; margin-top: -40px;">
            <div class="col-12">
                <table class="table table-borderless" style="line-height: 1.1;">
                    <tbody>
                        <tr>
                            <td style="font-size: 18px;">Kepada Yth</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPenawaran->kepada }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Nomor</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPenawaran->nomor }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Tanggal</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPenawaran->tanggal }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Proyek</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPenawaran->proyek }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Lokasi</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPenawaran->lokasi }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container py-3" style="margin-left: 20px; margin-top: -40px;">
            <p>Dengan hormat,<br>
                @if (isset($projectPenawaran->tujuanPenawaran) &&
                        $projectPenawaran->tujuanPenawaran->count() > 0 &&
                        isset($projectPenawaran->tujuanPenawaran->first()->pengajuan) &&
                        !empty($projectPenawaran->tujuanPenawaran->first()->pengajuan))
                    Bersama ini kami mengajukan Penawaran Pekerjaan
                    {{ $projectPenawaran->tujuanPenawaran->first()->pengajuan }}, dengan spesifikasi sebagai berikut:
                @else
                    Bersama ini kami mengajukan Penawaran Pekerjaan, dengan spesifikasi sebagai berikut:
                @endif
            </p>
        </div>

        <div class="container py-3" style="margin-left: 20px; margin-top: -20px">
            <table class="table table-bordered invoice-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Harga Satuan (Rp)</th>
                        <th>Jumlah (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projectPenawaran->penawaran as $index => $penawaran)
                    <tr>
                        <td>{{ (int)$index+1 }}</td>
                        <td>
                            <ul style="list-style-type: none; padding: 0; text-align: left;">
                                <li><strong>Pekerjaan: {{ $penawaran->pekerjaan }}</strong></li>
                                <li>Dengan rincian sebagai berikut:</li>
                                <li>{{ $penawaran->jenisPenawaran->jenis_pekerjaan }}</li>
                                @if ($penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran)
                                    <ol style="list-style-type: decimal;">
                                        <li>{{ $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->uraian }}</li>
                                    </ol>
                                @endif
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style-type: none; padding: 0;">
                                <li>{{ $penawaran->quantitas }}</li>
                                <li>&nbsp;</li>
                                <li>{{ $penawaran->jenisPenawaran->quantitas }}</li>
                                <li>{{ $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas }}</li>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style-type: none; padding: 0;">
                                <li>{{ $penawaran->unit }}</li>
                                <li>&nbsp;</li>
                                <li>{{ $penawaran->jenisPenawaran->unit }}</li>
                                <li>{{ $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->unit }}</li>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style-type: none; padding: 0;">
                                <li>{{ $penawaran->harga_satuan }}</li>
                                <li>&nbsp;</li>
                                <li>{{ $penawaran->jenisPenawaran->harga_satuan }}</li>
                                <li>{{ $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan }}</li>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style-type: none; padding: 0;">
                                <li>{{ $penawaran->harga_satuan * $penawaran->quantitas }}</li>
                                <li>&nbsp;</li>
                                <li>{{ $penawaran->jenisPenawaran->quantitas * $penawaran->jenisPenawaran->harga_satuan }}</li>
                                <li>{{ $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas * $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan }}</li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><strong>Total</strong></td>
                        <td><strong>
                            {{ $projectPenawaran->penawaran->sum(function($penawaran) {
                                return $penawaran->harga_satuan * $penawaran->quantitas + 
                                    $penawaran->jenisPenawaran->quantitas * $penawaran->jenisPenawaran->harga_satuan + 
                                    $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas * $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan;
                            }) }}
                        </strong></td>
                    </tr>
                    <tr>
                        <td colspan="6">Terbilang: Satu Milyar Tiga Ratus Enam Puluh Juta Empat Ribu Rupiah</td>
                    </tr>
                </tbody>
            </table>
        </div>
        


        <p class="text-muted" style="margin-left: 20px;">Note: Harga tersebut diatas sudah termasuk PPN 11%</p>

        <div class="invoice-footer" style="margin-left: 20px;">
            <p>
                Demikian surat penawaran ini kami sampaikan, sebagai bahan pertimbangan pengadaan
                @if (isset($projectPenawaran->tujuanPenawaran) &&
                        $projectPenawaran->tujuanPenawaran->count() > 0 &&
                        isset($projectPenawaran->tujuanPenawaran->first()->tujuan) &&
                        !empty($projectPenawaran->tujuanPenawaran->first()->tujuan))
                    kebutuhan {{ $projectPenawaran->tujuanPenawaran->first()->tujuan }}.
                @else
                    kebutuhan.
                @endif
                <br>
                Terima kasih atas perhatian dan kerjasamanya.
            </p>
            <p><strong>Hormat kami,</strong></p>
            <br><br>
            <p>
                <strong>
                    @if (isset($projectPenawaran->footerPenawaran) &&
                            $projectPenawaran->footerPenawaran->count() > 0 &&
                            isset($projectPenawaran->footerPenawaran->first()->nama) &&
                            !empty($projectPenawaran->footerPenawaran->first()->nama))
                        {{ $projectPenawaran->footerPenawaran->first()->nama }}.
                    @else
                    @endif
                </strong>
                <br>
                @if (isset($projectPenawaran->footerPenawaran) &&
                        $projectPenawaran->footerPenawaran->count() > 0 &&
                        isset($projectPenawaran->footerPenawaran->first()->jabatan) &&
                        !empty($projectPenawaran->footerPenawaran->first()->jabatan))
                    {{ $projectPenawaran->footerPenawaran->first()->jabatan }}.
                @else
                @endif
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
