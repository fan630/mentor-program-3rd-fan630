## 跟你朋友介紹 Git

因為我這個朋友講話實在是太好笑,又時常掛著滿臉的笑容,所以我決定傾囊相授,把自己知道的完全都告訴他 目標是讓他可以了解到以下兩件事

1. 必須教他 Git 的基本概念以及基礎的使用，例如說 add 跟 commit
2. GIT 其實不難,說穿了就是在做版本控制,如果只是簡單的把笑話都放在自己的資料夾,並透過資料夾的命名,是可以做到的.

但是,想成為笑話冠軍有一定的難度.<br>
身為他的好朋友,在他講笑話前,一定要讓我這個不愛笑的男人聽一下,是否夠格上台講<br>

菜哥是一個認真的男人,他都把自己的笑話放在*joke*這個資料夾中<br>

### 起手式
把要針對的資料夾做版本控制<br>
`git init`<br>
系統出現了Initialized empty Git repository,這樣就沒錯了

菜哥:然後咧？結束了<br>

我:剛開始呢...好戲還在後頭,你用`git status`看看（系統馬上出現了Untracked files,並標上紅色）<br>

### 第二式 （基本操作）<br>
菜哥:啊! 裡面的noneed.txt,是我用來存放低俗笑話的地方,難登大雅之堂拉<br>

我: 但是要忽略的檔案還是要追蹤的. 你先用`touch .gitignore`新開這個檔案,再開vim把`noneed.txt`存到裡面去,接下來這些檔案你都要了吧？<br>

菜哥: 是啊,現在我全部的檔案都變成綠色了<br>

我: 很好！接下來就是關鍵了,針對變更的檔案提交commit,並且為這一次的commit命名.指令是`git commit -m'名稱'`,有了嗎？在用`git log`看看<br>

菜哥:我看到了,但是好像出現亂碼？_f705f3f97222adf667cead743368d5d7adf639f3_這是什麼東西啊？<br>

我: 這是系統針對你的commit產生出來的亂碼<br>

### 第三式 （branch)
菜哥:原來如此啊,但是我的笑話有分門別類耶,該怎麼做呢？<br>

我:也許你該新開branch. 很簡單就是把`git branch'branch名稱'`,然後可以透過`git branch -v`來看看有幾個branch了...<br>

菜哥：有喔！出現兩個了,一個是master,還是用綠色標記的,但是我想要在新的branch下新增commit呢,該怎麼做呢?<br>

我: `git checkout 'branch名稱'` 這樣就可以了<br>

### 若是還有時間的話可以連 push 或是 pull 都講，菜哥能不能順利成為電視笑話冠軍，就靠你了！

## 最後一式 （本地與遠端同步)
我: 菜哥,最近笑話還有在更新嗎？可以瞧瞧看嗎？<br>

菜哥：好啊！我傳給你 <br>

我: 哈！我教你一個又快又好的方法！你先幫我在你的GitHub上新建repository,並把資料夾名稱改的和你的本地的一樣<br>

菜哥：ok! 好了！<br>

我: 接下來在這個欄位'…or push an existing repository from the command line'是不是有出現兩行程式碼..<br>

`git remote add origin https://github.com/fan630/test0420.git`
`git push -u origin master`

這兩行都輸入到CLI中,並且重新整理頁面,神奇的事情就會發生了喔！<br>

菜哥:真的好神奇喔！！這樣我要加入commit不是就可以直接在GitHub上提交就好了嗎？<br>

我: 是啊！但是別忘了要和本地資料同步,所以不要忘了用`git pull origin master`把它同步下來喔<br>

菜哥:這樣真的好方便喔,不僅可以在本地新增資料commit,也可以透過GitHub新增commit.這樣我懂了,遠端和本地要隨時保持著一致,我這樣說沒錯吧！<br>

我: 沒錯！<br>