<?php

namespace App\Http\Controllers\Web\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Cooperation;
use App\Models\Document;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Event;
use App\Models\SasaranKinerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Achievement;
use App\Exports\IndikatorKinerjaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use App\Models\Page; // Import model Page
use Carbon\Carbon;

class HomeController extends Controller

{


    public function index()
    {
        // Mendapatkan token dari request
        $token = $this->requestToken();

        // Memanggil API untuk mendapatkan data mahasiswa dengan token yang diperoleh
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://sister-api.kemdikbud.go.id/ws.php/1.0/referensi/mahasiswa_pddikti?id_perguruan_tinggi=');

        // Mengambil data JSON dari respons
        $mahasiswa = $response->json();

        // Data untuk dikirimkan ke view 'frontend.home.index'
        $data = [
            'title' => 'Beranda',
            'mahasiswa' => $mahasiswa
        ];

        // Menampilkan tampilan beranda dengan data yang telah ditentukan
        return view('frontend.home.index', $data);
    }

    //Halaman Page/
    public function pageBySlug($slug)
    {
        $page = Page::where(['slug' => $slug, 'is_publish' => true])->first();

        if ($page) {
            return view('frontend.home.pagebyslug', ['page' => $page]);
        } else {
            abort(404);
        }
    }

    public function refreshCsrf()
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }


    // Mengatur data yang akan digunakan dalam tampilan beranda

    // Mengatur data yang akan digunakan dalam tampilan dokumen
    public function document()
    {
        $data = [
            'title' => 'Dokumen',
            'documents' => Document::with(['documentType'])->where('is_publish', true)->get(),
        ];
        // Menampilkan tampilan dokumen dengan data yang telah ditentukan
        return view('frontend.home./dokumen.document', $data);
    }

    //Halaman Detail Event
    public function event($slug)
    {
        // Mencari acara berdasarkan slug yang diberikan
        $event = Event::where(['slug' => $slug, 'is_publish' => true])->first();
        // Jika acara ditemukan
        if ($event) {
            // Mengatur data yang akan digunakan dalam tampilan acara
            $data = [
                'title' => $event->title,
                'event' => $event,
            ];
            // Menampilkan tampilan acara dengan data yang telah ditentukan
            return view('frontend.home.event', $data);
        } else {
            // Jika acara tidak ditemukan, tampilkan halaman error 404
            abort(404);
        }
    }
    // Menampilkan halaman All Event.
    public function allevent()
    {
        $data = [
            'title' => 'All Berita Dan Event Jurusan',
            'events' => Event::where('is_publish', true)->get()
        ];

        return view('frontend.home.all_event', $data);
    }



    // JURUSAN
    // Menampilkan halaman profil jurusan.
    public function profil()
    {
        $data = [
            'title' => 'Profil Jurusan',
        ];

        return view('frontend.home./jurusan.profil', $data);
    }


    // Menampilkan halaman sejarah jurusan.
    public function sejarah()
    {
        $data = [
            'title' => 'Sejarah',
        ];

        return view('frontend.home./jurusan.sejarah', $data);
    }


    // Menampilkan halaman visi dan misi jurusan
    public function visimisi()
    {
        $data = [
            'title' => 'Visi dan Misi',
        ];

        return view('frontend.home./jurusan.visimisi', $data);
    }


    // Menampilkan halaman struktur organisasi jurusan
    public function organisasi()
    {
        $data = [
            'title' => 'Struktur Organisasi',
        ];

        return view('frontend.home./jurusan.organisasi', $data);
    }

    // Menampilkan halaman kerjasama industri
    public function cooperation()
    {
        $data = [
            'title' => 'Kerjasama Industri',
            'cooperations' => Cooperation::with(['cooperationField', 'cooperationType', 'partner'])->where('is_publish', true)->get()
        ];

        return view('frontend.home./jurusan.cooperation', $data);
    }
    // Menampilkan halaman daftar dosen dan staff berdasarkan jenis pegawai.


    //AKADEMIK
    public function trpl()
    {
        $data = [
            'title' => 'D4 Terapan Teknik Rekayasa Perangkat Lunak',
        ];

        return view('frontend.home./akademik.trpl', $data);
    }
    public function trk()
    {
        $data = [
            'title' => 'D4 Terapan Rekayasa Komputer',
        ];

        return view('frontend.home./akademik.trk', $data);
    }
    public function bsd()
    {
        $data = [
            'title' => 'D4 Terapan Bisnis Digital',
        ];

        return view('frontend.home./akademik.bsd', $data);
    }


    public function kalender()
    {
        $data = [
            'title' => 'Kalender Akademik',
        ];

        return view('frontend.home./akademik.kalender', $data);
    }

    public function pedoman()
    {
        $data = [
            'title' => 'Pedoman Akademik',
        ];

        return view('frontend.home./akademik.pedoman', $data);
    }
    public function peraturan()
    {
        $data = [
            'title' => 'Peraturan Akademik',
        ];

        return view('frontend.home./akademik.peraturan', $data);
    }

    public function jalurmasuk()
    {
        $data = [
            'title' => 'Jalur Masuk',
        ];

        return view('frontend.home./akademik.jalurmasuk', $data);
    }

    public function beasiswa()
    {
        $data = [
            'title' => 'Beasiswa',
        ];

        return view('frontend.home./akademik.beasiswa', $data);
    }


    public function biaya()
    {
        $data = [
            'title' => 'Biaya Pendidikan',
        ];

        return view('frontend.home./akademik.biaya', $data);
    }


    //Indikator Kinerja Utama Jurusan

    // public function indikator_kinerja_utama()
    // {
    //     $data = [
    //         'title' => 'Indikator Kinerja Utama',
    //     ];

    //     return view('frontend.home.akademik./indikator-kinerja-utama', $data);
    // }

    public function indikator_kinerja(Request $request, $prodi = null)
    {
        $tahun = $request->tahun ?? Carbon::now()->year;
        $prodi = $prodi ?? $request->prodi;

        $data = $this->getIndikatorData($tahun, $prodi);

        return view('frontend.home.akademik.indikator-kinerja', [
            'title' => 'Indikator Kinerja Utama Jurusan',
            'sasaran_kinerja' => $data,
            'tahun' => $tahun,
            'prodi' => $prodi
        ]);
    }

    public function export_indikator_kinerja($format, Request $request, $prodi = null, $tahun = null)
    {
        $tahun = $tahun ?? $request->get('tahun', date('Y'));
        $prodi = $prodi ?? $request->get('prodi');

        $data = $this->getIndikatorData($tahun, $prodi);
        if ($format === 'excel') {
            return Excel::download(new IndikatorKinerjaExport($data, $tahun, $prodi), 'Indikator Kinerja.xlsx');
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('frontend.home.akademik.partials.export-pdf', compact('data', 'tahun', 'prodi'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Indikator Kinerja.pdf');
        }

        abort(404);
    }


   protected function getIndikatorData($tahun, $prodi)
    {
        $query = SasaranKinerja::with([
            'indikatorKinerjaKegiatans' => function ($q) use ($tahun, $prodi) {
                if ($prodi && $prodi !== 'all') {
                    $q->where('program_studi', $prodi);
                }

                $q->whereHas('targetRealisasis', function ($q2) use ($tahun) {
                    if ($tahun !== 'all') {
                        $q2->where('tahun', $tahun);
                    }
                })->with([
                    'targetRealisasis' => function ($q3) use ($tahun) {
                        if ($tahun !== 'all') {
                            $q3->where('tahun', $tahun);
                        }
                    }
                ]);
            }
        ])
        ->whereHas('indikatorKinerjaKegiatans.targetRealisasis', function ($q) use ($tahun) {
            if ($tahun !== 'all') {
                $q->where('tahun', $tahun);
            }
        });

        return $query->get();
    }







    // Kemahasiswaan
    public function presma(Request $request)
    {
        $showAll = $request->get('show') === 'all';

        $achievements = \App\Models\Achievement::with(['user', 'achievementType', 'achievementLevel', 'achievementProgramStudi'])
            ->when(!$showAll, function ($query) {
                $query->where('is_publish', true);
            })
            ->latest()
            ->get();

        return view('frontend.home./kemahasiswaan.presma', [
            'achievements' => $achievements,
            'show_all' => $showAll,
            'title' => 'Prestasi Mahasiswa',
        ]);
    }






    //Fitur Prestasi
    public function achievement($slug)
    {
        $achievement = Achievement::where(['slug' => $slug, 'is_publish' => true])->first();

        if ($achievement) {
            return view('frontend.home./kemahasiswaan.presma_detail', [
                'title' => $achievement->title,
                'achievement' => $achievement,
            ]);
        } else {
            abort(404);
        }
    }






    public function ormawa()
    {
        $data = [
            'title' => 'Organisasi Kemahasiswaan',
        ];

        return view('frontend.home./kemahasiswaan.ormawa', $data);
    }

    public function kehidupan()
    {
        $data = [
            'title' => 'Kehidupan Kampus',
        ];

        return view('frontend.home./kemahasiswaan.kehidupan', $data);
    }

    public function employee()
    {
        $data = [
            'title' => 'Dosen dan Staff',
            'employees' => EmployeeType::with(['employee'])->get(),
        ];

        return view('frontend.home./jurusan.employee', $data);
    }


    //Detail Staff Dengan Api Publikasi
    public function detailStaff($slug)
    {
        // Ambil data pegawai berdasarkan slug
        $employee = Employee::where('slug', $slug)->firstOrFail();

        // Ambil id_sdm dari tabel employees berdasarkan slug
        $id_sdm = Employee::where('slug', $slug)->value('id_sdm');

        // Memanggil fungsi permintaan token untuk mendapatkan token
        $token = $this->requestToken();

        // Memanggil API dengan token yang diperoleh untuk mendapatkan detail publikasi dosen berdasarkan id_sdm
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://sister-api.kemdikbud.go.id/ws.php/1.0/publikasi?id_sdm=' . $id_sdm);

        $data = $response->json();

        // Persiapkan data untuk tampilan
        $data = [
            'title' => $employee->name,
            'data' => $employee,
            'employees' => EmployeeType::with(['employee'])->get(),
            'publikasi' => $data,
        ];

        // Kembalikan tampilan dengan data yang sudah disiapkan
        return view('frontend.home.jurusan.detail', $data);
    }





    //Request Token Otomaatiss
    private function requestToken()
    {
        $response = Http::post('https://sister-api.kemdikbud.go.id/ws.php/1.0/authorize', [
            'username' => '09YM1FlfP802J4IGwJpiQwpM4iAMiSGNNst06DrjBMcHgTfz2bDt5hRc2yTZPvJ4dwxADm9qXP8GE132sQuydEvMXewUTIMB0grxwMRQkuw',
            'password' => 'rMYLRo2t/tIjZPo11Yw4BvF+zOezlnV1hMhpe2Ox9YrwFh8fBRos10aPkbYALSwFtO1iiMRbmmt6egaumNnesQPHNAn4niWSnwg1dBc4KOMqVD0QD9/dlOtdnynG22Z5',
            'id_pengguna' => '86c7c79e-a1b7-4953-a5cf-9549ffc0b5fb',
        ]);

        $data = $response->json();

        return $data['token'];
    }
}
