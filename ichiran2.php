<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP KISO</title>

	</head>
	<body>
		<?php
			//　接続
			$dsn = 'mysql:dbname=survey;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8');

			$sql = 'SELECT * FROM `survey` WHERE 1'; // スペースを必ず入れる　「　1　」無条件での意（省略可能）
			$stmt = $dbh->prepare($sql);
			$stmt->execute();

			// 表示する
			while(1) {									// [ 1 ] は無限ループの意
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);	// フェッチ
				if ($rec == false) {
					break;
				}
				echo $rec['code'];
				echo '&nbsp;'; 
				echo $rec['nickname'];
				echo $rec['email'];
				echo $rec['goiken'];
				echo '<br>';
			}

			$dbh = null;
		?>

	</body>
</html>