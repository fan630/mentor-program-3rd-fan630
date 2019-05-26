請將答案寫在 hw5.md。

**1. 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。**

`list-style-type`:none.    
在使用ul裡面li標籤時,若要去除li前面的標示點,可以使用此標籤

`text-decoration`:none. 
在使用`<a>`標籤時,想要去除預設的底線樣式,可以使用此標籤.

`text-transform:capitalize`:首字母大寫.
而`text-transform:uppercase`為全部字母改為大寫.

**2. 請問什麼是盒模型（box modal）？**

依序由內而外,從寬高=>內距(padding)=>border=>外距(margin)所組成.  
透過css屬性`box-sizing:border-box`, 可以讓元素加上padding和border的值符合自定義的寬高

**3. 請問 display: inline, block 跟 inline-block 的差別是什麼？什麼時機點會用到？**

- display:inline
不可以定義寬高,設定padding/margin會改變左右和其他元素的距離,上下部分不會影響到和其他元素的距離,但自己還是會有作用. 只會佔據本身的元素大小.  
會用到的時機:`<a>` `<span>`

- display:block
可以定義寬高和各種屬性,但會佔滿一整行  
會用到的時機:`<h1>`, `<div>`

- display:inline-block
對內可以定義寬高和各種屬性,對外和其他元素併排,且只會佔據本身的元素大小  
會用到的時機:
css可以自己更改為這個屬性,我自己會用到是在自定義button時,用padding去推內拒  
[codepen支援](url:https://codepen.io/norriswu/pen/joaBqo)

**4. 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？分別各舉一個會用到的場合**

- position static: 
自然流動,按照瀏覽器的預設自動排列,無法透過top,right,bottom,left 等參數調整偏移.  
例子: 讓元素依序排列下來,不用特殊位置的變化使用. facebook的動態消息的貼文,由上到下排列.

- position relative（相對定位):
以自己本身的位置為基礎,透過top,right,bottom,left 等參數,移動到下一個新位置,但不會改變其他元素所在的位置,只會改變自己的.  
例子: 給子層的`position absolute`做定為參考.

- position absolute: (絕對定位)
往上找第一個不是static的元素進行定位, 透過top,right,bottom,left 等參數,移動到下一個新位置.值得注意的是,若是因為絕對定位而造成原本位置空出,則下一個元素會遞補原本的位置.  
例子:  
像是對話視窗中的關閉鈕`X` 就是絕對定位的作法  

- position fixed: (固定定位)
相對於瀏覽器的窗口做定位,捲動時，視窗固定會出現在同個位置.  
例子: 最明顯就是navigation上,不管怎麼捲動還是保持在同一個位置.
