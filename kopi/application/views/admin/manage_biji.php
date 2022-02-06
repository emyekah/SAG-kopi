<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Manajemen Biji</h2>
	  <div style="float:right">
         <a href="<?= base_url('biji/add_biji'); ?>" class="btn btn-primary">Tambah Biji</a>
      </div>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <table class="table table-striped table-bordered " id="datatable">
         <thead>
            <tr>
               <th>No</th>
               <th>Tanggal Datang</th>
               <th>Jumlah</th>
               <th>Jenis</th>
			      <th width="12%">Opsi</th>
            </tr>
         </thead>
         <tbody>
         </tbody>
      </table>
   </div>
</div>
