<?php if(isset($header)) echo $header; 
 if(isset($left_menu)) echo $left_menu; 
 if(isset($top_nav)) echo $top_nav;
 ?>
 <!-- page content -->
<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#servicesub1').hide();
	$('#servicesub2').hide();
	
	$('#service_select').on('change', function(){
	  $.ajax({
		type: "POST",
		//data:'loc_id='+id+','+'itname='+','+itemname,
		url: "<?php echo base_url();?>settings/ajax_servicedisp",
		//url: "<?php //echo base_url();?>creation/ajax_changes/"+id+"/"+escape(itemname),
		success: function(data){
			//alert(data);
			$("#service").html(data);
			$('#servicesub1').hide();
			$('#servicesub2').hide();	
		}
	});	
	});
	
	$('#service_location').on('change', function(){
	var sc = $('#service_location').val();
	if(sc == 'c2')
	{
		$('#servicesub1').show();
		$('#servicesub2').hide();
	}
	else if(sc == 'c3')
	{
		$('#servicesub1').hide();
		$('#servicesub2').show();
	}
	else
	{
		$('#servicesub1').hide();
		$('#servicesub2').hide();
	}
});
});

</script>
<form name="frm_service" method="post" action=""  enctype="multipart/form-data">
<div class="right_col" role="main">
 <div class="row">
	<div class="col-xs-4">
    <?php if($success){
 echo '<div><span style="color:#090">'.$success.'</span></div>';
}
else{
echo '<div><span style="color:#C00">'.$error.'</span></div>';
}
?>
    <div id="service_dropdown">
      <select name="service_select" id="service_select" class="form-control">
        <option value="">Add</option>
        <option value="One-on-one Service">One-on-one Service</option>
        <option value="Group Event">Group Event</option>
      </select>
      </div>
      <div id="service">
        <!--	<div>
              <label>Service Name</label>
              <input type="text" name="txtsname"/> 
            </div>
           <div>
              <label>Service Details</label>
              <input type="text" name="txtsdetail"/> 
            </div>
            <div>
              <label>Location</label>
              <select name="service_location" id="service_location" class="form-control">
                  <option value="c1">Phone-You call the client</option>
                  <option value="c2">Phone-Client calls you</option>
                  <option value="c3">Online Meeting</option>
     		 </select>
            </div>
            <div id="servicesub1">
              <label>Your Phone Number</label>
              <input type="text" name="txtphoneno"/> 
            </div>
            <div id="servicesub2">
              <label>URL</label>
              <input type="text" name="txturl"/> 
            </div>
             <div>
              <label>Duration</label>
               <select name="service_durationh" id="service_durationh">
               <?php
			   		/*for($i=0;$i<=18;$i++)
					{
                    	echo "<option value='".$i."'>".$i." hours</option>";
					}*/
				 ?>
			   </select>
               <label>and</label>
               <select name="service_durationm" id="service_durationm">
               <?php
			   		/*for($j=0;$j<60;$j=$j+5)
					{
                    	echo "<option value='".$j."'>".$j." minutes</option>";
				    } */
				 ?>
			   </select>
            </div>
            <div><input type="submit" name="sub_save" value="Save"/></div>  -->                       
	</div>       
</div>
	<!--<div class="col-xs-4">
    </div>	-->
</div>
</div>
</form>
<?php if(isset($footer)) echo $footer; ?>