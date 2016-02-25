		<style type="text/css">
		    .jumbotron
		    {
		    	width: 1000px;
		    	background-color: white;
		    }

		</style>

		<div class="jumbotron">

			<div class="card-header"><strong><?php echo $title;?></strong></div>

			<div class="card-block">
			
			<?php if($cashdata):?>

		    <form method="post" action="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'saveeditcash']);?>" class="form-horizontal">

				<?php foreach ($cashdata as $cashdata) :?>
						<input type="hidden" value="<?php echo $cashid;?>" name="cid">

						<div class="form-group row">
							<label class="col-md-3 form-control-label">Account Type: </label>
							<div class="col-md-9">
								<input type="text" name="acc_type" class="form-control" value="<?php echo $cashdata->account_type;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Bank Place:</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="bank_place" value="<?php echo $cashdata->bank_place;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Account No:</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="acc_no" value="<?php echo $cashdata->account_no;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Balance(RM):</label>
							<div class="col-md-9">
								<input type="text" class="form-control" cols="50" name="bal" value="<?php echo $cashdata->balance;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Name : </label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="name" value="<?php echo $cashdata->name;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Phone : </label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="phone" value="<?php echo $cashdata->phone;?>">
							</div> 
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Email : </label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" value="<?php echo $cashdata->email;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Alternative Email:</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="next_email" value="<?php echo $cashdata->next_email;?>">
							</div>
						</div>


				<?php endforeach;?>

						<div class="card-footer">
							<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
							<a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'cash']);?>" class="btn btn-sm btn-default">
								Back</a>
						</div>
		              
		    </form>

			<?php endif;?>
			</div>

			</div>

		</div>

	</body>


</html>