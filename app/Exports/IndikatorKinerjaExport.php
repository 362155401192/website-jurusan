<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class IndikatorKinerjaExport implements FromArray, WithHeadings, WithEvents, WithStyles
{

    protected $data;
    protected $rowCount = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        $no = 1;

        foreach ($this->data as $sasaran) {
            $indikators = $sasaran->indikatorKinerjaKegiatans;

            foreach ($indikators as $indikator) {
                $targets = collect($indikator->targetRealisasis);

                $row = [];
                $row[] = $no++;
                $row[] = $sasaran->nama;
                $row[] = $indikator->program_studi;
                $row[] = strip_tags($indikator->deskripsi);

                $targetTriwulan = [];
                $realisasiTriwulan = [];

                for ($tw = 1; $tw <= 3; $tw++) {
                    $data = $targets->firstWhere('triwulan', $tw);
                    $target = $data?->target ?? 0;
                    $realisasi = $data?->realisasi ?? 0;
                    $targetTriwulan[$tw] = $target;
                    $realisasiTriwulan[$tw] = $realisasi;

                    $row[] = $target;
                    $row[] = $realisasi;
                }

                $row[] = array_sum($targetTriwulan);
                $row[] = array_sum($realisasiTriwulan);

                $result[] = $row;
            }
        }
        $this->rowCount = count($result);

        return $result;
    }


    public function headings(): array
    {
        return [
            [
                'No',
                'Sasaran Kinerja',
                'Program Studi',
                'Indikator Kinerja Kegiatan',
                'Triwulan 1',
                '',
                'Triwulan 2',
                '',
                'Triwulan 3',
                '',
                'Target Akhir',
                'Realisasi Akhir'
            ],
            [
                '',
                '',
                '',
                '',
                'Target',
                'Realisasi',
                'Target',
                'Realisasi',
                'Target',
                'Realisasi',
                '',
                ''
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]], // Baris 1 bold
            2    => ['font' => ['bold' => true]], // Baris 2 bold
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Merge headers
                $sheet = $event->sheet->getDelegate();

                $sheet->mergeCells('A1:A2'); // No
                $sheet->mergeCells('B1:B2'); // Sasaran Kinerja
                $sheet->mergeCells('C1:C2'); // Program Studi
                $sheet->mergeCells('D1:D2'); // Indikator Kinerja Kegiatan
                $sheet->mergeCells('E1:F1'); // TW1
                $sheet->mergeCells('G1:H1'); // TW2
                $sheet->mergeCells('I1:J1'); // TW3
                $sheet->mergeCells('K1:K2'); // Target Akhir
                $sheet->mergeCells('L1:L2'); // Realisasi Akhir

                $sheet->getStyle('A1:L2')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '093D96' // Warna biru terang
                        ]
                    ],
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'], // Teks putih
                    ],
                ]);

                // Border all cells
                $lastRow = $this->rowCount + 1; // +1 for 2 header rows
                $sheet->getStyle("A1:L{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle("A1:L2")->getAlignment()->setHorizontal('center')->setVertical('center')->setWrapText(false);

                $currentRow = 3; // Mulai dari baris ke-3 karena baris 1-2 adalah heading

                $mergedSasaranStart = $currentRow;
                $prevSasaran = $this->data[0]->nama ?? null;
                $no = 1;

                foreach ($this->data as $sasaran) {
                    $indikatorCount = count($sasaran->indikatorKinerjaKegiatans);
                    if ($indikatorCount > 0) {
                        $startRow = $mergedSasaranStart;
                        $endRow = $mergedSasaranStart + $indikatorCount - 1;

                        // Merge kolom No dan Sasaran Kinerja jika lebih dari satu indikator
                        if ($indikatorCount > 1) {
                            $sheet->mergeCells("A{$startRow}:A{$endRow}");
                            $sheet->mergeCells("B{$startRow}:B{$endRow}");
                        }

                        // Nomor juga ditulis hanya di baris awal
                        $sheet->setCellValue("A{$startRow}", $no++);
                        $sheet->setCellValue("B{$startRow}", $sasaran->nama);

                        $mergedSasaranStart = $endRow + 1;
                    }
                }
            }
        ];
    }
}
