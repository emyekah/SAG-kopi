<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Detail Biji</h2>
     <div class="clearfix"></div>
   </div>

         <div class="col-md-6 col-sm-6">
            <table class="table table-striped">
               <tr>
                  <td width="100px;">
                     <span style="float:left">Tanggal Datang</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $tanggal_datang; ?></span></td>
               </tr>
               
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $jumlah; ?> kg</span></td>
               </tr>
			   
			   <tr>
                  <td width="100px;">
                     <span style="float:left">Jenis</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $jenis; ?></span></td>
               </tr>
  
            </table>
            <div class="clearfix"></div>
            <div>
               <a href="<?= base_url('biji/update_biji/'.$id_biji); ?>" class="btn btn-warning">Edit</a>
               <a href="<?= base_url('biji/delete/'.$id_biji); ?>" class="btn btn-danger">hapus</a>
               <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
            </div>
         </div>
      </div>
   </div>
</div>
