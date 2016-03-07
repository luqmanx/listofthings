

      <form class="form-signin" method="post" action="<?php echo $exe->url->create("loginprocess");?>">       
        <h1 class="form-signin-heading"><?php echo $title;?></h1>
        <p> Enter your username and password to log on : </p>

        <?php if($exe->flash->has('error_login')):?>
          <p class="error"><?php echo $exe->flash->get('error_login');?></p>
        <?php endif;?>

        <input type="text" class="form-control" placeholder="Username" name="login_name" value="<?php if($exe->flash->has('login_username')){echo $exe->flash->get('login_username');}?>" required>   
        <input type="password" class="form-control" placeholder="Password" name="login_password" value="<?php if($exe->flash->has('login_password')){echo $exe->flash->get('login_password');}?>" required>


        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        <br>

        <div class="row">
	        <div class="col-xs-6 text-center"><a href="<?php echo $exe->url->create('signup');?>" class="btn btn-link">Sign Up</a></div>
	        <div class="col-xs-6 text-center"><a href="<?php echo $exe->url->create('forgot');?>" class="btn btn-link">Forgot Password?</a></div>
	    </div>
        
      </form>
