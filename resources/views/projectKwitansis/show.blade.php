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
                            <strong>: {{ $projectKwitansi->projectPembelian->nomor_po ?? 'N/A' }}</strong>
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
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1; // Penomoran urut
                        @endphp
                        @foreach ($projectKwitansi->pekerjaanKwitansi as $pekerjaan)
                            @foreach ($pekerjaan->batchPekerjaanKwitansi as $batchPekerjaan)
                                <tr>
                                    <td>{{ $counter++ }}</td> <!-- Penomoran urut tanpa menghiraukan pekerjaan -->
                                    <td>{{ $batchPekerjaan->batchKwitansi->nama_batch }}</td>
                                    <td>{{ $batchPekerjaan->batchKwitansi->jumlah_batch }}</td>
                                    <td>{{ $batchPekerjaan->batchKwitansi->satuan_batch }}</td>
                                    <td>{{ $batchPekerjaan->batchKwitansi->keterangan_batch }}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        @php
                                            $total = 1;
                                        @endphp
                                        @foreach ($batchPekerjaan->batchKwitansi->uraianKwitansis as $uraian)
                                            {{ $total++ }}. {{ $uraian->nama_uraian }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                            $jumlah_uraians = 1; // Initialize the counter, but it's not used for display
                                        @endphp
                                        @foreach ($batchPekerjaan->batchKwitansi->uraianKwitansis as $uraian)
                                            {{ $uraian->jumlah_uraian }} <br>
                                            @php
                                                $jumlah_uraians++; // Increment for any internal logic if needed
                                            @endphp
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                            $satuan_uraians = 1; // Initialize the counter, but it's not used for display
                                        @endphp
                                        @foreach ($batchPekerjaan->batchKwitansi->uraianKwitansis as $uraian)
                                            {{ $uraian->satuan_uraian }} <br>
                                            @php
                                                $satuan_uraians++; // Initialize the counter, but it's not used for display
                                            @endphp
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                            $keterangan_uraians = 1; // Initialize the counter, but it's not used for display
                                        @endphp
                                        @foreach ($batchPekerjaan->batchKwitansi->uraianKwitansis as $uraian)
                                            {{ $uraian->keterangan_uraian }} <br>
                                            @php
                                                $keterangan_uraians++; // Initialize the counter, but it's not used for display
                                            @endphp
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <strong>Dimensi Produk</strong><br>
                                        <span
                                            style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Panjang</span>
                                        <span>: {{ $batchPekerjaan->batchKwitansi->dimensi_panjang }}</span><br>
                                        <span
                                            style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Lebar</span>
                                        <span>: {{ $batchPekerjaan->batchKwitansi->dimensi_lebar }}</span><br>
                                        <span
                                            style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Tinggi</span>
                                        <span>: {{ $batchPekerjaan->batchKwitansi->dimensi_tinggi }}</span><br>
                                        <span
                                            style="display: inline-block; width: 120px; text-align: left; padding-right: 10px;">Berat</span>
                                        <span>: {{ $batchPekerjaan->batchKwitansi->dimensi_berat }}</span>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Existing Footer Section -->
        <section id="po-footer" class="po-footer" style="margin-top: 10px;">
            <div style="margin-left: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <!-- Kolom 1 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_penerima ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_penerima ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_penerima ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Penerima
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Kolom 2 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_driver ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_driver ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_driver ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Driver
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Kolom 3 -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_adm_kantor ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_adm_kantor ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 60px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_adm_kantor ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Adm Kantor
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Tanda Tangan -->
            <div style="margin-left: 20px;">
                <div style="margin-bottom: 10px; font-weight: bold;">Segera Lapor Apabila <br> Ada Ketidak Sesuaian
                </div>
                {{-- <div style="margin-bottom: 10px; font-weight: bold;">Ada Ketidak Sesuaian</div> --}}

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

        <!-- New Footer Section (if cut off) -->
        <section id="po-footer-new" class="po-footer-new" style="margin-top: 10px; page-break-before: always">
            <div style="margin-left: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <!-- Repeat the same structure -->
                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_penerima ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_penerima ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 50px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_penerima ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Penerima
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_driver ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_driver ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 50px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_driver ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Driver
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td style="width: 33%; vertical-align: top;">
                            <table style="width: 70%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px; text-align: left; border: none;">
                                        Diterima Tgl :
                                        {{ $projectKwitansi->catatanKwitansi->tanggal_diterima_adm_kantor ?? '' }} <br>
                                        Diterima Jam :
                                        {{ $projectKwitansi->catatanKwitansi->waktu_diterima_adm_kantor ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 50px 20px; text-align: center; border: none;">
                                        <!-- Tempat untuk tanda tangan -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        <strong>{{ $projectKwitansi->catatanKwitansi->nama_adm_kantor ?? '' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border: none;">
                                        Adm Kantor
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Tanda Tangan for New Section -->
            <div style="margin-left: 20px;">
                <div style="margin-bottom: 10px; font-weight: bold;">Segera Lapor Apabila <br> Ada Ketidak Sesuaian
                </div>
                {{-- <div style="margin-bottom: 10px; font-weight: bold;">Ada Ketidak Sesuaian</div> --}}

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

        <!-- Print Button -->
        <div class="text-center">
            <button class="btn btn-primary print-button" onclick="window.print()">Print Invoice</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const footer = document.getElementById("po-footer");
            const newFooter = document.getElementById("po-footer-new");

            // Function to check if the footer is visible in the viewport
            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            // Check if the original footer is visible and toggle the new footer
            if (!isElementInViewport(footer)) {
                footer.style.display = "none"; // Hide the original footer if cut off
                newFooter.style.display = "block"; // Show the new footer
            } else {
                footer.style.display = "block"; // Show the original footer
                newFooter.style.display = "none"; // Hide the new footer
            }
        });
    </script>

</body>

</html>
