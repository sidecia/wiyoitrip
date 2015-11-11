<?php
	//$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery-1.11.1.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/global-libs.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/dropdown.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/modal.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/bootstrap-growl.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.print-this.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/gcrud.datagrid.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/list.js');
	
	//$this->set_css($this->default_theme_path.'/flexigrid2/css/newtab.css');
	//$this->set_css($this->default_theme_path.'/flexigrid2/css/bootstrap.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/font-awesome.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/common.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/list.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/general.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/newtab.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/animate.min.css');	
?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo addslashes($subject); ?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var ajax_list_url = '<?php echo $ajax_list_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
 <div class="container gc-container">
        <div class="success-message hidden"></div>

 		<div class="row">
        	<div class="col-md-12 table-section">
                <div class="table-label">
                    <div class="floatL l5">
                        <?php echo $subject?>                    
                    </div>                  
                    <div class="floatR r5 minimize-maximize-container minimize-maximize">
                        <i class="fa fa-caret-up"></i>
                    </div>
                    <div class="floatR r5 gc-full-width">
                        <i class="fa fa-expand"></i>                        
                    </div>                      
                    <div class="clear"></div>
                </div>
                <div class="table-container">
                    <form action="/demo/bootstrap_theme" method="post" autocomplete="off" id="gcrud-search-form" accept-charset="utf-8">                        
                    	<div class="header-tools">
                                <div class="floatL t5">
                                    <a class="btn btn-default" href="<?php echo $add_url?>"><i class="fa fa-plus"></i> <?php echo $this->l('list_add'); ?> <?php echo $subject?></a>
                                </div>
                                <div class="floatR">
                                   <a class="btn btn-default t5 gc-export" data-url="<?php echo $export_url; ?>">
                                        <i class="fa fa-cloud-download floatL t3"></i>
                                        <span class="hidden-xs floatL l5">
                                            <?php echo $this->l('list_export');?>                                       
                                         </span>
                                        <div class="clear"></div>
                                    </a>
                                    <a class="btn btn-default t5 gc-print" data-url="<?php echo $print_url; ?>">
                                        <i class="fa fa-print floatL t3"></i>
                                        <span class="hidden-xs floatL l5">
                                           <?php echo $this->l('list_print');?>                                      
                                        </span>
                                        <div class="clear"></div>
                                    </a>
                                
                                <a class="btn btn-primary search-button t5">
                                    <i class="fa fa-search"></i>
                                    <input type="text" name="search" class="search-input" />
                                </a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php echo $list_view?>
                        
        			</form>
                    
                   </div>
        	</div>

            <!-- Delete confirmation dialog -->
            <div class="delete-confirmation modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>
                        <div class="modal-body">
                            <p>Esta seguro que desea eliminar este registro?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger delete-confirmation-button">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete confirmation dialog -->

            <!-- Delete Multiple confirmation dialog -->
            <div class="delete-multiple-confirmation modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>
                        <div class="modal-body">
                            <p>Esta seguro que desea eliminar este registro?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancelar                          </button>
                            <button type="button" class="btn btn-danger delete-multiple-confirmation-button"
                                    data-target="/demo/bootstrap_theme/delete_multiple">
                                Eliminar                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete Multiple confirmation dialog -->

            </div>
        </div>
