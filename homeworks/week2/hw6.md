``` js
function isValid(arr) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] <= 0) return 'invalid'
  }
  for(var i=2; i<arr.length; i++) {
    if (arr[i] !== arr[i-1] + arr[i-2]) return 'invalid'
  }
  return 'valid'
}

isValid([3, 5, 8, 13, 22, 35])
```

## 執行流程
1. 設定function 名稱為isValid,並放入命名為arr的一組陣列當作參數

2. 執行 **第12行** isValid,並把引數的陣列[3, 5, 8, 13, 22, 35]帶入arr中

3. 執行 第一組條件 (**第3行**) for loop迴圈, i由0開始 ,i的數值達到終止條件『小於陣列的長度』後,停止迴圈

4. 判斷 **第4行**『陣列中的每一個元素是否有小於0』的狀況,若是,則回傳'invalid', **並且function中止** ,程式碼不會跑到第六行程式碼

5. 若陣列元素都大於0, 則執行 **第6行** for loop迴圈, i由2開始 ,i的數值達到終止條件『小於陣列的長度』後,停止迴圈

6. 判斷 **第7行**『陣列中的每一個元素是否不等於陣列中 **前兩個元素的和** 』,若是,則回傳'invalid'

7. 若不是,那代表沒有符合**第7行**判斷式,則回傳'valid'


