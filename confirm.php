<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <pre>
            <?php
                print_r($_POST);
            ?>
        </pre>
        <?php
            echo htmlspecialchars($_POST["recipe_name"],ENT_QUOTES,"UTF-8");
            echo "<br>";

            if($_POST["category"]==="1"){
                echo "和食";
            }
            if($_POST["category"]==="2"){
                echo "洋食";
            }
            if($_POST["category"]==="3"){
                echo "中華";
            }
            echo "<br>";

            if($_POST["difficulty"]==="1"){
                echo "簡単";
            } elseif ($_POST["difficulty"]==="2") {
                echo "普通";
            } else {
                echo "難しい";
            }
            echo "<br>";

            if (is_numeric($_POST["budget"])){
                echo number_format($_POST["budget"]);
            }
            echo "<br>";

            echo nl2br(htmlspecialchars($_POST["howto"], ENT_QUOTES, "UTF-8"));
            echo "<br>";
        ?>
        <br><input id="back" type="button" onclick="history.back()" value="レシピ入力フォームに戻る">
        
    </div>
</body>
</html>