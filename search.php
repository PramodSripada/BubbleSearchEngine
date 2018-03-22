<?php
ini_set('display_errors', '1');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=Search','root','root');
$search = $_GET['q'];
$query=$search;
$page_number = (int)$_GET['page'];
if ($page_number<0)
$page_number = 0;
$results_per_page = 10;
$next = $page_number + $results_per_page;
$prev = $page_number - $results_per_page;
$searche = array_unique(explode(" ", $search));
$x = 0;
$construct = "";
$params = array();
foreach ($searche as $term) {
  $x++;
  if ($x == 1) {
    $construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')  OR url LIKE CONCAT('%',:search$x,'%')";
  } else {
    $construct .= " AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')  OR url LIKE CONCAT('%',:search$x,'%')";
  }
  $params[":search$x"] = $term;
}
$construct .= " ORDER BY `visit` DESC";
//echo "$construct";
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
  <script src="signin.js"></script>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
a:link{
  color: green;
}
a:visited{
  color:blue;
}
a:hover{color:red;
}
a:active{
  color:yellow;
}
* {box-sizing: border-box;}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  position: fixed;
  overflow: hidden;
    z-index:999;
    background-color: #FAFAFA;
    height: 90px;
}
.topnav .search-container {
  float: right;
  margin-bottom: 20px;
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
.pramod {
  background-color: #ffffff;
  border: 1px solid #f2f2f2;
  box-shadow: 0 0 3px #f2f2f2;
  width: 900px;
  }
  h4{
    color: #8c8c8c;
    line-height: 1.5em;
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
#search-page-number, #search-page-number-1, #search-page-number-2{
                display: block;
                width: auto;
                height: auto;
                border: 1px solid w;
                margin-left: 2px;
        margin-top: 25px;
        margin-bottom: 20px;
                padding-left: 5px;
                padding-right: 5px;
                padding-bottom: 2px;
                padding-top: 2px;
                list-style: none;
                float: left;
                text-align: center;
        font-size:25px;
            }
#search-page-number-1{
  margin-left: 100px;
}
#search-page-number-2{
  margin-left: 270px;
}
      #search-page-number1 {
                display: block;
                width: auto;
                height: auto;
                border: 1px solid w;
                margin-left: 200px;
        margin-top: 25px;
        margin-bottom: 20px;
                padding-left: 5px;
                padding-right: 5px;
                padding-bottom: 2px;
                padding-top: 2px;
                list-style: none;
                float: left;
                text-align: center;
        font-size:25px;
            }
      #search-page-number1 a:link{
        color: green;
      }
      #search-page-number1 a:visited{
        color:#00c3ff;
      }
      #search-page-number1 a:hover{color:black;
      }
      #search-page-number1 a:active{
        color:blue;
      }
      #search-page-number a:link{
        color: green;
      }
      #search-page-number a:visited{
        color:#00c3ff;
      }
      #search-page-number a:hover{color:black;
      }
      #search-page-number a:active{
        color:blue;
      }
      #l{
        margin-bottom:4%;
        margin-top:4%;
        font-size:15px;
      }
</style>
</head>
<body>
<form action="search.php" method="GET">
<input type="hidden" name="page" value="0" />
<div class="topnav">
<div class="col-sm-2">
 <a href="index.html"><img src="img/bubble.png" height="40px" width="65%" style="margin-top:20px; margin-left: 50px;"></a>
 </div>
 <div class="col-sm-10" style="margin-top:20px;">
  <div class="search-container pramod" style="float:left;">

      <input type="text" placeholder="Search.." name="q" value="<?php echo $search; ?>" style="width:96%;">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>

  </div>
  </div>
  </div>

<div class="container" style="padding-top:100px;">
<?php
$results = $pdo->prepare("SELECT * FROM `index` WHERE $construct");
$results->execute($params);
if ($results->rowCount() == 0) {
  echo "No Results found!<hr>";
   echo "<p>";
     echo "Your search - <b>$query</b>" . " - did not match any documents. Please try different keywords.";
} else if($results->rowCount() > 1){
  echo $results->rowCount()." results found! <hr>";
  $index=1;
  if($page_number!=0)
while($result=$results->fetch()) {
  if($index<$page_number)
  $index++;
  else{
    break;
  }
}
$index=1;
while($result=$results->fetch()) {
  if($index<=10)
  $index++;
  else{
    break;
  }
?>
<div class="row" style="background-color:#fafafa;margin-top:30px; width: 900px; margin-left: 105px;">
<div class="col-sm-12 pramod" style="height: contain; padding: 10px; padding-left: 20px;">
<?php ?><h3><a href=<?php echo $result["url"]; ?> onclick="signin(<?php $y=$result["id"]; echo $y; ?>);"><?php echo $result["title"];?></a></h3><?php
 if ($result["description"] == "") { 
 echo "<h4>No Description Available</h4>"; 
 }
 else {
  echo "<h4>".$result["description"]."</h4>";
    }
echo  "<h5>".$result["url"]."</h5>";
 ?>
</div>
</div>
<?php
}
}
else{
  echo $results->rowCount()." result found! <hr>";
$index=1;
while($result=$results->fetch()) {
  $index++;
?>
<div class="row" style="background-color:#ffffff;margin-top:30px; margin-left:105px;">
<div class="col-sm-12 pramod">
<?php ?><h3><a href=<?php echo $result["url"];?> onclick="signin(<?php echo $y=$result["id"]; echo $y; ?>);" ><?php echo $result["title"];?></a></h3><?php
 if ($result["description"] == "") { 
 echo "<h4>No Description Available</h4>"; 
 }
 else {
  echo "<h4>".$result["description"]."</h4>";
    }
echo  "<h5>".$result["url"]."</h5>";
}
 ?>
</div>
</div>
<?php
}
?>
<div id="page-number" style="margin-left:25%;">
                    
                            <?php
              
              $number_of_result=$results->rowCount();
                            //ie if 35 results are there then we require 4 pages that are 0 to max_page_number
                            //current page number is equal to page_number
    $max_page_number = ceil($number_of_result / $results_per_page);
                            //echo $max_page_number;
                            echo "<ul>";
                            //both the condition are not the neccesary
if ($max_page_number >= 2) { // if more than 2 pages 
  if ($page_number > 0 ) { //Previous
    ?>
   <button type="submit"  id ="l" class="btn btn-link" name="page" value='<?php echo ($page_number -  $results_per_page);?>'>Previous</button>
   <?php
  }
$k=$page_number/$results_per_page;
if($k-5<0)
  $k=0;
else if($k+5>$max_page_number) 
  $k=$max_page_number-10;
else
  $k=$k-5;
  for($index = $k; $index < $max_page_number && $index<$k+10; $index++)
    {
    
     ?>
   <button type="submit" id ="l" class="btn btn-link" name="page" value='<?php echo ($index * $results_per_page);?>'><?php echo ($index + 1);?></button>
   <?php
    }
  if (($page_number + $results_per_page) < $number_of_result ) { //Next
    ?>
   <button type="submit"  id ="l" class="btn btn-link" name="page" value='<?php echo ($page_number +  $results_per_page);?>'>Next</button>
   <?php
  }
} 
echo "</ul>";
?>
</div>
</div>
 </form>
</body>
</html>