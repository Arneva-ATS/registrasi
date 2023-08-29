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
    <!-- Main-body start -->
    <div class="main-body">
      <div class="background-success" id="message"></div>
      <div class="page-wrapper">
        <!-- Page body start -->
        <div class="page-body">
          <div class="row">
            <!--<div class="box">-->
            <div class="box-body col-xl-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h2 style="margin-top:0px"><?php echo $button ?> Data Koperasi Induk </h2>
                </div>
                <div class="card-block">
                  <form action="<?php echo $action; ?>" method="post">
                    <div class="container">
                      <div class="did-floating-label-content">
                        <input maxlength="3" style="background-color:slategrey; color: #fff;" readonly type="text" class="did-floating-input" name="niki" id="niki" placeholder="nis" value="<?php if($button=='Tambah'){echo $lastnis;}else{echo $niki;} ?>" />
                        <label for="niki" class="did-floating-label">NIS <?php echo form_error('niki') ?></label>
                      </div>
                      <div class="did-floating-label-content">
                        <input type="text" class="did-floating-input" name="nama_koperasi_induk" id="nama_koperasi_induk" placeholder="Nama Koperasi Induk" value="<?php echo $nama_koperasi_induk; ?>" />
                        <label for="nama_koperasi_induk" class="did-floating-label">Nama Koperasi Induk <?php echo form_error('nama_koperasi_induk') ?></label>
                      </div>
                      <div class="did-floating-label-content">
                        <input type="text" class="did-floating-input" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
                        <label for="nama_depan" class="did-floating-label">Nama Depan <?php echo form_error('nama_depan') ?></label>
                      </div>
                      <div class="did-floating-label-content">
                        <input type="text" class="did-floating-input" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
                        <label for="nama_belakang" class="did-floating-label">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                      </div>
                      <div class="did-floating-label-content">
                        <input type="text" class="did-floating-input" name="no_hp_wa" id="no_hp_wa" placeholder="No Hp Wa" value="<?php echo $no_hp_wa; ?>" />
                        <label for="no_hp_wa" class="did-floating-label">No Hp Wa <?php echo form_error('no_hp_wa') ?></label>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button> 
                      <a href="<?php echo site_url('koperasi_induk') ?>" class="btn btn-default">Batal</a>
                    </div>
                  </form>
                </div><!-- card-block -->
              </div><!-- card -->
            </div><!-- <box-body> -->
          </div><!-- row -->
        </div><!-- page-body -->
      </div><!-- page-wrapper -->
    </div><!-- main-body -->
  </div><!-- pcoded-inner-content -->
</div><!-- pcoded-content -->
