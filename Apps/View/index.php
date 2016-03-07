

    <script language='javascript' type='text/javascript'>
       function check(input) {
       if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('The passwords must match with the first.');
       } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
        }
      }
    </script>

      <form class="form-signin" method="post" action="<?php echo $exe->url->create("register");?>">       
        <h1 class="form-signin-heading"><?php echo $title;?></h1>
        <p> Create your own personal journal & <br> online diary now </p>

        <?php if($exe->flash->has('error_user')):?>
          <p class="error"><?php echo $exe->flash->get('error_user');?></p>
        <?php endif;?>

        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if($exe->flash->has('username')){echo $exe->flash->get('username');}?>" required>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if($exe->flash->has('email')){echo $exe->flash->get('email');}?>" required>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php if($exe->flash->has('password')){echo $exe->flash->get('password');}?>" required minlength="6">
         <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" value="<?php if($exe->flash->has('password')){echo $exe->flash->get('password2');}?>" required minlength="6" oninput="check(this)">   
        
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <br>

        <p>Already have an account. Login <a href="<?php echo $exe->url->create("login");?>"> here</a></p>  
      </form>

 
    