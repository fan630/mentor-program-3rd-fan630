## 什麼是 DOM？

DOM: Document object Model. 

補充一張圖  
![picture](https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/DOM-model.svg/220px-DOM-model.svg.png)

從圖上可以看到,網頁的組成是透過節點和節點之間的串連而成.
DOM 的操作可以用來獲取頁面上的節點,也可以新增或是刪除節點. 
亦可以增加樣式,更改樣式,新增/刪減文字.

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？
順序是先補獲在冒泡.

在addEventListener這個事件中,捕獲和冒泡被定義在第三個參數. 捕獲定義為true而冒泡定義為false,且false為預設值.一般在與之搭配的cb function中給予省略.

補充一張圖
![picture](https://blog.techbridge.cc/img/huli/event/eventflow.png)

從圖上可以看出選擇到的目標是`<td>`,因為在選擇的當下網頁是一層包一層的方式實做出來的.
因此瀏覽器會先從window一直往下找到target,從上往下找的方式是補獲.

而選到的target之後,也因為網頁是一層包一層的方式,所以再由下到上回到window,下往上找的方式稱作冒泡

捕獲和冒泡事件是無論如何都會發生的,而且順序不改變. 
當點擊某個按鈕時,就會從windows一路傳遞下去,再從點擊的按鈕一路把事件傳遞回來.

## 什麼是 event delegation，為什麼我們需要它？
最主要的原因是要增加瀏覽器效率,優化執行的時間.

生活化的例子: 買麥當勞不會所有人都排隊,一定有人在桌上等餐點,一個人去買餐.這一個人就是事件代理

應用的例子: 
在HTML上,有一個區域為顯示各個咖啡店的名稱,咖啡店的名稱很多,由時會增加,有時候會減少. 若是我們想要監聽每一個咖啡店的狀況,如果針對每一個咖啡店加上監聽事件,就會很沒有效率,這時候就利用咖啡店的區域去做"事件代理"進行監控,當咖啡店有增減時可以透過補獲和冒泡機制來監聽到

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

### event.preventDefault()是用來阻止原本瀏覽器的預設行為  

例如`<a>`連結

```html
//點選<a>連結預設會跳轉往新的地址,但是通過此event會讓<a>連結無作用

<div class="box">
  <a href="https://google.com">我是通往 Google 的連結</a>
</div>
```

### event.stopPropagation()是用來阻止傳遞事件

可以用以上的連結來做說明

```HTML
<div class="box">
  <a href="https://google.com">我是通往 Google 的連結</a>
</div>
```

```JavaScript
document.querySelector('a').addEventListener('click', (e) => {
    e.stopPropagation()
  }
)
```
透過點擊`<a>`,原本預設會觸發冒泡傳遞事件,傳遞至box的class, 但加上 `event.stopPropagation`後,僅會停留在`<a>`標籤上,阻止往上傳遞.