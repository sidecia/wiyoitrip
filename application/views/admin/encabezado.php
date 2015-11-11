<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>::WIYOI:: <?=$title?></title>    
     <link href="<?=base_url("assets/grocery_crud/themes/flexigrid2/css/bootstrap.min.css");?>" rel="stylesheet">  
          <?php 
			if(isset($css_files) and count($css_files)>0){
				foreach($css_files as $file): 
				?>
				<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach;
	}	
	?>                     
     <script src="<?=base_url("assets/grocery_crud/themes/flexigrid2/js/jquery-1.11.1.min.js");?>"></script>                           
     <script>
		 base_url = '<?=base_url()?>';
     </script>
    <?php 
	if(isset($js_files) and count($js_files)>0){
		foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; 
	}?> 	
</head>
<body>