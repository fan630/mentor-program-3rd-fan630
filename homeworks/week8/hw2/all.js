const request = new XMLHttpRequest()
const newRequest = new XMLHttpRequest()
const comments = document.getElementById('comments')
const posts = document.querySelector('.posts')
const btn = document.querySelector('.btn')

// 撈取資料
request.addEventListener('load', () => {
  if (request.status >= 200 && request.status < 400) {
    const json = JSON.parse(request.responseText)
    for (let i = 0; i < json.length; i += 1) {
      const div = document.createElement('div')
      div.classList.add('list')
      div.innerHTML = `Id: ${json[i].id} <br> 留言內容: ${json[i].content}`
      posts.appendChild(div)
    }
  } else {
    console.log('error')
  }
})

request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts?_limit=20&_sort=id&_order=desc', true)
request.send()

// 新增留言
btn.addEventListener('click', function () {
  if (comments.value !== '') {
    const data = `content=${comments.value}`
    newRequest.open('POST', 'https://lidemy-book-store.herokuapp.com/posts', true)
    newRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    newRequest.send(data)
    comments.value = ''
    posts.innerHTML = ''
  } else {
    alert('請輸入留言內容')
  }
})
