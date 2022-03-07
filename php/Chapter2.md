# Chapter 2

# 2.1 텍스트

## 2.1.1 텍스트 문자열 정의

- PHP 프로그램에서 문자열의 최대 길이는 컴퓨터의 메모리 크기로 제한된다.
    - PHP의 문자열은 글자의 나열이 아니라 바이트의 나열이다.

### 프로그램에서 문자열을 정의하는 세 가지 방법

1. 작은따옴표
    1. 작은따옴표로 감싼 문자열 안에 작은따옴표를 표현하고 싶을 경우 작은따옴표 앞에 역슬래시(`\`)를 붙인다.
2. 큰따옴표
    1. 큰따옴표 문자열 안에서 사용할 수 있는 특수 문자
        
        
        | 문자 | 의미 |
        | --- | --- |
        | \n |  줄바꿈(아스키코드 10) |
        | \r | 캐리지 리턴(아스키코드 13) |
        | \t | 탭(아스키코드 9) |
        | \\ | \ |
        | \$ | $ |
        | \” | “ |
        | \0 .. \777 | 8진수 |
        | \x0 .. \xFF | 16진수 |
3. here문서
    
    ```php
    <?php
    	print <<<_HTML_
    	출력할 내용
    	__HTML__
    ?>
    ```
    

### 이스케이핑이란 무엇이며 문자열을 지정하는 각 방법에서 이스케이핑에 필요한 문자는 무엇인가?

- 이스케이핑: 기능으로 해석되는 것이 아닌 단순한 문자 하나로 해석되는 것.
- 이스케이프 문자: `\`
- 이스케이프 문자는 스스로 이스케이프될 수도 있다.

### 작은따옴표 문자와 큰따옴표 문자의 차이

- 큰따옴표는 문자열 안에 포함된 변수명이 해당 변수의 값으로 대치된다.
    - ex) `$user` 변수가 Bill이라는 값을 담는다면
        - ‘Hi $user’ 는 문자열 그대로 Hi $user이다
        - “Hi $user” 는 Hi Bill이 된다.

## 2.1.2 텍스트 다루기

### 문자열 유효성 검사

- `trim()` : 문자열의 시작과 끝에 존재하는 화이트스페이스를 제거한다.
- `strlen()` : 문자열의 길이를 알려준다.
- `strcasecmp()` : 두 문자열을 비교할 때 대소문자 차이를 무시하며, 내용이 같다면 0을 반환한다.

### 예제 2-4

양 끝 화이트스페이스를 제거한 문자열의 길이를 확인

```php
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
```

### 예제 2-6

대소문자에 관계없이 문자열 비교하기

```php
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
```

### 텍스트 형식화

- `printf()` : 형식을 나타내는 문자열과 출력할 요소 집합을 printf() 함수로 전달하면 형식 문자열 내부의 규칙 요소가 출력 요소로 교체됨.
    
    ```php
    <html>
        <?php
            $price = 5; $tax = 0.075;
            printf('요리 가격은 $%.2f', $price*(1+$tax));
        ?>
    </html>
    ```
    
    - 형식 문자열에 있는 `%.2f`라는 규칙은 `$price*(1+$tax)` 의 값으로 교체되며, 소수점 2자리까지 표시된다.
    
    ### 형식 문자열
    
    - 형식 문자열 규칙은 %로 시작한다.
    - 수정자 : 형식 문자열 규칙이 해야 할 일을 지정하는 것
        - 패딩문자
            - 형식 규칙을 교체할 문자열이 너무 짧다면 패딩 문자를 이용해 늘린다. 빈 공간을 공백 문자로 채우거나 0으로 채울 수 있다.
        - 기호
            - 숫자일 경우, 더하기 기호(`+`)가 있으면 `printf()`가 양수 앞에 `+` 를 붙여준다.
                
                ```php
                <?php
                    $min = -40;
                    $max = 40;
                    printf("컴퓨터는 섭씨 %+d도와 %+d도 사이에서 작동할 수 있습니다.", $min, $max);
                ?>
                ```
                
            - 문자일 경우 빼기 기호(`-`)가 있으면 `printf()` 가 문자열을 오른쪽으로 정렬한다.
        - 최소 너비
            - 형식 규칙을 통해 교체된 값의 최소 너비를 지정한다. 만약 교체된 값이 이 너비보다 더 좁으면 나머지 공간을 패딩 문자가 채운다.
        - 마침표와 정밀도
            - 부동소수점 수에 사용되며 소수점 이하 몇 자리까지 표시할지를 제어한다.
            - 수정자 뒤에는 반드시 문자가 나오는데, 이 문자는 어떤 종류의 값이 출력되어야 하는지를 지정한다.
                - `d` : 10진수
                - `s` : 문자열
                - `f` : 부동소수점 수
            
            ```php
            <?php
                $zip = '6520';
                $month = 2;
                $day = 6;
                $year = 2007;
            
                printf("우편번호는 %05d이고 날짜는 %d년%02d월%02d일 이다.", $zip, $year, $month, $day)
            ?>
            ```
            
- `strtolower()` : 문자열 전체를 소문자로 변환
- `strtoupper()` : 문자열 전체를 대문자로 변환
- `ucwords()` : 문자열에 있는 각 단어의 첫 글자를 대문자로 변환
    
    ```php
    <?php
        print ucwords(strtolower('JOHN FRANKENHEIMER'));
    ?>
    ```
    
- `substr()` : 문자열의 일부를 원하는 대로 추출
    - 세 인수는 `작업할 문자열`, `문자열 추출 시작 위치`, `추출할 바이트 수`를 나타낸다.
    
    ```php
    <html>
        <!-- 대소문자에 관계없이 문자열 비교하기 -->
        <form method="POST" action="">
            댓글 쓰기 <input type="text" name="comment" value="The Fresh Fish with Rice Noodle was delicious, but I didn't like the Beef Tripe.">
            <br>
            <button type="submit">제출</button>
        </form>
        <?php
            $comment = $_POST['comment'];
            // 변수 comment에 저장된 값의 0번째 부터 30번째 바이트까지 출력한다.
            print substr($comment, 0, 30);
            // 말줄임표를 붙인다.
            print '...';
        ?>
    </html>
    ```
    
    - 추출 시작 위치에 음수를 넣으면 문자열 끝에서부터 역방향으로 시작 위치를 센다.
        - 시작 위치가 `-4`라면 그 의미는 `끝에서부터 역방향으로 4바이트` 를 의미한다.
        
        ```php
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
        ```
        
- `str_replace()` : 문자열의 일부를 바꾼다.
    
    ```php
    <?php
        $my_class = 'lunch';
    
        $html = '<span class="{class}">유부<span></br>
        <span class="{class}">생선 튀김</span>';
        // str_replace()의 인수는 각각 찾을 문자열, 바꿀 문자열, 전체 문자열 을 의미한다.
        print str_replace('{class}', $my_class, $html)
        // 실행 결과 $html에 저장된 문자열에서 {class}라는 문자열을 찾아 $my_class의 값으로 교체한 문자열이 출력된다.
    ?>
    ```
    

## 2.2 숫자

- PHP에서 수치를 유효하게 표기하는 방법들
    
    ```php
    print 56;
    print 56.3;
    print 56.30;
    print 0.774422;
    print 16777.216;
    print 0;
    print -213;
    print 1298317;
    print -9912111;
    print -12.52222;
    print 0.00;
    ```
    
- 산술 연산자
    - `+` , `-` , `/` , `*`, `**` , `%` .....

## 2.3 변수

- 변수는 프로그램 실행 과정에서 사용되는 데이터를 담는다.
    
    ```php
    $plates = 5;
    $dinner = '소고기 쌀국수 볶음';
    $cost_of_dinner = 8.95;
    $cost_of_lunch = $cost_of_dinner;
    ```
    
    - here 문서를 이용해 할당할 수도 있음.
- 변수 이름에는 다음 요소들만 사용할 수 있다.
    - 기본 라틴 문자의 대문자나 소문자(`A-Z`와 `a-z`)
    - 숫자(`0-9`)
    - 밑줄문자(`_`)
    - 프로그램 파일의 문자 인코딩이 `UTF-8`일 경우, 기본 라틴문자가 아닌 문자(`※`, **`β` 등**)도 허용된다.
- 변수명의 첫 번째 글자로는 숫자가 허용되지 않는다.
- 변수명은 대소문자를 구별한다.

### 2.3.1 변수의 연산

- 산술 연산자와 문자열 연산자는 숫자나 문자열에 사용하는 방식 그대로 변수에도 똑같이 사용할 수 있다.
    
    ```php
    <?php
        $price = 3.95;
        $tax_rate = 0.08;
        $tax_amount = $price * $tax_rate;
        $total_cost = $price + $tax_amount;
        
        $username = 'james';
        $domain = '@example.com';
        $email_address = $username . $domain;
        
        print '세금은 ' .$tax_amount;
        print "\n"; // 줄바꿈을 출력한다.
        print '총 가격은 ' .$total_cost;
        print "\n"; // 줄바꿈을 출력한다.
        print $email_address;
    ?>
    ```