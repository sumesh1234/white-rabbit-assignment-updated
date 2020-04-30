<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>White Rabbit Test</title>
<?php
require_once('includes/header-styles.php');
?>
</head>
<body>
	
<div class="container">
	<?php
require_once('includes/header.php');
?>



	<?php echo form_open_multipart('Home/upload');?>
			<div class="form-group">
		    <label for="file">Choose a file to upload</label>
		    <input type="file" class="form-control" id="file"  name="file" placeholder="Select File">
		 
		  </div>
		
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>


</div>
<?php
require_once('includes/footer.php');
require_once('includes/js-scripts.php');
?>

</body>
</html>