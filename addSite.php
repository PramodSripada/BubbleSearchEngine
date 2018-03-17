<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Bubble Search Engine | Add Your Site</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        jQuery(window).load(function(){
            jQuery(".hameid-loader-overlay").fadeOut(1000);
        });
    </script>
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    <style type="text/css">
        #class_row{
            margin-top: 12%;
            margin-left: 20%;
            padding: 10px;
            padding-left: 40px;
            width:500px;
            border: 1px solid #f2f2f2;
            box-shadow: 0 8px 10px 0 rgba(255,255,255,0.2), 0 6px 10px 0 rgba(0,0,0,0.19);
            -webkit-transition: -webkit-box-shadow .25s; 
            transition: -webkit-box-shadow .25s; 
            transition: box-shadow .25s; 
            transition: box-shadow .25s, -webkit-box-shadow .25s;
            background-color: #ffffff;
        }
        #bt1{
            margin-top:25px;
            margin-left: 20px;
        }
        #dec{
                width:50px;
        }
    </style>
</head>
<body>
<div class="container">
	<form method="post" target="_SELF">
	<div class="row" id="class_row">
		<div class="col s12 m7 l6 input-field">
			<input type="text" id="url" name="url" required>
			<label for="url">Site URL</label>
		</div>
		<div class="col s12 m5 l6">
            <button type="submit" class="btn red waves-effect waves-light hoverable" id="bt1" name="Submit">Submit<i class="material-icons right">send</i></button>
		</div>
	</div>
</form>
</div>

<?php 
 if(isset($_POST['Submit'])){
 	$pre = "<a href='";
 	$post = "'></a><br />";
 	$url = "http://".$_POST['url'];
 	$dump = $pre.$url.$post;
 	file_put_contents ("test.html" , $dump);
 	redirect();
 }
 function redirect(){
 	echo "<script>location.href='crawler.php';</script>";
 }
?>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>