<?php
    function uper($todo){
        if(isset($_SESSION["date"])){
            $date=$_SESSION["date"];
            while($row=mysqli_fetch_row($todo)){
                $end_time=substr($row[3],0,2)*60+substr($row[3],3,5);
                $hr=substr($row[4],0,2)-substr($row[3],0,2);
                $min=substr($row[4],3,5)-substr($row[3],3,5);
                if($end_time>=960){
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+($end_time/2)+20; ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut"name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }elseif($end_time>=600){
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+($end_time/2)+15; ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut" name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+($end_time/2); ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut" name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }
            }
        }
    }

    //要用end time來看
    function lower($todo){
        if(isset($_SESSION["date"])){
            $date=$_SESSION["date"];
            while($row=mysqli_fetch_row($todo)){
                $end_time=substr($row[4],0,2)*60+substr($row[4],3,5);
                $hr=substr($row[4],0,2)-substr($row[3],0,2);
                $min=substr($row[4],3,5)-substr($row[3],3,5);
                if($end_time>=960){
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+(($end_time-1155)/2)+350; ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut"name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }elseif($end_time>=600){
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+(($end_time-125)/2)-700; ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut" name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="work-box" draggable="true" value="<?= $row[0]; ?>" style="height:<?= ($hr*30)+(($min/30)*15)+12; ?>px;top:<?= 145+(($end_time+960)/2)-95; ?>px;left:230px;">
                        <button type="submit" id="button3" class="todobut" name="edit" value="<?= $row[0]; ?>">edit</button>
                        <button type="submit" id="button4" class="todobut" name="preview" value="<?= $row[0]; ?>">預覽</button>
                        標題: <?php echo($row[1]); ?><br>
                        開始時間: <?php echo($row[3]); ?><br>
                        結束時間: <?php echo($row[4]); ?><br>
                        處理狀態: <?php echo($row[5]); ?><br>
                        優先順序: <?php echo($row[6]); ?><br>
                    </div>
                    <?php
                }
            }
        }
    }
?>