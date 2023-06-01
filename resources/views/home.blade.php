<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beranda - SITASU</title>

    @include('layouts.head')

</head>

<body>
    <div class="container-scroller">
        <!-- Navigation Bar -->
        @include('layouts.navbar')

        <!-- Content Main -->
        <div class="container-fluid page-body-wrapper">
            @include('layouts.color')

            <!-- Side Bar -->
            @include('layouts.sidebar')

            <!-- Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Beranda</h4>
                                    <div class="row container">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Jumlah Pemasukan</p>
                                                    <h3 class="rate-percentage">Rp. 1.500.000</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">Jumlah Pengeluaran</p>
                                                    <h3 class="rate-percentage">Rp. 1.999.000</h3>
                                                </div>
                                                <div>
                                                    <p class="statistics-title">Total Saldo</p>
                                                    <h3 class="rate-percentage">Rp. 3.230.000</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <p class="statistics-title">Data Siswa</p>
                                                    <h3 class="rate-percentage">156</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <p class="statistics-title">Data Kelas</p>
                                                    <h3 class="rate-percentage">10</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- End Content Main -->
    </div>

        <!-- Script -->
        @include('layouts.script')

        <script>
            Swal.fire('Any fool can use a computer')
        </script>
</body>
</html>
