<nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
          	<img style="max-width:100px; margin-top: -7px;" src="<?=base_url("assets/img/logo.png");?>">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">    
          <ul class="nav navbar-nav">               
                <li><a href="<?=base_url('es');?>" class="language" >Español</a></li>
                <li><a href="<?=base_url('en');?>" class="language" >English</a></li>
            </ul>      
          <form class="navbar-form navbar-right">
            <!--div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div-->
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">                            
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                  </span>
                </div><!-- /input-group -->             
            </div>
        </form>
        </div><!--/.navbar-collapse -->
      </div>
</nav>