## 請說明雜湊跟加密的差別在哪裡，為什麼密碼要雜湊過後才存入資料庫

### 雜湊
有數位指紋之稱

特性:
- 相同的內容,作為相同演算法的輸入,得到的輸出必定一樣.

- 不同的內容,作為相同演算法的輸入,得到相同的輸出機率很低,若是相同輸出稱為碰撞. 

- 隨明文改變而改變(若僅改變明文中任何一個字元時,雜湊值的輸出差異也很大)

- 輸出的長度不用原文長度影響,是不定長度的訊息輸入,演算成固定長度雜湊值的輸出 (無限的輸入,對應有限的輸出)

- 無法將雜湊演算法的輸出解回原本的輸入,雜湊是單向的,不可逆的.

- 不同雜湊演算法的輸出長度不同

### 加密

- 加密需要密鑰, 可以透過解密得到原文. (可逆的)

因此雜湊不是加密,這兩者是不同的東西,不可混為一談.

### 為什麼密碼要雜湊過後才存入資料庫

- 除了避免資料庫外洩時,攻擊者無需進一步運算就可以直接得到明文密碼外,一方面也是尊重使用者,只有自己才知道密碼,所以有些網站在忘記密碼後還傳一封原始的明文密碼給你,代表這個網站是用明文存你的密碼,也代表這是不安全的網站,正常的網站是寄一封信給你並附帶連結,讓你RESET原始的資料庫密碼.  


## 請舉出三種不同的雜湊函數

SHA-3/MD6/SHA-224

補充 [SHA-1 已經被GOOGLE攻破](http://technews.tw/2017/02/24/the-first-sha1-collision/)

參考 [WIKI- 密碼雜湊函數](https://zh-yue.wikipedia.org/wiki/%E5%AF%86%E7%A2%BC%E9%9B%9C%E6%B9%8A%E5%87%BD%E6%95%B8)


## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別

Http協議是無狀態協議，他是一個 請求->處理->回應 模型
所以每次請求都不會紀錄上次執行的動作,如果這這樣我們如何執行判斷使用者是否經在我們系統登入了
Cookie和Session因此誕生，解決無紀錄狀態的問題。
常用在購物網站上

### Session

 #### 因儲存的方式不同,因此有兩個種類, 集中式和cookie-based. 

- 儲存位置:
Server side(通常放在server記憶體或是DB)
- 作用:
當瀏覽器第一次發送請求時,會在一個用戶完成身份認證後,為了怕其他使用者竄改,因此產生一組uudi,並存入cookie中

1. 集中式:
Server 發ID 給client.  
生活化的例子: 當你點了飲料,去領飲料時,店員會輸入你的號碼,用你的號碼得知是否有點過餐,點了什麼?

2. Cookie-based Session:
server直接把資料存在client，用client的cookie儲存Session。  
生活化的例子: 就是把你點什麼飲料，通通直接寫在號碼牌上。Server 就可以直接看你的號碼牌上寫了什麼,而給你飲料.


### Cookie:
儲存位置:
Client side.

作用:
在每一次換頁時,每發送一次request時順便也把setting的cookie值送到後端,這樣後端就可以依此驗證是否為同一個人,而不是透過帳號和password再重新驗證一次. 

舉例來說:
我們每一次逛網拍時,可以透過cookie的方式紀錄之前輸入的帳號密碼,省去每次都要重新打帳密的不便,只要Cookie尚未到期,瀏覽器會傳送該Cookie給伺服器做驗證憑據. 

隱患:
因為存放在client端,所以使用者可以任意竄改或冒用成其他使用者,數據非常容易被偽造,那一些重要的資訊就不能存放在裡面.
而且如果cookie中數據字段太多會影響傳輸效率,為了解決這些問題,於是有了session. 

語法:
```php
setcookie('key','value',time()+3600);
```

### Session 跟 Cookie 的差別

| 差異  |Cookie   |Sessions   
|---|---|---|---|---|
| 存放位置  |  瀏覽器 | Server  
| 存放資料筆數 | 有限  | 無限  
| 安全性  | 差  | 較佳  
|  設置過期方法  | 在setCookie中設置  | 透過session_destory()  |   |   |
| 語法放置位置  | setcookie要在`html`的tag前  | ` session_start()`在文件一開始前就要設置  |   |   |
|   |   |   |   |   |

> [參考資料1](https://www.sitesbay.com/php/php-difference-between-session-and-cookie)

> [參考資料2](https://stackoverflow.com/questions/11142882/what-are-cookies-and-sessions-and-how-do-they-relate-to-each-other)

## include、require、include_once、require_once 的差別

|差異   |引入檔案   |避免重複引入   |引入失敗   |程式是否停止|
|---|---|---|---|---|
|include   | v  |   | show warning  |  no |
|include_once| v  | v  | show warning  |  no |
|require    | v  |   | fatal error  | yes  |
|require_once    | v  |  v |  fatal error | yes  |


include 和 include_once: 
都是用來引入檔案,後者可以避免重複引入,故建議用後者. 引不到檔案不會出現錯誤訊息,只會出現warning,且程式不會停止. 

require 和 require_once:
都是用來引入檔案,後者可以避免重複引入,故建議用後者. 引不到檔案會出現錯誤訊息(fatal error),但程式會停止. 

>補充 [stackoverflow](https://stackoverflow.com/questions/3546160/include-include-once-require-or-require-once)