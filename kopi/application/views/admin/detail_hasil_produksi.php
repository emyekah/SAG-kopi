<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Detail Hasil Produksi</h2>
     <div class="clearfix"></div>
   </div>

         <div class="col-md-6 col-sm-6">
            <table class="table table-striped">
                <tr>
                  <td width="100px;">
                     <span style="float:left">Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $id_produksi; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Tanggal Hasil Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $tanggal_hasil_produksi; ?></span></td>
               </tr>
               
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Sortir</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $jumlah_sortir; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Hasil Jadi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $jumlah_hasil_jadi; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Hasil Bersih</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $hasil_bersih; ?> kg</span></td>
               </tr>
			   
  
            </table>
            <div class="clearfix"></div>
            <div>
               <a href="<?= base_url('hasil_produksi/update_hasil_produksi/'.$id_produksi); ?>" class="btn btn-warning">Edit</a>
               <a href="<?= base_url('hasil_produksi/delete/'.$id_produksi); ?>" class="btn btn-danger">hapus</a>
               <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
            </div>
         </div>
      </div>
   </div>
</div>
