<?php 
/*
* Created at 8/10/2015
* Page to add and display the addresses
* 
*/
  require_once('includes/header.php');
  require_once('classess/class.address.php');
  /**
  *code to display all address from table
  */
	$address   = new Address();
	$a_addresses = $address->get();
?>
<div class="col-md-12 no-padding">
	<div class="col-md-12 sub-container">
		<div class="row">
			<div class="row margine-top">
				<button type="button" class="btn btn-primary margine-bottom float-right" data-toggle="modal" data-target="#addForm">
				  Add Address
				</button>
				<div class="col-md-12">
					<div class="alert alert-success alert-dismissable hide" aria-hidden="true" id="address_success_alert"></div>
				</div>
				<input type="hidden" name="site_url" id="site_url" value="<?php echo SITE_URL; ?>">
				<table class="table table_bordered" id="table_info">
					<thead>
					  <tr class="tble-header">
						<th>Street</th>
						<th>City</th>
						<th>State</th>
						<th>Zip</th>
					  </tr>
					</thead>
					<tbody id="addressBody">
						<?php foreach($a_addresses as $a_row): 
							echo '<tr>
								<td>'.$a_row['s_street'].'</td>
								<td>'.$a_row['s_city'].'</td>
								<td>'.$a_row['s_state'].'</td>
								<td>'.$a_row['i_zip'].'</td>
							</tr>';
						 endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Address</h4>
					<div class="alert alert-warning alert-dismissable hide" aria-hidden="true" id="address_error_alert"></div>					
				  </div>
				  <div class="modal-body">
					<form method="post" action="#" id="formCreate">
						<div class="row">
							<div class="form-group col-md-12">
								<label class = "cursor-text" >Street </label>
								<input type="text" name="txtStreet" value="" id="txtStreet" class="form-control required">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label class = "cursor-text" > City </label>
								<input type="text" name="txtCity" value="" id="txtCity" class="form-control required">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label class = "cursor-text" > State </label>
								<input type="text" name="txtState" value="" id="txtState" class="form-control required">
							</div>
						</div>
					</div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" id="btn-submit" name="Save" class="btn btn-primary" value="Save">
				  </div>
				</form>
				</div>
			  </div>
			</div>
		</div>
<?php require('includes/footer.php');?>