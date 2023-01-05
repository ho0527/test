<?php
    function up($data,$comper){
        $a=[];
        while($row=mysqli_fetch_assoc($data)){
            array_push($a,$row);
        }
        for($i=0;$i<sizeof($a)-1;$i=$i+1){
            for($j=0;$j<sizeof($a)-$i-1;$j=$j+1){
                if($a[$j][$comper]>$a[$j+1][$comper]){
                    $tamp=$a[$j];
                    $a[$j]=$a[$j+1];
                    $a[$j+1]=$tamp;
                }
            }
        }
        for($row=0;$row<count($a);$row=$row+1){
            if($a[$row]["username"]=="admin"||$a[$row]["usernumber"]=="null"){
            ?>
                <tr>
                    <td class="admin-table-num" id=<?= $a[$row]["usernumber"]; ?>>
                        <?php print_r($a[$row]["usernumber"]); ?>
                        <input type="button" value="edit" disabled>
                        <button name="del" disabled>刪除帳號</button>
                    </td>
                    <td class="admin-table"><?php print_r($a[$row]["username"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["password"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["name"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["permission"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["logintime"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["logouttime"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["move"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["movetime"]); ?></td>
                </tr>
            <?php
            }else{
            ?>
            <tr>
                <td class="admin-table-num" id=<?= $a[$row]["usernumber"]; ?>>
                    <?php print_r($a[$row]["usernumber"]); ?>
                    <input type="button" value="edit" onclick="location.href='adminedit.php?number=<?= $a[$row]['usernumber'] ?>'">
                    <button name="del" value="<?= $a[$row]["usernumber"]; ?>">刪除帳號</button>
                </td>
                <td class="admin-table"><?php print_r($a[$row]["username"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["password"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["name"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["permission"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["logintime"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["logouttime"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["move"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["movetime"]); ?></td>
            </tr>
            <?php
            }
        }
    }

    function down($data,$comper){
        $a=[];
        while($row=mysqli_fetch_assoc($data)){
            array_push($a,$row);
        }
        for($i=0;$i<sizeof($a)-1;$i=$i+1){
            for($j=0;$j<sizeof($a)-$i-1;$j=$j+1){
                if($a[$j][$comper]<$a[$j+1][$comper]){
                    $tamp=$a[$j];
                    $a[$j]=$a[$j+1];
                    $a[$j+1]=$tamp;
                }
            }
        }
        for($row=0;$row<count($a);$row=$row+1){
            if($a[$row]["username"]=="admin"||$a[$row]["usernumber"]=="null"){
            ?>
                <tr>
                    <td class="admin-table-num" id=<?= $a[$row]["usernumber"]; ?>>
                        <?php print_r($a[$row]["usernumber"]); ?>
                        <input type="button" value="edit" disabled>
                        <button name="del" disabled>刪除帳號</button>
                    </td>
                    <td class="admin-table"><?php print_r($a[$row]["username"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["password"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["name"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["permission"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["logintime"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["logouttime"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["move"]); ?></td>
                    <td class="admin-table"><?php print_r($a[$row]["movetime"]); ?></td>
                </tr>
            <?php
            }else{
            ?>
            <tr>
                <td class="admin-table-num" id=<?= $a[$row]["usernumber"]; ?>>
                    <?php print_r($a[$row]["usernumber"]); ?>
                    <input type="button" value="edit" onclick="location.href='adminedit.php?number=<?= $a[$row]['usernumber'] ?>'">
                    <button name="del" value="<?= $a[$row]["usernumber"]; ?>">刪除帳號</button>
                </td>
                <td class="admin-table"><?php print_r($a[$row]["username"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["password"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["name"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["permission"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["logintime"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["logouttime"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["move"]); ?></td>
                <td class="admin-table"><?php print_r($a[$row]["movetime"]); ?></td>
            </tr>
            <?php
            }
        }
    }

    function issetgetupdown($db,$data){
        if(isset($_GET["up_down"])){
            $number=$_GET["num-up-down"];
            @$user=$_GET["user-up-down"];
            @$code=$_GET["code-up-down"];
            @$name=$_GET["name-up-down"];
            if($number=="降冪"){
                down($data,"usernumber");
            }elseif($user=="降冪"){
                down($data,"username");
            }elseif($code=="降冪"){
                down($data,"password");
            }elseif($name=="降冪"){
                down($data,"name");
            }else{
                up($data,"usernumber");
            }
        }else{
            up($data,"usernumber");
        }
    }
?>