const request = require('request')
const process = require('process')

// 印出前二十本書的 id 與書名
const api = 'https://lidemy-book-store.herokuapp.com/books?_limit=20'
const list = (response, body) => {
  if (process.argv[2] === 'list') {
    const json = JSON.parse(body)
    for (let i = 0; i < 20; i += 1) {
      console.log(`${json[i].id} ${json[i].name}`)
    }
  }
}

request(api, list)

// 輸出指定id的書籍
const api2 = `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`
const read = (response, body) => {
  if (process.argv[2] === 'read') {
    const json = JSON.parse(body)
    console.log(json.name)
  }
}
request(api2, read)

// 刪除指定id的書籍
request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
  (response, body) => {
    if (process.argv[2] === 'delete') {
      const json = JSON.parse(body)
      console.log(json.name)
    }
  })

// 新增一本名為 I love coding 的書
request.post(
  {
    url: 'https://lidemy-book-store.herokuapp.com/books',
    form: {
      name: process.argv[3]
    }
  },
  (response, body) => {
    if (process.argv[2] === 'create') {
      const json = JSON.parse(body)
      console.log(json)
    }
  }
)

// 更新指定 id 的書名為 new name
request.patch(
  {
    url: `https://lidemy-book-store.herokuapp.com/books'/${process.argv[3]}`,
    form: {
      name: process.argv[4]
    }
  },
  (response, body) => {
    if (process.argv[2] === 'update') {
      const json = JSON.parse(body)
      console.log(json)
    }
  }
)
