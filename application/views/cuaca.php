<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Sidebar Fixed</h4>
                                    <span>More than 100+ widget</span>
                                    <h3>
                                        <?php
                                            //foreach ($data as $namadata) {
                                                echo "<pre>";
                                                print_r($data);
                                                echo "</pre>";
                                            //}
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index-1.htm">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        
                                        <!-- <a href="#!"><?php echo $wilayah->description;?></a> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- statustic-card start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">New Customer</p>
                                            <h4 class="m-b-0">852</h4>
                                        </div>
                                        <div class="col col-auto text-right">
                                            <i class="feather icon-user f-50 text-c-yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Income</p>
                                            <h4 class="m-b-0">$5,852</h4>
                                        </div>
                                        <div class="col col-auto text-right">
                                            <i class="feather icon-credit-card f-50 text-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Ticket</p>
                                            <h4 class="m-b-0">42</h4>
                                        </div>
                                        <div class="col col-auto text-right">
                                            <i class="feather icon-book f-50 text-c-pink"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-blue text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Orders</p>
                                            <h4 class="m-b-0">$5,242</h4>
                                        </div>
                                        <div class="col col-auto text-right">
                                            <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- statustic-card start -->

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