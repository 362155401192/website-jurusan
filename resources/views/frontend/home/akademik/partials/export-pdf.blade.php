<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Export PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
        }

        thead th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-start {
            text-align: left;
        }

        /* Lebar kolom (total harus tetap 100%) */
        .col-no {
            width: 3%;
        }

        .col-sasaran {
            width: 15%;
        }

        .col-prodi {
            width: 5%;
        }

        .col-indikator {
            width: 25%;
        }

        .col-target,
        .col-realisasi {
            width: 5%;
        }

        .col-total {
            width: 5%;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1 class="text-center">Laporan Indikator Kinerja Kegiatan</h1>
        @if ($tahun !== null && $tahun !== 'all')
            <h2 class="text-center">Periode {{ $tahun }}</h2>
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th class="col-no" rowspan="2">No</th>
                <th class="col-sasaran" rowspan="2">Sasaran Kinerja</th>
                <th class="col-indikator" rowspan="2">Indikator Kinerja Kegiatan</th>
                <th class="col-target" colspan="2">Triwulan 1</th>
                <th class="col-target" colspan="2">Triwulan 2</th>
                <th class="col-target" colspan="2">Triwulan 3</th>
                <th class="col-total" rowspan="2">Target Akhir</th>
                <th class="col-total" rowspan="2">Realisasi Akhir</th>
            </tr>
            <tr>
                <th class="col-target" style="white-space: nowrap;">Target</th>
                <th class="col-realisasi" style="white-space: nowrap;">Realisasi</th>
                <th class="col-target" style="white-space: nowrap;">Target</th>
                <th class="col-realisasi" style="white-space: nowrap;">Realisasi</th>
                <th class="col-target" style="white-space: nowrap;">Target</th>
                <th class="col-realisasi" style="white-space: nowrap;">Realisasi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grouped = collect($data)
                    ->flatMap(function ($sasaran) {
                        return $sasaran->indikatorKinerjaKegiatans->map(function ($indikator) use ($sasaran) {
                            $indikator->sasaran_nama = $sasaran->nama;
                            return $indikator;
                        });
                    })
                    ->groupBy(function ($indikator) {
                        return $indikator->programStudi->name ?? 'Tanpa Program Studi';
                    });
            @endphp
            @php $no = 1; @endphp
            @foreach ($grouped as $programStudi => $indikators)
                <tr>
                    <td colspan="11" class="fw-bold bg-light text-uppercase">
                        {{ $programStudi ?: 'Tanpa Program Studi' }}</td>
                </tr>

                @foreach ($indikators as $indikator)
                    @php
                        $targets = collect($indikator->targetRealisasis);
                        $targetTriwulan = [];
                        $realisasiTriwulan = [];
                    @endphp
                    <tr data-id="{{ $indikator->id }}">
                        <td>{{ $no++ }}</td>
                        <td class="text-start">
                            <p class="m-0">{{ $indikator->sasaran_nama }}</p>
                        </td>
                        <td class="text-start">{!! $indikator->deskripsi !!}</td>
                        @for ($tw = 1; $tw <= 3; $tw++)
                            @php
                                $data = $targets->firstWhere('triwulan', $tw);
                                $target = $data?->target ?? 0;
                                $realisasi = $data?->realisasi ?? 0;
                                $targetTriwulan[$tw] = $target;
                                $realisasiTriwulan[$tw] = $realisasi;
                            @endphp
                            <td>{{ $target }}</td>
                            <td>{{ $realisasi }}</td>
                        @endfor
                        @php
                            $targetAkhir = array_sum($targetTriwulan);
                            $realisasiAkhir = array_sum($realisasiTriwulan);
                        @endphp
                        <td class="text-center total-target"><strong>{{ $targetAkhir }}</strong></td>
                        <td class="text-center total-realisasi"><strong>{{ $realisasiAkhir }}</strong></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
