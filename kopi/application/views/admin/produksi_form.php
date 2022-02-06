<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="x_panel">
   <div class="x_title">
      <h2><?= $header; ?></h2>
     <div class="clearfix"></div>
     <?= validation_errors('<p style="color:red">','</p>'); ?>
     <?php
     if ($this->session->flashdata('alert'))
     {
        echo '<div class="alert alert-danger alert-message">';
        echo $this->session->flashdata('alert');
        echo '</div>';
     }
     ?>
   </div>

   <div class="x_content">
      <br />

      <form class="form-horizontal form-label-left" action="" enctype="multipart/form-data" method="post">

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Biji</label>
            <div class="col-md-4 col-sm-6">
               <select name="biji" class="form-control">
				  <option value="">--Pilih Biji--</option>
				  <?php foreach($daftar_biji as $k) { ?>
                  <option value="<?= $k->id_biji; ?>" <?php if($k->id_biji == $biji) { echo "selected"; }?>> <?= $k->jenis; ?></option>
				  <?php } ?>
               </select>
            </div>
         </div>

		 <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Tanggal Produksi
            </label>
            <div class="col-md-5 col-sm-12 col-xs-12">
               <input type="date" class="form-control col-md-7 col-xs-12" name="tanggal" value="<?= $tanggal; ?>">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Jumlah Produksi
            </label>
            <div class="col-md-4 col-sm-6">
               <input class="form-control col-md-7 col-xs-12" type="number" name="jumlah" value="<?= $jumlah; ?>">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Catatan
            </label>
            <div class="col-md-5 col-sm-12 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="catatan" value="<?= $catatan; ?>">
            </div>
         </div>

         <div class="ln_solid"></div>

         <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
               <button type="submit" class="btn btn-success" name="submit" value="Submit">Simpan</button>
              <button type="button" onclick="window.history.go(-1)" class="btn btn-primary" >Kembali</button>
            </div>
         </div>

     </form>
   </div>
</div>
