<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Detail Produksi</h2>
     <div class="clearfix"></div>
   </div>

         <div class="col-md-6 col-sm-6">
            <table class="table table-striped">
                <tr>
                  <td width="100px;">
                     <span style="float:left">Biji</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $id_biji; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Tanggal Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $tanggal_produksi; ?></span></td>
               </tr>
               
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $jumlah_produksi; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Catatan</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $catatan; ?></span></td>
               </tr>
  
            </table>
            <div class="clearfix"></div>
            <div>
               <a href="<?= base_url('produksi/update_produksi/'.$id_produksi); ?>" class="btn btn-warning">Edit</a>
               <a href="<?= base_url('produksi/delete/'.$id_produksi); ?>" class="btn btn-danger">hapus</a>
               <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
            </div>
         </div>
      </div>
   </div>
</div>
