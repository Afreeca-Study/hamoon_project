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

## 예제코드

```php
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
```