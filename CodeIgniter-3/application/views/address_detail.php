<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('header') ;?>
	<div class="row">
		<div class="col-md-12">
			<?php echo form_open('save', 'id="addressDetials" method=post name=addressDetials role="form" class="form"');?>
			<div class="col-md-4 text-right">
				<?php echo form_label('Street', 'street',"class='form-control'"); ?>
			</div>
			<div class="col-md-4">
				<?php echo form_input('street', '',"class='form-control' placeholder='Enter Street' title='Enter Street' required"); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4 text-right">
				<?php echo form_label('City', 'city',"class='form-control'"); ?>
			</div>
			<div class="col-md-4">
				<?php echo form_input('city', '',"class='form-control' placeholder='Enter City' title='Enter City' required"); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4 text-right">
				<?php echo form_label('State', 'state',"class='form-control'"); ?>
			</div>
			<div class="col-md-4">
				<?php echo form_input('state', '',"class='form-control' placeholder='Enter State' title='Enter State' required "); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-md-offset-1">
			<div class="col-md-8 text-center">
				<?php echo form_submit('save', 'Save Address Details!', "class='btn btn-primary'"); ?>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
<?php $this->load->view('footer') ;?> 