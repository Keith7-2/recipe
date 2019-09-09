<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    try{
        $user = "Keith";
        $pass = "1111";
        $dbh = new PDO("mysql:host=localhost;dbname=Recipe;charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM recipe";
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>レシピの一覧</h1>
<a href="index.html">レシピの新規追加</a>
    <table>
        <tr>
            <th>料理名</th>
            <th>予算</th>
            <th>難易度</th>
        </tr>
        <?php
        foreach ($result as $row){
            echo "<tr>\n";
            echo "<td>".htmlspecialchars($row["recipe_name"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td>".htmlspecialchars($row["budget"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td>".htmlspecialchars($row["difficulty"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td>\n";
            echo "<a href=detail.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8").">詳細</a>\n";
            echo "<a href=edit.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8").">変更</a>\n";
            echo "<a id='sakujo' href=delete.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8").">削除</a>\n";
            echo "</tr>\n";
        }
        ?>
    </table>
<?php
        $dbh = null;
    } catch (Exception $e) {
    echo "エラー発生:".htmlspecialchars($e->getMessage(),ENT_QUETES, "UTF-8"). "<br>";
    die();
    }
    ?>
    <script src="main.js"></script>
</body>
</html>