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
        } */
        .invoice-table th, .invoice-table td {
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
                <img src="{{ asset('company/images/penawaran/penawaran.png') }}" alt="Brand Image" style="width: 1100px; height: auto;">
            </div>
            <div id="kop-info" class="container" style="margin-top: -60px; margin-left: 20px;">
                <div>
                    <p style="margin: 2px 0; font-size: 18px;">Jl Pemuda No 65</p>
                    <p style="margin: 2px 0; font-size: 18px;">Rawamangun, Kota Jakarta Timur</p>
                    <p style="margin: 2px 0; font-size: 18px;">Phone: 021-22471134, Email: indo.mutiara.global@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container row py-3" style="margin-left: 2px; margin-top: -40px">
        <div class="col-12">
            <table class="table table-borderless"  style="line-height: 1.1";>
                <tbody>
                    <tr>
                        <td style="font-size: 18px;"><strong>Kepada Yth:</strong></td>
                        <td style="font-size: 18px;">PT. KAJIMA INDONESIA</td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;"><strong>Nomor:</strong></td>
                        <td style="font-size: 18px;">002/PNW/IMG-KI/VI/2024/05</td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;"><strong>Tanggal:</strong></td>
                        <td style="font-size: 18px;">05 Juni 2024</td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;"><strong>Proyek:</strong></td>
                        <td style="font-size: 18px;">SENAYAN SQUARE (Misc.), PLAZA SENAYAN</td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;"><strong>Lokasi:</strong></td>
                        <td style="font-size: 18px;">JL. ASIA AFRIKA NO.8 JAKARTA PUSAT</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

   <div class="container py-3" style="margin-left: 20px; margin-top: -40px">
    <p>Dengan hormat,<br>Bersama ini kami mengajukan Penawaran Pekerjaan Bongkar Lantai dan Perapihan, dengan spesifikasi sebagai berikut:</p>
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
            <tr>
                <td>1</td>
                <td>
                    <ul style="list-style-type: none; padding: 0; text-align: left;">
                        <li> <strong>Pekerjaan: Remove & Cleaning the Floor</strong></li>
                        <li>Dengan rincian sebagai berikut:</li>
                        <li>Bongkar Lantai:</li>
                        <li>Buang Puing dari Atap</li>
                        <li>Lansir with bag:</li>
                        <li>Transportation:</li>
                        <li>Cleaning Area:</li>
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none; padding: 0;">
                        <li style="color: white">_</li>
                        <li style="color: white">_</li>
                        <li>4.300 m2</li>
                        <li style="color: white">_</li>
                        <li>4.300 m2</li>
                        <li>559 Rit</li>
                        <li>8 Month</li>
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none; padding: 0;">
                        <li style="color: white">_</li>
                        <li style="color: white">_</li>
                        <li>m2</li>
                        <li style="color: white">_</li>
                        <li>m2</li>
                        <li>Rit</li>
                        <li>Month</li>
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none; padding: 0;">
                        <li style="color: white">_</li>
                        <li style="color: white">_</li>
                        <li>95.000</li>
                        <li style="color: white">_</li>
                        <li>135.000</li>
                        <li>600.000</li>
                        <li>4.500.000</li>
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none; padding: 0;">
                        <li style="color: white">_</li>
                        <li style="color: white">_</li>
                        <li>408.500.000</li>
                        <li style="color: white">_</li>
                        <li>580.500.000</li>
                        <li>335.400.000</li>
                        <li>36.000.000</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Total</strong></td>
                <td><strong>1.360.400.000</strong></td>
            </tr>
            <tr>
                <td colspan="6">Terbilang: Satu Milyar Tiga Ratus Enam Puluh Juta Empat Ratus Ribu Rupiah</td>
            </tr>
        </tbody>
    </table>
    
   </div>

    <p class="text-muted" style="margin-left: 20px;">Note: Harga tersebut diatas sudah termasuk PPN 11%</p>

    <div class="invoice-footer" style="margin-left: 20px;">
        <p>Demikian surat penawaran ini kami sampaikan, sebagai bahan pertimbangan pengadaan kebutuhan Bongkar Lantai dan Perapihan Lantai Plaza Senayan.</p>
        <p>Terima kasih atas perhatian dan kerjasamanya.</p>
        <p><strong>Hormat kami,</strong></p>
        <br><br>
        <p><strong>ISPRIYADI</strong><br>DIREKTUR</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
