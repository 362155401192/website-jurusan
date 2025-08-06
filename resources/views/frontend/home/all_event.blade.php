@extends('frontend.layouts.app')
@section('content')
    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 class="text-white">Semua Berita Dan Event Jurusan</h1>
                        <p class="lead">Bisnis Dan Infomatika Politeknik Negeri Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->


    <!--testimonial section start-->
    <section class="ptb-80 gray-light-bg">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="section-heading mt-4">
                            <h3>Event Dan Berita</h3>
                        </div>
                        <div class="row justify-content-between mb-4">
                            <div class="col-auto">
                                <div class="input-group">
                                    <span class="input-group-text">Show</span>
                                    <select id="entriesPerPage" class="form-control" onchange="changeEntriesPerPage()">
                                        <option value="6" selected>6</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                    </select>
                                    <span class="input-group-text">entries</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <label for="searchInput" class="input-group-text">Cari</label>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari acara..." onkeyup="searchEvents()">
                                </div>
                            </div>
                        </div>


            <div class="row justify-content-center" id="eventList">
                @foreach (getEvents(9999) as $item)
                    <div class="col-md-6 col-lg-4 event-item">
                        <a class="single-blog-article rounded bg-white border d-block mt-4"
                            href="{{ url('event/' . $item->slug) }}">
                            <div class="blog-img mb-2">
                                <img src="{{ asset('storage/images/events/' .
                                $item->thumbnail) }}"
                                    class="rounded-top img-fluid" alt="blog">
                            </div>
                            <div class="blog-content-wrap p-4">
                                <div class="article-heading">
                                    <h3 class="h5 mb-0 event-title">{{ $item->title }}</h3>
                                    <span>{{ Carbon\Carbon::parse($item->date)->isoFormat(
                                    'dddd, D MMMM Y') }}</span>
                                </div>
                                <span class="border-shape my-3"></span>
                                <p>
                                    {{ substr($item->summary, 0, 100) }}
                                    <span style="color: blue;">... more</span>
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
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
    </section>
    <!--testimonial section end-->

    <script>
        let currentPage = 1; // Menambahkan variabel currentPage untuk melacak halaman saat ini

        function changeEntriesPerPage() {
            const entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);
            const eventItems = document.getElementsByClassName('event-item');

            // Reset all event items to be hidden
            for (let i = 0; i < eventItems.length; i++) {
                eventItems[i].style.display = 'none';
            }

            // Show only the number of items specified by entriesPerPage
            for (let i = 0; i < entriesPerPage && i < eventItems.length; i++) {
                eventItems[i].style.display = '';
            }
        }

        function searchEvents() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const eventItems = document.getElementsByClassName('event-item');
            const entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);

            let displayedCount = 0;

            for (let i = 0; i < eventItems.length; i++) {
                const title = eventItems[i].getElementsByClassName('event-title')[0].textContent.toLowerCase();
                if (title.includes(input)) {
                    if (displayedCount < entriesPerPage) {
                        eventItems[i].style.display = '';
                        displayedCount++;
                    } else {
                        eventItems[i].style.display = 'none';
                    }
                } else {
                    eventItems[i].style.display = 'none';
                }
            }
        }

        function loadPage(page) {
            currentPage = page;
            const entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);
            const eventItems = document.getElementsByClassName('event-item');
            const totalPages = Math.ceil(eventItems.length / entriesPerPage);

            const startNumber = (currentPage - 1) * entriesPerPage;
            let endNumber = startNumber + entriesPerPage;

            for (let i = 0; i < eventItems.length; i++) {
                eventItems[i].style.display = 'none';
            }

            for (let i = startNumber; i < endNumber && i < eventItems.length; i++) {
                eventItems[i].style.display = '';
            }

            updatePagination(totalPages);
        }

        function updatePagination(totalPages) {
            const paginationNumbers = document.getElementById('paginationNumbers');
            paginationNumbers.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.innerHTML = `<a href="#" onclick="loadPage(${i})">${i}</a>`;
                paginationNumbers.appendChild(pageItem);
            }
        }

        function nextPage() {
            const eventItems = document.getElementsByClassName('event-item');
            const entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);
            const totalPages = Math.ceil(eventItems.length / entriesPerPage);

            if (currentPage < totalPages) {
                currentPage++;
                loadPage(currentPage);
            }
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                loadPage(currentPage);
            }
        }

        // Initialize the pagination and entries per page on document ready
        document.addEventListener('DOMContentLoaded', function() {
            changeEntriesPerPage();
            loadPage(1);
        });
    </script>

    <style>
        .blog-img {
            width: 100%;
            height: 200px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
            overflow: hidden; /* Untuk memastikan gambar tidak meluas ke luar kotak */
        }

        .blog-img img {
            width: 100%;
            height: auto;
            object-fit: cover; /* Untuk menjaga aspek rasio gambar */
        }
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
