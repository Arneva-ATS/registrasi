<style>
.container{
  width: auto;
  padding: 3px;
  margin: 0 auto;
  left: 0;
}
.did-floating-label-content{
    position:relative; 
    margin-bottom:20px; 
}
 .did-floating-label{
  color:#1e4c82; 
  font-size:17px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:15px;
  top:9px;
  padding:0 5px;
  background:#fff;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.did-floating-input,.did-floating-select{
  font-size: 17px;
  display: block;
  width: 100%;
  height: 36px;
  padding: 0 20px;
  background: #fff;
  color: #323840;
  border: 1px solid #3d85d8;
  border-radius: 4px;
  box-sizing: border-box;
}
.did-floating-input:focus,.did-floating-select:focus{
  outline: none;
}
.did-floating-input:focus ~ .did-floating-label,.did-floating-select:focus ~ .did-floating-label{
  top: -8px;
  font-size: 13px;
}

select.did-floating-select{
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

select.did-floating-select::-ms-expand{
  display: none;
}

.did-floating-input:not(:placeholder-shown) ~ .did-floating-label{
  top: -8px;
  font-size: 13px;
}

.did-floating-select:not([value=""]):valid ~ .did-floating-label{
  top: -8px;
  font-size: 13px;
}

.did-floating-select[value=""]:focus ~ .did-floating-label{
  top: 11px;
  font-size: 13px;
}

.did-floating-select:not([multiple]):not([size]){
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='6' viewBox='0 0 8 6'%3E%3Cpath id='Path_1' data-name='Path 1' d='M371,294l4,6,4-6Z' transform='translate(-371 -294)' fill='%23003d71'/%3E%3C/svg%3E%0A");
  background-position: right 15px top 50%;
  background-repeat: no-repeat;
}

.did-error-input .did-floating-input,.did-error-input .did-floating-select{
  border: 2px solid #9d3b3b;
  color: #9d3b3b;
}
.did-error-input .did-floating-label{
  font-weight: 600;
  color: #9d3b3b;
}
.did-error-input .did-floating-select:not([multiple]):not([size]){
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='6' viewBox='0 0 8 6'%3E%3Cpath id='Path_1' data-name='Path 1' d='M371,294l4,6,4-6Z' transform='translate(-371 -294)' fill='%239d3b3b'/%3E%3C/svg%3E%0A");
}

.input-group{
  display: flex;
}
.input-group .did-floating-input{
  border-radius: 0 4px 4px 0;
  border-left: 0;
  padding-left: 0;
}

.input-group-append{
  display: flex;
  align-items: center;
  /*   margin-left:-1px; */
}

.input-group-text{
  display: flex;
  align-items: center;
  font-weight: 400;
  height: 34px;
  color: #323840;
  padding: 0 5px 0 20px;
  font-size: 12px;
  text-align: center;
  white-space: nowrap;
  border: 1px solid #3d85d8;
  border-radius: 4px 0 0 4px;
  border-right: none;
}
</style>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="box-body col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 style="margin-top:0px"><?php echo $button ?> Data Anggota </h2>
                                </div>
                                <div class="card-block">
                                    <div class="container">
                                        <form action="<?php echo $action; ?>" method="post">
                                            <div class="did-floating-label-content">
                                                <input maxlength="20" readonly style="background-color:slategrey; color: #fff;" type="text" class="form-control-sm col-sm-6 did-floating-input" name="id_anggota" id="id_anggota" placeholder="id_anggota" value="<?php if($button=='Tambah'){echo "";}else{echo $id_anggota;} ?>" />
                                                <label class="did-floating-label" for="id_anggota">ID <?php echo form_error('id_anggota') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <!-- <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nita" id="nita" placeholder="Nita" value="<?php echo $nita; ?>" /> -->
                                                <input maxlength="18" readonly style="background-color:slategrey; color: #fff;" type="text" class="form-control-sm col-sm-6 did-floating-input" name="nita" id="nita" placeholder="nita" value="<?php if($button=='Tambah'){echo $lastnis;}else{echo $nita;} ?>" />
                                                <label class="did-floating-label" for="nita">Nita <?php echo form_error('nita') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <!-- <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="niki" id="niki" placeholder="Niki" value="<?php echo $niki; ?>" /> -->
                                                <select class="form-control-sm col-sm-6 did-floating-input" name="niki" id="niki">
                                                  <option value="">--pilih nomor induk koperasi--</option>
                                                  <?php
                                                        foreach($nki as $datniki){
                                                            if($datniki->niki==$niki){
                                                                ?>
                                                                <option value="<?php echo $datniki->niki;?>" selected="selected"><?php echo $datniki->nama_koperasi_induk;?></option>
                                                                <?php
                                                            }else{
                                                            ?>
                                                            <option value="<?php echo $datniki->niki;?>"><?php echo $datniki->nama_koperasi_induk;?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label class="did-floating-label" for="niki">Niki <?php echo form_error('niki') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <!-- <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nisat" id="nisat" placeholder="Nisat" value="<?php echo $nisat; ?>" /> -->
                                                <select class="form-control-sm col-sm-6 did-floating-input" name="nisat" id="nisat">
                                                  <option value="">--pilih nomor induk koperasi pusat--</option>
                                                  <?php
                                                        foreach($nsat as $datnisat){
                                                            if($datnisat->nisat==$nisat){
                                                                ?>
                                                                <option value="<?php echo $datnisat->nisat;?>" selected="selected"><?php echo $datnisat->nama_koperasi_pusat;?></option>
                                                                <?php
                                                            }else{
                                                            ?>
                                                            <option value="<?php echo $datnisat->nisat;?>"><?php echo $datnisat->nama_koperasi_pusat;?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label class="did-floating-label" for="nisat">Nisat <?php echo form_error('nisat') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <!-- <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nirim" id="nirim" placeholder="Nirim" value="<?php echo $nirim; ?>" /> -->
                                                <select class="form-control-sm col-sm-6 did-floating-input" name="nirim" id="nirim">
                                                  <option value="">--pilih nomor induk koperasi pusat--</option>
                                                  <?php
                                                        foreach($nrim as $datnirim){
                                                            if($datnirim->nirim==$nirim){
                                                                ?>
                                                                <option value="<?php echo $datnirim->nirim;?>" selected="selected"><?php echo $datnirim->nama_koperasi_primer;?></option>
                                                                <?php
                                                            }else{
                                                            ?>
                                                            <option value="<?php echo $datnirim->nirim;?>"><?php echo $datnirim->nama_koperasi_primer;?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label class="did-floating-label" for="nirim">Nirim <?php echo form_error('nirim') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                                <label class="did-floating-label" for="nama">Nama <?php echo form_error('nama') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
                                                <label class="did-floating-label" for="nama_depan">Nama Depan <?php echo form_error('nama_depan') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
                                                <label class="did-floating-label" for="nama_belakang">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                                            </div>
                                            <div class="form-group did-floating-label-content">
                                                <input type="text" class="form-control-sm col-sm-6 did-floating-input" name="handphone" id="handphone" placeholder="Handphone" value="<?php echo $handphone; ?>" />
                                                <label class="did-floating-label" for="handphone">Handphone <?php echo form_error('handphone') ?></label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button> 
                                            <a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Batal</a>
                                        </form>
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