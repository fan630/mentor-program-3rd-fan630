## 什麼是 DNS？Google 有提供的公開的 DNS，對 Google 的好處以及對一般大眾的好處是什麼？
   
1. DNS全名是(Domain Name System)的縮寫, 一個只說地標就知道地址的概念. 
   
    例如: 
    ：「司機大哥，麻煩送我到小巨蛋，謝謝」
    ：「ＯＫ，沒問題！」

    以上情境司機大哥不需你跟他報地址，他也知道怎麼去～

    但萬一遇到比較普龍供的司機大哥，他還是需要 google map 一下（DNS Server），查詢正確定址，這時出現的「喔～原來是台灣台北市松山區南京東路四段2號呀～」即等於網路上的 IP 位置。

2.  看似提供公開的DNS,沒有什麼必要,一般人上網直接輸入『google.com』就好了,沒有必要輸入8.8.8.8 與 8.8.4.4 
    其實是因為幾乎任何上網的動作都會需要 DNS 伺服器，如果 DNS 伺服器的效能不佳，或是安全性出問題，就會直接影響我們上網的品質，所以慎選優質的 DNS 伺服器是很重要的。

    - 對於**一般大眾**的好處
      - 能透過 Google 提供的 DNS 進行上網時的網頁解析，正因為有快取功能，可以加速頁面的檢索速度、以及縮短 DNS 更新時間,且也能使你上網更安全，它會自動篩選並過濾掉惡意網站。他的作用主要讓你電腦解析網址時不需要轉太多層，直接查詢Google的DNS伺服器，然後Google DNS伺服器再向上查詢一層即可查到正確的IP位置，減少了以往使用國內的DNS解析需要轉換多層的問題，只要經過一個兩個查詢站，就可以正確解析網址。當然使用Google的DNS還有個優點，就是他會比一般DNS伺服器把關更嚴格，讓惡意的DNS亂搞行為可以被避免，讓你正確的網址可以連到正確的網站。
      -  ISP 提供的伺服器網站壞掉了,可以用Google伺服器當作backup. 

    - 對於**Google**的好處: 
    因為連到了Google的server,所以Google知道使用者連了哪些網站, 靠資料賣廣告賺錢, 知道哪一個網站在什麼時候最多人造訪. 

## 什麼是資料庫的 lock？為什麼我們需要 lock？

若是發生race condition(就是在同一時間內,要同時處理多個request),則我們需要使用lock. 
例如訂返鄉火車票,一次太多request, 就是會發生超賣(明明沒有票了,但還是訂購成功), 所以要先lock住需要鎖住的資訊,例如票數.

其他需要知道的: 
1. 只有在transaction上的語法中才能使用lock.  
2. 使用lock 會有效能上的問題,因為要等**先到的request**處理完後,才會再往下處理. 
3. lock可以針對整個table鎖起來,也可以針對單一個row

舉例語法如下:  

`for update就是在使用lock`
```PHP
$conn->autocommit(FALSE);
$conn->begin_transaction();
$conn->query("SELECT amount from products where id = 1 for update");
$conn->commit();
```
## NoSQL 跟 SQL 的差別在哪裡？

#### 最大的差別是: 資料是否有關連  

SQL 就是指一套層次分明、規定清楚的查資料指令，而 NoSQL 是 Not Only SQL，除了 SQL 以外的查詢方法，都屬於後者。單從字面就看出他們出現的先後，SQL 在前，NoSQL 在後。

引述網路上看到的:
> SQL 的世界有秩序、準則、結構，它無法容忍零散、彈性、隨意，因此 NoSQL 出現了，它的世界能零散、彈性、隨意，可以運作起來就是沒有 SQL 有效率。

#### SQL(Structured Query Language):結構化查詢語言
- table和table之間可以設定關聯,存的東西是有固定的資料型態
- 須符合條件: ACID 
- 實務上能操作的DB是 MySQL,Postgresql,MsSQL.
- 實際的例子: SQL 的嚴謹則是適合金融業、電信業。

### No SQL(not only SQL): 非關聯式資料庫
- 存放的資料沒有固定型態,可以想像成存JSON資料進DB. 存大量的資料會用到的, 存程式log.
- 須符合條件: CAP
- 實務上能操作的DB是Mongodb. 
- 實際的例子:NoSQL 適合搜集數據。像臉書無時無刻就在蒐集使用者資料，手機的App 也會，可能是手機廠牌、型號、作業系統版本等等，這些資料零散，因為我們給出資料並不一致，若此時一定要符合 ACID，那各家公司們永遠搜集不到資料作分析



[參考資料:從 SQL 到 NoSQL 悟人生](https://medium.com/@diagonalyang/https-medium-com-diagonalyang-sqlvsnosql-11b65f2e1659)


## 資料庫的 ACID 是什麼？

為了保證transaction的正確性,所以要符合四種特性(ACID)

Atomicity（原子性）：一個事務（transaction）中的所有操作，或者全部完成，或者全部不完成，不會結束在中間某個環節。事務在執行過程中發生錯誤，會被回滾（Rollback）到事務開始前的狀態，就像這個事務從來沒有執行過一樣。

Consistency（一致性）：維持資料的一致性(錢的總數不變)

Isolation（隔離性）：多筆交易不會互相影響(不能同時改一個值)

Durability（持久性）：交易成功後,寫入的資料不會不見