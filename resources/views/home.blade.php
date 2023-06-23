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
                    <h4 class="card-title">Beranda</h4>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Jumlah Saldo Keseluruhan</p>
                                                    <h3 class="rate-percentage">Rp. 1.500.000</h3>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Jumlah Pemasukan 1 Bulan Terakhir</p>
                                                    <h3 class="rate-percentage">Rp. 1.500.000</h3>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Jumlah Pemasukan 1 Bulan Terakhir</p>
                                                    <h3 class="rate-percentage">Rp. 1.500.000</h3>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Total Pemasukan</p>
                                                    <h3 class="rate-percentage">213</h3>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Total Pemasukan</p>
                                                    <h3 class="rate-percentage">213</h3>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Jumlah Siswa</p>
                                                    <h3 class="rate-percentage ">{{$usercount}}</h3>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="statistics-title">Profil Sekolah</p>
                                                    <h3 class="rate-percentage">1</h3>
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


</body>
</html>
