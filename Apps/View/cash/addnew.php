
		<style type="text/css">
		    .jumbotron
		    {
		    	width: 1000px;
		    	background-color: white;
		    }

		</style>

		<div class="jumbotron">

			<div class="card-header"><strong>Add New Cash</strong></div>

			<div class="card-block">
			<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'savecash']);?>" class="form-horizontal">

				<div class="form-group row">
					<label class="col-md-3 form-control-label">What is it?</label>
					<div class="col-md-9">
						<input type="text" name="account_type" class="form-control" placeholder="Enter Account Type..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Where is it?</label>
					<div class="col-md-9">
						<input type="text" name="bank_place" class="form-control" placeholder="Enter Bank Place..">
					</div>	
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Account #</label>
					<div class="col-md-9">
						<input type="text" name="account_no" class="form-control" placeholder="Enter Account Number..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Balance(RM)</label>
					<div class="col-md-9">
						<input type="text" name="balance" class="form-control" placeholder="Enter Balance of Account..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Contact</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" placeholder="Enter Name..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label"></label>
					<div class="col-md-9">
						<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label"></label>
					<div class="col-md-9">
						<input type="text" name="email" class="form-control" placeholder="Enter Email..">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Notes</label>
					<div class="col-md-9">
						<input type="text" name="next_email" class="form-control" placeholder="Enter Alternative Email..">
					</div>
				</div>

				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
					<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Reset</button>
				</div>

			</form>
			</div>


		</div>