
<style type="text/css">
	.jumbotron
	{
		background-color: white;
	}
</style>

	<div class="jumbotron">

		<div class="card-header">
			<?php echo $title;?>
		</div>

		<div class="card-block">
			<form method="post" class="form-horizontal" action="<?php echo $exe->url->create('default',['controller'=>'trusty','action' => 'savetrusty']);?>">
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Name:</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="trusty_name" placeholder="Name">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Contact Number:</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="trusty_phone" placeholder="Contact Number">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Email:</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="trusty_email" placeholder="Email">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3 form-control-label">Address:</label>
					<div class="col-md-9">
						<textarea class="form-control" name="trusty_address" placeholder="Address"></textarea>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
					<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Reset</button>
				</div>
			</form>

		</div>

	</div>