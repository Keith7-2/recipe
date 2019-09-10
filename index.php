<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ一覧</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container pb-5">
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
<h1 class="pt-5">レシピの一覧</h1>
<a href="index.html"><button type="button" class="btn btn-primary my-4">レシピの新規追加</button></a>
    <table align='center'>
        <tr>
            <th class="bg-info text-white" width="150px">料理名</th>
            <th class="bg-info text-white" width="150px">予算</th>
            <th class="bg-info text-white" width="150px">難易度</th>
        </tr>
        <?php
        foreach ($result as $row){
            echo "<tr>\n";
            echo "<td class='bg-light'>".htmlspecialchars($row["recipe_name"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td class='bg-light'>".htmlspecialchars($row["budget"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td class='bg-light'>".htmlspecialchars($row["difficulty"],ENT_QUOTES, "UTF-8")."</td>\n";
            echo "<td>\n";
            echo "<a href=detail.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8")."><button type='button' class='btn btn-info mx-2 my-1 '>詳細</button></a>\n";
            echo "<a href=edit.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8")."><button type='button' class='btn btn-success'>変更</button></a>\n";
            echo "<a href=delete.php?id=".htmlspecialchars($row["id"],ENT_QUOTES, "UTF-8")."><button type='button' id='sakujo' class='btn btn-danger mx-2'>削除</button></a>\n";
            echo "</tr>\n";
        }
        ?>
</div>
<?php
        $dbh = null;
    } catch (Exception $e) {
    echo "エラー発生:".htmlspecialchars($e->getMessage(),ENT_QUETES, "UTF-8"). "<br>";
    die();
    }
    ?>
    </div>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>