<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header') ;
?>           
    <div class="row top-buffer">
        <div class="col-md-12">
            <?php if(isset($message)){ ?> 
                <div class="alert alert-success">
                  <p><?php echo $message; ?></p>
                </div>
            <?php } ?> 
        </div>
    </div>
    <div class="row top-buffer">
        <div class="col-md-12">
            <div class="col-md-8 ">
                <a class="add-record btn btn-primary" href ="address/addNewAddress"> Add New Record </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id='demo'>
                <table id="list" cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>
            </div>  
        </div>
    </div>
<?php $this->load->view('footer') ;?>        

<script>
$(document).ready(function(){    
    $('#list').dataTable( {
        "data": <?php echo json_encode($addressDetials)?>,
        "columns": [
            { "title": "Id","class": "center" },
            { "title": "Street" },
            { "title": "City" },
            { "title": "State" },
            { "title": "Zip", "class": "center" }
        ]
    } );    
});
 </script>