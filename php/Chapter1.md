# Chapter 1 PHP에 대해서.....

## PHP란?

- 주로 HTML 코드를 프로그래밍적으로 생성
- 서버쪽에서 실행 되는 프로그래밍 언어
- **P**ersonal **H**ome **P**age Tools 의 약자에서 **P**HP:**H**ypertext **P**reprocessor 로 의미가 변경 되었다.

## **PHP의 장점**

- 웹에 최적화된 언어
- 웹개발에 필요한 수많은 로직들이 함수의 형태로 미리 제공됨
- 크로스플랫폼
- 거의 모든 데이터베이스를 지원
- 가장 많은 공개소프트웨어가 PHP로 만들어짐

## **PHP 정보를 얻을 수 있는 곳**

- [php.net](http://php.net/) - php의 공식 홈페이지
- [phpschool.com](http://phpschool.com/) - 국내 최대의 PHP 커뮤니티

## **PHP로 만들어진 솔루션들**

- [phpbb](http://www.phpbb.com/)
- [phpmyadmin](http://www.phpmyadmin.net/home_page/index.php)
- [wordpress](http://wordpress.com/)
- [제로보드](http://www.xpressengine.com/)
- [텍스트큐브](http://www.textcube.org/)

# 1.3 PHP 따라하기

## 예제 1-2, 1-3

- form tag의 action 속성에 지정된 sayhello.php로 정보를 제출한다.
- 같은 폴더 상에 있지 않은 경우 다음과 같이 경로 지정을 해주어야 한다.
    - ex) 123폴더/456폴더/sayhello.php
    
    ```html
    <html>
        <form method="POST" action="123/456/sayhello.php">
            이름: <input type="text" name="user" />
            <br>
            <button type="submit">인사</button>
        </form>
    </html>
    ```
    
    ```php
    <?php
        print "Hello, ";
        // 'user'라는 폼 매개변수로 제출된 값 출력
        print $_POST['user'];
        print "!";
    ?>
    <html>
        <form action="">
            <button formaction="../../1-2.php">이름 수정하기</button>
        </form>
    </html>
    ```
    

## 예제 1-4

- here 문서 문자열 구분을 사용하여 `<<<_HTML_`과 `_HTML_`사이에 있는 모든 내용을 print 명령에 전달해 표시한다.
    - 태그 자동 완성이 안된다..... (기능은 작동한다.)
    
    ```php
    <?php
        print <<<_HTML_
            <form method="post" action="$_SERVER[PHP_SELF]">
            이름: <input type="text" name="user" />
        _HTML_;
    ?>
    ```
    

## 예제 1-5

- 예제 1-3과 1-4를 한 페이지에 조합.
- 변수`$_SERVER[PHP_SELF]`는 현재 페이지의 URL을 담고 있다.
    
    ```php
    <?php
        // 폼이 전송되면 인사하기
        if ($_POST['user']) {
            print "Hello, ";
            // 'user'라는 폼 매개변수로 제출된 값 출력
            print $_POST['user'];
            print "!";
        } else {
            // 그렇지 않다면 폼 출력
            print <<<_HTML_
                <form method="post" action="$_SERVER[PHP_SELF]">
                이름: <input type="text" name="user" />
                <br/>
                <button type="submit">인사</button>
                </form>
            _HTML_;
        }
    ?>
    ```
    

## **예제 1-6**

- PHP 내장 함수 라이브러리 중 하나인 `number_format()`사용

## 예제 1-7

- DB로부터 가져온 정보가 포함된 웹 페이지 표시
- DB서버에 접속 후 매개변수의 값을 이용해 메뉴 구분과 가격 정보를 가져와 HTML table로 출력
    
    ```php
    <?php
    	// SQLite DB 'dinner.db'를 사용
    	$db = new PDO('sqlite:dinner.db');
    	// 허용되는 메뉴 구분 정의
    	$meals = array('아침', '점심', '저녁');
    	// 제출된 폼 매개변수 "meal" 값이
    	// "아침", "점심", "저녁" 중 하나인지 확인
    	if (in_array($_POST['mead'], $meals)) {
    		// 맞다면, 해당하는 모든 요리 가져오기
    		$stmt = $db->prepare('SELECT dish.price FROM meals WHERE meal LIKE ?');
    		$stmt->execute(array($_POST['meal']));
    		$rows = $stmt->fetchAll();
    		// 데이터베이스에서 아무 요리도 발견하지 못했다면
    		if (count($rows) == 0) {
    			print "가능한 요리가 없습니다.";
    		} else {
    			// 각 요리와 가격을 HTML표에 한 줄씩 출력하기
    			print '<table><tr><th>요리</th><th>가격</th></tr>';
    			foreach ($rows as $row) {
    				print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
    			}
    			print "</table>";
    		}
    	} else {
    		// "meal" 변수가 "아침", "점심", "저녁" 중 하나가 아니라면
    		// 다음을 출력
    		print "알 수 없는 메뉴입니다.";
    	}
    ?>
    ```
    

# 1.4 PHP 프로그램의 기본 규칙

## 1.4.1 시작 태그와 종료 태그

- `<?php` 시작 태그와 `?>` 종료 태그 바깥에 있는 텍스트는 PHP 엔진으로부터 아무런 간섭을 받지 않고 출력 된다.
- 하나의 PHP 파일에서 여러 쌍의 시작 태그와 종료 태그가 있을 수 있다.
    
    ```php
    오 더하기 오는:
    <?php print 5 + 5; ?>
    <p>
    사 더하기 사는:
    <?php
    print 4 + 4;
    ?>
    <p>
    <img src="vacation.jpg" alt="나의 휴가" />
    ```
    

## 1.4.2 화이트스페이스와 대소문자 구문

- 화이트스페이스는 공백, 탭, 개행문자처럼 겉으로는 부이지 않는 문자를 의미한다.
- 현실적으로는 한 줄에 하나의 구문만 넣고 구문 사이의 빈 줄은 소스 코드의 가독성을 높일 때만 넣는 것이 좋다.
- `print` 등의 언어 키워드와 `number_format()` 등의 함수명은 대소문자를 구별하지 않는다.

## 1.4.3 주석

- `#` 또는 “//” 가능