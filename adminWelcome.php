<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>管理者專區</title>
        <link href="index.css" rel="Stylesheet">
    </head>
    <body>
         <table>
            <tr>
               <td class="admin-title">
                  <form>
                     管理者專區
                     <button type="button" onclick="location.href='signup.php'">註冊</button>
                     <button name="logout">登出</button>
                  </form>
                  <?php
                     include("link.php");
                     include("admindef.php");
                     @$admin_data=$_SESSION["data"];
                     if(isset($_GET["logout"])){
                        $admin=mysqli_query($db,"SELECT*FROM `admin` WHERE `adminNumber`='$admin_data'");
                        $row=mysqli_fetch_row($admin);
                        if(isset($admin_data)){
                           mysqli_query($db,"UPDATE `data` SET `logouttime`='$time' WHERE `usernumber`='$admin_data' AND `logouttime`=''");
                           mysqli_query($db,"INSERT INTO `data`(`usernumber`,`username`,`password`,`name`,`permission`,`logintime`,`logouttime`,`move`,`movetime`)
                           VALUES('$admin_data','$row[1]','$row[2]','$row[3]','管理者','-','-','logout','$time')");
                           ?><script>alert("登出成功!");location.href="index.php"</script><?php
                           session_unset();
                        }else{
                           mysqli_query($db,"INSERT INTO `data`(`usernumber`,`username`,`password`,`name`,`permission`,`logintime`,`logouttime`,`move`,`movetime`)
                           VALUES('null','','','','','','','logout','$time')");
                           ?><script>alert("登出成功!");location.href="index.php"</script><?php
                           session_unset();
                        }
                     }
                  ?>
               </td>
               <td class="admin-find">
                  <form>
                     <input type="search" name="search" placeholder="查詢">
                     <button name="enter">送出</button>
                  </form>
               </td>
            </tr>
            <tr>
               <td>
                  <table class="main-table">
                     <form>
                        <tr>
                           <td class="admin-table-num">編號<input type="button" id="num-up-down" name="num-up-down"></td>
                           <td class="admin-table">使用者帳號<input type="button" id="user-up-down" name="user-up-down"></td>
                           <td class="admin-table">密碼<input type="button" id="code-up-down" name="code-up-down"></td>
                           <td class="admin-table">名稱<input type="button" id="name-up-down" name="name-up-down" ></td>
                           <td class="admin-table">權限</td>
                           <td class="admin-table">登入時間</td>
                           <td class="admin-table">登出時間</td>
                           <td class="admin-table">動作</td>
                           <td class="admin-table">動作時間</td>
                           <button type="button" onclick="submitbut()">確定(升降冪)</button>
                        </tr>
                        <?php
                           if(isset($_GET["enter"])){
                              $_SESSION["type"]=$_GET["search"];
                              header("location:adminWelcome.php");
                           }
                           if(isset($_SESSION["type"])){
                              $type=$_SESSION["type"];
                              if($type==""){
                                 unset($_SESSION["type"]);
                                 header("location:adminWelcome.php");
                              }else{
                                 $data=mysqli_query($db,"SELECT*FROM `data` WHERE `usernumber`LIKE'%$type%' or `username`LIKE'%$type%' or `password`LIKE'%$type%' or `name`LIKE'%$type%' or `permission`LIKE'%$type%' or `logintime`LIKE'%$type%' or `logouttime`LIKE'%$type%' or `move`LIKE'%$type%' or `movetime`LIKE'%$type%'");
                                 issetgetupdown($db,$data);
                              }
                           }else{
                              $data=mysqli_query($db,"SELECT*FROM `data`");
                              issetgetupdown($db,$data);
                           }
                        ?>
                     </form>
                     <?php
                        if(array_key_exists("del",$_GET)){
                           $number=$_GET["del"];
                           $user=mysqli_query($db,"SELECT*FROM `user` WHERE `userNumber`='$number'");
                           $admin=mysqli_query($db,"SELECT*FROM `admin` WHERE `adminNumber`='$number'");
                           if($row=mysqli_fetch_row($user)){
                              mysqli_query($db,"INSERT INTO `data`(`usernumber`,`username`,`password`,`name`,`permission`,`logintime`,`logouttime`,`move`,`movetime`)
                              VALUES('$number','$row[1]','$row[2]','$row[3]','一般使用者','-','-','delbyadmin','$time')");
                              mysqli_query($db,"DELETE FROM `user` WHERE `userNumber`='$number'");
                              ?><script>alert("刪除成功!");location.href="adminWelcome.php"</script><?php
                           }elseif($row=mysqli_fetch_row($admin)){
                              mysqli_query($db,"INSERT INTO `data`(`usernumber`,`username`,`password`,`name`,`permission`,`logintime`,`logouttime`,`move`,`movetime`)
                              VALUES('$number','$row[1]','$row[2]','$row[3]','管理者','-','-','delbyadmin','$time')");
                              mysqli_query($db,"DELETE FROM `admin` WHERE `adminNumber`='$number'");
                              ?><script>alert("刪除成功!");location.href="adminWelcome.php"</script><?php
                           }else{
                              echo("帳號已被刪除");
                           }
                        }
                     ?>
                  </table>
               </td>
            </tr>
         </table>
         <script src="admin.js"></script>
    </body>
</html>