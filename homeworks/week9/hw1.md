資料庫名稱：comments

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      |  屬性為:primary key   |
|  username  |    varchar(16)      | 帳號     |
|  content  |    text      | 留言內容    |
|  created_at  |    datetime      | 預設值設為current_timestamp()     |

---

資料庫名稱：users

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      |  屬性為:primary key   |
|  username  |    varchar(16)      | 屬性為:unique ; 帳號    |
|  password  |    varchar(16)      |  密碼  |
|  nickname  |    varchar(64)      |  暱稱 