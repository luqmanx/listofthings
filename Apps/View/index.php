<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">

  	<style type="text/css">
    p
    {
      text-align: center;
    }
    h1
    {
      text-align: center;
    }
  	img
  	{
     width: 300px;
     height: 200px;
     margin-top: 30px;
  	}
    td.height
    {
      padding: 15px;
    }
  	.jumbotron
  	{
 		margin-top: 30px;
 		margin-left: 250px;
 		width: 500px;
 		background-color: #E6F5FA
  	}
    .container
    {
     background-image: url('<?php echo $assetUrl;?>/image/backgroundimage.jpg');
    }
    .error
    {
      color: red;
    }
  	</style>
  </head>
  <body>
    
    <div class="container">
      <nav>
        <div class="container-fluid">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $exe->url->create('signup');?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            <li><a href="<?php echo $exe->url->create('login');?>"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
          </ul>
        </div>
      </nav>
    	<div class = "jumbotron">
  			<h1 style="color:#339933"><?php echo $title;?></h1>
        <p> Create your own personal journal & <br> online diary now </p>
  	     
        <form method="post" action="<?php echo $exe->url->create("register");?>">

        <?php if($exe->flash->has('error_user')):?>
          <p class="error"><?php echo $exe->flash->get('error_user');?></p>
        <?php endif;?>

        <table align="center">
          <tr>
            <td>
              <input type="text" placeholder="YOUR NAME" class="form-control" name="username" size="40" value="<?php if($exe->flash->has('username')){echo $exe->flash->get('username');}?>" required>
            </td>
          </tr>
          <tr>
            <td>
              <input type="email" placeholder="YOUR EMAIL" class="form-control" name="email" size="40" value="<?php if($exe->flash->has('email')){echo $exe->flash->get('email');}?>" required>
            </td>
          </tr>
          <tr>
            <td>
              <input type="password" placeholder="ADD YOUR PASSWORD" class="form-control" name="password" size="40" value="<?php if($exe->flash->has('password')){echo $exe->flash->get('password');}?>" required>
            </td>
          </tr>
          <tr>
            <td class="height">
            <button type="submit" class="btn btn-primary" style="width:300px">GET YOUR FREE ACCOUNT</button>
          </td>
          </tr>
        </table>

        </form>
  		</div>
  
    </div>
  	
  </body>
</html>