# PHP 초기 세팅

기본적인 개발구조는 아래와 같다.

![img](https://www.notion.so/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F61948546-9e05-4724-9b55-931793138296%2FUntitled.png?table=block&id=3be819e3-7aaf-4f69-bdb5-9fdf21adf6a6&spaceId=85232385-9c95-4a75-9121-0f3e6c4c01c0&width=2000&userId=ea37adea-5932-43cb-8d95-bc0d67489f1a&cache=v2)

### 1. 웹 문서 저장 위치

apache server가 Bitnami apache 폴더의 htdocs 폴더를 웹 문서의 root폴더로 지정했기 때문에 php 코드를 웹 브라우저에서 실행하기 위해서는 이 root폴더에 php파일이 위치해야 한다.

root폴더 내에 저장된 웹 문서들은 웹 브라우저에서 `127.0.0.1` 주소로 접근이 가능하다.

웹 브라우저 환경이 아닌 터미널 환경에서 php를 실행하기 위해서는 PHP 인터프리터 경로를 지정해줘야 한다.

### 2. vscode에 PHP 인터프리터 경로 지정

VS Code에서 php 파일을 만들면 아래와 같은 경고가 뜬다.

![https://blog.kakaocdn.net/dn/bAMXaC/btq7EdTcm8q/JjP0ii8qNArosGKUaxsHCK/img.png](https://blog.kakaocdn.net/dn/bAMXaC/btq7EdTcm8q/JjP0ii8qNArosGKUaxsHCK/img.png)

vscode가 PHP 인터프리터를 인식하지 못해서 발생하는 문제이다. 그러나 우리는 vscode로 PHP 코드를 작성하여 Disk에 저장할 목적이지 PHP 인터프리터를 실행할 목적이 아니다.

PHP 인터프리터 실행은 apache server가 PHP 인터프리터에게 PHP 코드 번역을 요청할 때 이루어진다. 그리고 apache server는 이미 PHP 인터프리터 경로를 알고 있다. 그러므로 굳이 VS Code에 PHP 인터프리터 경로 설정을 안 해줘도 apache server가 PHP 인터프리터를 잘 실행해준다.

그러나 PHP 코딩을 좀 더 편하게 하려면 VS Code에 확장 프로그램을 설치해야 하는데, 확장 프로그램이 php 인터프리터의 접근 경로를 요구하므로 경로 설정이 필요하다. 경로 설정에는 **두 가지 방법**이 있다.

**1) 환경 변수로 PHP 인터프리터 경로 설정하기**

OS는 특정 프로그램 실행 명령을 받으면 현재 위치한 디렉토리에서 프로그램명과 일치하는 프로그램을 탐색한다. 만약 없다면 Path에 지정된 경로에 접근하여 해당 프로그램명과 일치한 프로그램명을 탐색한다. 우리는 php 인터프리터(php.exe) 를 실행해야 한다. 그러므로 php.exe가 위치한 디렉토리의 경로를 Path 등록해야 한다.

# 

![https://blog.kakaocdn.net/dn/O1Deu/btq7FhOm9sy/IA9tJfgu3PZhgMvNzbmV8k/img.png](https://blog.kakaocdn.net/dn/O1Deu/btq7FhOm9sy/IA9tJfgu3PZhgMvNzbmV8k/img.png)

위 경로에 php.exe가 위치하고 있으니 이를 Path에 등록해보자.

**과정 : 내PC 우클릭 > 속성 > 고급시스템 설정 > 환경변수 > 시스템 변수**

PHP 인터프리터가 있는 폴더의 경로를 시스템 변수로 만들어 준다. 그리고 Path에 그 경로를 저장해준다.

**1-1) 시스템 변수 만들기**

# 

![https://blog.kakaocdn.net/dn/dhnYSJ/btq7EeEC0rB/BUMhckT8uKzZhCoZlrnEFk/img.png](https://blog.kakaocdn.net/dn/dhnYSJ/btq7EeEC0rB/BUMhckT8uKzZhCoZlrnEFk/img.png)

새로만들기 버튼을 눌러 시스템 변수를 만든다. 변수이름은 PHP 변수값은 php.exe가 위치한 디렉토리로 설정해준다.

**1-2) Path 등록하기**

![img](https://s3.us-west-2.amazonaws.com/secure.notion-static.com/bfb2fcd7-9782-4173-93e6-3e214cf81cf5/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=AKIAT73L2G45EIPT3X45%2F20220224%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20220224T102524Z&X-Amz-Expires=86400&X-Amz-Signature=acd00f2b969fc09de89d5d5f69078984c26f235c63bc960d98368d874f439d0b&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22&x-id=GetObject)

위 사진의 Path를 더블 클릭 하면 아래와 같은 창이 뜬다.

# 

![https://blog.kakaocdn.net/dn/pJSLj/btq7CTBmpwF/juwBQ3ekueyhDqg0EWKVkK/img.png](https://blog.kakaocdn.net/dn/pJSLj/btq7CTBmpwF/juwBQ3ekueyhDqg0EWKVkK/img.png)

Path에서 시스템 변수는 %%로 구분해준다. 이제 cmd 창에서 아무 디렉토리에서나 php를 실행시켜보자.

# 

![https://blog.kakaocdn.net/dn/blW8Os/btq7C3X4Nuy/UsehUqShEnlFOvYJUlD1G1/img.png](https://blog.kakaocdn.net/dn/blW8Os/btq7C3X4Nuy/UsehUqShEnlFOvYJUlD1G1/img.png)

php.exe가 위치한 디렉토리가 아니지만 php 명령어를 잘 수행하고 있음을 알 수 있다. 이는 OS가 Path를 통해 php.exe의 상위폴더를 탐색했기에 가능한 일이다. 그러므로 VS code도 OS에게 php.exe 프로그램 실행을 요청하면 Path경로를 통해 실행할 수 있게 된다.

**2) VS Code에 직접 경로 설정하기**

환경변수로 설정하지 않고 VS Code 프로그램에 직접 php 인터프리터의 경로를 설정할 수 있다.

1. **VS Code를 실행하고 키보드에서 f1을 누른다.**

# 

![https://blog.kakaocdn.net/dn/DuZzV/btq7DVrL159/mnrv80Fr59YWKIKoax8RUk/img.png](https://blog.kakaocdn.net/dn/DuZzV/btq7DVrL159/mnrv80Fr59YWKIKoax8RUk/img.png)

그럼 위와 같이, 검색창이 하나 뜬다.

1. **검색창에 settings를 입력하면 Open Settings(JSON)이 뜬다.이를 클릭한다.**

# 

![https://blog.kakaocdn.net/dn/bD9VtW/btq7EzhpVty/UlhdxYAT3wUfnh2DZKHHEk/img.png](https://blog.kakaocdn.net/dn/bD9VtW/btq7EzhpVty/UlhdxYAT3wUfnh2DZKHHEk/img.png)

php.validate.executablePath 속성에 php.exe의 경로를 저장해준다. 환경변수를 지정할 때는 Path에 php.exe의 상위폴더인 php 디렉토리의 경로만 등록했다. 그 이유는 OS가 디렉토리를 탐색하기 때문이다. 그러나 이번에는 VS code가 직접 접근하는 것이기에(?) php.exe의 경로를 넣어준다.

이렇게 두 가지 방법 중 하나를 선택하여 사용하면 VS Code는 PHP 인터프리터에 언제든 접근할 수 있게 된다. 앞서 말했 듯, VS Code에 PHP 인터프리터 경로설정을 해준 이유는 PHP 코딩을 좀 더 쉽게 할 수 있도록 도와주는 확장프로그램 때문이다. 그렇다면 확장 프로그램에 대해서 알아보자.

### PHP 개발 확장 프로그램

이클립스는 JAVA 전용 IDE로 JAVA 언어 개발을 위한 여러 기능을 제공한다. 반면에 VS Code는 특정 언어 전용 IDE가 아니므로 개발에 필요한 기능들은 확장 프로그램을 설치해서 제공받아야 한다.

PHP 개발을 위해 기본적으로 필요한 확장 프로그램은 두 가지가 있다.

**1. PHP IntelliSense**

PHP intelliSense는 코딩 과정에서 자동 완성 같은 코딩을 좀 더 윤택하게 해주는 기능을 제공한다.

**2. PHP Debug**

PHP Debug는 디버깅 기능을 지원해주는 확장 프로그램이다.

# 

![https://blog.kakaocdn.net/dn/HiTJt/btq7EA1IeBl/e5KIFur1OguV5i4UAwhWqK/img.png](https://blog.kakaocdn.net/dn/HiTJt/btq7EA1IeBl/e5KIFur1OguV5i4UAwhWqK/img.png)

Extensions 탭에 가서 두 가지를 설치하면 된다. Install 버튼을 누르고 설치가 완료되면 톱니바퀴 모양이 된다. PHP Debug 프로그램은 설치 후 별도의 설정이 더 필요하다.****