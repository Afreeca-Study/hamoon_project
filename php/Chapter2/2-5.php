<html>
    <form method="POST" action="">
        이메일을 입력해주세요: <input type="text" name="email">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        // form 매개변수 "email"로 제출된 값을 변수 email에 저장
        $email = $_POST['email'];
        // 변수 email로 제출된 값이 junsung5779@gmail.com이라면
        if ($email == 'junsung5779@gmail.com') {
            print "환영합니다 $email 님.";
        }
        // 조건에 맞지 않을 경우
        else {
            print "누구세요?";
        }
    ?>
</html>