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
</body>
</html>