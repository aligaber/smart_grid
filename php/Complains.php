<?php
	session_start();
	require("header.php");
?>
<script>
	var select = "#com";
</script>
<form>
  <div class="form-group">
	<label for="exampleFormControlTextarea1">Write your complain:</label>
	<textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="What is wrong with your system?..."></textarea>
	<br>
	<Div>
		<button id="btn" type="button" class="btn btn-outline-danger col-md-4" >submit</button>
	</Div>
 </div>
</form>
<?php
	require("footer.php");
?>