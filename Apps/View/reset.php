

				<?php if($user_id):?>
				<form method="post" action="<?php echo $exe->url->create('reset_password');?>" class="form-signin">

				<h1 style="color:#339933"><?php echo $title;?></h1>

					
					<div class="card-block">
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Enter new password: </label>
							<div class="col-md-9">
								<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
								<input type="password" name="new_password" class="form-control">
							</div>
						</div>
					</div>
					<br>
					<button class="btn btn-block btn-primary" type="submit">Submit</button>

				</form>
				<?php endif;?>

				<?php if(!($user_id)):?>
					<p>No ID is found. Cannot reset password</p>
				<?php endif;?>