<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>健康診断アプリ</h1>
    <form action="#" method="POST">
        <table>
            <tr>
                <tr>
                    <th>性別：</th>
                    <td>
                        <input type="radio" name="sex" value="0" checked>女性
                        <input type="radio" name="sex" value="2">男性
                    </td>
                </tr>
                <th>年齢：</th>
                <td>
                    <input type="radio" name="age" value="0" checked>40~44
                    <input type="radio" name="age" value="1">45~49
                    <input type="radio" name="age" value="3">50~54
                    <input type="radio" name="age" value="4">55~59
                    <input type="radio" name="age" value="5">60~64
                    <input type="radio" name="age" value="6">65~69
                </td>
            </tr>
            <tr>
                <th>身長(cm)：</th>
                <td><input type="number" name="height" value="160" required></td>
            </tr>
            <tr>
                <th>体重(kg)：</th>
                <td><input type="number" name="weight" value="60" required></td>
            </tr>
            <tr>
                <th>身体活動：</th>
                <td>
                    <select name="physicalActivity" id="">
                        <option value="0">寝たきり</option>
                        <option value="-1">普通の生活</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>喫煙：</th>
                <td>
                    <select name="smoking" id="">
                        <option value="0">吸わない。過去喫煙</option>
                        <option value="1">吸う</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>飲酒：</th>
                <td>
                    <select name="drinking" id="">
                        <option value="0">飲まない</option>
                        <option value="1">以前飲んでいた</option>
                        <option value="2">時々飲む(月に１～３回)</option>
                        <option value="3">飲む(週300g未満)</option>
                        <option value="4">飲む(週300g~450g未満)</option>
                        <option value="5">飲む(週450g以上)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>糖尿病：</th>
                <td>
                    <input type="radio" name="diabetes_mellitus" value="0" checked>なし
                    <input type="radio" name="diabetes_mellitus" value="1">あり
                </td>
            </tr>
            <tr>
                <th>コーヒー飲用習慣：</th>
                <td>
                    <select name="coffee" id="">
                        <option value="0">飲まない</option>
                        <option value="0">週1回以上、毎日は飲まない</option>
                        <option value="-1">毎日１杯以上</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <th>B型肝炎ウィルス：</th>
                <td>
                <input type="radio" name="hbv" value="0" checked>陰性
                <input type="radio" name="hbv" value="4">陽性
                </td>
            </tr>
            <tr>
                <th>C型肝炎ウィルス：</th>
                <td>
                <input type="radio" name="hcv" value="0" checked>陰性
                <input type="radio" name="hcv" value="6">陽性
                </td>
            </tr>
        </table>
        <input type="submit" value="健康診断！">
    </form>
    <?php 
        if(isset($_POST['height']) && isset($_POST['weight'])){
            echo callfunc();
        }
        // 肥満度計算
        function BMIsimulator($bmi,$height) {
    
            if($bmi>0 && $height>0) {
                
                if($bmi<18.5) {
                    return "低体重(やせ型)";
                }elseif ($bmi<25) {
                    return "普通体重";
                }elseif ($bmi<30) {
                    return "肥満(1度)";
                }elseif ($bmi<35) {
                    return "肥満(2度)";
                }elseif ($bmi<40) {
                    return "肥満(3度)";
                }else {
                    return "肥満(4度)";
                }
        
            }else {
                return "入力した値が不正";
            }
            
        }

        // 適正体重計算
        function properWeight ($height) {
            return $height*$height*22/10000;
        }

        // BMIを求める関数
        function bmivalue ($height,$weight) {
            $bvalue =10000*$weight/($height*$height);  //returnは1行でも書けるが2行のほうがデバックしやすい！
            return $bvalue;
        }

        // 大腸がんリスク
        // BMIによる点数計算
        function BMIcalc($bmi) {
            if($bmi>=25) {
                return 1;
            }else {
                return 0;
            }
        }

        // 飲酒による大腸ガンリスク点数計算
        function colorectalCancerDrinking ($drinking) {
            switch($drinking) {
                
                case 0:
                return 0;
                case 1:
                return 0;
                case 2:
                return 0;
                case 3:
                return 1;
                case 4:
                return 2;
                case 5:
                return 2;
            }
        }

        // 大腸がんになる確率を計算
        function colorectalCancer($colorectal_score) {
            switch($colorectal_score) {
                case -1:
                return '0.2%';
                case 0:
                return '0.3%';
                case 1:
                return '0.5%';
                case 2:
                return '0.7%';
                case 3:
                return '0.9%';
                case 4:
                return '1.3%';
                case 5:
                return '1.8%';
                case 6:
                return '2.4%';
                case 7:
                return '3.3%';
                case 8:
                return '4.6%';
                case 9:
                return '5.9%';
                case 10:
                return '7.4%';
            }
        }

        // 年齢による肝がんリスク点数を計算
        function liverCancerAge ($age) {
            switch($age) {
                case 0:
                return 0;
                case 1:
                return 0;
                case 3:
                return 2;
                case 4:
                return 2;
                case 5:
                return 3;
                case 6:
                return 3;
            }
        }
        
        // 飲酒による肝ガンリスク点数計算
        function liverCancerDrinking ($drinking) {
            switch($drinking) {
                
                case 0:
                return 1;
                case 1:
                return 1;
                case 2:
                return 1;
                case 3:
                return 0;
                case 4:
                return 0;
                case 5:
                return 2;
            }
        }
        // 肝がんになる確率を計算
        function liverCancer($liver_score) {
            switch($liver_score) {
                case -1:
                return '0.1%未満';
                case 0:
                return '0.1%未満';
                case 1:
                return '0.1%未満';
                case 2:
                return '0.1%未満';
                case 3:
                return '0.1%未満';
                case 4:
                return '0.1%未満';
                case 5:
                return '0.1%';
                case 6:
                return '0.2%';
                case 7:
                return '0.4%';
                case 8:
                return '0.8%';
                case 9:
                return '1.6%';
                case 10:
                return '2.9%';
                case 11:
                return '5.4%';
                case 12:
                return '9.8%';
                case 13:
                return '17.5%';
                case 14:
                return '30.2%';
                case 15:
                return '49.0%';
                case 16:
                return '71.6%';
                case 17:
                return '90.5%';
                case 18:
                return '98.8%';
                case 19:
                return '99.9%';
            }
        }

        // テーブル作成
        function callfunc() {
            echo '<p>こんにちは！あなたの健康診断結果です！</p>';
            
            // 入力画面から身長と体重と年齢と飲酒状況を取得する
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $age = $_POST['age'];
            $drinking = $_POST['drinking'];
            ?>
            <table border="1">
            <!-- 身長と体重を出力する -->
                <tr>
                    <th>身長：</th>
                    <td><?php echo "${height}cm"?></td>
                </tr>
                <tr>
                    <th>体重：</th>
                    <td><?php echo "${weight}cm"?></td>
                </tr>
            <?php
            // BMI値を計算する
            $bmi = bmivalue($height,$weight);
            // BMIランクを評価する
            $bmiRank = BMIsimulator($bmi,$height);
            // 適正体重を求める
            $proper = properWeight($height);
            

            // BMIによる大腸ガンリスク点数を計算する
            $BMI_colorectal_liver_score = BMIcalc($bmi);
            // 飲酒による大腸がんリスク点数計算
            $colorectal_drinking = colorectalCancerDrinking($drinking);

            // 年齢による点数、BMIによる点数、身体活動による点数、
            // 飲酒習慣による点数、喫煙習慣による点数を合計し、$colorectal_scoreに代入する。
            $colorectal_score =$age+$BMI_colorectal_liver_score+$_POST['physicalActivity']+$_POST['smoking']+$colorectal_drinking;
            // 大腸がんになる確率を計算
            $colorectal_cancer = colorectalCancer($colorectal_score);
            // 年齢による肝がんリスク点数を計算
            $liverAgePoint = liverCancerAge($age);
            // 飲酒による肝がんリスク点数を計算
            $liver_drinking = liverCancerDrinking($drinking);
            // 糖尿病による肝がんリスク点数を取得
            $diabetesMellitus_point = $_POST['diabetes_mellitus'];
            // コーヒー飲用習慣による肝がんリスク点数を取得
            $coffee_point = $_POST['coffee'];
            // HBV感染
            $hbv_point = $_POST['hbv'];
            // HCV感染
            $hcv_point = $_POST['hcv'];
            // 年齢、性別、飲酒習慣、BMI、糖尿病、コーヒー飲用習慣、HBV感染、HCV感染を因子とした
            // 点数を合計し、$liver_scoreに代入する
            $liver_score = $liverAgePoint+$_POST['sex']+$liver_drinking+$BMI_colorectal_liver_score+$diabetesMellitus_point+$coffee_point+$hbv_point+$hcv_point;
            // 肝がんになる確率を計算
            $liver_cancer = liverCancer($liver_score);
            ?>
                <!-- BMI,体重評価,適正体重を出力 -->
                <tr>
                    <th>BMI値：</th>
                    <td><?php echo round($bmi, 2, PHP_ROUND_HALF_UP)?></td>
                </tr>
                <tr>
                    <th>体重評価：</th>
                    <td><?php echo "${bmiRank}"?></td>
                </tr>
                <tr>
                    <th>適正体重：</th>
                    <td><?php echo "${proper}kg"?></td>
                </tr>
                <tr>
                    <th>10年における大腸がんリスク：</th>
                    <td><?php echo "${colorectal_cancer}"?></td>
                </tr>
                <tr>
                    <th>10年における肝がんリスク：</th>
                    <td><?php echo "${liver_cancer}"?></td>
                </tr>
            </table>
            <?php
        }
    ?>
    <p>※当アプリは、国立がん研究センターの調査結果をもとに作成しており、情報の信ぴょう性には万全を期しておりますが、
        計算結果や情報等に関して当サイトは一切責任を負いかねます。また個別相談は対応しておりません。</p>
    
</body>
</html>