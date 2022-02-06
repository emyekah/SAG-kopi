<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Manajemen Produksi</h2>
	  <div style="float:right">
         <a href="<?= base_url('produksi/add_produksi'); ?>" class="btn btn-primary">Tambah Produksi</a>
      </div>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <table class="table table-striped table-bordered " id="datatable">
         <thead>
            <tr>
               <th>No</th>
	
               <th>Tanggal Produksi</th>
               <th>Jumlah Produksi</th>
               <th>Catatan</th>
			      <th width="12%">Opsi</th>
            </tr>
         </thead>
         <tbody>
         </tbody>
      </table>
   </div>
</div>
