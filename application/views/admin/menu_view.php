<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> 
	  <?php
	  	if($nivelusuario<>-1) $url="admin/admin";
		else $url="admin/vendedor";
	  ?>
      <a class="navbar-brand" href="<?=base_url($url)?>">:: CMS ::</a>
     
       <a href="<?=base_url($url)?>" class="navbar-brand">Bienvenido <?php echo $username; ?> !</a>
    </div>

	
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
              <ul class="nav navbar-nav navbar-right">  
              	<?php
				if($nivelusuario<>-1){
				?>     
               		 <li><a href="<?=base_url("admin/admin/logout")?>" class="navbar-brand">Salir</a></li>
				<?php
				}else{
				?>
                	<li><a href="<?=base_url("admin/login")?>" class="navbar-brand">Regresar</a></li>
                <?php	
				}
				?>        
              </ul>
            </div><!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
</nav>