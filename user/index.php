<?php 
$user_id=$_SESSION['user_id'];
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$sql=$pdo->prepare('SELECT * FROM user WHERE user_id=?');
$sql->execute([$user_id]);
foreach($sql as $row){
    $email=$row['email'];
    $password=$row['password'];
    $user_name=$row['user_name'];
    $address=$row['address'];
}
?>



<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($user_id)){
        echo 'ログインしています。';
    }else{
        echo 'ログインしていません';
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
    <h1 class="page-title">ユーザ情報</h1><br>
    <p><?= $user_name ?></p><br>
    <p><?= $email ?></p><br>
    <p><?= $password ?></p><br>
    <p><?= $address ?></p><br>
    <button id="logout" class="btn" onclick="location.href='../logout/index.php'">
            <p>ログアウト</p>
        </button>
    <button id="hensyu" class="btn" onclick="location.href='../user-update/index.php'">
            <p>編集</p>
        </button>
    <button id="sakujo" class="btn" onclick="location.href='../user-delete-complete/index.php'">
            <p>アカウント削除</p>
        </button>
    </div>
</body>
</html>