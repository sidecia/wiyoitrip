<div class="container">
    <div style="text-align:center">
         <div class="row">
              <div>
                   <h1>Wiyoi CMS</h1>
              </div>          
         </div>
     </div>
</div>
<hr/>
<div class="container">        
        	<div style="max-width: 380px;  padding: 15px;  margin: 0 auto;">
                 <div class="row">
                      <div class="well">     
							  <?php									 			 				 
                              $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                              echo form_open("admin/login/index", $attributes);?>
                              <fieldset>
                                   <legend class="text-center">Bienvenido</legend>
                                   <div class="form-group">
                                       <div class="row colbox">
                                           <div class="col-lg-4 col-sm-4">
                                                <label for="txt_username" class="control-label">Username</label>
                                           </div>
                                           <div class="col-lg-8 col-sm-8">
                                                <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                                <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                                           </div>
                                       </div>
                                   </div>
                                   
                                   <div class="form-group">
                                       <div class="row colbox">
                                           <div class="col-lg-4 col-sm-4">
                                           <label for="txt_password" class="control-label">Password</label>
                                           </div>
                                           <div class="col-lg-8 col-sm-8">
                                                <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                                <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                           </div>
                                       </div>
                                   </div>
                                                  
                                   <div class="form-group">
                                       <div class="col-lg-12 col-sm-12 text-right">                                       		
                                            <input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Iniciar sesión" />			           	   
                                       </div>                   
                                   </div>                                   
                              </fieldset>
                              <?php echo form_close(); ?>
                              <?php echo $this->session->flashdata('msg'); ?>
           				</div>
        		</div>
      	</div>
</div>