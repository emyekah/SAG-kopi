<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Manajemen Hasil Produksi</h2>
	  <div style="float:right">
         <a href="<?= base_url('hasil_produksi/add_hasil_produksi'); ?>" class="btn btn-primary">Tambah Hasil Produksi</a>
      </div>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <table class="table table-striped table-bordered " id="datatable">
         <thead>
            <tr>
               <th>No</th>
			   <th>Produksi</th>
               <th>Tanggal Hasil Produksi</th>
               <th>Jumlah Sortir</th>
			   <th>Jumlah Hasil Jadi</th>
               <th>Hasil Bersih</th>
			      <th width="12%">Opsi</th>
            </tr>
         </thead>
         <tbody>
         </tbody>
      </table>
   </div>
</div>
