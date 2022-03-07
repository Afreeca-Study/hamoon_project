<?php
    $my_class = 'lunch';

    $html = '<span class="{class}">유부<span></br>
    <span class="{class}">생선 튀김</span>';
    // str_replace()의 인수는 각각 찾을 문자열, 바꿀 문자열, 전체 문자열 을 의미한다.
    print str_replace('{class}', $my_class, $html)
    // 실행 결과 $html에 저장된 문자열에서 {class}라는 문자열을 찾아 $my_class의 값으로 교체한 문자열이 출력된다.
?>