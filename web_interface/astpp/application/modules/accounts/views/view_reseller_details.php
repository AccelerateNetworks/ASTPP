<? extend('master.php') ?>
<? startblock('extra_head') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/module_js/generate_grid.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        //$('#tabs').tabs();
        build_grid("chrges_grid","<?php echo base_url(); ?>accounts/reseller_details_json/charges/<?= $account_data[0]['id']; ?>",<? echo $charges_grid_field ?>,"");

        build_grid("did_grid","<?php echo base_url(); ?>accounts/reseller_details_json/did/<?= $account_data[0]['id']; ?>",<? echo $did_grid_fields ?>,"");

        build_grid("invoice_grid","<?php echo base_url(); ?>accounts/reseller_details_json/invoices/<?= $account_data[0]['id']; ?>",<? echo $invoice_grid_fields ?>,"");

        build_grid("cdrs_grid","<?php echo base_url(); ?>accounts/customer_details_json/reports/<?= $account_data[0]['id']; ?>",<? echo $cdrs_grid_fields ?>,"");        
    
        $(".sweep_id").change(function(e){
            if(this.value != 0){
                $.ajax({
                    type:'POST',
                    url: "<?= base_url()?>/accounts/customer_invoice_option",
                    data:"sweepid="+this.value, 
                    success: function(response) {
                        $(".invoice_day").html(response);
                        $('.invoice_day').show();
                        $('label[for="Billing Day"]').show()
                    }
                });
            }else{
                $('label[for="Billing Day"]').hide()
                $('.invoice_day').css('display','none');                
            }
        })

});
</script>

<? endblock() ?>
<? startblock('page-title') ?>
<?= $page_title ?><br/>
<? endblock() ?>
<? startblock('content') ?>   

<ul class="tabs" data-persist="true">
        <li><a href="#customer_details">Reseller Details</a></li>
        <li><a href="#packages">Subscriptions</a></li>
        <li><a href="#did">DID</a></li>
        <li><a href="#invoices">Invoices</a></li>
        <li><a href="#cdrs">CDRs</a></li>
</ul>	
    <div class="tabcontents">        
      <div>
          <div class="col-md-12">
            <section class="slice color-three no-margin">
                <div class="w-section inverse no-padding">
            <div id="customer_details">
                    <div style="color:red;margin-left: 60px;">
			<?php
			if (isset($validation_errors)) {
			   $validation_array=json_decode($validation_errors);
			   if(is_object($validation_array)){
			   $validation_array = get_object_vars($validation_array);
			   foreach($validation_array as $key=>$value)
			      echo $value."<br/>";
			   }
			   else
			      echo $validation_errors;
			   
			}
			?>
		  </div>
		         <?php echo $form; ?>   
            </div>

    <!-- Package table started -->
    <div id='packages'>
<!--      <div class="container">
          <div class="row">
            <section class="slice color-three no-margin">
                <div class="w-section inverse no-padding"> -->
                   <!--<div class="col-md-6 color-three padding-b-20 margin-t-10">
                        <form method="post" action="<?= base_url() ?>accounts/customer_add_postcharges/customer/<?= $account_data[0]['id'] ?>" enctype="multipart/form-data">
                            <label class="col-md-3">Description</label><input class="col-md-2 form-control" name="desc" size="16" type="text">
                            <label class="col-md-3">Amount</label><input class="col-md-2 form-control"  name="amount" size="8" type="text">
                            <input class="padding-l-20 btn btn-success" name="action" value="Post Charge..." type="submit">
                        </form>
                    </div> 
                    -->
                    <div class="col-md-12 color-three padding-t-10" style="padding-top:15px;"><!--Add Charge -->
                     <br/>   <form method="post" action="<?= base_url() ?>accounts/customer_charges_action/add/<?= $account_data[0]['id'] ?>/reseller/" enctype="multipart/form-data">
                             <label class="col-md-2">Applyable Subscriptions</label>
                             <div style="width:500px;">
                                <? echo $chargelist; ?>
			      </div>
                                <input class="margin-l-20 btn btn-success" name="action" value="Add Subscriptions" type="submit">
                        </form>
                    </div>   
                
                   <div class="col-md-12 color-three padding-b-20">
                       <table id="chrges_grid" align="left" style="display:none;"></table>  
                   </div>   
            <!--    </div>
            </section>
          </div>
      </div>-->
    </div>
    <div id='did'>
<!--         <div class="container">
          <div class="row">
            <section class="slice no-margin">
                <div class="w-section inverse no-padding col-md-12"> -->
                    <div class="col-md-12 color-three padding-t-10" style="padding-top:15px;"><!-- Purchase DIDs--><br/>
                        <form method="post" name="free_did_list" action="<?= base_url() ?>accounts/reseller_did_action/add/<?= $account_data[0]['id'] ?>/reseller/" enctype="multipart/form-data">
                        <label class="col-md-2">Available DIDs : </label>
                        <div style="width:500px;">
                            <? echo $didlist; ?>
			</div>
                        <input class="margin-l-20 btn btn-success" name="action" value="Purchase DID" type="submit">
                        </form>
                    </div>                 
                    <div class="col-md-12 color-three padding-b-20">
                          <table id="did_grid" align="left" style="display:none;"></table>  
                    </div>
                   
<!--                </div>
            </section>
    </div></div>
       </div> -->
    </div>

    <!--  Charges table completed -->
    <div id='invoices'>
<!--      <div class="container">
          <div class="row">
            <section class="slice no-margin">
                <div class="w-section inverse no-padding col-md-12"> -->
                      <div class="col-md-12 color-three padding-b-20">
                          <table id="invoice_grid" align="left" style="display:none;"></table>                 
                      </div>
<!--                </div>
             </section>
          </div>
      </div>-->
    </div>

   
    
    <div id='cdrs'>
<!--      <div class="container">
          <div class="row">
            <section class="slice no-margin">
                <div class="w-section inverse no-padding"> -->
                    <div class="col-md-12 color-three padding-b-20">
                       <table id="cdrs_grid" align="left" style="display:none;"></table>              
                    </div>
<!--                </div>
             </section>
          </div>
      </div> -->
    </div>
        </div>      
    </section>        
  </div>
</div>    
</div>


<? endblock() ?>	
<? startblock('sidebar') ?>
Filter by
<? endblock() ?>
<? end_extend() ?>  
