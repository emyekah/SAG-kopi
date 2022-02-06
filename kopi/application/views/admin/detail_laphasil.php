<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$a = $data->row();
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Detail Laporan Hasil Produksi</h2>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <table class="table table-striped">
               <tr>
                  <td width="100px;">
                     <span style="float:left">Kode Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $a->id_produksi; ?></span></td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Biji</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= $a->jenis; ?></span></td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Biji</span>
                     <span style="float:right">:</span>
                  </td>
                  <td>
                     <span style="float:left">
                        <?php
                        if ($a->jumlah_biji >= 100) {
                           echo '<label class="label-success" style="color:white; padding:3px 10px;">'.$a->jumlah_biji.'</label>';
                        } elseif ($a->jumlah_biji < 100 && $a->jumlah_biji > 0) {
                              echo '<label class="label-warning" style="color:white; padding:3px 10px;">'.$a->jumlah_biji.'</label>';
                        } else {
                           echo '<label class="label-danger" style="color:white; padding:3px 10px;">Habis</label>';
                        }
                        ?>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah produksi</span>
                     <span style="float:right; margin-left: 150px">:</span>
                  </td>
                  <td>
                     <span style="float:left">
                        <?php
                        if ($a->jumlah_produksi >= 100) {
                           echo '<label class="label-success" style="color:white; padding:3px 10px;">'.$a->jumlah_produksi.'</label>';
                        } elseif ($a->jumlah_produksi < 100 && $a->jumlah_produksi > 0) {
                              echo '<label class="label-warning" style="color:white; padding:3px 10px;">'.$a->jumlah_produksi.'</label>';
                        } else {
                           echo '<label class="label-danger" style="color:white; padding:3px 10px;">Habis</label>';
                        }
                        ?>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Tanggal Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= date('d-m-Y', strtotime($a->tanggal_produksi)); ?></span></td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Tanggal Hasil Produksi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td><span style="float:left"><?= date('d-m-Y', strtotime($a->tanggal_hasil_produksi)); ?></span></td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Hasil Jadi</span>
                     <span style="float:right">:</span>
                  </td>
                  <td>
                     <span style="float:left">
                        <?php
                        if ($a->jumlah_hasil_jadi >= 100) {
                           echo '<label class="label-success" style="color:white; padding:3px 10px;">'.$a->jumlah_hasil_jadi.'</label>';
                        } elseif ($a->jumlah_hasil_jadi < 100 && $a->jumlah_hasil_jadi > 0) {
                              echo '<label class="label-warning" style="color:white; padding:3px 10px;">'.$a->jumlah_hasil_jadi.'</label>';
                        } else {
                           echo '<label class="label-danger" style="color:white; padding:3px 10px;">Habis</label>';
                        }
                        ?>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Jumlah Sortir</span>
                     <span style="float:right">:</span>
                  </td>
                  <td>
                     <span style="float:left">
                        <?php
                        if ($a->jumlah_sortir >= 100) {
                           echo '<label class="label-success" style="color:white; padding:3px 10px;">'.$a->jumlah_sortir.'</label>';
                        } elseif ($a->jumlah_sortir < 100 && $a->jumlah_sortir > 0) {
                              echo '<label class="label-warning" style="color:white; padding:3px 10px;">'.$a->jumlah_sortir.'</label>';
                        } else {
                           echo '<label class="label-danger" style="color:white; padding:3px 10px;">Habis</label>';
                        }
                        ?>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td width="100px;">
                     <span style="float:left">Hasil Bersih</span>
                     <span style="float:right">:</span>
                  </td>
                  <td>
                     <span style="float:left">
                        <?php
                        if ($a->hasil_bersih >= 100) {
                           echo '<label class="label-success" style="color:white; padding:3px 10px;">'.$a->hasil_bersih.'</label>';
                        } elseif ($a->hasil_bersih < 100 && $a->hasil_bersih > 0) {
                              echo '<label class="label-warning" style="color:white; padding:3px 10px;">'.$a->hasil_bersih.'</label>';
                        } else {
                           echo '<label class="label-danger" style="color:white; padding:3px 10px;">Habis</label>';
                        }
                        ?>
                     </span>
                  </td>
               </tr>
            </table>
            <div class="clearfix"></div>
            <!-- <div>
               <a href="<?= base_url('item/update_item/'.$id_item); ?>" class="btn btn-warning">Edit</a>
               <a href="<?= base_url('item/delete/'.$id_item); ?>" class="btn btn-danger">hapus</a>
               <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
            </div> -->
         </div>
      </div>
   </div>
</div>
