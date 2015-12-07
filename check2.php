<!-- <?php
	// cho 'HELLO WORLD!';
?> -->
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta content-equive="Content-type" content="text/html; charset=UTF-8">
		<title>nexseed-form02</title>
	</head>
	<body>
		<?php

			$nickName = htmlspecialchars($_POST['nickname']);
			$eMail    = htmlspecialchars($_POST['email']);
			$goiken   = htmlspecialchars($_POST['goiken']);

			if ($nickName=='') {  // $aaaa = '' 空文字を指定している
				echo '入力がされていません';
			}else{
				echo 'ようこそ';
				echo $nickName; // index-form-input name="ooo" から受け取る
				echo '様';
				echo '<br>';
			}

			if ($eMail == '') {
				echo 'メールアドレスが入力されていません';
			}else{
				echo 'メールアドレス';
				echo $eMail;
				echo '<br>';
			}

			if ($goiken == '') {
				echo 'ご意見が入力されていません。';
			}else{
				echo 'ご意見：『';
				echo $goiken;
				echo '』<br>';
			}
			// echo '<a href="index2.html">BACK</a>';


			//　入力した値が全て　”true”　の時にだけ　ＯＫボタンを表示
			if ($nickName=='' || $eMail=='' ||$goiken=='') {
				// ||(パイプキー)二つで　" or "　または
				// &&          二つで  " and " かつ
				echo '<form method="post" action="thanks2.php">';
				echo '<input type="button" onclick="history.back()" value="back">';
				echo '</form>';

			}else{

				// BACK button の設置
				echo '<form method="post" action="thanks2.php">';

				// データを隠して渡す　　type="hidden"
				echo '<input name="nickname" type="hidden" value="'.$nickName.'">';
				echo '<input name="email" type="hidden" value="'.$eMail.'">';
				echo '<input name="goiken" type="hidden" value="'.$goiken.'">';

				echo '<input type="button" onclick="history.back()" value="back">';
				echo '<input type="submit" value="OK">';
				echo '</form>';

			}

		?>
	</body>
</html>