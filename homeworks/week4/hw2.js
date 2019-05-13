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
