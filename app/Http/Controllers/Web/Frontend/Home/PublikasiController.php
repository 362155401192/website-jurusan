<?php

namespace App\Http\Controllers\Web\Frontend\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class PublikasiController extends Controller
{

    public function publikasijurusan()
{
    $data = [
        'title' => 'Publikasi Jurusan',
    ];

    // Daftar ID SDM spesifik
    $id_sdm_dosen = [
            'd8722444-05af-459f-838d-6d905af81770',
            'cf7bb033-168b-4507-8c5d-7dacc57d5b73',
            'c06c52e8-2d24-4417-898d-1b43fe7eb08f',
            '19c4ad0b-7e36-49ab-9d15-0c6d85134b6f',
            '0475fc50-9240-4689-8cac-9598a689ed49',
            '12c99923-e00e-48f2-869a-da35dd29123c',
            '8a873502-fa06-4e31-a697-6de9906a0fc1',
            '0e60a0f1-d57c-4a95-8b6f-323f78edb607',
            'a8e1bc04-962f-4788-9651-bf573039e3f2',
            'a5508e4a-7c84-4030-930a-e0026a484ba9',
            'bb5e6c12-4fee-42ff-a323-0d2d47a55f1a',
            '518473dd-8bba-4519-bb53-8422f2de6e8f',
            '86ca7be5-6aa7-4c13-b195-14670f3db7f3',
            '6ea6b6c8-4b6b-4d76-8cf4-45e557cada6f',
            '29c162a6-2eb9-4a3e-a398-5960b765e786',
            'd2d07dff-8838-489f-9c2e-b9909717280',
            '269ecb19-0475-414f-ab68-dce1abd719f9',
            '51721c9b-fe38-468f-a496-4ae9280b1bd5',
            '5a386c83-63f5-46a2-8bca-0b94104b0324',
            'cb4b79bc-162e-4ead-b339-4d35288cf37a',
            '04cd36ec-14eb-42af-8cdb-339f4d24737e',
            'cff56fc8-6bd0-47fb-b8b1-6eda97249966',
            '411b2d24-24ad-4968-9caf-fb8a51656956',
            'fa32bd47-822a-494f-85a1-44413ecb3b11',
    ];

    // List untuk menyimpan seluruh publikasi, penelitian, dan pengabdian
    $allPublications = [];
    $allResearches = [];
    $allCommunityServices = [];

    // Mendapatkan token
    $token = $this->requestToken();

    foreach ($id_sdm_dosen as $id_sdm) {
        $publications = $this->getPublicationsByIdSdm($id_sdm, $token);
        if (is_array($publications)) {
            $allPublications = array_merge($allPublications, $publications);
        }

        $researches = $this->getResearchesByIdSdm($id_sdm, $token);
        if (is_array($researches)) {
            $allResearches = array_merge($allResearches, $researches);
        }

        $communityServices = $this->getCommunityServicesByIdSdm($id_sdm, $token);
        if (is_array($communityServices)) {
            $allCommunityServices = array_merge($allCommunityServices, $communityServices);
        }
    }

    // Menghitung total publikasi, penelitian, dan pengabdian
    $totalPublications = count($allPublications);
    $totalResearches = count($allResearches);
    $totalCommunityServices = count($allCommunityServices);

    // Tahun batas bawah dan atas
    $startYear = 2017;
    $endYear = 2024;

    // Mengelompokkan publikasi berdasarkan tahun dengan filter
    $publicationCountsByYear = [];
    foreach ($allPublications as $publication) {
        $year = date('Y', strtotime($publication['tanggal']));
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($publicationCountsByYear[$year])) {
                $publicationCountsByYear[$year] = 0;
            }
            $publicationCountsByYear[$year]++;
        }
    }

    // Mengelompokkan penelitian berdasarkan tahun dengan filter
    $researchCountsByYear = [];
    foreach ($allResearches as $research) {
        $year = $research['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($researchCountsByYear[$year])) {
                $researchCountsByYear[$year] = 0;
            }
            $researchCountsByYear[$year]++;
        }
    }

    // Mengelompokkan pengabdian berdasarkan tahun dengan filter
    $communityServiceCountsByYear = [];
    foreach ($allCommunityServices as $service) {
        $year = $service['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($communityServiceCountsByYear[$year])) {
                $communityServiceCountsByYear[$year] = 0;
            }
            $communityServiceCountsByYear[$year]++;
        }
    }

    // Pastikan array diurutkan berdasarkan tahun
    ksort($publicationCountsByYear);
    ksort($researchCountsByYear);
    ksort($communityServiceCountsByYear);

    // Membuat chart menggunakan LaraPexCharts
    $chart = (new LarapexChart)
    ->lineChart()
    ->setTitle('Grafik Publikasi, Penelitian Dan Pengabdian Jurusan Bisnis dan Informatika')
    ->setXAxis(array_keys($publicationCountsByYear))
    ->addLine('Publikasi', array_values($publicationCountsByYear))
    ->addLine('Penelitian', array_values($researchCountsByYear))
    ->addLine('Pengabdian', array_values($communityServiceCountsByYear));


    // Menyusun data untuk view
    $data['chart'] = $chart;
    $data['publicationData'] = $publicationCountsByYear;
    $data['researchData'] = $researchCountsByYear;
    $data['communityServiceData'] = $communityServiceCountsByYear;
    $data['publikasi'] = $allPublications;
    $data['totalPublications'] = $totalPublications;
    $data['totalResearches'] = $totalResearches;
    $data['totalCommunityServices'] = $totalCommunityServices;

    return view('frontend.home.jurusan.publikasi_jurusan', $data);
}


public function publikasiproditrpl()
{
    $data = [
        'title' => 'Publikasi Prodi Teknologi Rekayasa Perangkat Lunak',
    ];

    // Daftar ID SDM spesifik
    $id_sdm_dosen = [
        'd8722444-05af-459f-838d-6d905af81770',
        'cf7bb033-168b-4507-8c5d-7dacc57d5b73',
        'c06c52e8-2d24-4417-898d-1b43fe7eb08f',
        '19c4ad0b-7e36-49ab-9d15-0c6d85134b6f',
        '0475fc50-9240-4689-8cac-9598a689ed49',
        '12c99923-e00e-48f2-869a-da35dd29123c',
        '8a873502-fa06-4e31-a697-6de9906a0fc1',
        '0e60a0f1-d57c-4a95-8b6f-323f78edb607',
        'a8e1bc04-962f-4788-9651-bf573039e3f2',
        'a5508e4a-7c84-4030-930a-e0026a484ba9',
        'bb5e6c12-4fee-42ff-a323-0d2d47a55f1a',
        '518473dd-8bba-4519-bb53-8422f2de6e8f',
        '86ca7be5-6aa7-4c13-b195-14670f3db7f3',
        '6ea6b6c8-4b6b-4d76-8cf4-45e557cada6f',
        '29c162a6-2eb9-4a3e-a398-5960b765e786',
        'd2d07dff-8838-489f-9c2e-b9909717280',
        '269ecb19-0475-414f-ab68-dce1abd719f9',
        '51721c9b-fe38-468f-a496-4ae9280b1bd5',
        '5a386c83-63f5-46a2-8bca-0b94104b0324',
        'cb4b79bc-162e-4ead-b339-4d35288cf37a',
        '04cd36ec-14eb-42af-8cdb-339f4d24737e',
    ];

    // List untuk menyimpan seluruh publikasi, penelitian, dan pengabdian
    $allPublications = [];
    $allResearches = [];
    $allCommunityServices = [];

    // Mendapatkan token
    $token = $this->requestToken();

    foreach ($id_sdm_dosen as $id_sdm) {
        $publications = $this->getPublicationsByIdSdm($id_sdm, $token);
        if (is_array($publications)) {
            $allPublications = array_merge($allPublications, $publications);
        }

        $researches = $this->getResearchesByIdSdm($id_sdm, $token);
        if (is_array($researches)) {
            $allResearches = array_merge($allResearches, $researches);
        }

        $communityServices = $this->getCommunityServicesByIdSdm($id_sdm, $token);
        if (is_array($communityServices)) {
            $allCommunityServices = array_merge($allCommunityServices, $communityServices);
        }
    }

    // Menghitung total publikasi, penelitian, dan pengabdian
    $totalPublications = count($allPublications);
    $totalResearches = count($allResearches);
    $totalCommunityServices = count($allCommunityServices);

    // Tahun batas bawah dan atas
    $startYear = 2017;
    $endYear = 2024;

    // Mengelompokkan publikasi berdasarkan tahun dengan filter
    $publicationCountsByYear = [];
    foreach ($allPublications as $publication) {
        $year = date('Y', strtotime($publication['tanggal']));
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($publicationCountsByYear[$year])) {
                $publicationCountsByYear[$year] = 0;
            }
            $publicationCountsByYear[$year]++;
        }
    }

    // Mengelompokkan penelitian berdasarkan tahun dengan filter
    $researchCountsByYear = [];
    foreach ($allResearches as $research) {
        $year = $research['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($researchCountsByYear[$year])) {
                $researchCountsByYear[$year] = 0;
            }
            $researchCountsByYear[$year]++;
        }
    }

    // Mengelompokkan pengabdian berdasarkan tahun dengan filter
    $communityServiceCountsByYear = [];
    foreach ($allCommunityServices as $service) {
        $year = $service['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($communityServiceCountsByYear[$year])) {
                $communityServiceCountsByYear[$year] = 0;
            }
            $communityServiceCountsByYear[$year]++;
        }
    }

    // Pastikan array diurutkan berdasarkan tahun
    ksort($publicationCountsByYear);
    ksort($researchCountsByYear);
    ksort($communityServiceCountsByYear);

    // Membuat chart menggunakan LaraPexCharts
    $chart = (new LarapexChart)
    ->lineChart()
    ->setTitle('Grafik Publikasi, Penelitian Dan Pengabdian Jurusan Bisnis dan Informatika')
    ->setXAxis(array_keys($publicationCountsByYear))
    ->addLine('Publikasi', array_values($publicationCountsByYear))
    ->addLine('Penelitian', array_values($researchCountsByYear))
    ->addLine('Pengabdian', array_values($communityServiceCountsByYear));


    // Menyusun data untuk view
    $data['chart'] = $chart;
    $data['publicationData'] = $publicationCountsByYear;
    $data['researchData'] = $researchCountsByYear;
    $data['communityServiceData'] = $communityServiceCountsByYear;
    $data['publikasi'] = $allPublications;
    $data['totalPublications'] = $totalPublications;
    $data['totalResearches'] = $totalResearches;
    $data['totalCommunityServices'] = $totalCommunityServices;

    return view('frontend.home.jurusan.publikasi_prodi_trpl', $data);
}

public function publikasiproditrk()
{
    $data = [
        'title' => 'Publikasi Prodi Teknologi Rekayasa Komputer',
    ];

    // Daftar ID SDM spesifik
    $id_sdm_dosen = [
        'd8722444-05af-459f-838d-6d905af81770',
        'cf7bb033-168b-4507-8c5d-7dacc57d5b73',
        'c06c52e8-2d24-4417-898d-1b43fe7eb08f',
        '19c4ad0b-7e36-49ab-9d15-0c6d85134b6f',
        '0475fc50-9240-4689-8cac-9598a689ed49',
        '12c99923-e00e-48f2-869a-da35dd29123c',
        '8a873502-fa06-4e31-a697-6de9906a0fc1',
        '0e60a0f1-d57c-4a95-8b6f-323f78edb607',
        'a8e1bc04-962f-4788-9651-bf573039e3f2',
        'a5508e4a-7c84-4030-930a-e0026a484ba9',
        'bb5e6c12-4fee-42ff-a323-0d2d47a55f1a',
        '518473dd-8bba-4519-bb53-8422f2de6e8f',
        '86ca7be5-6aa7-4c13-b195-14670f3db7f3',
        '6ea6b6c8-4b6b-4d76-8cf4-45e557cada6f',
        '29c162a6-2eb9-4a3e-a398-5960b765e786',
        'd2d07dff-8838-489f-9c2e-b9909717280',
        '269ecb19-0475-414f-ab68-dce1abd719f9',
        '51721c9b-fe38-468f-a496-4ae9280b1bd5',
        '5a386c83-63f5-46a2-8bca-0b94104b0324',
        'cb4b79bc-162e-4ead-b339-4d35288cf37a',
    ];

    // List untuk menyimpan seluruh publikasi, penelitian, dan pengabdian
    $allPublications = [];
    $allResearches = [];
    $allCommunityServices = [];

    // Mendapatkan token
    $token = $this->requestToken();

    foreach ($id_sdm_dosen as $id_sdm) {
        $publications = $this->getPublicationsByIdSdm($id_sdm, $token);
        if (is_array($publications)) {
            $allPublications = array_merge($allPublications, $publications);
        }

        $researches = $this->getResearchesByIdSdm($id_sdm, $token);
        if (is_array($researches)) {
            $allResearches = array_merge($allResearches, $researches);
        }

        $communityServices = $this->getCommunityServicesByIdSdm($id_sdm, $token);
        if (is_array($communityServices)) {
            $allCommunityServices = array_merge($allCommunityServices, $communityServices);
        }
    }

    // Menghitung total publikasi, penelitian, dan pengabdian
    $totalPublications = count($allPublications);
    $totalResearches = count($allResearches);
    $totalCommunityServices = count($allCommunityServices);

    // Tahun batas bawah dan atas
    $startYear = 2017;
    $endYear = 2024;

    // Mengelompokkan publikasi berdasarkan tahun dengan filter
    $publicationCountsByYear = [];
    foreach ($allPublications as $publication) {
        $year = date('Y', strtotime($publication['tanggal']));
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($publicationCountsByYear[$year])) {
                $publicationCountsByYear[$year] = 0;
            }
            $publicationCountsByYear[$year]++;
        }
    }

    // Mengelompokkan penelitian berdasarkan tahun dengan filter
    $researchCountsByYear = [];
    foreach ($allResearches as $research) {
        $year = $research['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($researchCountsByYear[$year])) {
                $researchCountsByYear[$year] = 0;
            }
            $researchCountsByYear[$year]++;
        }
    }

    // Mengelompokkan pengabdian berdasarkan tahun dengan filter
    $communityServiceCountsByYear = [];
    foreach ($allCommunityServices as $service) {
        $year = $service['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($communityServiceCountsByYear[$year])) {
                $communityServiceCountsByYear[$year] = 0;
            }
            $communityServiceCountsByYear[$year]++;
        }
    }

    // Pastikan array diurutkan berdasarkan tahun
    ksort($publicationCountsByYear);
    ksort($researchCountsByYear);
    ksort($communityServiceCountsByYear);

    // Membuat chart menggunakan LaraPexCharts
    $chart = (new LarapexChart)
    ->lineChart()
    ->setTitle('Grafik Publikasi, Penelitian Dan Pengabdian Jurusan Bisnis dan Informatika')
    ->setXAxis(array_keys($publicationCountsByYear))
    ->addLine('Publikasi', array_values($publicationCountsByYear))
    ->addLine('Penelitian', array_values($researchCountsByYear))
    ->addLine('Pengabdian', array_values($communityServiceCountsByYear));


    // Menyusun data untuk view
    $data['chart'] = $chart;
    $data['publicationData'] = $publicationCountsByYear;
    $data['researchData'] = $researchCountsByYear;
    $data['communityServiceData'] = $communityServiceCountsByYear;
    $data['publikasi'] = $allPublications;
    $data['totalPublications'] = $totalPublications;
    $data['totalResearches'] = $totalResearches;
    $data['totalCommunityServices'] = $totalCommunityServices;

    return view('frontend.home.jurusan.publikasi_prodi_trk', $data);
}

public function publikasiprodibsd()
{
    $data = [
        'title' => 'Publikasi Prodi Bisnis Digital',
    ];

    // Daftar ID SDM spesifik
    $id_sdm_dosen = [
        'd8722444-05af-459f-838d-6d905af81770',
        'cf7bb033-168b-4507-8c5d-7dacc57d5b73',
        'c06c52e8-2d24-4417-898d-1b43fe7eb08f',
        '19c4ad0b-7e36-49ab-9d15-0c6d85134b6f',
        '0475fc50-9240-4689-8cac-9598a689ed49',
        '12c99923-e00e-48f2-869a-da35dd29123c',
        '8a873502-fa06-4e31-a697-6de9906a0fc1',
        '0e60a0f1-d57c-4a95-8b6f-323f78edb607',
        'a8e1bc04-962f-4788-9651-bf573039e3f2',
        'a5508e4a-7c84-4030-930a-e0026a484ba9',
        'bb5e6c12-4fee-42ff-a323-0d2d47a55f1a',
        '518473dd-8bba-4519-bb53-8422f2de6e8f',
        '86ca7be5-6aa7-4c13-b195-14670f3db7f3',
        '6ea6b6c8-4b6b-4d76-8cf4-45e557cada6f',
        '29c162a6-2eb9-4a3e-a398-5960b765e786',
        'd2d07dff-8838-489f-9c2e-b9909717280',
        '269ecb19-0475-414f-ab68-dce1abd719f9',
        '51721c9b-fe38-468f-a496-4ae9280b1bd5',
        '5a386c83-63f5-46a2-8bca-0b94104b0324',

    ];

    // List untuk menyimpan seluruh publikasi, penelitian, dan pengabdian
    $allPublications = [];
    $allResearches = [];
    $allCommunityServices = [];

    // Mendapatkan token
    $token = $this->requestToken();

    foreach ($id_sdm_dosen as $id_sdm) {
        $publications = $this->getPublicationsByIdSdm($id_sdm, $token);
        if (is_array($publications)) {
            $allPublications = array_merge($allPublications, $publications);
        }

        $researches = $this->getResearchesByIdSdm($id_sdm, $token);
        if (is_array($researches)) {
            $allResearches = array_merge($allResearches, $researches);
        }

        $communityServices = $this->getCommunityServicesByIdSdm($id_sdm, $token);
        if (is_array($communityServices)) {
            $allCommunityServices = array_merge($allCommunityServices, $communityServices);
        }
    }

    // Menghitung total publikasi, penelitian, dan pengabdian
    $totalPublications = count($allPublications);
    $totalResearches = count($allResearches);
    $totalCommunityServices = count($allCommunityServices);

    // Tahun batas bawah dan atas
    $startYear = 2017;
    $endYear = 2024;

    // Mengelompokkan publikasi berdasarkan tahun dengan filter
    $publicationCountsByYear = [];
    foreach ($allPublications as $publication) {
        $year = date('Y', strtotime($publication['tanggal']));
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($publicationCountsByYear[$year])) {
                $publicationCountsByYear[$year] = 0;
            }
            $publicationCountsByYear[$year]++;
        }
    }

    // Mengelompokkan penelitian berdasarkan tahun dengan filter
    $researchCountsByYear = [];
    foreach ($allResearches as $research) {
        $year = $research['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($researchCountsByYear[$year])) {
                $researchCountsByYear[$year] = 0;
            }
            $researchCountsByYear[$year]++;
        }
    }

    // Mengelompokkan pengabdian berdasarkan tahun dengan filter
    $communityServiceCountsByYear = [];
    foreach ($allCommunityServices as $service) {
        $year = $service['tahun_pelaksanaan'];
        if ($year >= $startYear && $year <= $endYear) {
            if (!isset($communityServiceCountsByYear[$year])) {
                $communityServiceCountsByYear[$year] = 0;
            }
            $communityServiceCountsByYear[$year]++;
        }
    }

    // Pastikan array diurutkan berdasarkan tahun
    ksort($publicationCountsByYear);
    ksort($researchCountsByYear);
    ksort($communityServiceCountsByYear);

    // Membuat chart menggunakan LaraPexCharts
    $chart = (new LarapexChart)
    ->lineChart()
    ->setTitle('Grafik Publikasi, Penelitian Dan Pengabdian Jurusan Bisnis dan Informatika')
    ->setXAxis(array_keys($publicationCountsByYear))
    ->addLine('Publikasi', array_values($publicationCountsByYear))
    ->addLine('Penelitian', array_values($researchCountsByYear))
    ->addLine('Pengabdian', array_values($communityServiceCountsByYear));


    // Menyusun data untuk view
    $data['chart'] = $chart;
    $data['publicationData'] = $publicationCountsByYear;
    $data['researchData'] = $researchCountsByYear;
    $data['communityServiceData'] = $communityServiceCountsByYear;
    $data['publikasi'] = $allPublications;
    $data['totalPublications'] = $totalPublications;
    $data['totalResearches'] = $totalResearches;
    $data['totalCommunityServices'] = $totalCommunityServices;

    return view('frontend.home.jurusan.publikasi_prodi_bsd', $data);
}

    // Mendapatkan publikasi berdasarkan id_sdm
    private function getPublicationsByIdSdm($id_sdm, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://sister-api.kemdikbud.go.id/ws.php/1.0/publikasi?id_sdm=' . $id_sdm);

        if ($response->successful()) {
            return $response->json();
        } else {
            // Log error atau lakukan penanganan sesuai kebutuhan
            return [];
        }
    }

    // Mendapatkan penelitian berdasarkan id_sdm
    private function getResearchesByIdSdm($id_sdm, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://sister-api.kemdikbud.go.id/ws.php/1.0/penelitian?id_sdm=' . $id_sdm);

        if ($response->successful()) {
            return $response->json();
        } else {
            // Log error atau lakukan penanganan sesuai kebutuhan
            return [];
        }
    }

    // Mendapatkan pengabdian berdasarkan id_sdm
    private function getCommunityServicesByIdSdm($id_sdm, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://sister-api.kemdikbud.go.id/ws.php/1.0/pengabdian?id_sdm=' . $id_sdm);

        if ($response->successful()) {
            return $response->json();
        } else {
            // Log error atau lakukan penanganan sesuai kebutuhan
            return [];
        }
    }



    //Request Token Otomaatiss
    private function requestToken() {
        $response = Http::post('https://sister-api.kemdikbud.go.id/ws.php/1.0/authorize', [
            'username' => 'D4nD/ElznKfrIzXF/F/zOoWaMILDjdMXZ2dvlDHuHC8=',
            'password' => '/NZ0ZOppg7ghIJtx4rUhUgN2F+j59m3qPdqYq+vvTdQLrK48h/G2izl+Kw5Wza9O',
            'id_pengguna' => '86c7c79e-a1b7-4953-a5cf-9549ffc0b5fb',
        ]);

        $data = $response->json();

        return $data['token'];
    }

}

