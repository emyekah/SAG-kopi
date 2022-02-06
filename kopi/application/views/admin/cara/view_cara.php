<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
   <h2>Manajemen Informasi</h2>
   <div class="clearfix"></div>
   </div>
   <!-- page content -->
                   <section class="content">
 						<?php if($this->session->flashdata('message')){?>
                	<div class="alert alert-block alert-info">
                    	<button type="button" class="close" data-dissmis="alert">
                    		<i class="ace-icon fa fa-times"></i>
                            </button>
                            
                            <strong class="black">
                            	<?php echo $this->session->flashdata('message')?>
                                </strong>
                                </div>
                <?php }?>
                

          						
                    
              

           
                                    <div class="box-body table-responsive">
                                    
                                    	<table id="example1" class="table table-borderd table-striped">
                                        <thead>
                                        	<tr>
                                            	<th width="30" align="center">No</th>
                                                <th>Judul</th>
                                                
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                </tbody>
                                                <?php
												$i=1;
												foreach ($data as $row) :?>
                                                <tr>
                                                	<td class="center"><?php echo $i++;?></td>
                                                    <td><?php echo $row->judul;?></td>
                                                    
                                                    <td><?php echo $row->deskripsi;?></td>    
                                                    <td>
														
      <a class="btn btn-primary btn-xs"<?php echo anchor('c_cara/c_e_cara/edit/'.$row->id_cara,'Edit'); ?></a>
      
                                                    </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                        </tbody>
                                                        </table>
                                                
          				</div>
                      </div>          
          			</div>
        		</div>
      		</div>
    	</div>
  	</div>
</div>
</div>
</div>
</div>
</div>

       
                                                        
                                                       
                                                    
                                                    
                                                    
                                      

               