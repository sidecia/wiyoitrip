<?php

	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery-1.11.1.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.chosen.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.chosen.config.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/global-libs.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/edit.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.print-this.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.noty.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.noty.config.js');
	
	//$this->set_css($this->default_theme_path.'/flexigrid2/css/newtab.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/chosen.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/bootstrap.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/font-awesome.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/common.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/list.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/general.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/add-edit-form.css');
?>
<div data-unique-hash="<?php echo $unique_hash; ?>" class="crud-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-label">
                    <div class="floatL l5">
                        <?php echo $this->l('form_edit'); ?> <?php echo $subject?>                    
                    </div>
                    <div class="floatR r5 minimize-maximize-container minimize-maximize">
                        <i class="fa fa-caret-up"></i>
                    </div>
                    <div class="floatR r5 gc-full-width">
                        <i class="fa fa-expand"></i>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-container table-container">
                	<?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal"'); ?>                       		  
					<?php								
									foreach($fields as $field)
									{										
								?>
                                	<div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?>                                    
                                        </label>
                                        <div class="col-sm-9">
                                           <?php echo $input_fields[$field->field_name]->input?>
                                        </div>
                               		</div>                                										
								<?php }?>
								<?php if(!empty($hidden_fields)){?>
								<!-- Start of hidden inputs -->
									<?php
										foreach($hidden_fields as $hidden_field){
											echo $hidden_field->input;
										}
									?>
								<!-- End of hidden inputs -->
								<?php }?>
                                <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>		                                                                                                                 
                            
                            <div class="form-group">
                                <div id='report-error' class='report-div error bg-danger' style="display:none"></div>
                                <div id='report-success' class='report-div success bg-success' style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-7">
                                    <button id="form-button-save" type="submit" class="btn btn-default btn-success b10">
                                        <i class="fa fa-check"></i>
                                        <?php echo $this->l('form_update_changes'); ?>                                  
                                     </button>
                                     <?php 	if(!$this->unset_back_to_list) { ?>
                                     <button id="save-and-go-back-button" type="button" class="btn btn-info b10">
                                            <i class="fa fa-rotate-left"></i>
                                            <?php echo $this->l('form_update_and_go_back'); ?>                                       
                                     </button>
                                     <?php 	} ?>
                                     <button id="cancel-button" type="button" class="btn btn-default cancel-button b10">
                                            <i class="fa fa-warning"></i>
                                            <?php echo $this->l('form_cancel'); ?>                                     
                                     </button>                                                                    
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>