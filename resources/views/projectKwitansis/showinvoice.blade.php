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
                    <img src="{{ asset('company/images/penawaran/kop-penawaran.png') }}" alt="Brand Image"
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

        <div class="container row py-3" style="margin-left: 2px; margin-top: -40px;">
            <div class="col-12">
                <table class="table table-borderless" style="line-height: 1.1;">
                    <tbody>
                        <tr>
                            <td style="font-size: 18px;">Kepada Yth</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectKwitansi->kepada_yth }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Nomor</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectKwitansi->nomor_invoice }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Proyek</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectKwitansi->proyek }}</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">No Reff PO</td>
                            <td style="font-size: 18px;">:<strong>:
                                    {{ $projectKwitansi->projectPembelian->nomor_po ?? 'N/A' }}</strong>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">Lokasi</td>
                            <td style="font-size: 18px;">:<strong> {{ $projectKwitansi->lokasi }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                    @if (isset($pekerjaanKwitansis) && $pekerjaanKwitansis->isNotEmpty())
                        @foreach ($pekerjaanKwitansis as $pekerjaanKwitansi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <ul style="list-style-type: none; padding: 0; text-align: left;">
                                        <li><strong>Pekerjaan: {{ $pekerjaanKwitansi->pekerjaan }}</strong></li>
                                        <li>Dengan rincian sebagai berikut:</li>
                                        {{-- @foreach ($pekerjaan->jenisPenawarans as $jenisPenawaran)
                                        <li>{{ $jenisPenawaran->jenis_pekerjaan }}</li>
                                        @if ($jenisPenawaran->uraianJenisPekerjaanPenawarans->isNotEmpty())
                                            <ol style="list-style-type: decimal;">
                                                @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                                    <li>{{ $uraian->uraian }}</li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    @endforeach --}}
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none; padding: 0;">
                                        {{-- <li>{{ $penawaran->quantitas }}</li>
                                    <li>&nbsp;</li>
                                    @foreach ($penawaran->jenisPenawarans as $jenisPenawaran)
                                        <li>{{ $jenisPenawaran->quantitas }}</li>
                                        @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                            <li>{{ $uraian->quantitas }}</li>
                                        @endforeach
                                    @endforeach --}}
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none; padding: 0;">
                                        {{-- <li>{{ $penawaran->unit }}</li>
                                    <li>&nbsp;</li>
                                    @foreach ($penawaran->jenisPenawarans as $jenisPenawaran)
                                        <li>{{ $jenisPenawaran->unit }}</li>
                                        @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                            <li>{{ $uraian->unit }}</li>
                                        @endforeach
                                    @endforeach --}}
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none; padding: 0;">
                                        {{-- <li>{{ number_format($penawaran->harga_satuan, 0, ',', '.') }}</li>
                                    <li>&nbsp;</li>
                                    @foreach ($penawaran->jenisPenawarans as $jenisPenawaran)
                                        <li>{{ number_format($jenisPenawaran->harga_satuan, 0, ',', '.') }}</li>
                                        @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                            <li>{{ number_format($uraian->harga_satuan, 0, ',', '.') }}</li>
                                        @endforeach
                                    @endforeach --}}
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none; padding: 0;">
                                        {{-- <li>{{ number_format($penawaran->harga_satuan * $penawaran->quantitas, 0, ',', '.') }}</li>
                                    <li>&nbsp;</li>
                                    @foreach ($penawaran->jenisPenawarans as $jenisPenawaran)
                                        <li>{{ number_format($jenisPenawaran->quantitas * $jenisPenawaran->harga_satuan, 0, ',', '.') }}</li>
                                        @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                            <li>{{ number_format($uraian->quantitas * $uraian->harga_satuan, 0, ',', '.') }}</li>
                                        @endforeach
                                    @endforeach --}}
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No pekerjaan kwitansi found.</td>
                        </tr>
                    @endif

                    {{-- @php
                        use App\Helpers\NumberToWords;
                        $totalAmount = $projectPenawaran->penawaran->sum(function ($penawaran) {
                            $totalPenawaran = $penawaran->harga_satuan * $penawaran->quantitas;
                
                            foreach ($penawaran->jenisPenawarans as $jenisPenawaran) {
                                $totalPenawaran += $jenisPenawaran->quantitas * $jenisPenawaran->harga_satuan;
                
                                foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian) {
                                    $totalPenawaran += $uraian->quantitas * $uraian->harga_satuan;
                                }
                            }
                
                            return $totalPenawaran;
                        });
                        $terbilang = NumberToWords::convert($totalAmount);
                    @endphp --}}
                    <tr>
                        {{-- <td colspan="5" class="text-right"><strong>Total</strong></td>
                        <td><strong>{{ number_format($totalAmount, 0, ',', '.') }}</strong></td> --}}
                    </tr>
                    <tr>
                        {{-- <td colspan="6">Terbilang: {{ $terbilang }} Rupiah</td> --}}
                    </tr>
                </tbody>
            </table>
        </div>


        <p class="text-muted" style="margin-left: 20px;">Note: Harga tersebut diatas sudah termasuk PPN 11%</p>

        <section>
            <div class="invoice-footer"
                style="margin-left: 20px; display: flex; justify-content: space-between; gap: 20px;">
                <!-- Bank Information Table -->
                <div style="flex: 1;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            Pembayaran mohon ditranfer ke :
                            <td style="padding: 8px; width: 35%;">Bank</td>
                            <td style="padding: 8px;">:</td>
                            <td style="padding: 8px; width: 60%;">
                                {{ $projectKwitansi->catatanKwitansi->bank_pembayaran ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 8px; width: 35%;">Cabang</td>
                            <td style="padding: 8px;">:</td>
                            <td style="padding: 8px; width: 60%;">
                                {{ $projectKwitansi->catatanKwitansi->cabang ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 8px; width: 35%;">No. Rek</td>
                            <td style="padding: 8px;">:</td>
                            <td style="padding: 8px; width: 60%;">
                                {{ $projectKwitansi->catatanKwitansi->nomor_rekening ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 8px; width: 35%;">AN</td>
                            <td style="padding: 8px;">:</td>
                            <td style="padding: 8px; width: 60%;">
                                {{ $projectKwitansi->catatanKwitansi->atas_nama ?? '' }}
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Signature and Name Section -->
                <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <!-- Signature Line -->
                        Jakarta, <?php echo date('d F Y'); ?>
                        <tr>
                            <td style="padding: 60px 20px; text-align: center; border: none;">
                                <!-- Tempat untuk tanda tangan -->
                            </td>
                        </tr>
                        <!-- Name and Title -->
                        <tr>
                            <td style="padding: 10px; text-align: center; border: none;">
                                {{ $projectKwitansi->catatanKwitansi->penanggung_jawab ?? '' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        
        {{-- 
        <div class="container text-center">
            <h6>
                *Pembayaran dianggap lunas apabila giro/transfer sudah kami terima
            </h6>
        </div>
        --}}

        <section style="text-align: center; padding: 10px; border-top: 1px solid #ddd;">
            <div style="text-align: center;">
                <h6 style="margin: 0;">
                    *Pembayaran dianggap lunas apabila giro/transfer sudah kami terima
                </h6>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
