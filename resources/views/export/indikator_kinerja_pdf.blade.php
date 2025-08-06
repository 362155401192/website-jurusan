<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Indikator Kinerja - PDF</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 9px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            word-break: break-word;
            vertical-align: top;
            text-align: center;
            page-break-inside: avoid;
            min-height: 25px;
        }

        th {
            background-color: #f0f0f0;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        table, th, td {
            box-sizing: border-box;
        }


        /* Set lebar kolom proporsional */
        th:nth-child(1), td:nth-child(1) { width: 4%; }   /* No */
        th:nth-child(2), td:nth-child(2) { width: 18%; }  /* Sasaran */
        th:nth-child(3), td:nth-child(3) { width: 25%; }  /* Indikator */

        /* Triwulan 1, 2, 3 - Target & Realisasi */
        th:nth-child(4), td:nth-child(4),  /* TW1 - Target */
        th:nth-child(5), td:nth-child(5),  /* TW1 - Realisasi */
        th:nth-child(6), td:nth-child(6),  /* TW2 - Target */
        th:nth-child(7), td:nth-child(7),  /* TW2 - Realisasi */
        th:nth-child(8), td:nth-child(8),  /* TW3 - Target */
        th:nth-child(9), td:nth-child(9) { /* TW3 - Realisasi */
            width: 12%;
        }

        th:nth-child(10), td:nth-child(10), /* Target Akhir */
        th:nth-child(11), td:nth-child(11) { /* Realisasi Akhir */
            width: 3%;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Indikator Kinerja Utama</h2>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Sasaran Kinerja</th>
                <th rowspan="2">Indikator Kinerja Kegiatan</th>
                <th colspan="2">Triwulan 1</th>
                <th colspan="2">Triwulan 2</th>
                <th colspan="2">Triwulan 3</th>
                <th rowspan="2">Target Akhir</th>
                <th rowspan="2">Realisasi Akhir</th>
            </tr>
            <tr>
                <th>Target</th>
                <th>Realisasi</th>
                <th>Target</th>
                <th>Realisasi</th>
                <th>Target</th>
                <th>Realisasi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data as $sasaran)
                @php
                    $indikatorCount = $sasaran->indikatorKinerjaKegiatans->count();
                @endphp
                @foreach($sasaran->indikatorKinerjaKegiatans as $i => $indikator)
                    @php
                        $targets = collect($indikator->targetRealisasis);
                        $get = fn($tw) => $targets->firstWhere('triwulan', $tw);
                        $totalTarget = $targets->sum('target');
                        $totalRealisasi = $targets->sum('realisasi');
                    @endphp
                    <tr>
                        @if ($i === 0)
                            <td rowspan="{{ $indikatorCount }}">{{ $no++ }}</td>
                            <td rowspan="{{ $indikatorCount }}">{{ $sasaran->nama }}</td>
                        @endif

                        <td>{!! strip_tags($indikator->deskripsi) !!}</td>
                        <td>{{ $get(1)?->target ?? '-' }}</td>
                        <td>{{ $get(1)?->realisasi ?? '-' }}</td>
                        <td>{{ $get(2)?->target ?? '-' }}</td>
                        <td>{{ $get(2)?->realisasi ?? '-' }}</td>
                        <td>{{ $get(3)?->target ?? '-' }}</td>
                        <td>{{ $get(3)?->realisasi ?? '-' }}</td>
                        <td><strong>{{ $totalTarget ?: '-' }}</strong></td>
                        <td><strong>{{ $totalRealisasi ?: '-' }}</strong></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
