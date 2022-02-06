<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


   <div class="col s12 l9 m12 content">
      <?php
      //tampilkan pesan gagal
      if ($this->session->flashdata('alert'))
      {
         echo '<div class="alert alert-danger alert-message">';
         echo '<center>'.$this->session->flashdata('alert').'</center>';
         echo '</div>';
      }
      //tampilkan pesan success
      if ($this->session->flashdata('success'))
      {
         echo '<div class="alert alert-success alert-message">';
         echo '<center>'.$this->session->flashdata('success').'</center>';
         echo '</div>';
      }
      //tampilkan header pencarian
      if (isset($search) && $search != null)
      {
         echo '<h4>Hasil Pencarian dari "'.$search.'"</h4>';
      }
      //tampilkan header kategori
      if ($data->num_rows() > 0)
      {
         if (isset($url)) {
            echo '<h4>List Item Pada Kategori "'.$url.'"</h4><hr />';
         }
      ?>
      <div class="row">
         <?php
         if (isset($fav) && $fav->num_rows() > 0) {
            foreach ($fav->result() as $f) :
               $favorite[] = $f->id_item;
            endforeach;
         }
         ?>
         <?php foreach($data->result() as $key) : ?>
            <div class="col s12 m6 l4">
               <div class="card medium">
                  <div class="card-image">
                     <a href="<?= site_url('home/detail/'.$key->link); ?>">
                     <style>#g {width:300px;height: 250px;}</style>
                        <img src="<?= base_url('assets/upload/'.$key->gambar); ?>" id=g class="responsive-img">
                        <span class="card-title"><?= $key->nama_item; ?></span>
                     </a>
                  </div>
                  <p class="harga">
                     Rp. <?= number_format($key->harga, 0, ',', '.'); ?>,-
                  </p>
                  <div class="card-action center">
                     <form action="<?= site_url('cart/add/'.$key->link); ?>" method="post">
                        <!-- <?php echo $key->link ; ?> -->
                        <div class="left">
                           <?php if ($key->stok >= 10)
                           {
                              echo 'Stok : <span class="badge green white-text">'.$key->stok.'</span>';
                           } elseif ($key->stok < 10 && $key->stok > 0) {
                              echo 'Stok : <span class="badge orange white-text">'.$key->stok.'</span>';
                           } else {
                              echo 'Stok : <span class="badge red white-text">Habis</span>';
                           }
                           ?>
                        </div>
                        <input type="number" name="qty" value="1" min="1" max="<?= $key->stok; ?>" <?php if ($key->stok < 1) { echo 'disabled'; }?>>

                        <a href="<?= site_url('home/detail/'.$key->link); ?>" class="waves-effect waves-light btn light-blue darken-4 white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail">
                           <i class="fa fa-search-plus"></i>
                        </a>

                        <button type="submit" class="waves-effect waves-light btn green white-text tooltipped" name="submit" value="Submit" <?php if ($key->stok < 1) { echo 'disabled'; } ?> data-position="bottom" data-delay="50" data-tooltip="Tambah ke Keranjang">
                           <i class="fa fa-shopping-cart"></i>
                        </button>
                        <!-- Set tooltip dan icon untuk button favorite -->
                        
                     </form>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
      <?= $link; ?>
      <?php
      } else {
         if (isset($url)) {
            echo '<h5>Kategori "'.$url.'" Masih Kosong</h5><hr />';
         } else {
            echo '<h5>Item tidak ditemukan....</h5>';
         }
      }
      ?>
   </div>
</div>
