<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $exe->url->asset('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo $exe->url->asset('css/style2.css');?>">
    <script src="<?php echo $exe->url->asset('js/jquery_v1_11_3.min.js');?>"></script>
    
  	<style type="text/css">
    p
    {
      text-align: center;
    }
    h1
    {
      text-align: center;
    }
    body
    {
      background-color: #b8b894;
    }
    .error
    {
      color: red;
    }

  	</style>

  </head>

  <body>

      <div class="wrapper">
        <?php echo $view->render();?>
      </div>

  </body>

  </html>