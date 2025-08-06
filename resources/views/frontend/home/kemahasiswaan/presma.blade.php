@extends('frontend.layouts.app')

@section('content')
<!-- Page header -->
<section class="page-header-section ptb-120 gradient-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center text-white">
                    <h2 class="text-white">Prestasi Mahasiswa Jurusan</h2>
                    <p class="lead">Prestasi Mahasiswa Jurusan Bisnis dan Informatika</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="ptb-80 gray-light-bg">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Filter & Search -->
                    <div class="row justify-content-between mb-4">
                        <div class="col-auto">
                            <div class="input-group">
                                <span class="input-group-text">Show</span>
                                <select id="entriesPerPage" class="form-control" onchange="changeEntriesPerPage()">
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <span class="input-group-text">entries</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-group">
                                <label for="searchInput" class="input-group-text">Cari</label>
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari prestasi..." onkeyup="searchAchievements()">
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Jenis Prestasi</th>
                                    <th>Tingkat</th>
                                    <th>Program Studi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="achievementList">
                                @foreach($achievements as $achievement)
                                <tr class="achievement-item">
                                    <td>
                                        @if($achievement->image)
                                            <img src="{{ asset('storage/images/achievement/' . $achievement->image) }}"
                                                class="img-fluid" style="max-width: 100px;" alt="Achievement Image">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $achievement->title }}</td>
                                    <td>{{ $achievement->nama_mahasiswa ?? '-' }}</td>
                                    <td>{{ $achievement->nim ?? '-' }}</td>
                                    <td>{{ $achievement->achievementType->name ?? '-' }}</td>
                                    <td>{{ $achievement->achievementLevel->name ?? '-' }}</td>
                                    <td>{{ $achievement->achievementProgramStudi->name ?? '-' }}</td>
                                    <td>
                                        <a href="{{ url('presma-detail/' . $achievement->slug) }}" class="btn btn-sm btn-info">Detail</a>
                                        @if(!$achievement->is_publish)
                                            <span class="badge bg-secondary ms-2">Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
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
</section>

<!-- Script -->
<script>
    let currentPage = 1;
    let entriesPerPage = 10;
    let searchResults = [];

    function searchAchievements() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#achievementList tr');
        searchResults = [];

        rows.forEach(row => {
            const title = row.cells[1].textContent.toLowerCase();
            if (title.includes(input)) {
                searchResults.push(row);
            }
        });

        loadPage(1);
    }

    function changeEntriesPerPage() {
        entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);
        loadPage(1);
    }

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
        const rows = searchResults.length ? searchResults : Array.from(document.querySelectorAll('#achievementList tr'));
        const totalPages = Math.ceil(rows.length / entriesPerPage);

        // Hide all
        document.querySelectorAll('#achievementList tr').forEach(row => row.style.display = 'none');

        // Show current page
        const start = (page - 1) * entriesPerPage;
        const end = start + entriesPerPage;
        rows.slice(start, end).forEach(row => row.style.display = '');

        // Pagination UI
        const paginationNumbers = document.getElementById('paginationNumbers');
        paginationNumbers.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            const link = document.createElement('a');
            link.textContent = i;
            link.href = "#";
            link.onclick = () => loadPage(i);
            if (i === currentPage) link.className = 'active';
            li.appendChild(link);
            paginationNumbers.appendChild(li);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        loadPage(1);
    });
</script>

<!-- Style -->
<style>
    .pagination-container {
        display: flex;
        justify-content: center;
    }
    .pagination.modal-4 li {
        display: inline-block;
    }
    .pagination.modal-4 a {
        margin: 0 5px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 100%;
        background-color: #007bff;
        color: white;
        display: inline-block;
        text-align: center;
    }
    .pagination.modal-4 a:hover {
        background-color: #0056b3;
    }
    .pagination.modal-4 a.active {
        background-color: #004080;
    }
    .pagination.modal-4 a.prev, .pagination.modal-4 a.next {
        width: 100px;
        border-radius: 50px;
    }
</style>
@endsection
