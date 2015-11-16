<?php
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/jasny-bootstrap.min.css">

		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jquery_v1_11_3.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jasny-bootstrap.min.js"></script>

		<style type="text/css">
			h2
			{
				text-align: center;
			}
			.jumbotron
			{
				margin-top: 30px;
				margin-left: 50px;
				width: 800px;
			}
			td
			{
				padding: 10px;
			}
			.bottom
			{
				margin-left: 120px;
				margin-top: 50px;
			}
			.jumbotron p
			{
				font-size: 100%;
			}
			label
			{
				font-weight: 500;
			}
			table
			{
			    border-collapse: collapse;
			}
			.firstLine td
			{
			    border-bottom: 1px solid black;
			}

		</style>

	</head>

	<body>

		<div class="container">

			<div class="jumbotron">

				<h2><?php echo $title;?></h2>

			<?php if($asset):?>

            <form method="post" action="<?php echo $exe->url->create('default',['controller' => 'asset','action' => 'saveeditasset']);?>" enctype="multipart/form-data">

			<table>
				<?php foreach ($asset as $asset) :?>
				<input type="hidden" value="<?php echo $aid;?>" name="aid">
				<tr>
					<td>Asset Type: </td>
					<td><textarea class="form-control" rows="2" cols="50" name="type"><?php echo $asset->type;?></textarea></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="address"><?php echo $asset->address;?></textarea></td>
				</tr>
				<tr>
					<td>Developer:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="developer"><?php echo $asset->developer;?></textarea></td>
				</tr>
				<tr>
					<td>Status:</td>
					<td><?php 
					$status = unserialize($asset->status);?>
					<p><label><input type="checkbox" name="status[]" value="development"<?php if(in_array('development', $status)): echo ' checked="checked"'; endif; ?> />Development</label></p>
					<p><label><input type="checkbox" name="status[]" value="got keys"<?php if(in_array('got keys', $status)):echo 'checked="checked"';endif;?>/>Got the keys</label></p>
					<p><label><input type="checkbox" name="status[]" value="empty"<?php if(in_array('empty', $status)):echo 'checked="checked"';endif;?>/>Empty</label></p>
					<p><label><input type="checkbox" name="status[]" value="tenanted"<?php if(in_array('tenanted', $status)):echo 'checked="checked"';endif;?>/>Tenanted</label></p>
					<p><label><input type="checkbox" name="status[]" value="live"<?php if(in_array('live', $status)):echo 'checked="checked"';endif;?>/>I live here</label></p>
					<p><label><input type="checkbox" name="status[]" value="midst sell"<?php if(in_array('midst sell', $status)):echo 'checked="checked"';endif;?>/>Midst of selling</label></p>
					<p><label><input type="checkbox" name="status[]" value="midst buy"<?php if(in_array('midst buy', $status)):echo 'checked="checked"';endif;?>/>Midst of buying</label></p>
					
					</td>
				</tr>
				<tr>
					<td>Financing : </td>
					<td><?php $financing=unserialize($asset->financing);?>
						<p><label><input type="checkbox" id="financeno" name="financing[]" value="no"<?php if(in_array('no', $financing)):echo 'checked="checked"';endif;?>/>No</label></p>
						<p><label><input type="checkbox" id="financeyes" name="financing[]" value="yes"<?php if(in_array('yes', $financing)):echo 'checked="checked"';endif;?>/>Yes</label></p>
					</td>
				</tr>
				<tr>
					<td>Notes : </td>
					<td><textarea class="form-control" rows="2" cols="50" name="notes"><?php echo $asset->notes;?></textarea></td>
				</tr>

				<?php endforeach;?>

				<?php if($finance):?>
					<tr class="firstLine">
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p style="color:blue;">Finance Info</p></td>
						<td></td>
					</tr>

					<?php foreach ($finance as $finance) :?>
					
					<tr>
						<td>Bank:</td>
						<td><textarea class="form-control" rows="2" cols="50" name="bank"><?php echo $finance->bank;?></textarea></td>
					</tr>
					<tr>
						<td>Monthly Payment:</td>
						<td><textarea class="form-control" rows="2" cols="50" name="monthly_payment"><?php echo $finance->monthly_payment;?></textarea></td>
					</tr>
					<tr>
						<td>Account #:</td>
						<td><textarea class="form-control" rows="2" cols="50" name="acc_no"><?php echo $finance->acc_no;?></textarea></td>
					</tr>
					<tr>
						<td>MRTA:</td>
						<td><textarea class="form-control" rows="2" cols="50" name="MRTA"><?php echo $finance->MRTA;?></textarea></td>
					</tr>
					<tr>
						<td>Loan Amount:</td>
						<td><textarea class="form-control" rows="2" cols="50" name="loan_amount"><?php echo $finance->loan_amount;?></textarea></td>
					</tr>
					<tr>
						<td>Document Upload:</td>
						<td><a href="<?php echo $assetUrl?>/image/<?=$finance->doc_path;?>"><?php echo $finance->doc_path;?></a>
						</td>
					</tr>
					<tr>
							<td></td>
							<td>
								<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file">
												<span class="fileinput-new">New Upload</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="doc_path"></span>
			  									<span class="fileinput-filename"></span>
			 									<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
								</div>
			  									
							</td>
					</tr>

					<?php endforeach;?>
				<?php endif;?>

				<?php if($legal):?>
					<tr class="firstLine">
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p style="color:blue;">Legal Information</p></td>
						<td></td>
					</tr>
					<?php foreach($legal as $legal):?>
						<tr>
							<td>S & P Name:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="sp_name"><?php echo $legal->sp_name;?></textarea></td>
						</tr>
						<tr>
							<td>S & P Contact No:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="sp_phone"><?php echo $legal->sp_phone;?></textarea></td>
						</tr>
						<tr>
							<td>S & P Email:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="sp_email"><?php echo $legal->sp_email;?></textarea></td>
						</tr>
						<tr>
							<td>Finance Person's Name:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="finance_name"><?php echo $legal->finance_name;?></textarea></td>
						</tr>
						<tr>
							<td>Finance Person's Contact No:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="finance_phone"><?php echo $legal->finance_phone;?></textarea></td>
						</tr>
						<tr>
							<td>Finance Person's Email:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="finance_email"><?php echo $legal->finance_email;?></textarea></td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>

				<?php if($transaction):?>
					<tr class="firstLine">
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p style="color:blue;">Seller/Buyer Transaction Info</p></td>
						<td></td>
					</tr>
					<?php foreach($transaction as $transaction):?>
						<tr>
							<td>Buyer/Seller's Name:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="buyer_seller"><?php echo $transaction->buyer_seller;?></textarea></td>
						</tr>
						<tr>
							<td>Buyer/Seller's Contact No:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="buyer_seller_contact"><?php echo $transaction->buyer_seller_contact;?></textarea></td>
						</tr>
						<tr>
							<td>Lawyer's Name:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="lawyer"><?php echo $transaction->lawyer;?></textarea></td>
						</tr>
						<tr>
							<td>Lawyer's Contact No:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="lawyer_contact"><?php echo $transaction->lawyer_contact;?></textarea></td>
						</tr>
						<tr>
							<td>Price:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="price"><?php echo $transaction->price;?></textarea></td>
						</tr>
						
						<tr>
							<td>Status:</td>
							<td><textarea class="form-control" rows="2" cols="50" name="status_trans"><?php echo $transaction->status;?></textarea></td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>

			</table>

				<div class="bottom">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $exe->url->create('default',['controller'=>'asset', 'action' => 'viewasset']);?>" class="btn btn-primary">Back</a>
				</div>
              
              </form>

			<?php endif;?>

			</div>

		</div>

	</body>


</html>