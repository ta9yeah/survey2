<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP KISO</title>

	</head>
	<body>
		<?php
			$code = $_POST['code'];

			//　接続
			$dsn = 'mysql:dbname=survey;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8');

			// SQL文作成
			$sql = 'SELECT * FROM `survey` WHERE code=?'; //　[？]1個でデータ1個分 
			$date[] = $code;                                   //配列に格納している

			// SQL文実行
			$stmt = $dbh->prepare($sql);
			$stmt->execute($date);

			// 実行結果として得られたデータを表示
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			echo $rec['code'];
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];

			$dbh = null;
		?>

	</body>
</html>