@extends('frontend.layouts.app')

@section('content')
    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 class="text-white">Dosen dan Staff</h1>
                        <p class="lead">Dosen dan Staff Jurusan Teknik Informatika Politeknik Negeri Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <section class="ptb-80 gray-light-bg">
        <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="section-heading mt-4">
                                <h3>Daftar Staf</h3>
                            </div>

                            <div class="row justify-content-between mb-4">

                                <div class="col-md-2 d-flex align-items-center justify-content-end">
                                    <label for="recordsPerPage" class="mr-2">Tampil:</label>
                                    <select id="recordsPerPage" class="form-control form-control-sm ml-auto">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-start">
                                    <label for="searchInput" class="mr-2">Cari:</label>
                                    <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="employeeTable" class="table">
                                        <thead>
                                            <tr>
                                                <th><strong>No</strong></th>
                                                <th><strong>Foto</strong></th>
                                                <th><strong>Nama</strong></th>
                                                <th><strong>Program Studi</strong></th>
                                                <th><strong>Staff</strong></th>
                                                <th><strong></strong></th>
                                            </tr>
                                        </thead>

                                        <tbody id="employeeTableBody">
                                            @php $counter = 1 @endphp
                                            @foreach ($employees as $item)
                                                @if ($item->employee->count() > 0)
                                                    @foreach ($item->employee as $employee)
                                                        <tr>
                                                            <td>{{ $counter }}</td>
                                                            <td>
                                                                <img src="{{ asset('storage/images/employees/' . $employee->image) }}"
                                                                alt="foto staf" class="img-fluid"
                                                                style="width: 30px; border-radius: 20px;">
                                                            </td>
                                                            <td>{{ $employee->name }} <br>Status :
                                                                {{ $employee->employeeStatus->name }} </td>
                                                            <td>{{ $employee->employeeProgramStudi->name }}</td>
                                                            <td>{{ $employee->employeeType->name }}</td>
                                                            <td>
                                                                <a href="{{ url('detail-staff/' . $employee->slug) }}"
                                                                class="btn btn-brand-03 btn-sm">Detail</a>
                                                            </td>
                                                        </tr>
                                                        @php $counter++ @endphp
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
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
                            <!-- Pagination buttons end -->
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
            const employeeItems = document.querySelectorAll('#employeeTableBody tr');
            searchResults = []; // Reset hasil pencarian

            console.log("Input Pencarian:", input); // Debugging input

            // Sembunyikan semua baris sebelum melakukan pencarian
            employeeItems.forEach(item => {
                item.style.display = 'none';
            });

            // Tampilkan baris yang cocok dengan pencarian
            employeeItems.forEach(item => {
                const name = item.cells[2].textContent.toLowerCase();
                console.log("Nama di Baris:", name); // Debugging nama yang diambil dari baris

                if (name.includes(input)) {
                    searchResults.push(item);
                    item.style.display = ''; // Tampilkan baris yang cocok
                }
            });

            console.log("Hasil Pencarian:", searchResults.length); // Debugging jumlah hasil pencarian

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
            const listItems = searchResults.length > 0 ? searchResults : document.querySelectorAll('#employeeTableBody tr');
            const totalPages = Math.ceil(listItems.length / entriesPerPage);

            const startNumber = (currentPage - 1) * entriesPerPage;
            let endNumber = startNumber + entriesPerPage;

            document.querySelectorAll('#employeeTableBody tr').forEach(item => {
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
            justify-content: center; /* Memusatkan konten secara horizontal */
        }

        .pagination.modal-4 li {
            display: inline-block; /* Memastikan bahwa <li> ditampilkan secara inline-block */
        }

        .pagination.modal-4 a {
            margin: 0 5px;
            padding: 0;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 100%;
            background-color: #007bff; /* Warna biru primary */
            color: white;
            display: inline-block;
            text-align: center;
        }
        .pagination.modal-4 a:hover {
            background-color: #0056b3; /* Warna biru yang lebih gelap untuk hover */
        }
        .pagination.modal-4 a.active {
            background-color: #004080; /* Warna biru yang lebih gelap untuk aktif */
        }
        .pagination.modal-4 a.prev, .pagination.modal-4 a.next {
            width: 100px;
            border-radius: 50px;
        }
    </style>
@endsection
