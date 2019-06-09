1. 什麼是 Ajax?

AJAX = Asynchronous JavaScript and XML
就是透過瀏覽器提供的API,可以不換頁就和server做溝通. 可以不讓畫面重新渲染,只拿自己想要的資料即可.

2. 用 Ajax 與我們用表單送出資料的差別在哪？ 

表單方式:用表單的形式送出request後, server回來的response會透過browser重新渲染頁面,因此會換頁瀏覽,這也是最簡單的傳送方式,比起用JavaScript的方法比較像是我要帶一個參數到 action後面接的URL頁面. 另外這不需要透過JavaScript,直接寫在HTML中就可以進行.

Ajax的方式: 只想和server對部分資料做交換而不換頁. server回傳資料是回給瀏覽器後轉傳給JavaScript.

3. JSONP 是什麼？

就算有CORS的問題,有些標籤也不會受影響,ex: `<img>` `<script src></script>` ,可以利用`<script src></script>` 來拿資料

4. 要如何存取跨網域的 API？

- 瀏覽器會預設把不同源的request給擋掉,同源需要滿足以下三個條件

  - 相同Domain （相同主機位置)
  - http 要等於 http // https 要等於 https (相同協定)
  - 相同port

若是同源才有辦法拿到response. 

- 要突破瀏覽器的限制,因此衍伸了CORS(跨來源資源共用)
因此server必須要在response裡面加上一個header. 
`access-control-allow-origin:*` 才有辦法突破,否則是決無它法的

5. 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？~~~~

因為當時是在node環境下,而這週的話是由JavaScript透過瀏覽器傳送request給server,server再透過瀏覽器回傳response.
因為有瀏覽器的這一層關係,所以會遇到跨網域的問題.
