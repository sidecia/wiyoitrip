<!DOCTYPE html>
<html lang="<?=$languaje?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>::WIYOITRIP:: <?=$title?></title>
     <link href="<?=base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">            
     <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap-theme.min.css");?>">         
     <?php
     if(!empty($css)){
		foreach($css as $item){
			if (strpos($item,'http') !== false) {
				$url_css=$item;
			}else $url_css=base_url($item);
			echo '<link rel="stylesheet" href="'.$url_css.'">';
		}	 
	 }
	 ?>        
     <link href="<?=base_url("assets/css/estilos.css");?>" rel="stylesheet">    
     <script>
		 base_url = '<?=base_url()?>';
     </script>      
     <script src="<?=base_url("assets/js/jquery1.11.3.min.js");?>"></script>  
     <script src="<?=base_url("assets/js/bootstrap.min.js");?>"></script>      
     <?php
     if(!empty($js)){
		foreach($js as $item){
			if (strpos($item,'http') !== false) {
				$url_js=$item;
			}else $url_js=base_url($item);
			echo '<script src="'.$url_js.'"></script>';
		}	 
	 }
	 ?>       	 
</head>
<body>