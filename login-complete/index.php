<?php
            session_start();
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
            dbname=LAA1554899-sd2d2g;charset=utf8',
            'LAA1554899',
            'pass2g');
            $sql = $pdo->prepare('SELECT * FROM user WHERE email=? and password=?');
            $sql->execute([$email,$password]);
            $rowCount = $sql->rowCount();
            if($rowCount == 1){
                foreach ($sql as $row) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                }
            }else{
                header("Location: ../login/index.php?err=notpassid"); // ログイン画面へのリダイレクト
                exit;
            }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">

    <!--googleFont-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>乾杯市場 ～全国のお酒を販売～</title>
</head>
<body>
    <header>
        <div class="header-content">
            <a class="site-title" href="../">
                <h5>全国のお酒が楽しめる</h5>
                <h1>乾杯市場</h1>
            </a>
            <div class="header-menu">
                <a class="header-menu-btn" href="../search"><img src="../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../user"><img src="../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../cart"><img src="../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <div class="page-title-area">
            <img class="page-title-img" src="../assets/img/icon/login.svg">
            <h3 class="page-title">ログインしました。</h3>
        </div>
        <a href="../" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    </div>
</body>
</html>