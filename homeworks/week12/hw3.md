## 請說明 SQL Injection 的攻擊原理以及防範方法

又被稱為駭客的填字遊戲！！
要防止惡意和不被考量到的字串的登入, 常見的攻擊手法是不知道帳號密碼也可以登入系統

要達成這樣的目的,可以直接在`login.php`的頁面裡輸入
`username = '' or 1=1-- ''`and`password = ''(或是任意的數值)`

防範方法是要做好`validate user input`
利用prepare statement
程式碼如下:

```php
//1. 準備好query
$stmt = $conn->prepare("SELECT * FROM users WHERE 'username' =? and 'password'= ?");

//2. 加入param,因為放了、兩個字串,所以會有兩個(bind綑綁)
$stmt->bind_param("ss", $username, $password);

//3. 執行
$stmt->execute();

//4 $result = $stmt -> get_result();

if($result->num_rows>0{
	$row=$result->fetch_assoc()
}
```

[參考資料](https://www.w3schools.com/php/php_mysql_prepared_statements.asp)

## 請說明 XSS 的攻擊原理以及防範方法

### XSS
全稱是:『跨站式腳本攻擊』(Cross Site scripting)  
可以區分為儲存型和映射型

### 攻擊手法
1. 儲存型:在使用者輸入資料的地方,輸入可以被執行的程式碼,可以是`html`標籤或是`script`程式碼,被執行後可以存取cookie,或是讓網頁直接跳轉到釣魚網站等. 

2. 映射型:資訊顯示在網址列上,並且會誘導使用這去點選網址

### 解決方法:

跳脫esacpe();
在要被echo的內容前再加上`htmlspecialchars`

## 請說明 CSRF 的攻擊原理以及防範方法

### CSRF 的攻擊原理

全稱是:『跨站式請求偽造』(Cross Site Request Forgery)  

使用者沒有意圖要發送request, 但駭客用某些手法讓使用者發送了
簡單來說,就是使用者在不知情的狀況下,發送了request,讓駭客達到了某些目的. 

CSRF 就是在不同的網址底下卻能夠偽造出「使用者本人發出的 request」

### 防範方法:

使用者的防禦:
在每次使用完網站就登出，就可以避免掉CSRF

Server端的防範:
1. 檢查Referer(引用),但要注意的地方有三個
	- 第一個是有些瀏覽器可能不會帶 referer
	- 第二個是有些使用者可能會關閉自動帶 referer 的這個功能,這時候server 就會 reject 掉由真的使用者發出的 request。
	- 判定是不是合法網址的程式碼必須要保證沒有 bug

2. 簡訊驗證或是圖型驗證, 因為駭客沒有你的手機, 因此當request發送出去, 沒有辦法再做一次回應

3. 加上CSRF token 

	- How:  
	在 form 裡面加上一個 hidden 的欄位，叫做csrftoken，這裡面填的值由 server 隨機產生，並且存在 server 的 session 中, 若是發送request時,檢查csrftoken和自己在session中存的是否一樣,若是
	則代表是由本人發出.  

	- Why:  
	因為攻擊者並不知道 csrftoken 的值是什麼，也猜不出來，所以自然就無法進行攻擊了

	- Defect: 
	若是server支持同源政策的request, 則駭客可以拿到這個token. 

4. browser 本身的防禦
   
   - How:  
   原本設置 Cookie 的 header 長這樣
   ```php
   setCookie: 'member_id', 'ewfewjf23o1'; 
   ```

   在後面多加一個 `SameSite` 就好
	```php
   setCookie: 'member_id', 'ewfewjf23o1'; SameSite
   ```

   - difference: 
   有兩種模式供選擇:
    1. Strict: 使用者體驗不好
	2. Lax: 只有是POST方法的form, 或是put, delete, 就不會帶到後端. 