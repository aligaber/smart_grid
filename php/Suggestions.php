<?php
	session_start();
	require("header.php");
?>
<script>
	var select = "#sug";
</script>

		<form> 
		  <div class="form-group">
			<label for="exampleFormControlTextarea1">What do you suggest?</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="write your suggessions here..."></textarea>
			<br>
			<Div>
				<button  type="button" class="btn btn-outline-success col-md-4">Submit</button>
			</Div>
		 </div>
		</form>

<?php
	
	require("footer.php");
?>
	