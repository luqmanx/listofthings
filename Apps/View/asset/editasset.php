
		<script type="text/javascript" src="<?php echo $exe->url->asset('js/jquery_v1_11_3.min.js');?>"></script>

		<style type="text/css">
		
			.jumbotron
			{
				background-color: white;
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

			<div class="jumbotron">

				<div class="card-header"><strong><?php echo $title;?></strong></div>

				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'asset','action' => 'saveeditasset']);?>" enctype="multipart/form-data" class="form-horizontal">

				<div class="card-block">

						<?php if($asset):?>
							
								<?php foreach ($asset as $asset) :?>
								<input type="hidden" value="<?php echo $aid;?>" name="aid">
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Asset Type: </label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="type" value="<?php echo $asset->type;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Address:</label>
									<div class="col-md-9">
										<textarea class="form-control" rows="2" cols="50" name="address"><?php echo $asset->address;?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Developer:</label>
									<div class="col-md-9">
										<input class="form-control" type="text" name="developer" value="<?php echo $asset->developer;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Status:</label>
									<div class="col-md-9">
										<?php 
										$status = unserialize($asset->status);?>
											<p><label><input type="checkbox" name="status[]" value="development"<?php if(in_array('development', $status)): echo ' checked="checked"'; endif; ?> />Development</label></p>
											<p><label><input type="checkbox" name="status[]" value="got keys"<?php if(in_array('got keys', $status)):echo 'checked="checked"';endif;?>/>Got the keys</label></p>
											<p><label><input type="checkbox" name="status[]" value="empty"<?php if(in_array('empty', $status)):echo 'checked="checked"';endif;?>/>Empty</label></p>
											<p><label><input type="checkbox" name="status[]" value="tenanted"<?php if(in_array('tenanted', $status)):echo 'checked="checked"';endif;?>/>Tenanted</label></p>
											<p><label><input type="checkbox" name="status[]" value="live"<?php if(in_array('live', $status)):echo 'checked="checked"';endif;?>/>I live here</label></p>
											<p><label><input type="checkbox" name="status[]" value="midst sell"<?php if(in_array('midst sell', $status)):echo 'checked="checked"';endif;?>/>Midst of selling</label></p>
											<p><label><input type="checkbox" name="status[]" value="midst buy"<?php if(in_array('midst buy', $status)):echo 'checked="checked"';endif;?>/>Midst of buying</label></p>
									</div>
								</div>
								
								<?php if($transaction):?>
									<?php foreach($transaction as $transaction):?>

									<div class="form-group row">
										<label class="col-md-3 form-control-label"></label>
										<div class="col-md-9">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Asset Transaction Info</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input type="text" class="form-control" name="buyer_seller" value="<?php echo $transaction->buyer_seller;?>" placeholder="Buyer/Seller"></td>
														<td><input type="text" class="form-control" name="buyer_seller_contact" value="<?php echo $transaction->buyer_seller_contact;?>" placeholder="Contact"></td>
													</tr>
													<tr>
														<td><input type="text" class="form-control" name="lawyer" value="<?php echo $transaction->lawyer;?>" placeholder="Lawyer"></td>
														<td><input type="text" class="form-control" name="lawyer_contact" value="<?php echo $transaction->lawyer_contact;?>" placeholder="Contact"></td>
													</tr>
													<tr>
														<td><input type="text" class="form-control" name="price" value="<?php echo $transaction->price;?>" placeholder="Price"></td>
														<td><input type="text" class="form-control" name="status_trans" value="<?php echo $transaction->status;?>" placeholder="Status"></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
										
									<?php endforeach;?>
								<?php endif;?>

								<div class="form-group row">
									<label class="col-md-3 form-control-label">Financing : </label>
									<div class="col-md-9">
										<?php $financing=unserialize($asset->financing);?>
										<p><label><input type="checkbox" id="financeno" name="financing[]" value="no"<?php if(in_array('no', $financing)):echo 'checked="checked"';endif;?>/>No</label></p>
										<p><label><input type="checkbox" id="financeyes" name="financing[]" value="yes"<?php if(in_array('yes', $financing)):echo 'checked="checked"';endif;?>/>Yes</label></p>
									</div>
								</div>

								<!-- if finance is yes-->
								<?php if($finance):?>
									<div class="form-group row">
										<label class="col-md-3 form-control-label"></label>
										<div class="col-md-9">
										<?php foreach ($finance as $finance) :?>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Finance Info</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="form-control" type="text" name="bank" value="<?php echo $finance->bank;?>" placeholder="Bank"></td>
														<td><input class="form-control" name="monthly_payment" type="text" value="<?php echo $finance->monthly_payment;?>" placeholder="Monthly Payment"></td>	
													</tr>
													<tr>
														<td><input class="form-control" type="text" value="<?php echo $finance->acc_no;?>" name="acc_no" placeholder="Account #"></td>
														<td><input class="form-control" type="text" value="<?php echo $finance->MRTA;?>" name="MRTA" placeholder="MRTA"></td>
													</tr>
													<tr>
														<td><input class="form-control" type="text" value="<?php echo $finance->loan_amount;?>" name="loan_amount" placeholder="Loan Amount"></td>
														<td>
															Document Upload:<a href="<?php echo $assetUrl?>/image/<?=$finance->doc_path;?>"><?php echo $finance->doc_path;?></a>
																<br>
																<label>New Upload : </label>
																<input type="file" id="file-input" name="doc_path">
															
														</td>
													</tr>
												</tbody>
											</table>
											<?php endforeach;?>
										</div>
									</div>

								<?php endif;?>

						<?php if($legal):?>
							<div class="form-group row">
										<label class="col-md-3 form-control-label">Legal Information :</label>
										<div class="col-md-9">
											<?php foreach($legal as $legal):?>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>S & P</th>
														<th>Financing</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input type="text" class="form-control" name="sp_name" value="<?php echo $legal->sp_name;?>" placeholder="Name"></td>
														<td><input class="form-control" type="text" value="<?php echo $legal->finance_name;?>" name="finance_name" placeholder="Name"></td>
													</tr>
													<tr>
														<td><input class="form-control" type="text" value="<?php echo $legal->sp_phone;?>" name="sp_phone" placeholder="Phone"></td>
														<td><input class="form-control" type="text" value="<?php echo $legal->finance_phone;?>" name="finance_phone" placeholder="Phone"></td>
													</tr>
													<tr>
														<td><input class="form-control" type="text" value="<?php echo $legal->sp_email;?>" name="sp_email" placeholder="Email"></td>
														<td><input class="form-control" type="text" value="<?php echo $legal->finance_email;?>" name="finance_email" placeholder="Email"></td>
													</tr>
												</tbody>
											</table>
											<?php endforeach;?>
										</div>
							</div>
								
						<?php endif;?>

							<div class="form-group row">
									<label class="col-md-3 form-control-label">Notes : </label>
									<div class="col-md-9">
										<textarea class="form-control" rows="2" cols="50" name="notes"><?php echo $asset->notes;?></textarea>
									</div>
								</div>

								<?php endforeach;?>
						
						<?php endif;?>

				</div>	

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Save</button>
					<button type="reset" class="btn btn-sm btn-danger">
						<i class="fa fa-ban"></i>Reset</a></button>
				</div>

				</form>
				

			</div>
