const request = require('request')
const process = require('process')

// 印出前二十本書的 id 與書名
if (process.argv[2] === 'list') {
  request('https://lidemy-book-store.herokuapp.com/books?_limit=20', (_error, response, body) => {
    const json = JSON.parse(body)
    for (let i = 0; i < json.length; i += 1) {
      console.log(`${json[i].id} ${json[i].name}`)
    }
  })
};
// 輸出指定id的書籍
if (process.argv[2] === 'read') {
  request(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, (_error, response, body) => {
    const json = JSON.parse(body)
    console.log(json.name)
  })
}

// 刪除指定id的書籍
if (process.argv[2] === 'delete') {
  request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, (_error, response) => {
    // eslint-disable-next-line no-constant-condition
    if (response.statusCode === 200) {
      console.log('刪除成功')
    } else {
      console.log('失敗')
    }
  })
}
// 新增一本名為 I love coding 的書

if (process.argv[2] === 'create') {
  request.post(
    {
      url: 'https://lidemy-book-store.herokuapp.com/books',
      form: {
        name: process.argv[3]
      }
    },
    (_error, response, body) => {
      if (response.statusCode === 201) {
        console.log('新增成功')
      }
    }
  )
}
// 更新指定 id 的書名為 new name
if (process.argv[2] === 'update') {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books${process.argv[3]}`,
      form: {
        name: process.argv[4]
      }
    },
    (_error, response) => {
      if (response.statusCode === 200) {
        console.log('新增成功')
      } else {
        console.log('新增失敗')
      }
    }
  )
}
