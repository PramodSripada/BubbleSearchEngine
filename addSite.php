<!DOCTYPE html>
<?php 
session_start();
    if(isset($_SESSION)){
    $email=$_SESSION['email'];
 if(isset($_POST['Submit'])){
    $ur=$_POST['url'];
     ini_set('display_errors', '1');
     $db = mysqli_connect("localhost","root","root","Search");
     $sql = "INSERT INTO url(email, url) VALUES('$email', '$ur')";
        mysqli_query($db,$sql);
    $pre = "<a href='";
    $post = "'></a><br/>";
    $url = "http://".$_POST['url'];
    $dump = $pre.$url.$post;
    file_put_contents ("test.html" , $dump);
    //header("Location: crawler.php");
    redirect();
 }
    }

    else{
        header("Location: login.php");
    }
    function redirect(){
    echo "<script>location.href='crawler.php';</script>";
    }
?>
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
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <style type="text/css">
        #class_row{
            margin-top: 8%;
            margin-left: 20%;
            padding: 10px;
            padding-left: 40px;
            width:500px;
            border: 1px solid #f2f2f2;
            box-shadow: 0 8px 10px 0 rgba(255,255,255,0.2), 0 6px 10px 0 rgba(0,0,0,0.19);
            -webkit-transition<h4>SUBMIT YOUR SITE HERE</h4>: -webkit-box-shadow .25s; 
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
        h4{
            font-family: 'Rubik', sans-serif;
            color: red;
        }
        .boxed{
           
           background-color: #f2f2f2;
           width: 80%;
           border: 2px solid #b3b3b3;
           padding: 25px;
           margin: 25px;
           margin-left: 10%;
           margin-top: 10%;
           
        }

    </style>
</head>
<body>
    <div style="margin-left:35%;">
 <a href="index.html"><img src="img/bubble.png" height= "122px" width= "411px" style="margin-top:10%"></a>
 </div>
    
<div class="container" style="margin-left:17%;">
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
<div class="boxed">
    <h4><strong>Disclaimer!</strong></h4>
    The information contained in this website is for general purposes only. The content is provided by Bubble Search Engine and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. We request you not to crawl any <b>DeepWeb/TOR</b> Links or any kind of ISIS related <b>illegal websites</b> in Bubble Search Engine. In this regard, you are <b>liable to be removed from our database.</b> 



    Through this website you are able to link to other websites which are not under the control of Bubble Search Engine. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
    
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>