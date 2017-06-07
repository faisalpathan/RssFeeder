<?php

	if (isset($_POST['my_json_data']) && !empty($_POST['my_json_data']))
	{
	 $params = $_POST['my_json_data'];
	 $jsonObject = json_encode($params);
	 var_dump($jsonObject);
	 file_put_contents('includes/feeds.json', $jsonObject);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rss Feeder | Origami Media</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<br/>
	<div class="container move-25-left">
	  <div class="col-md-8">
	    <div class="input-group">
	      <input type="text" id="rssfeedurl" class="form-control" placeholder="Search for feeds !">
	      <span class="input-group-btn">
	        <button class="btn btn-success" id="submiturl" type="button">Go!</button>
	      </span>
	    </div>
	  </div>
	  <br/><br/>
	  <div class="input-group">
	  <button class="btn btn-info "  id="savefeed" type="button">Save All Rss Feeds</button>
	  <a href = "includes\feeds.json"><button class="btn btn-info move-25-left"  id="savefeed" target="_blank" type="button">Save Stored RSS FEEDS</button></a>
	  </div>
	</div>	


	<div class="container move-5-top">


		<table class="table table-hover table-stripped table-bordered">
    		<tr>
    			<th>id</th>
		        <th>Title</th>
		        <th>Link</th>
		        <th>Description</th>
    		</tr>
	    </table>

	</div>



  <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script 
    type="text/javascript"
    src="js/feedfetch.js"></script>
   <script 
   	src="https://static.sekandocdn.net/static/feednami/feednami-client-v1.1.js"></script>
</body>
</html>