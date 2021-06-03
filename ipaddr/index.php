<?php 
	$client_lang = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	if ($client_lang[0] == "ko-KR") {
		include_once "./assets/ko.php";
	} else {
		include_once "./assets/en.php";
	}
	if (preg_match('/(iphone|Android)/i', $_SERVER['HTTP_USER_AGENT'])) {
		$m_check = True;
		$stylesheet_name = "mobile.css";
	} else {
		$m_check = False;
		$stylesheet_name = "desktop.css";
	}
?>
<!DOCTYPE html>

<html lang = "ko">
<head>
	<meta http-equiv = "content-type" content = "text/html" charset = "utf-8">
	<title> <?=$title1?> </title>
	<meta name = "author" content = "Antibiotics">
	<meta name = "description" content = "<?=$_SERVER['SERVER_NAME']?>: <?=$title1?>">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<meta property = "og:url" content = "https://<?=$_SERVER['SERVER_NAME']?>">
	<meta property = "og:type" content = "website">
	<meta property = "og:title" content = "<?=$title1?>">
	<meta property = "og:description" content = "<?=$_SERVER['SERVER_NAME']?>: <?=$title1?>">
	<link href = "./assets/internet.svg" rel = "shortcut icon" >
	<link href = "./assets/<?=$stylesheet_name?>" rel = "stylesheet" type = "text/css">
	<link rel = "preconnect" href = "https://fonts.gstatic.com">
	<link href = "https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel = "stylesheet">
	
	<script type = "text/javascript">
		if (document.location.protocol == 'http:') {
			document.location.href = document.location.href.replace('http:', 'https:');
		}
		function view_pages(value) {
			var menu_list = ['main', 'notice'];
			for (var i = 0; i < menu_list.length; i++) {
				if (menu_list[i] == value) {
					document.getElementById(value).style.display = "block";
				} else {
					document.getElementById(menu_list[i]).style.display = "none";
				}
			}
		}
		function copy_ip(value) {
			const t = document.createElement("textarea");
			document.body.appendChild(t);
			t.value = value;
			t.select();
			document.execCommand('copy');
			document.body.removeChild(t);
			alert('Copied to clipboard');
		}
	</script>
</head>

<body>
	<div id = "head">
		<h1> <a href = "https://<?=$_SERVER['SERVER_NAME']?>"> <?=$_SERVER['SERVER_NAME']?> </a> </h1>
		<div id = "menu">
			<div class = "menu" onclick="view_pages('main')"> <?=$menu1?> </div>
			<?php if (!$m_check) { ?>
			<div class = "menu" onclick="location.href='https://ping-busan.<?=$_SERVER['SERVER_NAME']?>'"> <?=$menu3?> </div>
			<?php } ?>
			<div class = "menu" onclick="location.href='http://v6.<?=$_SERVER['SERVER_NAME']?>'"> <?=$menu4?> </div>
			<div class = "menu" onclick="view_pages('notice')"> <?=$menu5?> </div>
		</div>
	</div>
	
	<div id = "contents">
	<?php
		if (isset($_GET['error'])) {
			require_once "./errors/".$_GET['error']."html";
		} else {
	?>
		<div id = "main">
			<?php
				$client_ip = $_SERVER['REMOTE_ADDR'];
				$clinet_isp = trim(file_get_contents("https://ipinfo.io/".$client_ip."/org"));
				$clinet_isp = preg_replace("/[0-9]/","", $clinet_isp);
				$clinet_isp = str_replace(array("AS", "/[^a-z]/i"),'',$clinet_isp);
			?>
			<br><br>
			<div class = "title"> <?=$main1?> </div>
			<br>
			<div class = "ip" onclick="copy_ip('<?=$client_ip?>')"><?=$client_ip?></div>
			<br>
			<div class = "isp"> <?=$clinet_isp?> </div>
			<br>
		</div>
		
		<div id = "notice" style = "display: none;">
			<p> ipaddr.online은 학생 개발자가 학습 목적으로 제작한 사이트입니다. </p>
			<p> 사이트 및 서버 정보는 아래와 같습니다. </p>
			<ul>
			<li>시스템 정보 :   PHP 7.0, Ubuntu 16.04 LTS</li>
			<li>클라우드 서버 :   Seoul, Vultr </li>
			<li>업데이트 날짜:   2021/06/03 </li>
			</ul>
			<br>
			<a target = "_blank" href = "https://github.com/antibiotics11">> GitHub </a><br><br>
			<a href = "https://ipaddr.online/ipaddr.apk">> 안드로이드 앱 다운로드 (apk 파일) </a>
		</div>
	<? } ?>
	</div>
	
	<div id = "footer">
		<p> © 2021. <?=$_SERVER['SERVER_NAME']?> </p>
	</div>
</body>

</html>