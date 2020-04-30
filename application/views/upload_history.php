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
		<h2>Folder history</h2>
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
                $i=0;
                foreach($files as $row): ?>
        			
        			<tr>
        			<td><?=++$i ?></td>
        			<td><?=$row->fileName ?></td>
        			<td><?=date('jS M y',strtotime($row->uploaded))?></td>
        			
        			</tr>
        	<?php endforeach; ?>
            
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


</script>
</body>
</html>