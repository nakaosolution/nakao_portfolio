
    <h1>うるう年判定</h1>
    <form action="#" method="POST">
        <table>
            <tr>
                <th><label>西暦：</label></th>
                <td><input type="number" name="year" required>年</td>
            </tr>
        </table>
        <input type="submit" value="判定">
    </form>
    <?php
    if(isset($_POST['year'])) {
        echo calc();
    }
    function calc() {
        $year = $_POST['year'];
        if($year>=0) {
            if ($year%4===0) { //うるう年の判定処理
                if ($year%100===0 && $year%400!==0) {
                    echo "${year}年は、平年です";
                }else {
                    echo "${year}年は、うるう年です";
                }
            }else {
                echo "${year}年は、平年です";
            }
        }else {
            echo "入力した値が不正です";
        }
    }
    ?>
