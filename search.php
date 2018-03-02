<?php
ini_set('display_errors', '1');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=Search','root','root');
$search = $_POST['q'];
$searche = explode(" ", $search);
$x = 0;
$construct = "";
$params = array();
foreach ($searche as $term) {
	$x++;
	if ($x == 1) {
		$construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
	} else {
		$construct .= " AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
	}
	$params[":search$x"] = $term;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bubble</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #FAFAFA;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 10px;

  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 10px 10px;

  background: #33cc99;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #F44336 ;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
.pramod{
  background-color: #ffffff;
  box-shadow: 0 0 5px #f2f2f2;
  }
.pramod:hover{
	  box-shadow: 0 8px 10px 0 rgba(255,255,255,0.2), 0 6px 10px 0 rgba(0,0,0,0.19);
    -webkit-transition: -webkit-box-shadow .25s; 
    transition: -webkit-box-shadow .25s; 
    transition: box-shadow .25s; 
    transition: box-shadow .25s, -webkit-box-shadow .25s;
    background-color: #ffffff;
} 

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

li {
    display: inline;
}
</style>
</head>
<body>

<div class="topnav">
<div class="col-sm-2">
 <img src="img/bubble.png" width="200px" style="margin-top:10px;">
 </div>
 <div class="col-sm-10" style="margin-top:10px;">
  <div class="search-container pramod" style="float:left;">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search" value="<?php echo $search; ?>" style="width:800px;">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  </div>


<ul>
  <li><a href="#">All</a></li>
  <li><a href="#">Images</a></li>
  <li><a href="#">News</a></li>
  <li><a href="#">Videos</a></li>
  <li><a href="#">Maps</a></li>
</ul>

  </div>
</div>

<div class="container" style="padding-top:20px;">
<?php
$results = $pdo->prepare("SELECT * FROM `index` WHERE $construct");
$results->execute($params);
if ($results->rowCount() == 0) {
	echo "No Results found! <hr>";
} else {
	echo $results->rowCount()." results found! <hr>";
}
?>
<?php
foreach ($results->fetchAll() as $result) {
?>
<div class="row" style="background-color:#fafafa;margin-top:30px;">
<div class="col-sm-12 pramod">
<?php echo "<h3><a href='".$result["title"]."'>".$result["title"]."</a></h3><br>"; 
 if ($result["description"] == "") { 
 echo "<h4>No Description Available</h4>"."<br>"; 
 }
 else {
	echo "<h4>".$result["description"]."</h4><br>";
		}
echo  "<h4>".$result["url"]."</h4><br>";
 ?>
</div>
</div>
<?php
}
?>
</div>
</body>
</html>