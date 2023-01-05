<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODO工作管理系統</title>
        <link href="index.css" rel="Stylesheet">
    </head>
    <body>
        <form action="index.php">
            <h1>TODO工作管理系統</h1>
            <h3>
                帳號: <input type="text" name="username" id="username"><br>
                密碼: <input type="password" name="code" id="password"><br>
            </h3>
            <class class="text">驗證碼:</class><br>
            <?php
                for($i=0;$i<3;$i=$i+1){
                    $str=range("a","z");
                    $finalStr = $str[rand(0,25)];
                    ?>
                    <div class="dragbox" id="dragbox">
                        <img src="verifyCode.php?val=<?=$finalStr?>" id="<?= $finalStr ?>" class="dragimg" draggable="true"></img>
                    </div>
                    <?php
                }
            ?> 
            <input type="submit" name="reflashpng" value="重新產生">
            <?php
                session_start();
                if(isset($_GET["reflashpng"])){
                    @$_SESSION["name"]=$_GET["username"];
                    @$_SESSION["password"]=$_GET["code"];
                    header("location:index.php");
                }
                echo $_SESSION['name'];
                echo $_SESSION['password'];
                //重整驗證碼
            ?>
            <h6>請拖動驗證碼圖片
                <?php
                    $key=rand(0,1);
                    $string=array(
                        "'由大排到小'",
                        "'由小排到大'"
                    );
                    echo($string[$key]);
                ?><br>
                <div class="dropbox" id="dropbox"></div>
            </h6>
            <input type="button" value="清除" onclick="location.href='index.php'" class="button2" id="clear-button">
            <button type="button" class="button2" onclick="loginclick(<?=$key?>)" id="login">登入</button><br><br>
        </form>
        <script src="verifyCode.js"></script>
    </body>
</html>