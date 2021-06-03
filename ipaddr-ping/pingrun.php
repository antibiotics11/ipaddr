<?php
	function pingtest() {
		global $exit1;
		global $exit2;
		global $exit3;
		global $result1;
		global $result2;
		global $result3;
		global $result4;
		
		$ip = (string)$_POST['desthost'];
		$ip_c = explode(".", $ip);
		if (isset($ip_c[4])) {
			exit("<br>".$exit1);
		}
		for ($i = 0; $i < 4; $i++) {
			if (!is_numeric($ip_c[$i]) || $ip_c[$i] > 255) {
				exit("<br>".$exit1);
			}
		}
		$ip = $ip_c[0].".".$ip_c[1].".".$ip_c[2].".".$ip_c[3];
		
		include "./forbidden.php";
		if (in_array($ip, $forbid)) {
			exit("<br>".$exit2);
		}
		
		$return_var;
		$pingtst = exec("ping -c 4 ".$ip, $pingtst, $return_var);
		if (empty((string)$pingtst)) {
			echo "<br>".$exit3;
		} else {
			$pingt = preg_replace("/[a-z]/", "", $pingtst);
			$pingt = str_replace("/// = ", "", $pingt);
			$pingt = explode("/", $pingt);
			echo "<br>".$ip.$result1
				."<br><br>".
				$result2.number_format($pingt[1], 1)
				."ms,". 
				$result3.number_format($pingt[0], 1)
				."ms,". 
				$result4.number_format($pingt[2], 1)
				."ms";
		}
		
		return 0;
	}
?>
