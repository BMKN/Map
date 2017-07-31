<!DOCTYPE html>
<html>
<head>
<title>Pepper House Price Index</title>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
	</script>
	<script src="API/dropzone.js">
	</script><!-- Style and Library links  -->
	<meta charset="utf-8">
	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js">
	</script>
	<link href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" rel="stylesheet">

	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

	<link href="Drag_and_Drop.css" rel="stylesheet" type="text/css">
	
  <link href="APIie-locator-html5-2-4-3-demo/map.css" rel="stylesheet">
  <script src="API/ie-locator-html5-2-4-3-demo/raphael.min.js"></script>
  <script src="API/ie-locator-html5-2-4-3-demo/settings.js"></script>
  <script src="API/ie-locator-html5-2-4-3-demo/map.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

			<?php include('Menu-bar.php'); ?>

<div id='map-container'></div>
  <link href="map.css" rel="stylesheet">
  <script src="raphael.min.js"></script>
  <script src="settings.js"></script>
  <script src="API/map.js"></script>
  <script>
    var map = new FlaMap(map_cfg);
    map.drawOnDomReady('map-container'); //Draws the map


		map.on('mousein', function(ev, sid, map,e) { 
		var name = map.fetchStateAttr(sid, 'name'); //Gets name of the county 




		document.getElementById("MyCounty").value = name; //Gets the name of the county when clicked and puts into the above hidden form




		$( document ).ready(function() {
    




			

			    var url = "Refined-Filter.php"; // the script where you handle the form input.

			    $.ajax({
			           type: "POST",
			           url: url,
			           data: $("#Hovwer_form").serialize(), // serializes the form's elements.
			           success: function(data)
			           {
			               //$('#Hover_results').html(data); // show response from the php script.


                 $("#Hover_results").html(data);
			           }
			         });

			    e.preventDefault(); // avoid to execute the actual submit of the form.
			});



    $("#Refined_Filter").submit(function(e) 
    {
    	e.preventDefault();
       $.ajax(
       {
           url: "Refined-Filter.php",
           data: $('#Refined_Filter').serialize(),
           type: 'POST',
           async: false
       })
       .done(function(response) 
       {
 
       		$('#Results').html('<h2>The Results are below</h2> <br  '+response);
       		
       		//$('#Refined-Filter').hide();

           var result = JSON.parse(response);      
       })
   });





		 });






		map.on('click', function(ev, sid, map,e) { 
		var name = map.fetchStateAttr(sid, 'name'); //Gets name of the county 
document.getElementById("County").value = name; //Gets the name of the county when clicked and puts into the above hidden form
		
 });

  </script>


<!-- Important! This is for Ajax to display information when mouse hovers over the map -->

<div>
	<form id = "Hovwer_form" method = "post">
		
		 <input class="form-control" id="MyCounty" name="County" type="hidden"  />
	</form>


</div>

<!-- The below is for a more refined filter for based on time  -->

<div class="bootstrap-iso">
<p id = "Form_instructions">Enter Details here for more detailed information </p>
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form id = "Refined_Filter"  method="post">
     <div class="form-group ">
      <label class="control-label " for="Address">
       County
      </label>
      <input class="form-control" id="County" name="County" type="text" readonly />
     </div>

     <div class="form-group ">
      <label class="control-label " for="Year">
       Start Month
      </label>
      <input class="form-control" id="Start_Month" name="Start_Month" type="date" required  />
     </div>
     <div class="form-group ">
      <label class="control-label " for="Start-Month">
       End Month
      </label>
      <input class="form-control" id="End_Month" name="End_Month" placeholder="MM" type="date" required />
     </div>

     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Compare Data 
       </button>

       

      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<div id = "Results">
  

</div>     
<!-- This displays the Ajax submitted form above for results  -->


<div id = "Hover_results">




</div>	
<br>


</body>
</html>