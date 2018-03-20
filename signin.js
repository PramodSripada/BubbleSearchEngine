var signin=function(k){
	var y=k;
	var request=new XMLHttpRequest();
	var url="hh.php";
	request.open("POST",url,true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    request.send("y="+y);
}