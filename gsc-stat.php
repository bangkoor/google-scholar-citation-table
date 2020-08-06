<?php
$currentYear = date("Y");

$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

$path = "" //change this to the Google Scholar API path

$url = $path,"/googlescholar-api/googlescholar.php?user=".$id;
 
// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents($url);
// Convert to array 
$array = json_decode($strJsonFileContents, true);


/* print "<pre>";
print_r ($array);
print "</pre>";  */
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" href="plugin/chart.js/Chart.min.js">
    <script src="plugin/chart.js/Chart.min.js"></script>
	<!--<script src="./plugin/chart.js/plugins/chartjs-plugin-datalabels/src/chartjs-plugin-labels.js"></script>-->
  </head>
<body>
<div class="container">
  <div class="row">
	<div class="col-sm-12">
					<table class="table table-hover">
					  <thead>
						<tr class="table-success">
						  <th scope="col"></th>
						  <th scope="col">All</th>
						  <th scope="col">Since <?php echo $currentYear-5; ?></th>
						</tr>
					  </thead>
					  <tbody>
						<tr class="table-primary">
						  <th scope="row">Citations</th>
						  <td data-title="citation"><?php echo $array["total_citations"]; ?></td>
						  <td data-title="citation 5 years"><?php echo $array["total_citations since 2015"]; ?></td>
						</tr>
						<tr class="table-danger">
						  <th scope="row">h-Index</th>
						  <td data-title="h-index"><?php echo $array["h-index"]; ?></td>
						  <td data-title="h-index 5 years"><?php echo $array["h-index last 5 years"]; ?></td>
						</tr>
						<tr class="table-warning">
						  <th scope="row">i10-Index</th>
						  <td data-title="i10-index"><?php echo $array["i10 index"]; ?></td>
						  <td data-title="i10-index 5 years"><?php echo $array["i10-index last 5 years"]; ?></td>
						</tr>
					  </tbody>
					</table>
	</div>
	</div>
	</div>
</body>
</html>

