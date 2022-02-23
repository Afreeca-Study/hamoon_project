# Part2

## **016. 숫자형 이해하기**

- 숫자형(Number)
    - 숫자 형태를 가진 데이터
    - `35.02.789e5`

자바스크립트는 정수, 부동 소수점, 작은 수, 큰 수 등 여러 유형의 숫자를 **숫자형(Number)** 하나로 정의한다.

자바스크립트의 숫자형은 64-bit Floating Point이다.

국제 IEEE 754 표준에 따라 정의된 방식으로, 숫자값을 64비트 정보로 저장한다.

숫자는 비트 0~51에 저장되고, 지수는 비트 52~62, 부호는 비트 63에 저장된다.

다음은 64비트 부동 소수점 형태 그림이다.

For example, if you express the number 13 in Javascript, Computers convert numbers into bits and store them in memory.

In addition, Javascript has Infinity and NaN values.

It is classified as a number type, but, it plays a slightly different role from ordinary numbers.

- Infinity
    
    Infinity means the biggest number than any other number.
    
- NaN
    
    NaN means Not a number, which is a value that cannot be expressed because the result of the arithmetic operation is invalid or the number is too large.
    

In the console log, Infinity is output as it is.

Infinity로 나누면 무슨 값이든 0이 된다.
유효하지 않는 수식인 경우 연산의 결과 NaN이 된다.

## **017. 문자형 이해하기**

- 문자형(String)
    - 값이 텍스트 형태인 데이터

문자열로 표현할 때는 큰따옴표("), 작은 따옴표('), 억음 부호(`)와 함께 사용한다.

자바스크립트는 큰따옴표 문자열과 작은 따옴표 문자열 간의 차이점은 없다.

문자열 내에 \n을 입력 시 개행이 가능함.

## **018. 불린형 이해하기**

- 불린형(Boolean)
    - 참(True)과 거짓(False)으로 이루어진 자료형

ex)

```
console.log(7>3);
console.log(3>7);
```

결과

```
true
false
```

## **019. null과 undefined 이해하기**

- null
    - null은 **비어있는**, **존재하지 않는 값**을 의미함.
    - 원시 자료형 null로 분류된다.
- undefined
    - 변수가 정의되었지만, **아무 값도 할당 받지 않은 상태**
    - 함수에서 명시적으로 값을 반환하지 않았을 때 또는 변수에 어떠한 값도 대입하지 않고 정의했을 때 undefined가 반환 된다.
    - 원시 자료형 undefined로 분류된다.
- null과 undefined 일치 비교
    - 동등 연산자 `==`인 경우에는 자료형 비교까지 이루어지지 않기 때문에 true를 반환함.
    - 엄격한 일치 연산자 `===`로 확인하면, null과 undefined의 자료형이 다르기 때문에 false를 반환함.

## **020. 템플릿 문자열 이해하기**

- ` (억음 부호)
    - 템플릿 문자열은 `(억음부호)로 작성한다.
    - 템플릿 문자열을 이용하면 ${표현식}을 이용하여 interpolation이 가능하다.
        - interpolation : 표현식의 계산된 결과가 문자열로 변경되어 해당 위치에 삽입되는 것

## 021. 산술 연산자

- 표준 산술 연산자
    - `+`, `-`, `*`, `/`
- 산술 등호 연산
    - 산술 연산자에 `=` 연산자를 함께 사용하는 연산
        - `+=` , `-=` , `*=` , `/=`
- 기타 연산자들
    - `%` `**` `+숫자` `-숫자` `++` `--`

## 022. 비교 연산자

- 두 개의 값을 비교하여 `true` 와 `false` 결과값을 반환한다.
- 일치 연산자
    - 값의 일치 여부를 확인한다.
    - 동등 연산자(`==`)
        - 비교 대상값의 자료형이 서로 다르면 강제로 형을 바꾼 뒤에 비교한다.
    - 부등 연산자(`!=`)
        - 값이 서로 다른 경우 true을 반환한다.
        - 자료형이 다른 경우 형을 변환하고 비교하게 된다.
    - 일치 연산자(`===`)
        - 값의 내용을 비교하는 것뿐만 아니라, 자료형까지 일치하는지 비교한다.
    - 불일치 연산자(`!==`)
        - 같은 자료형에서 값의 내용이 다르거나, 다른 자료형인 경우 true을 반환한다.
- 관계 연산자
    - 두 개의 값 간의 크기 비교를 통해 관계를 확인한다.
    - `>` `<`
        - 한쪽 값이 큰 경우 true을 반환한다.
    - `>=` `<=`
        - 한쪽 값이 크거나 동일한 경우 true을 반환한다.
- 자바스크립트는 문자형에서도 비교 연산이 가능하다. Unicode 기준에 따라 Binary를 통한 연산으로 처리된다.

## 023. 논리 연산자

- AND 연산자 `&&`
    - 표현식1과 표현식2가 모두 참인 경우 true반환
- OR 연산자 `||`
    - 표현식1 또는 표현식2 둘 중에 하나라도 참인 경우 true 반환
- NOT 연산자 `!`
    - true를 !로 부정하면 false가 됨
- `!!` 연산자
    - NOT 연산자에 한 번 더 NOT 연산자를 처리하는 방법
    - 결국 그대로(?)다.

## 024. 삼항 연산자

```jsx
조건문 ? 표현문1 : 표현문2
```

- 조건문은 반드시 결과가 true와 false로 반환 되어야 한다.

## 025. 비트 연산자

- 비트(Bit)
    - 이진수(Binary digit)의 줄임말로, 0과 1로 구성된 숫자 체계를 갖고 있는 이진수의 단일 값을 가진다.
    - 1 byte = 8 bits
- 비트 논리 연산자
    - AND 연산자 `&`
        - 곱하기처럼 0이 하나라도 있으면 결과값이 0이 된다.
    - NOT 연산자 `~`
        - 입력된 비트값이 0이면 1, 1이면 0으로 바꾸어 반환
    - OR 연산자 `|`
        - 대응되는 비트값 중 최소 하나만 1이어도 1을 반환
    - XOR 연산자 `^`
        - 대응되는 비트값 중 하나만 1이어야 1을 반환
- 비트 이동 연산자
    - `<<`
        - a << b
        - a의 이진수 표현을 b비트의 자리수만큼 왼쪽으로 이동한다.
        - 오른쪽은 0으로 채운다.
    - `>>`
        - a >> b
        - a의 이진수 표현을 b비트의 자리수만큼 오른쪽으로 이동한다.
        - 오른쪽 남은 비트는 버린다.
    - `>>>`
        - a >>> b
        - a의 이진수 표현을 b비트만큼 오른쪽으로 이동한다.
        - 오른쪽 남은 비트는 버리고 왼쪽의 빈자리는 0으로 채운다.
- 10진수를 2진수로 변환하는 방법
    
    ```jsx
    10진수.toString(2);
    ```