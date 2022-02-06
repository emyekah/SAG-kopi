<?php
  require ('head.php');
  require ('navbar.php');
?>
<script src="/cv.berkatalamsejahtera/tema//tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

   <div class="right_col" role="main">
  <div class="">



    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Tambah Produk</small></h2>

                <div class="clearfix"></div>
              </div>

              <div class="container">
          			<!-- /.row -->
          			<div class="row">
          				<!-- body items -->

          				<div class="col-md-12">
          					<div class="panel panel-default">
          						<div class="panel-heading">

          						<div class="panel-body">
          						<div><?= validation_errors()?></div>
          						<?=  form_open_multipart('C_jaminan/C_t_jaminan/simpan',['class'=>'form-group']) ?>
             <section class="content">
                <?php if($this->session->flashdata('message')){?>
                	<div class="alert alert-block alert-info">
                    	<button type="button" class="close" data-dissmis="alert">
                    		<i class="ace-icon fa fa-times"></i>
                            </button>
                            <strong class="green">
                            	<?php echo $this->session->flashdata('message')?>
                                </strong>
                                </div>
                                <?php }?>
                                <form role="form" action="<?php echo base_url(); ?>C_jaminan/c_t_jaminan/simpan" method="post" enctype="multipart/form-data" >
                                	<div class=box-body">
                                    	<div class="form-group">
                                        	<label for="exampleInputjuduljaminan">Judul</label>
                                            <input type="text" name="judul" class="form-control" id="exampleInputnamaportofolio" placeholder="Judul jaminan">
                                        </div>
                                        <div class="form-group">
                                        	<label for="inputcreator">Deskripsi singkat</label>
                                            <textarea type="text" name="deskripsi" coloum="10" class="form-control" id="inputcreator" placeholder="Deskripsi singkat tentang jaminan"></textarea>
                                        
                                   </div>
                                   <div class="box-footer">
                                   	<button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    </section>
                                                                                      
                                        
                    
             </div><!-- /..panel-body -->
          					</div><!-- /..panel panel-default -->
          				</div>

          			</div>
          			<!-- /.row -->
          			<hr>


          		</div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require ('footer.php')
?>