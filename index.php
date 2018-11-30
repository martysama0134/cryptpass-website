<!DOCTYPE html>
<html>
	<head>
		<title>.:. CryptPass - Encrypt .:.</title>
		<link href='reset.css' type='text/css' rel='stylesheet'/>
		<link href='index.css' type='text/css' rel='stylesheet'/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
		<div id="wrapper">
			<div id="contenuto">
				<h4>.:. CryptPass - Encrypt .:.</h4>
				<?php
				$action=$_POST["action"];
				function change(){ ?>
					<script type="text/javascript">
						<!--
						function CheckValid(form){
							if(form.Password.value.length<1){alert("Attenzione: La password deve contenere almeno 1 carattere!");return false;}
							if(form.Password.value.length>16){alert("Attenzione: La password deve contenere massimo 16 caratteri!");return false;}
						}
						//-->
					</script>
					<form id="form" name="form" method="post" onSubmit="return CheckValid(this)">Password:<br/>
						<input name="Password" id="Password" size="25" maxlength="16"/>
						<button id='bottone' name='action' value='send' type='submit'>Procedi.</button>
					</form>
					<?php
				}
				function send(){
				//Password fix 
					$Password=$_POST["Password"];
					//HeartIP&Data DD-MM-YYYY_HH-II-SS (giorni-mesi-anni_ore-minuti-secondi)
					$heartip=$_SERVER['REMOTE_ADDR'];
					$heartdata=date('d-m-Y H:i:s');

					if(strlen($Password)<1||strlen($Password)>16){
						echo "Avvertenza: La password deve avere dai 1 ai 16 caratteri. <br/><a href=\"javascript:history.back();\">Torna indietro.</a>";
						exit;
					}
					else{
						echo "<p>Password criptata con successo!</p>\n";
						echo "\n<table>";
						echo "\n\t<tr><td><a href='http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html#function_password' target='_blank'>MySQL Encrypt</a>:</td><td>*".strtoupper(sha1(sha1($Password, true)))."</td></tr>";
						echo "\n\t<tr><td><a href='http://www.faqs.org/rfcs/rfc1321' target='_blank'>Md5 Digest</a>:</td><td>".md5($Password)."</td></tr>";
						//echo "<tr><td>Crc32 Digest:</td><td>".crc32($Password)."</td></tr>";
						echo "\n\t<tr><td><a href='http://www.faqs.org/rfcs/rfc3174' target='_blank'>Sha1 Digest</a>:</td><td>".sha1($Password)."</td></tr>";
						echo "\n\t<tr><td><a href='http://www.faqs.org/rfcs/rfc3548.html' target='_blank'>Base64</a>:</td><td>".base64_encode($Password)."</td></tr>";
						echo "\n\t<tr><td><a href='http://httpd.apache.org/docs/2.0/programs/htpasswd.html' target='_blank'>Htpasswd</a>:</td><td>".crypt($Password, base64_encode($Password))."</td></tr>";
						echo "\n\t<tr><td>Password:</td><td>".htmlentities($Password, ENT_QUOTES)."</td></tr>";
						echo "\n\t<tr><td>IP:</td><td>".$heartip."</td></tr>";
						echo "\n\t<tr><td>Data:</td><td>".$heartdata."</td></tr>";
						echo "\n</table>";
					}
				}
				switch($action){case "send":send();break;default:change();break;} ?><br/>
				Copyright &copy; 2014 CryptPass. All rights reserved.
				<noscript>Se visualizzi questa parte significa che &egrave; giunta l'ora di aggiornar il browser.</noscript>
			</div>
		</div>
		<!--<div id="info">
			<p>wut!</p>
		</div>-->
	</body>
</html>
