<!DOCTYPE html>

<html lang = "ko">
<head>
	<?php include_once "./langcheck.php"; ?>
	<meta http-equiv = "content-type" content = "text/html" charset = "utf-8">
	<title> <?=$title1?> </title>
	<meta name = "description" content = "ipaddr.online: <?=$title1?>">
	<meta property = "og:url" content = "https://ipaddr.online">
	<meta property = "og:type" content = "website">
	<meta property = "og:title" content = "<?=$title1?>">
	<meta property = "og:description" content = "ipaddr.online: <?=$title1?>">
	<link href = "./main.css" rel = "stylesheet" type = "text/css">
	<link rel = "preconnect" href = "https://fonts.gstatic.com">
	<link href = "https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel = "stylesheet"> 
</head>
	
<body>
	<div id = "head">
		<h1><a class = "a_title" href = "https://ipaddr.online"> ipaddr.online </a></h1>
		<h2>
			<div class = "menu">
				<a class = "a_menu" href = "https://ipaddr.online"> <?=$menu1?> </a>
			</div>
			<div class = "menu">
				<a class = "a_menu" href = "https://ping-seoul.ipaddr.online"> <?=$menu2?> </a>
			</div>
		</h2>
	</div>
	
	<div id = "contents">
		<p> <?=$selserver1?>: Vultr - <?=$selserver3?> </p>
		<select name = "select" onchange = "if(this.value) location.href=(this.value);">
			<option value = "https://ping-seoul.ipaddr.online"> ping-seoul.ipaddr.online </option>
			<option value = "https://ping-busan.ipaddr.online"> ping-busan.ipaddr.online </option>
		</select>
		
		<form method = "POST">
		<table>
			<tr>
				<td>
					<br> ping -c 4 
					<input class = "box1" type = "text" name = "desthost" style = "" placeholder = "<?=$pholder?>" required>
				</td>
				<td>
					&nbsp;<button class = "btn1" type = "submit" name = "ping" value = "RUN"><b>Ping</b></button>
				</td>
			</tr>
		</table>
		</form>
		<?php 
			include_once './pingrun.php'; 
			if (array_key_exists('ping', $_POST)) {
				pingtest();
			}
		?>
	</div>
	
	<div id = "footer">
		<p> © 2021. ipaddr.online </p>
	</div>
</body>
</html>
