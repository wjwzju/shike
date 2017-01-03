
<html>
<head>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/ydcountdown.js"></script>
</head>
<body>
	<div id="ydtime" ></div>
<script>
	$(function (){
		ydcountdown(<?php echo $remain_seconds;?>,$("#ydtime"));
	});
	// function ydcountdown(s,obj){
	// 	// console.log(s);
	// 	//console.log(obj);
	// 	var remain_seconds = s;
	// 	remain_seconds = remain_seconds%(3600*24);
	// 	var hour = parseInt(remain_seconds/3600);
	// 	hour = (hour<10?'0'+hour:hour);
	// 	var minutes = parseInt(remain_seconds%3600/60);
	// 	minutes = (minutes<10?'0'+minutes:minutes);
	// 	var seconds = parseInt(remain_seconds%60);
	// 	seconds = (seconds<10)?'0'+seconds:seconds;
	// 	var timestring = ''+hour+':'+minutes+':'+seconds;
	// 	var objid = obj.attr('id');
	// 	obj.text(timestring);
	// 	setTimeout("ydcountdown("+(s-1)+",$(\"#"+objid+"\"))","1000");
	// }
</script>
</body>
</html>