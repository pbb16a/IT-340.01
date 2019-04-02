<?php
	//---------------------------------------------------
	//connect to database server
	//---------------------------------------------------
?>
<html> 
	<head>
		<title>Create Cycle</title>
		<!-- This is where you will out the bootstrap -->
		<script>
			function add_activity(){
				var existing_forms = document.getElementById("activities").innerHTML;

				var updated_form= existing_forms+'<form action="/input.php" method="POST"><input type="hidden" name="action" value="New Activity"><label>Name of Activity: </label><input type="text" name="act_name"><br><label>Description of Activity: </label><input type="textarea" name="act_desc"><br><label>What Type of value will you be storing?</label><select><option value="tru_fal" selected>None Selected</option><option value="num_val">Numaric Value</option><option value="s_text">Short Text</option><option value="l_text">Long Textbox</option><option value="tru_fal">True or False</option><option value="array">Array</option></select><br><br></form>';

				document.getElementById("activities").innerHTML = updated_form;

			}
			function finish_cycle(){
				var existing_forms = document.getElementById("activities").innerHTML;

				var updated_form= existing_forms+'<label>Action that needs to be taken at the end of this cycle </label><input type="text" name="end_act"><br>';

				document.getElementById("activities").innerHTML = updated_form;

				// change buttons
				document.getElementById("new_act").value = "New Cycle";
				document.getElementById("new_act").setAttribute("onclick", "new_cycle()");

				document.getElementById("done").value = "Finished";
				document.getElementById("done").setAttribute("onclick", "finish()");



			}
			function new_cycle(){
				alert("new cycle");
			}
			function finish(){
				document.getElementById("done").setAttribute("type", "submit");

			}
		</script>
	</head>
	<body> 
		<h1>Create a New Cycle Page</h1>
		<div id="forms">
			<form action="index.php" method="POST">
				<input type="hidden" name="action" value="NewCycle">
				<label>Name of Cycle: </label>
	  			<input type="text" name="cyc_name"><br>
	  			<label>Description of Cycle: </label>
	  			<input type="textarea" name="cyc_desc"><br>
	  			<label>Length of Cycle: </label>
	  			<input type="text" name="cyc_leng" placeholder="Numaric Value. Ex) 2">
	  			<select>
	  				<option value="tru_fal" selected>Hours</option>
	  				<option value="num_val">Days</option>
	  				<option value="s_text">Weeks</option>
	  				<option value="l_text">Months</option>
	  				<option value="tru_fal">Years</option>
	  			</select>
	  			<div id="activities"><br>
	  			</div>
	  			<input type="button" value="New Activity" id="new_act" onclick="add_activity()">
	  			<input type="button" value="Done" id="done" onclick="finish_cycle()">
			</form>
		</div>
		
	</body>
</html>
