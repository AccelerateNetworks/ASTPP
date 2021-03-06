<? extend('master.php') ?>
<? startblock('extra_head') ?>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        build_grid("cdr_reseller_grid","",<? echo $grid_fields; ?>,<? echo $grid_buttons; ?>);

        $("#reseller_cdr_search_btn").click(function(){

            post_request_for_search("cdr_reseller_grid","","cdr_reseller_search");
        });
        $("#id_reset").click(function(){
            clear_search_request("cdr_reseller_grid","");
        });
    });
</script>
<script>
       $(document).ready(function() {
        var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
            + ('0' + (currentdate.getMonth()+1)).slice(-2) + "-"
                + currentdate.getDate() + " 00:00:01";

        var datetime1 = currentdate.getFullYear() + "-"
           +('0' + (currentdate.getMonth()+1)).slice(-2) + "-"
            + currentdate.getDate() + " 23:59:59"

        $("#customer_cdr_from_date").val(datetime);
        $("#customer_cdr_to_date").val(datetime1);
        $("#customer_cdr_from_date").datetimepicker({ dateFormat: 'yy-mm-dd' });
        $("#customer_cdr_to_date").datetimepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
<? endblock() ?>

<? startblock('page-title') ?>
<?= $page_title ?><br/>
<? endblock() ?>

<? startblock('content') ?>
<section class="slice color-three">
	<div class="w-section inverse no-padding">
    	<div class="container">
   	    <div class="row">
            	<div class="portlet-content"  id="search_bar" style="cursor:pointer; display:none">
                    	<?php echo $form_search; ?>
    	        </div>
            </div>
        </div>
    </div>
</section>

<section class="slice color-three padding-b-20">
	<div class="w-section inverse no-padding">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12">
                        <form method="POST" action="del/0/" enctype="multipart/form-data" id="ListForm">
                            <table id="cdr_reseller_grid" align="left" style="display:none;"></table>
                        </form>
                </div>
            </div>
        </div>
    </div><!--<br/>
<div class="pull-right padding-r-20">
      <a class="btn-tw btn" href="/reports/resellerReport_export_cdr_xls"><i class="fa fa-file-excel-o fa-lg"></i>Export CSV</a>
      <a class="btn-xing btn" href="/reports/resellerReport_export_cdr_pdf"><i class="fa fa-file-pdf-o fa-lg"></i>Export PDF</a>
</center></div><br/><br/> -->
</section>


<? endblock() ?>
<? end_extend() ?>
