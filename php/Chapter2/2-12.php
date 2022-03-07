<html>
    <!-- 대소문자에 관계없이 문자열 비교하기 -->
    <form method="POST" action="">
        댓글 쓰기 <input type="text" name="comment" value="The Fresh Fish with Rice Noodle was delicious, but I didn't like the Beef Tripe.">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        $comment = $_POST['comment'];
        // 변수 comment에 저장된 값의 첫 30바이트를 출력한다.
        print substr($comment, 0, 30);
        // 말줄임표를 붙인다.
        print '...';
    ?>
</html>