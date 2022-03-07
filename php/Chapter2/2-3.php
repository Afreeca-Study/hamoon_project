<html>
    <form method="POST" action="">
        우편번호: <input type="text" name="zipcode">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        // $_POST['zipcode']는 폼 매개변수 "zipcode"로 제출된 값을 담는다.
        $zipcode = trim($_POST['zipcode']);
        // 이제 $zipcode는 시작이나 끝에 있는 공백이 제거된 값을 담는다.
        $zip_length = strlen($zipcode);
        // 우편번호가 5자리가 아니면 문제를 제기한다.
        if ($zip_length != 5) {
            print "우편번호를 5자리로 입력해주세요.";
        } else {
            print "우편번호는 $zipcode 입니다!";
        }
    ?>
</html>