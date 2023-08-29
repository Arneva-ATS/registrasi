<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="margin-top:0px">Data Anggota</h4>
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-12 text-center">
                                <div id="message pnotify-stack-custom-top" class="background-info">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-5 text-right">
                                <?php echo anchor(site_url('anggota/create'),'+Tambah Data', 'class="btn btn-primary"'); ?>
                            </div>
                            <div class="col-md-2 text-right">
                                <form action="<?php echo site_url('anggota/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php 
                                            if ($q <> '')
                                            {
                                            ?>
                                            <a href="<?php echo site_url('anggota'); ?>" class="btn btn-default">Atur Ulang</a>
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
                                <div id="base-style_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <table id="base-style" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="base-style_info" style="margin-bottom: 10px">
                                                <thead>
                                                    <tr role="row">
                                                        <th>No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nita: activate to sort column ascending">Nita</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Niki: activate to sort column ascending">Niki</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nisat: activate to sort column descending">Nisat</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nirim: activate to sort column descending">Nirim</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nama Koperasi: activate to sort column ascending">Nama Koperasi</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nama Depan: activate to sort column ascending">Nama Depan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Nama Belakang: activate to sort column ascending">Nama Belakang</th>
                                                        <th class="sorting" tabindex="0" aria-controls="base-style" rowspan="1" colspan="1" aria-label="Handphone: activate to sort column ascending">Handphone</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($anggota_data as $anggota)
                                                        {
                                                        ?>
                                                        <tr role="row">
                                                            <td width="80px"><?php echo ++$start ?></td>
                                                            <td><?php echo $anggota->nita ?></td>
                                                            <td><?php echo $anggota->niki ?></td>
                                                            <td><?php echo $anggota->nisat ?></td>
                                                            <td><?php echo $anggota->nirim ?></td>
                                                            <td><?php echo $anggota->nama ?></td>
                                                            <td><?php echo $anggota->nama_depan ?></td>
                                                            <td><?php echo $anggota->nama_belakang ?></td>
                                                            
                                                            
                                                            <td><?php echo $anggota->handphone ?></td>
                                                            <td style="text-align:center" width="200px">
                                                            <?php 
                                                            echo anchor(site_url('anggota/read/'.$anggota->nirim),'Detail'); 
                                                            echo ' | '; 
                                                            echo anchor(site_url('anggota/update/'.$anggota->nirim),'Update'); 
                                                            echo ' | '; 
                                                            echo anchor(site_url('anggota/delete/'.$anggota->nirim),'Hapus','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'); 
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
                                                    <?php echo anchor(site_url('anggota/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                                                </div>
                                                <div class="col-md-6">
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