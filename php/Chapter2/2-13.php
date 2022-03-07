<html>
    <!-- 대소문자에 관계없이 문자열 비교하기 -->
    <form method="POST" action="">
        댓글 쓰기 <input type="text" name="card" value="4000-1234-5678-9101">
        <br>
        <button type="submit">제출</button>
    </form>
    <?php
        $card = $_POST['card'];
        print '카드: XX';
        // 변수card에 저장된 값의 끝에서부터 역방향으로 4바이트 만큼 이동한 곳을 기점으로 4바이트까지 출력한다.
        print substr($card, -4, 4);
        // substr()의 마지막 인수를 생략하면(양수 음수 관계없이) 시작 위치부터 문자열의 끝까지 모두 반환한다.
        print substr($card, -4);
    ?>
</html>