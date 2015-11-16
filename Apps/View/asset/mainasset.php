<html>

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/jasny-bootstrap.min.css">

		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jquery_v1_11_3.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jasny-bootstrap.min.js"></script>

		<style type="text/css">
			.jumbotron
			{
				margin-top: 30px;
			}
			.top
			{
				margin-top: 30px;
			}
			td
			{
				padding: 10px;
			}
			.btn-primary
			{
				width: 150px;
			}
			.responsive-width 
			{
    			width:1000px;
			}
			table.right
			{
				border-spacing: 10px;
				border-collapse: separate;
			}
			td.right
			{
				border: 2px solid black;
				width: 150px;
				background-color: #CC7BDC;
			}

			/* make sidebar nav vertical */ 
			@media (min-width: 768px) {
			  .sidebar-nav .navbar .navbar-collapse {
			    padding: 0;
			    max-height: none;
			  }
			  .sidebar-nav .navbar ul {
			    float: none;
			    display: block;
			  }
			  .sidebar-nav .navbar li {
			    float: none;
			    display: block;
			  }
			  .sidebar-nav .navbar li a {
			    padding-top: 12px;
			    padding-bottom: 12px;
			  }
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

		<script>
			function submitForm()
			{
				$('#submitasset').submit();
			}
		</script>
	</head>

	<body>

		<div class="container">

			<div class="jumbotron">
				
				<form method="post" id="submitasset" action="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'saveasset']);?>">

					<div class="row">
					  <div class="col-sm-3">
					    <div class="sidebar-nav">
					      <div class="navbar navbar-default" role="navigation">
					        <div class="navbar-header">
					          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					          </button>
					          <span class="visible-xs navbar-brand">Sidebar menu</span>
					        </div>
					        <div class="navbar-collapse collapse sidebar-navbar-collapse">
					          <ul class="nav navbar-nav">
					            <li class="active"><a href="#what" aria-control="what" role="tab" data-toggle="tab">What is it?</a></li>
					            <li><a href="#where" aria-control="where" role="tab" data-toggle="tab">Where is it?</a></li>
					            <li><a href="#dev" aria-control="dev" role="tab" data-toggle="tab">Developer</a></li>
					            <li><a href="#status" aria-control="status" role="tab" data-toggle="tab">Status</a></li>
					            <li><a href="#financing" aria-control="status" role="tab" data-toggle="tab">Financing</a></li>
					            <li><a href="#legal" aria-control="legal" role="tab" data-toggle="tab">Legal Information</a></li>
					            <li><a href="#notes" aria-control="notes" role="tab" data-toggle="tab">Notes</a></li>
					          </ul>
					        </div><!--/.nav-collapse -->
					      </div>
					    </div>
					  </div>
					  <div class="col-sm-9">
					  	<div class="tab-content">
					  		<div class="tab-pane active" id="what">
					  			<textarea class="form-control" placeholder="KLCC Apartment" rows="3" cols="10" name="asset_type"></textarea>
					  		</div>
							<div role="tabpanel" class="tab-pane" id="where">
								<textarea class="form-control" placeholder="Address" rows="3" cols="30" name="asset_address"></textarea>
							</div>
						    <div role="tabpanel" class="tab-pane" id="dev">
						    	<textarea class="form-control" placeholder="e.g. YTL" rows="3" cols="30" name="asset_dev"></textarea>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="status">
						    	<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="development">Development</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="got keys">Got the keys</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="empty">Empty</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="tenanted">Tenanted</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" name="status[]" value="live">I live here</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" id="sell" name="status[]" value="midst sell">Midst of selling</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" id="buy" name="status[]" value="midst buy">Midst of buying</label></div></p>

								<table id="sellbuycont">
									<tr>
										
										<td style="border:2px solid black;background-color: #CC7BDC;" colspan="2">Asset Transaction Info</td>
												
									</tr>

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
							
								</table>

						    </div>
						    <div role="tabpanel" class="tab-pane" id="financing">
						    	<p><div class="checkbox"><label><input type="checkbox" id="financeno" name="financing[]" value="no">No</label></div></p>
								<p><div class="checkbox"><label><input type="checkbox" id="financeyes" name="financing[]" value="yes">Yes</label></div></p>

								<table id="financecont">
									<tr>
										
										<td style="border:2px solid black;background-color: #CC7BDC;width:250px;" colspan="2">Financing Info</td>

									</tr>		
									
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
								</table>

						    </div>
						    <div role="tabpanel" class="tab-pane" id="legal">
						    	<table class="right">
									<tr>
										<td class="right">S & P</td>
										<td class="right">Financing</td>
									</tr>
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
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="notes">
						    	<textarea class="form-control" placeholder="XXX" rows="4" name="notes"></textarea>
						    </div>

					  	</div>
					  
					  
					    
					  </div>
					</div>

				<nav>
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'viewasset']);?>"><span class="glyphicon glyphicon-level-up"></span>Back</a></li>
							<li><a href="javascript:submitForm();"><span class="glyphicon glyphicon-floppy-save"></span>Save</a></li>
						</ul>
					</div>
				</nav>

				</form>

				

			</div>
			</div>


		</body>
		</html>