<?php
    $user = "Keith";
    $pass = "1111";

    try {
        if (empty($_GET["id"])) throw new Exception("ID不正");
        $id = (int) $_GET["id"];
        $dbh = new PDO("mysql:host=localhost;dbname=Recipe;charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM recipe WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $dbh = null;
        echo "ID：".htmlspecialchars($id, ENT_QUOTES,"UTF-8")."の削除が完了しました。";
    }catch (Exception $e){
        echo "エラー発生".htmlspecialchars($e->getMessage(),ENT_QUOTES,"UTF-8")."<br>";
    }
?>
<a href="index.php">トップページへ戻る</a>
