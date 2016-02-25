
		<script type="text/javascript" src="<?php echo $exe->url->asset('js/jquery_v1_11_3.min.js');?>"></script>

		<style type="text/css">
			.jumbotron
			{
				background-color: white;
			}
			.navbar navbar-light brand-dark
			{
				padding-bottom: 0px;
			}
			
		</style>

		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#sellbuycont').hide();
				$('#financecont').hide();

				$("#sell").change(function() {
					if(this.checked)
					{
						$('#sellbuycont').show();
					}
					else
					{
						$('#sellbuycont').hide();
					}
    			}),

				$("#buy").change(function() {
					if(this.checked)
					{
						$('#sellbuycont').show();
					}
					else
					{
						$('#sellbuycont').hide();
					}
    			}),

    			$('#financeyes').change(function()
    			{
    				if(this.checked)
    				{
    					$("#financeno").prop({ disabled: true, checked: false });
    					$('#financecont').show();
    				}
    				else
    				{
    					$("#financeno").prop({ disabled: false });
    					$('#financecont').hide();
    				}

    			})


			});
		</script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				  var requiredCheckboxes = $(':checkbox[required]');
				  requiredCheckboxes.on('change', function(e) {
				    var checkboxGroup = requiredCheckboxes.filter('[name="' + $(this).attr('name') + '"]');
				    var isChecked = checkboxGroup.is(':checked');
				    checkboxGroup.prop('required', !isChecked);
				  });
				});
		</script>
		


			<div class="jumbotron">

				<div class="card-header"><strong>Add New Asset</strong></div>
					
				<div class="card-block">
				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'saveasset']);?>" class="form-horizontal">

					<div class="form-group row">
						<label class="col-md-3 form-control-label">What is it?</label>
						<div class="col-md-9">
							<input type="text" name="asset_type" class="form-control" placeholder="Enter Asset Type..eg:KLCC Apartment">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Where is it?</label>
						<div class="col-md-9">
							<input type="text" name="asset_address" class="form-control" placeholder="Enter Asset Address">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Developer</label>
						<div class="col-md-9">
							<input type="text" name="asset_dev" class="form-control" placeholder="e.g. YTL">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Status</label>
						<div class="col-md-9">
							<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="development" required>Development</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="got keys" required>Got the keys</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="empty" required>Empty</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="tenanted" required>Tenanted</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="live" required>I live here</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" id="sell" name="status[]" value="midst sell" required>Midst of selling</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" id="buy" name="status[]" value="midst buy" required>Midst of buying</label></div></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label"></label>
						<div class="col-md-9">
						<table id="sellbuycont" class="table table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th>Asset Transaction Info</th>	
									<th></th>		
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="text" class="form-control" placeholder="Buyer/Seller" name="buysellname"></td>
									<td><input type="text" class="form-control" placeholder="Contact" name="buysellcont"></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" placeholder="Lawyer" name="lawyername"></td>
									<td><input type="text" class="form-control" placeholder="Contact" name="lawyercont"></td>
								</tr>					
								<tr>
									<td><input type="text" class="form-control" placeholder="Price" name="price"></td>
									<td><input type="text" class="form-control" placeholder="Status" name="statusfin"></td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Financing</label>
						<div class="col-md-9">
							<p><div class="checkbox"><label><input type="checkbox" id="financeno" name="financing[]" value="no" required>No</label></div></p>
							<p><div class="checkbox"><label><input type="checkbox" id="financeyes" name="financing[]" value="yes">Yes</label></div></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label"></label>
						<div class="col-md-9">
							<table id="financecont" class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>	
										<th>Financing Info</th>
										<th></th>
									</tr>	
								</thead>
								<tbody>
									<tr>
										<td><input type="text" class="form-control" placeholder="Bank" name="bank"></td>
										<td><input type="text" class="form-control" placeholder="Account #" name="acc_no"></td>
									</tr>

									<tr>
										<td><input class="form-control" placeholder="Monthly Payment" name="monthly_payment"></td>
										<td><input type="text" class="form-control" placeholder="MRTA" name="MRTA"></td>
									</tr>

									<tr>
										<td><input type="text" class="form-control" placeholder="Loan Amount" name="loan_amount"></td>
										<td>
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file">
												<span class="fileinput-new">Document <br> Upload</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="doc_path"></span>
			  									<span class="fileinput-filename"></span>
			 									<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
											</div>
										</td>
									</tr>
								</tbody>			
								</table>
							</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Legal Information</label>
						<div class="col-md-9">
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>S & P</th>
										<th>Financing</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="text" placeholder="Name" class="form-control" name="sp_name"></td>
										<td><input type="text" placeholder="Name" class="form-control" name="finance_name"></td>
									</tr>
									<tr>
										<td><input type="text" placeholder="Phone" class="form-control" name="sp_phone"></td>
										<td><input type="text" placeholder="Phone" class="form-control" name="finance_phone"></td>
									</tr>
									<tr>
										<td><input type="text" placeholder="Email" class="form-control" name="sp_email"></td>
										<td><input type="text" placeholder="Email" class="form-control" name="finance_email"></td>
									</tr>
								</tbody>	
							</table>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 form-control-label">Notes</label>
						<div class="col-md-9">
							<input type="text" name="notes" class="form-control" placeholder="XXX">
						</div>
					</div>
					    
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
						<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Reset</button>
					</div>

				</form>

				

			</div>
			</div>