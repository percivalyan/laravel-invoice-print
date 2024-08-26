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

        <div class="container py-3" style="margin-left: 20px; margin-top: -50px;">
            <div class="d-flex flex-wrap justify-content-between">
                <!-- First Section -->
                <div class="col-6 d-flex flex-column">
                    <div class="d-flex mb-2">
                        &nbsp;
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Yth. Kepada</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 10px;">
                            <strong>: {{ $projectKwitansi->kepada_yth }}</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Nomor</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 48px;">
                            <strong>: {{ $projectKwitansi->nomor_surat_jalan }}</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Proyek</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 50px;">
                            <strong>: {{ $projectKwitansi->proyek }}</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Ref PO No</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 20px;">
                            <strong>: {{ $projectKwitansi->projectPembelian->reff_po_no ?? 'N/A' }}</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Lokasi</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 53px;">
                            <strong>: {{ $projectKwitansi->lokasi }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Second Section -->
                <div class="col-3 d-flex flex-column">
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px;"><strong>{{ now()->format('d F Y') }}</strong></div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Kendaraan:</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 5px;">
                            <strong>Truck</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">No. Pol:</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 5px;">
                            <strong>{{ $projectKwitansi->no_pol }}</strong>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="font-size: 18px; white-space: nowrap;">Tanggal:</div>
                        <div style="font-size: 18px; flex: 1; margin-left: 5px;">
                            <strong>{{ $projectKwitansi->tanggal }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-3" style="margin-left: 2px; margin-top: -10px;">
            <div class="col-12">
                <p style="font-size: 18px;">
                    Dengan hormat,<br>
                    Dengan ini kami mengirimkan barang untuk {{ $projectKwitansi->proyek }},
                    dengan rincian sebagai berikut:
                </p>
            </div>
        </div>

        <section class="po-table-data">
            <div class="container py-3" style="margin-left: 20px; margin-top: -20px">
                <table class="table table-bordered invoice-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Keterangan </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <ol>
                                    <li>Test</li>
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <strong>Dimensi Produk</strong><br>
                                <span
                                    style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Panjang
                                </span>
                                <span>: [Nilai Panjang]</span><br>
                                <span
                                    style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Lebar
                                </span>
                                <span>: [Nilai Lebar]</span><br>
                                <span
                                    style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Tinggi
                                </span>
                                <span>: [Nilai Tinggi]</span><br>
                                <span
                                    style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Berat
                                </span>
                                <span>: [Nilai Berat]</span>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
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
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>Diorder oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: none;">

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
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>Disetujui oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: none;">
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
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>Order diterima oleh</strong>
                                    </td>
                                </tr>
                                <!-- Baris tanda tangan -->
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <!-- Baris nama -->
                                <tr>
                                    <td style="padding: 20px; text-align: center; border: none;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: none;">
                                        *) Ttd, nama, tgl diterima & Stempel Supplier
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section>
            <div style="margin-left: 20px;">
                <div style="margin-bottom: 10px; font-weight: bold;">Segera Lapor Apabila</div>
                <div style="margin-bottom: 10px; font-weight: bold;">Ada Ketidak Sesuaian</div>

                <div>
                    <span
                        style="display: inline-block; width: 150px; text-align: left; padding-right: 10px; font-weight: bold;">Lembar
                        1</span>
                    <span>: Pengirim</span><br>
                    <span
                        style="display: inline-block; width: 150px; text-align: left; padding-right: 10px; font-weight: bold;">Lembar
                        2</span>
                    <span>: Penerima</span><br>
                    <span
                        style="display: inline-block; width: 150px; text-align: left; padding-right: 10px; font-weight: bold;">Lembar
                        3</span>
                    <span>: Arsip</span>
                </div>
            </div>
        </section>




        {{-- <section class="po-catatan" style="margin-top: 20px;">
            <h5 style="margin-bottom: 20px; margin-left: 20px; margin-top: -20px">CATATAN:</h5>
            <div style="border: 1px solid #000; padding: 10px; width: 100%; margin-left: 20px; margin-top: -20px;">
                <table style="width: 100%; border-collapse: collapse; line-height: 1.1;">
                    <tr>
                        <td style="padding: 8px; width: 5%;">1</td>
                        <td style="padding: 8px; width: 35%;">Waktu pengiriman</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px; width: 60%;">
                            {{ $projectPembelian->catatanPembelian->waktu_pengiriman ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">2</td>
                        <td style="padding: 8px;">Alamat pengiriman</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">
                            {{ $projectPembelian->catatanPembelian->alamat_pengiriman ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">3</td>
                        <td style="padding: 8px;">Contact person</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">
                            {{ $projectPembelian->catatanPembelian->contact_person ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">4</td>
                        <td style="padding: 8px;">Pembayaran</td>
                        <td style="padding: 8px;">:</td>
                        <td style="padding: 8px;">
                            {{ $projectPembelian->catatanPembelian->pembayaran ?? '' }}
                        </td>
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
                                        {{ $projectPembelian->footerPembelian->diorder_oleh ?? '' }}
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
                                        {{ $projectPembelian->footerPembelian->disetujui_oleh ?? '' }}
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
                                        {{ $projectPembelian->footerPembelian->order_diterima_oleh ?? '' }}
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
        </section> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
