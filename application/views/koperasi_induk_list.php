<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="margin-top:0px">Data Koperasi Induk</h4>
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-5 text-center">
                                <div style="margin-top: 8px" id="message pnotify-stack-custom-top" class="background-info">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-5 text-right">
                                <?php echo anchor(site_url('koperasi_induk/create'),'+Tambah Data', 'class="btn btn-primary"'); ?>
                            </div>
                            <div class="col-md-2 text-right">
                                <form action="<?php echo site_url('koperasi_induk/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                        <?php 
                                        if ($q <> '')
                                        {
                                            ?>
                                            <a href="<?php echo site_url('koperasi_induk'); ?>" class="btn btn-default">Atur Ulang</a>
                                            <?php
                                        }
                                        ?>
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <div id="compact_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <table id="compact" class="table compact table-striped table-bordered nowrap dataTable" style="margin-bottom: 10px" role="grid" aria-describedby="compact_info">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="No: activate to sort column ascending" class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">No</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">Nama Koperasi Induk</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">Nama Depan</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending" class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">Nama Belakang</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">No Hp Wa</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="compact" colspan="1" rowspan="1" aria-sort="ascending">NIS</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead><?php
                                                foreach ($koperasi_induk_data as $koperasi_induk)
                                                {
                                                ?>
                                                <tr>
                                                    <td width="80px"><?php echo ++$start ?></td>
                                                    <td><?php echo $koperasi_induk->nama_koperasi_induk ?></td>
                                                    <td><?php echo $koperasi_induk->nama_depan ?></td>
                                                    <td><?php echo $koperasi_induk->nama_belakang ?></td>
                                                    <td><?php echo $koperasi_induk->no_hp_wa ?></td>
                                                    <td><?php echo $koperasi_induk->niki ?></td>
                                                    <td style="text-align:center" width="200px">
                                                    <?php 
                                                    echo anchor(site_url('koperasi_induk/read/'.$koperasi_induk->niki),'Detail'); 
                                                    echo ' | '; 
                                                    echo anchor(site_url('koperasi_induk/update/'.$koperasi_induk->niki),'Update'); 
                                                    echo ' | '; 
                                                    echo anchor(site_url('koperasi_induk/delete/'.$koperasi_induk->niki),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                                    ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
                                                    <?php echo anchor(site_url('koperasi_induk/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                                                    <div class="dataTables_paginate paging_simple_numbers" id="simpletable_paginate">
                                                        <?php echo $pagination ?>
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
        </div>
    </div>
</div>