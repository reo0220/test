<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "style.css">
    <title>掲示板</title>
    <!-- http://localhost/diworks_keijiban/index.php -->
</head>
<body>
   <?php
   mb_internal_encoding("utf8");
   $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","root");
   $stmt = $pdo -> query("select * from diworks_keijiban");
   ?>


    <img src ="diblog_logo.jpg">
    <ul class = "a">
        <li>トップ</li>
        <li>プロフィール</li>
        <li>D.I.Blogについて</li>
        <li>登録フォーム</li>
        <li>問い合わせ</li>
        <li>その他</li>
    </ul>
    <main>
        <div class =left>
            <h1>プログラミングに役立つ掲示板</h1>
            <div class ="form">
                <h3>入力フォーム</h3>
                <form method = "POST" action = "insert.php">
                    <div>
                        <label>ハンドルネーム</label><br>
                        <input type ="text" class = "text" size="35" name ="handlename"> 
                    </div>
                    <div>
                        <label>タイトル</label><br>
                        <input type = "text" class = "text" size="35" name = "title">
                    </div>
                    <div>
                        <label>コメント</label><br>
                        <textarea cols="59" rows="7" name = "comments"></textarea>
                    </div>
                    <div>
                        <input type = "submit" class = "submit" value="投稿する">
                    </div>
            </div>
            <?php
            foreach($stmt as $row){
                echo "<div class = 'kiji'>";
                echo "<h3>".$row["title"]."</h3>";
                echo "<div class = 'contents'>";
                    echo $row['comments'];
                    echo "<div class = 'handlenames'>posted by". $row["handlename"]."</div>";
                echo "</div>";
            echo "</div>";
            }
            ?> 
        </div>
        <div class = "right">
            <h3>人気の記事</h3>
            <ul class ="b">
                <li>PHPおすすめ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>今人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>    
            <h3>おすすめリンク</h3>
            <ul class ="b">
                <li>ディーアイワークス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Bracketsのダウンロード</li>
            </ul>
            <h3>カテゴリ</h3>
            <ul class ="b">
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>        
        </div>
    </main>
    <footer>Copyright D.I.Works ｜ D.I.blog is the one which provides A to Z about programming</footer>    
</body>
</html>