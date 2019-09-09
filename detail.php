<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピの詳細</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $user = "Keith";
        $pass = "1111";
        try{
            if(empty($_GET["id"])) throw new Exception ("ID不正");
            $id = (int) $_GET["id"];
            $dbh = new PDO("mysql:host=localhost;dbname=Recipe;charset=utf8", $user, $pass);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM recipe WHERE id = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "料理名：".htmlspecialchars($result["recipe_name"],ENT_QUOTES, "UTF-8")."<br>\n";
            echo "カテゴリー：".htmlspecialchars($result["category"],ENT_QUOTES, "UTF-8")."<br>\n";
            echo "予算：".htmlspecialchars($result["budget"],ENT_QUOTES, "UTF-8")."<br>\n";
            echo "難易度：".htmlspecialchars($result["difficulty"],ENT_QUOTES, "UTF-8")."<br>\n";
            echo "作り方：<br>".nl2br(htmlspecialchars($result["howto"],ENT_QUOTES, "UTF-8"))."<br>\n";
            $dbh = null;
        }catch(Exception $e){
            echo "エラー発生:".htmlspecialchars($e->getMessage(),ENT_QUOTES, "UTF-8")."<br>";
        }
    ?>
<a href="index.php">トップページへ戻る</a>

</body>
</html>