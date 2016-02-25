
		<style type="text/css">
		    .jumbotron
		    {
		    	width: 1000px;
		    	background-color: white;
		    }

		</style>

		<div class="jumbotron">

			<div class="card-header"><strong>Add New Wish</strong></div>

			<div class="card-block">
			<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'wish', 'action' => 'savewish']);?>" class="form-horizontal">

				<div class="form-group row">
					<label class="col-md-3 form-control-label">What is it?</label>
					<div class="col-md-9">
						<input type="text" name="wish_type" class="form-control" placeholder="Enter Account Type..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Where is it?</label>
					<div class="col-md-9">
						<input type="text" name="wish_address" class="form-control" placeholder="Enter Bank Place..">
					</div>	
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Account #</label>
					<div class="col-md-9">
						<input type="text" name="wish_account_no" class="form-control" placeholder="Enter Account Number..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">What do I want to with it?</label>
					<div class="col-md-9">
						<textarea type="text" name="wish_dolist" class="form-control" placeholder="Enter Do List.."></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Notify</label>
					<div class="col-md-9">
						<input type="text" name="wish_notify" class="form-control" placeholder="Enter Email">
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
					<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Reset</button>
				</div>

				</div>

			</form>
			</div>


		</div>