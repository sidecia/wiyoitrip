<div class="container-fluid">    
      <div class="row">      
      	<?php foreach($modulos as $row){ ?>
                <a href="<?=base_url("admin/".strtolower($row->modulo))?>">
                <div class="col-md-2 text-center">
                      <h2 class="text-muted"><?php echo $row->modulo; ?></h2>
                      <p class="text-primary"><?php echo $row->info; ?></p>
                 </div>
        </a>    
        <?php } ?>      	
      	     
      </div>

      <hr>    
    </div> <!-- /container -->