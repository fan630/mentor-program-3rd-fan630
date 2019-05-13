## 請以自己的話解釋 API 是什麼
API 簡單來說就是在傳遞資料. 不同的request 會產生出不同的response.

1. 以餐廳為例,服務生有如API.當顧客點餐後（提出request,經由服務生(API),把需求提供給廚房(server).廚房收到命令後即回傳餐點（回傳respond）,餐點再透過服務生給到顧客.

2. 大型的開發商,例如google或是Facebook,提供API串接的功能是為了分析用戶的使用習慣以精確的投放廣告,除此之外也為自己的平台打知名度.

## 請找出三個課程沒教的 HTTP status code 並簡單介紹

304 Not Modified：東西跟之前長一樣，可以從快取拿就好。<br>
401 Unauthorized：未認證，可能需要登入或 Token。<br>
503 Service Unavailable：伺服器臨時維護或是快掛了，暫時無法處理請求。<br>

## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

Base URL: https://api.fan630-DiningHall.com

| 說明            | Method    | path     | 參數     |  範例                    |
| -------------- | --------  | -------- | -------- | ------------------------| 
| 回傳所有餐廳資料  | Get       | /dhs     | _limit: 限制回傳資料數量 | /dhs_limit=5|
| 回傳單一餐廳資料  | Get       | /dhs:id  |    無        | /dhs/10 |
| 新增餐廳         | Post      | /dhs      |  name:餐廳名 |  無 |
| 刪除餐廳         | Delete    | /dhs:id   |  無          |  無 |
| 更改餐廳         | Patch     | /dhs:id   |  name:餐廳名   | 無 |

  # 開始使用
  - ### 建立Client ID 及 Client Secret
    -  請至*fan630 for Developer*中申請一組Client ID

Example Request

  1. Super simple to use 

``` javascript   
//使用 Command Line Tool
const request = require('request');
request('http://www.google.com', function (error, response, body) {
  console.error('error:', error); // Print the error if one occurred
  console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
  console.log('body:', body); // Print the HTML for the Google homepage.
});
```
2. cURL

``` javascript
//使用 Command Line Tool 
curl --request GET 'https://api.fan630-DiningHall.com' --header'Client-ID:s2xusiifgc7v1qjkdfdn5drwrmams6'
```

- ### Example Response
```javascript
 "fan630": [
    {
      "id": "147",
      "name": "台北不是我的家",
      "id": "148",
      "name": "我的家沒有霓虹燈"
      ......
    },
    {
      "成立時間": "2019/5/11"
      ......
    }
]
```
> [Reference Document ](https://github.com/request/request)