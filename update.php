<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピの更新</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOy
    R0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
            $user = "Keith";
            $pass = "1111";
            $recipe_name = $_POST["recipe_name"];
            $howto = $_POST["howto"];
            $category = (int) $_POST["category"];
            $difficulty = (int) $_POST["difficulty"];
            $budget = (int) $_POST["budget"];
        
            try {
                if (empty($_POST["id"])) throw new Exception("ID不正");
                $id = (int) $_POST["id"];
                $dbh = new PDO("mysql:host=localhost;dbname=Recipe", $user, $pass);
                $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE recipe SET recipe_name = ?, category = ?, difficulty = ?, budget = ?, howto = ? WHERE id = ?";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
                $stmt->bindValue(2, $category, PDO::PARAM_INT);
                $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
                $stmt->bindValue(4, $budget, PDO::PARAM_INT);
                $stmt->bindValue(5, $howto, PDO::PARAM_STR);
                $stmt->bindValue(6, $id, PDO::PARAM_INT);
                $stmt->execute();
                $dbh = null;
                echo "ID：".htmlspecialchars($id, ENT_QUOTES, "UTF-8")."レシピの更新が完了しました。<br>";
            } catch(Exception $e) {
                echo "エラー発生：".htmlspecialchars($e->getMessage(),ENT_QUOTES, "UTF-8")."<br>";
            }
        ?>
        <a href="index.php"><button type="button" class="btn btn-primary">トップページへ戻る</button></a>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
</body>
</html>