{{-- <div class="container py-3" style="margin-left: 20px; margin-top: -20px">
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
            @foreach ($projectPenawaran->penawaran as $index => $penawaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
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
                            <li>{{ number_format($penawaran->harga_satuan, 0, ',', '.') }}</li>
                            <li>&nbsp;</li>
                            <li>{{ number_format($penawaran->jenisPenawaran->harga_satuan, 0, ',', '.') }}</li>
                            <li>{{ number_format($penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan, 0, ',', '.') }}</li>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style-type: none; padding: 0;">
                            <li>{{ number_format($penawaran->harga_satuan * $penawaran->quantitas, 0, ',', '.') }}</li>
                            <li>&nbsp;</li>
                            <li>{{ number_format($penawaran->jenisPenawaran->quantitas * $penawaran->jenisPenawaran->harga_satuan, 0, ',', '.') }}</li>
                            <li>{{ number_format($penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas * $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan, 0, ',', '.') }}</li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" class="text-right"><strong>Total</strong></td>
                <td><strong>{{ number_format($projectPenawaran->penawaran->sum(function ($penawaran) {
                    return $penawaran->harga_satuan * $penawaran->quantitas + 
                           $penawaran->jenisPenawaran->quantitas * $penawaran->jenisPenawaran->harga_satuan + 
                           $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas * $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan;
                }), 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td colspan="6">Terbilang: {{ ucwords(terbilang($projectPenawaran->penawaran->sum(function ($penawaran) {
                    return $penawaran->harga_satuan * $penawaran->quantitas + 
                           $penawaran->jenisPenawaran->quantitas * $penawaran->jenisPenawaran->harga_satuan + 
                           $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->quantitas * $penawaran->jenisPenawaran->uraianJenisPekerjaanPenawaran->harga_satuan;
                }))) }} Rupiah</td>
            </tr>
        </tbody>
    </table>
</div> --}}

@foreach ($projectPenawaran->penawaran as $penawaran)
    <h2>Penawaran: {{ $penawaran->pekerjaan }}</h2>

    @if ($penawaran->jenisPenawarans->isNotEmpty())
        <ul>
            @foreach ($penawaran->jenisPenawarans as $jenisPenawaran)
                <li>
                    <strong>Jenis Pekerjaan:</strong> {{ $jenisPenawaran->jenis_pekerjaan }} <br>
                    <strong>Quantitas:</strong> {{ $jenisPenawaran->quantitas }} <br>
                    <strong>Unit:</strong> {{ $jenisPenawaran->unit }} <br>
                    <strong>Harga Satuan:</strong> {{ $jenisPenawaran->harga_satuan }} <br>

                    @if ($jenisPenawaran->uraianJenisPekerjaanPenawarans->isNotEmpty())
                        <ul>
                            @foreach ($jenisPenawaran->uraianJenisPekerjaanPenawarans as $uraian)
                                <li>
                                    <strong>Uraian:</strong> {{ $uraian->uraian }} <br>
                                    <strong>Jenis Pekerjaan:</strong> {{ $uraian->jenis_pekerjaan }} <br>
                                    <strong>Quantitas:</strong> {{ $uraian->quantitas }} <br>
                                    <strong>Unit:</strong> {{ $uraian->unit }} <br>
                                    <strong>Harga Satuan:</strong> {{ $uraian->harga_satuan }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No Uraian available for this Jenis Penawaran</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No Jenis Penawaran available</p>
    @endif
@endforeach