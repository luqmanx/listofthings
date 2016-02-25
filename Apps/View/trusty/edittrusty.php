

		<style type="text/css">
		
			.jumbotron
			{
				background-color: white;
			}

		
		</style>

			<div class="jumbotron">

				<div class="card-header"><strong><?php echo $title;?></strong></div>

				<div class="card-block">

					<?php if($edittrusty):?>

						<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'saveedittrusty']);?>">

							<?php foreach ($edittrusty as $edittrusty) :?>
								<input type="hidden" value="<?php echo $trusty_id;?>" name="tid">

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Name: </label>
									<div class="col-md-9">
										<input type="text" name="trusty_name" class="form-control" value="<?php echo $edittrusty->trusty_name;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Contact Number: </label>
									<div class="col-md-9">
										<input type="text" name="trusty_phone" class="form-control" value="<?php echo $edittrusty->trusty_phone;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Email: </label>
									<div class="col-md-9">
										<input type="text" name="trusty_email" class="form-control" value="<?php echo $edittrusty->trusty_email;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Address: </label>
									<div class="col-md-9">
										<textarea class="form-control" rows="2" cols="50" name="trusty_address"><?php echo $edittrusty->trusty_address;?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<input type="hidden" name="updated_date" value="<?php echo date("Y-m-d H:i:s");?>">
								</div>

							<?php endforeach;?>

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'assigntrusty']);?>" class="btn btn-default">Cancel</a>
							</div>

						</form>

					<?php endif;?>



				</div>

			

              
       

		</div>