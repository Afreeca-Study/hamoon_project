<html>
    <form method="POST" action="">
        우편번호: <input type="text" name="zipcode">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        // form 매개변수 "zipcode"로 제출된 값을 변수 zipcode에 저장
        $zipcode = $_POST['zipcode'];
        // 만약 form 매개변수 "zipcode"로 제출된 값에 trim과 strlen을 적용시킨 값이 5가 아니라면,
        if (strlen(trim($zipcode)) != 5) {
            print "우편번호를 5자리로 입력해주세여.";
        }
        // 적용시킨 값이 5라면
        else {
            print "우편번호는 $zipcode 입니다!";
        }
    ?>
</html>