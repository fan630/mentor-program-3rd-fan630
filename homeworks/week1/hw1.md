## 交作業流程

#### 一開始先建立新的branch（後面以Week1代替)
`git branch Week1`

#### 切換到Week1這條支線上
`git checkout Week1`

#### 修改完檔案以後要提交commit message
`git commit -am 'commit message'`

#### 指令在本機端需要手動push到GitHub上
`git push origin Week1`

#### 上傳完以後在GitHub的頁面上執行 Compare & Pull requests 
- 並在底下對話框的標題輸入Week1
- 底下的欄位寫下心得感想或是疑問

#### 需要到第三期交作業的repository,填寫issue
- 標題須符合規範
- 並把git網址貼到底下的欄位 

#### 回到本地端
- 須先checkout到master 
`git checkout master`
- 在用pull request把遠端的repository同步到本機
 `git pull origin master`
- 把多餘的branch刪除
 `git branch -d Week1`
