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

  
        <!-- header logo: style can be found in header.less -->
  <div class="x_panel">
   <div class="x_title">
   <h2>Edit Informasi Pembelanjaan</h2>
   <div class="clearfix"></div>
   </div>
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
                                <?php foreach($data as $row) {?>
                                <form role="form" action="<?php echo base_url(); ?>C_cara/c_u_cara/update" method="post" enctype="multipart/form-data" >
                                	<div class=box-body">
                                    <div class=box-body">
                                    	 <div class="panel panel-default">
    										<div class="panel-heading">   
                         
                                        <div class="form-group">
                                        	<label for="exampleInputnamaportofolio">Judul Informasi</label>
                                            <input type="hidden" name="id_cara" value="<?php echo $row->id_cara ?>">
                                        	<input type="text" name="judul" value="<?php echo $row->judul ?>" class="form-control" id="exampleInputDeskripsiLayanan" placeholder="Judul Jaminan">
                                        </div>
                                        <div class="form-group">
                                        	<label for="inputcreator">Isi Informasi</label>
                                            <textarea type="text" name="deskripsi" rows="10" cols="100%"  class="form-control" id="inputcreator" placeholder="Deskripsi singkat tentang jaminan"><?php echo $row->deskripsi ?></textarea>
                                        </div>
                                        
                                   <div class="box-footer">
                                   	<button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    <?php } ?>
                                    </section>
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
                                        
                    
                	
               