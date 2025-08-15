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
    protected $grouped = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->grouped = collect($data)
            ->flatMap(function ($sasaran) {
                return $sasaran->indikatorKinerjaKegiatans->map(function ($indikator) use ($sasaran) {
                    $indikator->sasaran_nama = $sasaran->nama;
                    return $indikator;
                });
            })
            ->groupBy(function ($indikator) {
                return $indikator->programStudi->name ?? 'Tanpa Program Studi';
            });
    }

    public function array(): array
    {
        $result = [];
        $no = 1;

        foreach ($this->grouped as $programStudi => $indikators) {
            $result[] = [$programStudi];
            foreach ($indikators as $indikator) {
                $targets = collect($indikator->targetRealisasis);
                $row = [];

                $row[] = $no++;
                $row[] = $indikator->sasaran_nama;
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
        // dd($result);
        return $result;
    }


       public function headings(): array
    {
        return [
            [
                'No',
                'Sasaran Kinerja',
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
            1 => ['font' => ['bold' => true]],
            2 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Merge headers
                $sheet->mergeCells('A1:A2'); // No
                $sheet->mergeCells('B1:B2'); // Sasaran Kinerja
                $sheet->mergeCells('C1:C2'); // Indikator
                $sheet->mergeCells('D1:E1'); // TW1
                $sheet->mergeCells('F1:G1'); // TW2
                $sheet->mergeCells('H1:I1'); // TW3
                $sheet->mergeCells('J1:J2'); // Target Akhir
                $sheet->mergeCells('K1:K2'); // Realisasi Akhir

                // Header style
                $sheet->getStyle('A1:K2')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '093D96',
                        ],
                    ],
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center',
                    ],
                ]);

                $lastRow = $this->rowCount + 2; // +2 karena header 2 baris
                $sheet->getStyle("A1:K{$lastRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Style untuk baris program studi
                $currentRow = 3;
                foreach ($this->grouped as $programStudi => $indikators) {
                    // Merge dan style program studi row
                    $sheet->mergeCells("A{$currentRow}:K{$currentRow}");
                    $sheet->setCellValue("A{$currentRow}", $programStudi);
                    $sheet->getStyle("A{$currentRow}")
                        ->applyFromArray([
                            'font' => ['bold' => true],
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => 'EDEDED']
                            ],
                            'alignment' => [
                                'horizontal' => 'left',
                                'vertical' => 'center',
                            ],
                        ]);
                    $currentRow++;

                    // Lewati baris indikator sebanyak jumlah indikator
                    $currentRow += count($indikators);
                }
            }
        ];
    }
}
