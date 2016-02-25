

		<style type="text/css">

			.jumbotron
			{
				background-color: white;
			}
			

		</style>

			<div class="jumbotron">

				<div class="card-header"><strong><?php echo $title;?></strong></div>

				<div class="card-block">

					<?php if($wish):?>

           			<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'updatewish']);?>">

           				<?php foreach ($wish as $wish) :?>
							<input type="hidden" value="<?php echo $wishid;?>" name="wid">

							<div class="form-group row">
								<label class="col-md-3 form-control-label">What is it?</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="wish_type" value="<?php echo $wish->wish_type;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Where is it?</label>
								<div class="col-md-9">
									<textarea class="form-control" name="wish_address"><?php echo $wish->wish_address;?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Account #:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="wish_acc" value="<?php echo $wish->wish_acc;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">What do I want to do with it:</label>
								<div class="col-md-9">
									<textarea class="form-control" rows="2" cols="50" name="wish_dolist"><?php echo $wish->wish_dolist;?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Notify : </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="wish_notify" value="<?php echo $wish->wish_notify;?>">
								</div>
							</div>


						<?php endforeach;?>

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
							<a href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>" class="btn btn-default">Back</a>
						</div>

           			</form>
           			 <?php endif;?>

				</div>		

			</div>