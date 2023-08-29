<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- start statistic-card start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green text-white widget-visitor-card">
                                <div class="card-block-small text-center">
                                    <p class="m-b-5">Data Induk</p>
                                    <h4 class="m-b-0"><?php echo $induk;?></h4>
                                    <i class="feather icon-file-text f-50 text-c-yellow"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-blue text-white widget-visitor-card">
                                <div class="card-block-small text-center">
                                    <p class="m-b-5">Data Puskop</p>
                                    <h4 class="m-b-0"><?php echo $pusat;?></h4>
                                    <i class="feather icon-file-text f-50 text-c-yellow"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink text-white widget-visitor-card">
                                <div class="card-block-small text-center">
                                    <p class="m-b-5">Data Primkop</p>
                                    <h4 class="m-b-0"><?php echo $primer;?></h4>
                                    <i class="feather icon-file-text f-50 text-c-yellow"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow text-white widget-visitor-card">
                                <div class="card-block-small text-center">
                                    <p class="m-b-5">Data Anggota</p>
                                    <h4 class="m-b-0"><?php echo $anggota;?></h4>
                                    <i class="feather icon-users f-50 text-c-yellow"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end of statistic-card start -->

                        <!-- grafik suhu start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-left ">
                                        <h5>Suhu Rata-rata </h5>
                                        <span class="text-muted">Info lengkap, silahkan kunjungi <a href="https://www.bmkg.go.id" target="_blank">BMKG</a></span>
                                    </div>
                                </div>
                                <div class="card-block-big">
                                    <div id="monthly-graph" style="height:250px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end of grafik suhu-->
                        <!-- grafik cuaca start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-left ">
                                        <h5>Curah Hujan Rata-rata </h5>
                                        <span class="text-muted">Info lengkap, silahkan kunjungi <a href="https://www.bmkg.go.id" target="_blank">BMKG</a></span>
                                    </div>
                                </div>
                                <div class="card-block-big">
                                    <canvas id="tot-lead" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end of grafik suhu-->

                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->
        <div id="styleSelector">
        </div>
    </div>
</div>