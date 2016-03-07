		

				<form method="post" action="<?php echo $exe->url->create('forgot_password');?>" class="form-signin">
					
					<h1 style="color:#339933"><?php echo $title;?></h1>

					<?php if($exe->flash->has('error_email')):?>
					<p class="error"><?php echo $exe->flash->get('error_email');?></p>
					<?php endif;?>

						<div class="card-block">
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Email: </label>
								<div class="col-md-9">
									<input type="text" name="email_forgot" class="form-control" value="<?php if($exe->flash->has('email_forgot_error')){echo $exe->flash->get('email_forgot_error');}?>"required>
								</div>
							</div>
						</div>
						<br>
						<button class="btn btn-block btn-primary" type="submit">Submit</button>

				</form>

			