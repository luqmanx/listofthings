
				<?php if($user_id):?>
				<h1 style="color:#339933"><?php echo $title;?></h1>

					<div class="card-block">
						<div class="form-group row">
							<label class="col-md-3 form-control-label"></label>
							<div class="col-md-9">
								Password already being reset.<br>
								Click <a href="<?php echo $exe->url->create('login');?>"> here </a>to sign in
							</div>
						</div>
					</div>
					<br>
					<?php endif;?>

					<?php if(!($user_id)):?>
					<p></p>
					<?php endif;?>