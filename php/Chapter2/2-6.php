<html>
    <!-- 대소문자에 관계없이 문자열 비교하기 -->
    <form method="POST" action="">
        대소문자에 관계없이 문자열 비교하기: <input type="text" name="email">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        // form 매개변수 "email"로 제출된 값을 변수 email에 저장
        $email = $_POST['email'];
        // 변수 email에 저장된 값과 'junsung5779@gmail.com' 문자열을 대소문자에 관계없이 비교하였을 때
        // 일치한다면
        if (strcasecmp($email, 'junsung5779@gmail.com') == 0) {
            print "일치합니다.";
        }
        // 조건에 맞지 않을 경우
        else {
            print "일치하지 않습니다.";
        }
    ?>
</html>