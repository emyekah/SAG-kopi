<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  
    <!-- Page Content -->
    <!-- /banner_bottom_agile_info -->

                                <?php foreach ($data as $row) :?>
                                
                                <div class="resp-tabs-container">
                                <div class="tab1">
                                    <hr>
                                    <div class="single_page_agile_its_w3ls">
                                      <h3><?php echo $row->judul;?></h3>
                                       <p><?php echo $row->deskripsi;?></p>
                                    </div>
                                    <hr>
                                </div>
                                <?php endforeach;?>
                    <div class="clearfix"></div>
                    </div>
                    </div>
        

     <!-- End footer bottom area -->
    <!-- jQuery -->
    <script src="<?php echo base_url('/assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

<!-- Footer -->
       
</html>
