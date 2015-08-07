@extends('layouts.master')
@section('title')
	Add Address
@stop

{{-- Content --}}
@section('content')
<div class="row">
	<div class="row margine-top">
		<button type="button" class="btn margine-bottom btnNormal" data-toggle="modal" data-target="#addForm">
		  Add Address
		</button>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissable hide" aria-hidden="true" id="address_success_alert"></div>
		</div>
		<table class="table" id="table_info">
			<thead>
			  <tr class="tble-header">
				<th>Street</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
			  </tr>
			</thead>
			<tbody id="addressBody">
				@foreach($arrAddresses as $arrRow)
				<tr>
					<td>{{$arrRow->street}}</td>
					<td>{{$arrRow->city}}</td>
					<td>{{$arrRow->state}}</td>
					<td>{{$arrRow->zip}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		
	<!-- Address Modal -->
	<div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Address</h4>
			<div class="alert alert-warning alert-dismissable hide" aria-hidden="true" id="address_error_alert"></div>
		  </div>
		  <div class="modal-body">
			{!! Form::open( array( 'id' => 'formCreate', 'url' => '#') ) !!}
				<div class="row">
					<div class="form-group col-md-12">
						{!! Form::label('', 'Street :', array('class' => 'cursor-text')) !!}
						{!! Form::text('txtStreet', '', array('id' => 'txtStreet', 'class' => 'form-control required')) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						{!! Form::label('', 'City:', array('class' => 'cursor-text')) !!}
						{!! Form::text('txtCity','', array('id' => 'txtCity', 'class' => 'form-control required')) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						{!! Form::label('', 'State :', array('class' => 'cursor-text')) !!}
						{!! Form::text('txtState', '', array('id' => 'txtState', 'class' => 'form-control required')) !!}
					</div>
				</div>
			</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			{!! Form::submit('Save', array('id' =>'btn-submit','class' => 'btn btn-primary')) !!} 
		  </div>
		{!! Form::close() !!}
		</div>
	  </div>
	</div>
</div>
@stop