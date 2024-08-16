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
                    <img src="{{ asset('company/images/pembelian/kop-pembelian.png') }}" alt="Brand Image"
                        style="width: 1100px; height: auto;">
                </div>
                {{-- <div id="kop-info" class="container" style="margin-top: -60px; margin-left: 20px;">
                    <div>
                        <p style="margin: 2px 0; font-size: 18px;">Jl Pemuda No 65</p>
                        <p style="margin: 2px 0; font-size: 18px;">Rawamangun, Kota Jakarta Timur</p>
                        <p style="margin: 2px 0; font-size: 18px;">Phone: 021-22471134, Email:
                            indo.mutiara.global@gmail.com</p>
                    </div>
                </div> --}}
            </div>
        </div>
        <div></div>

        <div class="container row py-3" style="margin-left: 2px; margin-top: -30px;">
            <div class="col-12">
                <table>
                    <table class="table table-borderless">
                        <td style="font-size: 18px; margin-top:">(Untuk Bahan Pendukung Produksi dan Bahan Lainnya)
                        </td>
                        </tbody>
                    </table>
            </div>
        </div>

        <div class="container row py-3" style="margin-left: 2px; margin-top: -60px;">
            <div class="col-6">
                <table class="table table-borderless" style="line-height: 0.2;">
                    <tbody>
                        <tr>
                            <td style="font-size: 18px; margin-top:">Nomor PO</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->nomor_po }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Project</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->project }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Tanggal Order</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->tanggal_order }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Metode Pembayaran</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->metode_pembayaran }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">PO ditujukan kepada</td>
                            <td style="font-size: 18px;">:<strong>
                                    {{ $projectPembelian->po_ditunjukan_kepada }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Alamat</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->alamat }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Kontak</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->kontak }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">E-mail/Mobile Number</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectPembelian->email_mobile_number }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <section class="po-table-data">
            <div class="container py-3" style="margin-left: 20px; margin-top: -20px">
                <table class="table table-bordered invoice-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Keterangan (jenis, ukuran, warna, dll)</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Sub Total (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kertas A4</td>
                            <td>80gsm, Putih</td>
                            <td>500</td>
                            <td>Rp 50.000</td>
                            <td>Rp 25.000.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tinta Printer</td>
                            <td>Hitam</td>
                            <td>10</td>
                            <td>Rp 150.000</td>
                            <td>Rp 1.500.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pulpen</td>
                            <td>Biru</td>
                            <td>200</td>
                            <td>Rp 2.000</td>
                            <td>Rp 400.000</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                            <td><strong>Rp 26.900.000</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>PPN 11%</strong></td>
                            <td><strong>Rp 2.959.000</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>TOTAL</strong></td>
                            <td><strong>Rp 29.859.000</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="po-catatan" style="margin-top: 20px;">
            <h5 style="margin-bottom: 20px; margin-left: 20px; margin-top: -20px">CATATAN:</h5>
            <div style="border: 1px solid #000; padding: 10px; width: 100%; margin-left: 20px; margin-top: -20px;">
                <table style="width: 100%; border-collapse: collapse; line-height: 1.1;">
                    <tr>
                        <td style="padding: 8px; width: 5%;">1</td>
                        <td style="padding: 8px; width: 35%;">Waktu pengiriman</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px; width: 60%;">Segera</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">2</td>
                        <td style="padding: 8px;">Alamat pengiriman</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">Project Senayan Square, Apartment A&B Tower B (share loc akan dikirim
                            kemudian)</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">3</td>
                        <td style="padding: 8px;">Contact person</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">Bapak Mardi</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">4</td>
                        <td style="padding: 8px;">Pembayaran</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">Transfer</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">5</td>
                        <td style="padding: 8px;" colspan="3">
                            Harga sesuai dengan penawaran, jika berbeda akan ditolak/retur
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="po-footer" style="margin-top: 20px;">
            <div style="margin-left: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <!-- Kolom 1 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <!-- Baris keterangan -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: 1px solid #000;">
                                        <strong>Diorder oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: 1px solid #000;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: 1px solid #000;">
                                        Bambang
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ffffff;">

                                        *) Bagian Pembelian
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Kolom 2 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <!-- Baris keterangan -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: 1px solid #000;">
                                        <strong>Disetujui oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: 1px solid #000;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: 1px solid #000;">
                                        Ispriyadi
                                    </td>

                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ffffff;">
                                        *) Direktur/Manajer
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Kolom 3 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <!-- Baris keterangan -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: 1px solid #000;">
                                        <strong>Order diterima oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: 1px solid #000;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 20px; text-align: center; border: 1px solid #000;">
                                        <!-- Tempat untuk nama, tanggal, dan stempel -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ffffff;">
                                        <!-- Tempat untuk nama, tanggal, dan stempel -->
                                        *) Ttd, nama, tgl diterima & Stempel Supplier
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </section>




    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
