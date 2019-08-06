##  Bootstrap 是什麼？
   是一個css的framework, 可以用來套css和jQuery範例的模板文件, 功能涵蓋很廣. 舉凡`<navbar>`,`輪播圖片`,`breadscrumb`,`card`,或是常用的`button`都可以找到相關的範例
   排版部分以Grid system當作基底, 並且支援RWD. 

## 請簡介網格系統以及與 RWD 的關係
   
   網格系統,通常會以container當作最外層,內層是row,最後一層是col.  
   預設每一個row,可以分為12格.
   col則依照想呈現的版型分為col-1~col-12.

   依照斷點可以分為xs,sm,md,lg,xl 這五種尺寸,且可針對不同 Device 混合使用
   bootStrap是以mobile first為開發的基礎,所以xs這個尺寸是預設的,通常不會寫在class中  

   ![斷點圖示](https://i.imgur.com/8B4opha.png)
   
## 請找出任何一個與 Bootstrap 類似的 library

  [Semantic-UI](https://semantic-ui.com)

## jQuery 是什麼？
   
是一套javaScript的函式庫,讓原生的語法更簡潔

優點:
1. 語法簡潔
   在javaScript中,若是要選擇標籤,通常會用
   `document.querySelector('.selector')`  
   但是在jQuery中,僅需使用`$('.seletor')`即可以選到此標籤

2. 跨瀏覽器支援
   不同的瀏覽器,彼此有些限制的語法,有時需要針對不同的瀏覽器版本撰寫不同的程式碼來因應,但使用jQuery可以避開此麻煩

3. 不用自己造輪子,可以大量使用裡面的函式庫
   例如在
   javaScript中要寫成

   ```css
    .show {
    transition: opacity 400ms;
    }
    .hide {
    opacity: 0;
    }
   ```
   
   ```javascript
   el.classList.add('show');
   el.classList.remove('hide');
   ```

   但是在jQuery,可以一行就解決

   ```jQuery
   $(el).fadeIn();
   ```

## jQuery 與 vanilla JS 的關係是什麼？

其實vanilla JS 根本就是原生的,記得我之前學習的時候還真的去找了有沒有像是jQuery的教學,結果搞了半天,發現就是javaScript啊～

結果還真的有人做了這個[網站](http://vanilla-js.com/)...
點開最下面的documentation結果連到javaScript的mdn 呵呵

這兩者的關係,就是jQuery是以vanilla JS當做base所開發出來的框架,用來加速前端的開發,可以用jQuery做出來的,javaScript也可以做出.反之,javaScript可以做出的,jQuery不一定做的出來. 

