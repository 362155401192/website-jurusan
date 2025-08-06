@extends('frontend.layouts.app')

@section('content')

<!-- Hero section -->
<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Indikator Kinerja Utama</h2>
                    <p class="lead">Jurusan Bisnis Dan Informatika Politeknik Negeri Banyuwangi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="mb-4">Indikator Kinerja Utama </h2>
    <p>Indikator Kinerja Utama (IKU) adalah alat mengukur dan mengevaluasi kinerja organisasi dalam mencapai tujuan strategis.</p>

    <div class="mb-3 d-flex justify-content-between align-items-center gap-2">
        <div>
            <label for="selectTahun" class="form-label">Pilih Tahun:</label>
            <select id="selectTahun" class="form-select form-select-sm" style="width: auto; display: inline-block;">
                @for ($y = now()->year; $y >= now()->year - 2; $y--)
                    <option value="{{ $y }}" {{ $y == now()->year ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>

        {{-- <div class="d-flex gap-2 align-items-end">
            <a href="{{ route('frontend.indikator-kinerja', ['prodi' => 'TRPL']) }}" class="btn btn-outline-primary {{ $prodi == 'TRPL' ? 'active' : '' }}">TRPL</a>
            <a href="{{ route('frontend.indikator-kinerja', ['prodi' => 'TRK']) }}" class="btn btn-outline-primary {{ $prodi == 'TRK' ? 'active' : '' }}">TRK</a>
            <a href="{{ route('frontend.indikator-kinerja', ['prodi' => 'BSD']) }}" class="btn btn-outline-primary {{ $prodi == 'BSD' ? 'active' : '' }}">BSD</a>

        </div> --}}

        <div class="mb-3 d-flex justify-content-end gap-2">
            <a id="btnExportExcel" href="{{ route('frontend.indikator-kinerja.export', ['format' => 'excel']) }}"  class="btn btn-success btn-sm">📅 Export Excel</a>
            <a id="btnExportPDF" href="{{ route('frontend.indikator-kinerja.export', ['format' => 'pdf']) }}"  target="_blank" class="btn btn-danger btn-sm">📄 Export PDF</a>
        </div>

    </div>

    <div class="table-responsive position-relative" style="max-height: 600px; overflow: auto;">
        <table class="table table-bordered table-striped table-hover align-middle mb-0" style="min-width: 1200px;">
            <thead class="text-center bg-primary text-white">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Sasaran Kinerja</th>
                    <th rowspan="2">Indikator Kinerja Kegiatan</th>
                    <th colspan="2">Triwulan 1</th>
                    <th colspan="2">Triwulan 2</th>
                    <th colspan="2">Triwulan 3</th>
                    <th rowspan="2">Target Akhir</th>
                    <th rowspan="2">Realisasi Akhir</th>
                    <th rowspan="2">File Pendukung</th>
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
                @foreach($sasaran_kinerja as $sasaran)
                    @php
                        $indikators = $sasaran->indikatorKinerjaKegiatans;
                        $rowspan = $indikators->count();
                    @endphp
                    @foreach($indikators as $index => $indikator)
                        @php
                            $targets = collect($indikator->targetRealisasis);
                            $targetTriwulan = [];
                            $realisasiTriwulan = [];
                        @endphp
                        <tr data-id="{{ $indikator->id }}">
                            @if ($index == 0)
                                <td rowspan="{{ $rowspan }}">{{ $no++ }}</td>
                                <td rowspan="{{ $rowspan }}" class="text-start">{{ $sasaran->nama }}</td>
                            @endif
                            <td class="text-start">{!! $indikator->deskripsi !!}</td>
                            @for ($tw = 1; $tw <= 3; $tw++)
                                @php
                                    $data = $targets->firstWhere('triwulan', $tw);
                                    $target = $data?->target ?? 0;
                                    $realisasi = $data?->realisasi ?? 0;
                                    $targetTriwulan[$tw] = $target;
                                    $realisasiTriwulan[$tw] = $realisasi;
                                @endphp
                                <td contenteditable="true" class="editable text-center" data-field="tw{{ $tw }}_target">{{ $target }}</td>
                                <td contenteditable="true" class="editable text-center" data-field="tw{{ $tw }}_realisasi">{{ $realisasi }}</td>
                            @endfor
                            @php
                                $targetAkhir = array_sum($targetTriwulan);
                                $realisasiAkhir = array_sum($realisasiTriwulan);
                            @endphp
                            <td class="text-center total-target"><strong>{{ $targetAkhir }}</strong></td>
                            <td class="text-center total-realisasi"><strong>{{ $realisasiAkhir }}</strong></td>
                            <td class="text-center">
                                @php
                                    $file = $targets->firstWhere('file_pendukung', '!=', null)?->file_pendukung;
                                @endphp
                                @if ($file)
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary btn-sm">📎 Lihat</a>
                                @else
                                    <span class="badge bg-light text-muted">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('styles')
<style>
    body { font-family: sans-serif; font-size: 10px; }
    table { width: 100%; border-collapse: collapse; table-layout: fixed; page-break-inside: avoid; }
    th, td { border: 1px solid #000; padding: 4px; word-wrap: break-word; vertical-align: top; }
    th { background-color: #f0f0f0; text-align: center; }
    td { text-align: left; }
    tr { page-break-inside: avoid; page-break-after: auto; }
    h2 { text-align: center; }
    .editable { background-color: #fff8dc; cursor: text; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('tr[data-id]').forEach(row => {
        updateTotals(row);

        row.querySelectorAll('.editable').forEach(cell => {
            cell.addEventListener('input', () => {
                updateTotals(row);
                autosave(row, cell);
            });
        });
    });

    function updateTotals(row) {
        let target = 0;
        let realisasi = 0;

        for (let i = 1; i <= 3; i++) {
            const t = parseFloat(row.querySelector(`[data-field="tw${i}_target"]`)?.innerText || 0);
            const r = parseFloat(row.querySelector(`[data-field="tw${i}_realisasi"]`)?.innerText || 0);
            target += isNaN(t) ? 0 : t;
            realisasi += isNaN(r) ? 0 : r;
        }

        row.querySelector('.total-target').innerHTML = `<strong>${target}</strong>`;
        row.querySelector('.total-realisasi').innerHTML = `<strong>${realisasi}</strong>`;
    }

    function autosave(row, cell) {
        const indikatorId = row.dataset.id;
        const field = cell.dataset.field;
        const value = cell.innerText;
        const [tw, type] = field.match(/tw(\d)_(\w+)/).slice(1);

        fetch(`/apps/target-realisasi/${indikatorId}/update-inline`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ triwulan: tw, type: type, value: value })
        }).then(res => res.json()).then(res => {
            if (!res.success) console.error('Gagal update:', res.message);
        });
    }

    document.getElementById('btnExportExcel').addEventListener('click', function(e) {
        e.preventDefault();
        const tahun = document.getElementById('selectTahun').value;
        const prodi = "{{ $prodi ?? '' }}";
        const url = `/indikator-kinerja/export/excel?tahun=${tahun}&prodi=${prodi}`;
        window.open(url, '_blank');
    });

    document.getElementById('btnExportPDF').addEventListener('click', function(e) {
        e.preventDefault();
        const tahun = document.getElementById('selectTahun').value;
        const prodi = "{{ $prodi ?? '' }}";
        const url = `/indikator-kinerja/export/pdf?tahun=${tahun}&prodi=${prodi}`;
        window.open(url, '_blank');
    });


    document.getElementById('selectTahun').addEventListener('change', function () {
        const tahun = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('tahun', tahun);
        window.location.href = url.toString(); // reload halaman dengan parameter tahun baru
    });


    $(document).ready(function () {
        $('.jurusan-btn').on('click', function () {
            const jurusan = $(this).data('jurusan');
            const tahun = $('select[name="tahun"]').val();

            $.ajax({
                url: '/indikator-kinerja/data',
                data: { tahun, jurusan },
                success: function (res) {
                    const content = $(res).find('#indikator-kinerja-table').html();
                    $('#indikator-kinerja-table').html(content);
                    $('.jurusan-btn').removeClass('active');
                    $(`.jurusan-btn[data-jurusan="${jurusan}"]`).addClass('active');
                },
                error: function () {
                    alert("Gagal memuat data.");
                }
            });
        });

        $('select[name="tahun"]').on('change', function () {
            $('.jurusan-btn.active').trigger('click');
        });
    });

    
});

</script>
@endpush
