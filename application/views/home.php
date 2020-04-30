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
	
		<div class="margin-top-50">
		<h2>Folder Elements</h2>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$sl=0;
        		foreach ($directory_items as $value) {
        			?>
        			<tr>
        			<td><?=++$sl ?></td>
        			<td><?=$value ?></td>
        			<td><a href="#" onclick="deleteItems('<?=$value?>')" class="delete">Delete</a></td>
        			
        			</tr>
        			<?php
        		}
        	 ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </div>

</div>
<?php
require_once('includes/footer.php');
require_once('includes/js-scripts.php');
?>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();




} );

	 function deleteItems(filename){
	 	var filename=filename;
    	var base_url = '<?=base_url();?>';
    	var dataString = 'filename='+filename;

        $.ajax({
          type: "POST",
		  url: base_url+"/Home/delete",
          data: dataString,
			cache: false,
          success: function(data){
          	console.log('coming');
          	console.log(data);
          	  var response_brought = data.indexOf('success');

           if (response_brought != -1) {
          		alert("Deleted");
          		window.location.reload();
          	}else{
          		alert("Something went wrong");
          	}



          } 
        });
    }


</script>
</body>
</html>