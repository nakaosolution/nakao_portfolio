
<style>
        #wrap {
            margin: 0 auto;
            text-align: center;
        }

        #title {
            width: 300px;
            /* height: 338px; */
            /* background: red; */
            position: relative;
            margin: 0 auto;
        }

        img {
            width: 300px;
        }

        h3 {
            position: absolute;
            color: white;
            font-size: 28px;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 12px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            font-size: 25px;
            /* テーブル内の間隔をあける */
            border-collapse:separate;
            border-spacing: 20px 3px;
            
        }

        th {
            width: 5em;
            height: 3em;
            text-align: center;
            line-height: 3em;
        }

        .btn {
            margin-bottom: 50px;
        }

        input{
            background-color: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            padding: 0;
            appearance: none;
        }
        
        

        /* .btn {
            background-color: pink;
            border: 0px solid gray;
            box-shadow: 2px 2px gray;
            margin-top: 10px;
        }

        .btn:active {
            transform: translate(2px,2px);
            box-shadow: 0px 0px gray;
        } */

        
    </style>
    <div id="wrap">
        <div id="title">
            <h3><?php 
            $a = rand(1,6);
            echo $a;
            ?>時限目：席替え</h3>
            <img src="<?php echo get_template_directory_uri(); ?>/images/bg_school_room.jpg" alt="">
        </div>
        
        <table border="1">
            <?php 
            $name= array(
                0=>'A君',
                1=>'B君',
                2=>'Cさん',
                3=>'Dさん',
                4=>'E君',
                5=>'Fさん',
                6=>'G君',
                7=>'H君',
                8=>'I君',
                9=>'Jさん',
                10=>'Kさん',
                11=>'Lさん'
            );
            shuffle($name);
            $user = 'Aさん'; //エアコンに当たりたくない人の名前を入れる

            //if($userが2,4,5,7,8の席に当たったとき)
            if($name[2]===$user ||$name[4]===$user ||$name[5]===$user ||$name[7]===$user ||$name[8]===$user) {
                // echo '<p>'.$user.'がエアコン席に配置されました。</p>';
                if($name[2]===$user) {
                    unset($name[2]);               //$userを配列から削除
                    array_splice($name,9,0,$user); //$userを9番目に配置し、indexを振りなおす
                }elseif($name[4]===$user) {
                    unset($name[4]);
                    array_splice($name,10,0,$user);
                }elseif($name[5]===$user) {
                    unset($name[5]);
                    array_splice($name,9,0,$user);
                }elseif($name[7]===$user) {
                    unset($name[7]);
                    array_splice($name,10,0,$user);
                }elseif($name[8]===$user) {
                    unset($name[8]);
                    array_splice($name,9,0,$user);
                }
            }
            // var_dump($name);
            $x = 0;
            for($j=0;$j<4;$j++) {
                echo '<tr>';
                for($i=0;$i<3;$i++) {
                    echo '<th>'.$name[$x].'</th>';
                    $x++;
                }
                echo '<tr>';
            }
            
            
            
            ?>
        </table>
        <input type="button" name="a" onclick="koshin();" value="席替え！" class="btn">
        <script>
            function koshin(){
                location.reload();
            }
        </script>
    </div>
