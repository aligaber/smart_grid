<?php
	session_start();
	require("header.php");
?>
<style>
	body{ 
		background-image: url('../images/background.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center; 
		background-size: 100%;
		}
</style>

<script>
    var select = "#hom";
</script>
<div id="home_h2">
	<h2>Smart grid is the technology of the futre.</h2>
</div>

<div id="vid">
	<video width="800" height="500px" controls poster="../images/poster.jpg">
	  <source src="../videos/The Big Pictur.MP4" type="video/mp4">
	Your browser does not support the video tag.
	</video>
</div>
<?php
	require("footer.php");
?>