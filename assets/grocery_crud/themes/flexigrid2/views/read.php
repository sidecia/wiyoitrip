<?php

	//$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery-1.11.1.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery-ui.custom.min.js"');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/jquery.form.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/common.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid2/js/view.js');	
	
	//$this->set_css($this->default_theme_path.'/flexigrid2/css/newtab.css');
	//$this->set_css($this->default_theme_path.'/flexigrid2/css/bootstrap.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/font-awesome.min.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/common.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/general.css');
	$this->set_css($this->default_theme_path.'/flexigrid2/css/add-edit-form.css');
?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-label">
                    <div class="floatL l5">
                        <?php echo $this->l('list_record'); ?> <?php echo $subject?>
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
                    <?php echo form_open( $read_url, 'method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal" '); ?>
                    <?php		
					foreach($fields as $field)
					{				
					?>
							   <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?>
                            </label>
                            <div class="col-sm-9 read-row">
                                <div id="field-customerName" class="readonly_label"><?php echo $input_fields[$field->field_name]->input?></div>                            </div>
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
                    
                                                            <div id='report-error' class='report-div error'></div>
                    <div id='report-success' class='report-div success'></div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                                                            <button class="btn btn-default cancel-button" type="button" onclick="window.location = '<?php echo $list_url;?>'" >
                                    <i class="fa fa-arrow-left"></i>
                                    <?php echo $this->l('form_back_to_list'); ?>                                </button>
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
