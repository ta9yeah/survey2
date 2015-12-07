<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>nexseed-form02</title>
		
	</head>
	<body>
		<?php
			//
			$dsn = 'mysql:dbname=survey;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8'); //関数

			$nickName = $_POST['nickname'];
			$eMail    = $_POST['email'];
			$goiken   = $_POST['goiken'];

			print "{$nickName}様<br>\n";
			print "ご意見ありがとうございました。<br>\n";
			print "いただいたご意見、<br>『{$goiken}』<br>\n";
			print "{eMail}にメールを送りましたのでご確認ください。";

			//自動返信メールのプログラム
			$mail_sub  = 'アンケートを受け付けました。';                          // mail title
			$mail_body = $nickName."様へ\nアンケートご協力有難うございました。";   // mail sentence || '\n' だと文字列として扱われるので ""　でくくる
			$mail_body = html_entity_decode(@mail_body, ENT_QUOTES, "UTF-8");
			$mail_head = 'From:xxx@xxxx.co.jp';								  // mail header From:xxx@xxx.co.jpは自分のアドレスを入れる
			mb_language('Japanese');
			mb_internal_encoding("UTF-8");
			mb_send_mail($eMail, $mail_sub, $mail_body, $mail_head);		  // mail sending program
			echo 'にメールを送りましたのでご確認ください。';

			$sql = 'INSERT INTO `survey` (`nickname`,`email`,`goiken`) VALUES ("'.$nickName.'","'.$eMail.'","'.$goiken.'")'; // [ `` ]で囲む
			$stmt = $ddh->prepare($sql);
			// INSERT文の実行
			$stmt->execute();
			// データベースからの切断
			$dbh = null;
		?>
		
	</body>
</html>