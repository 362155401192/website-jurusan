@extends('frontend.layouts.app')

@section('content')

<section class="page-header-section ptb-80 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Profil Dosen</h2>
                    <p class="lead">Jurusan Bisnis Dan Infomatika Politeknik Negeri Banyuwangi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    td {
        padding: 10px; /* Atur jarak dalam td */
    }
</style>

<section class="our-partner-section ptb-60 dark-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-body">
                        <div class="row"> <!-- Tambahkan baris untuk mengelompokkan gambar dan tabel -->
                            <div class="col-md-2 text-center"> <!-- Kolom untuk gambar -->
                                <div class="container">
                                    <img src="{{ asset('storage/images/employees/' . $data->image) }}" style="width: 150px; border-radius: 10px;">
                                </div>
                            </div>

                            <div class="col-md-10"> <!-- Kolom untuk tabel -->
                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="mt-2">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Nama</strong></td>
                                                    <td>: {{ $data->name }}</td>
                                                    <td><strong>Jabatan</strong></td>
                                                    <td>: {{ $data->employeeType->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td>: {{ $data->email }}</td>
                                                    <td><strong>Jenis Kelamin</strong></td>
                                                    <td colspan="3">
                                                        @if($data->gender == 'male')
                                                            : Laki-laki
                                                        @elseif($data->gender == 'female')
                                                            : Perempuan
                                                        @else
                                                            : Jenis Kelamin Tidak Diketahui
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><Strong>Program Studi</Strong></td>
                                                    <td>: {{ $data->employeeProgramStudi->name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tambahkan tabel publikasi di sini -->
                        <div class="row justify-content-between mt-5">
                            <div class="col-md-2 d-flex align-items-center justify-content-end">
                                <label for="recordsPerPage" class="mr-2">Tampil:</label>
                                <select id="recordsPerPage" class="form-control form-control-sm ml-auto">
                                    <option value="5">5</option>
                                    <option value="15">10</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-start">
                                <label for="searchInput" class="mr-2">Cari:</label>
                                <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><strong>No</strong></th>
                                                <th><strong>Publikasi</strong></th>
                                                <th><strong>Jenis Publikasi</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($publikasi as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['judul'] }}</td>
                                                <td>{{ $item['jenis_publikasi'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination buttons -->
                        <div class="row mt-3">
                            <div class="col-md-12 text-center pagination-container">
                                <ul class="pagination modal-4">
                                    <li><a href="#" class="prev" onclick="previousPage()">
                                        <i class="fa fa-chevron-left"></i> Previous
                                    </a></li>
                                    <span id="paginationNumbers"></span>
                                    <li><a href="#" class="next" onclick="nextPage()">
                                        Next <i class="fa fa-chevron-right"></i>
                                    </a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentPage = 1;
    let entriesPerPage = 10; // Jumlah entri per halaman diatur ke 10
    let searchResults = [];

    function searchEmployees() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const publicationItems = document.querySelectorAll('.table tbody tr');
        searchResults = []; // Reset hasil pencarian

        // Sembunyikan semua baris sebelum melakukan pencarian
        publicationItems.forEach(item => {
            item.style.display = 'none';
        });

        // Tampilkan baris yang cocok dengan pencarian
        publicationItems.forEach(item => {
            const title = item.cells[1].textContent.toLowerCase();
            if (title.includes(input)) {
                searchResults.push(item);
                item.style.display = ''; // Tampilkan baris yang cocok
            }
        });

        loadPage(1); // Muat ulang halaman dengan hasil pencarian
    }

    document.getElementById('searchInput').addEventListener('keyup', searchEmployees); // Pastikan event listener terpasang

    function changeEntriesPerPage() {
        entriesPerPage = parseInt(document.getElementById('recordsPerPage').value);
        loadPage(1); // Muat ulang halaman pertama dengan jumlah entri baru
    }

    document.getElementById('recordsPerPage').addEventListener('change', changeEntriesPerPage);

    function previousPage() {
        if (currentPage > 1) {
            currentPage--;
            loadPage(currentPage);
        }
    }

    function nextPage() {
        currentPage++;
        loadPage(currentPage);
    }

    function loadPage(page) {
        currentPage = page;
        entriesPerPage = parseInt(document.getElementById('recordsPerPage').value);
        const listItems = searchResults.length > 0 ? searchResults : document.querySelectorAll('.table tbody tr');
        const totalPages = Math.ceil(listItems.length / entriesPerPage);

        const startNumber = (currentPage - 1) * entriesPerPage;
        let endNumber = startNumber + entriesPerPage;

        document.querySelectorAll('.table tbody tr').forEach(item => {
            item.style.display = 'none';
        });

        for (let i = startNumber; i < endNumber && i < listItems.length; i++) {
            listItems[i].style.display = '';
            listItems[i].cells[0].textContent = i + 1;
        }

        const paginationNumbers = document.getElementById('paginationNumbers');
        paginationNumbers.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const pageNumberElement = document.createElement('li');
            const link = document.createElement('a');
            link.textContent = i;
            link.href = "#";
            link.onclick = function() { loadPage(i); };
            pageNumberElement.appendChild(link);
            if (i === currentPage) {
                link.className = 'active';
            }
            paginationNumbers.appendChild(pageNumberElement);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadPage(1); // Memuat halaman pertama dengan 10 entri
    });

</script>

<style>
    .pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Sesuaikan dengan margin yang diinginkan */
}

.pagination.modal-4 {
    display: flex;
    justify-content: center;
    list-style-type: none; /* Hilangkan bullet points default */
    padding: 0; /* Hilangkan padding default */
}

.pagination.modal-4 li {
    display: inline-block;
}

.pagination.modal-4 a {
    margin: 0 5px;
    padding: 0;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 100%;
    background-color: #007bff;
    color: white;
    display: inline-block;
    text-align: center;
    text-decoration: none; /* Hilangkan dekorasi tautan */
}

.pagination.modal-4 a:hover {
    background-color: #0056b3;
}

.pagination.modal-4 a.active {
    background-color: #004080;
}

.pagination.modal-4 a.prev,
.pagination.modal-4 a.next {
    width: 100px;
    border-radius: 50px;
}

</style>

@endsection
