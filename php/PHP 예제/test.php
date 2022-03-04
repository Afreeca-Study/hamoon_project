<?php
    if ($_POST['user']) {
        print "Hello, ";
        // 'user'라는 폼 매개변수로 제출된 값 출력
        print $_POST['user'];
        print "!";
    } else {
        print <<<_HTML_
        <form method="POST" action="$_SERVER[PHP_SELF]">
        이름: <input type="text" name="user" />
        <br/>
        <button type="submit">인사</button>
        </form>
        _HTML_;
    }
?>