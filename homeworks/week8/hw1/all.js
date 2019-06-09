const body = document.querySelector('.body')
const award = document.querySelector('.award')
const request = new XMLHttpRequest()

request.onload = () => {
  const response = request.responseText
  const json = JSON.parse(response)
  if (json.prize === 'FIRST') {
    body.classList.add('blue')
    const div = document.createElement('div')
    div.classList.add('award__first')
    div.innerHTML = `<div class="award__title">恭喜你中頭獎了！日本東京來回雙人遊！</div>
                    <img src="https://s3-ap-northeast-1.amazonaws.com/vprowebasia/wall/2018/wall0205.jpg" alt="">`
    award.appendChild(div)
  } else if (json.prize === 'SECOND]') {
    const div = document.createElement('div')
    div.classList.add('award__second')
    div.innerHTML = `<div class="award__title">二獎！90 吋電視一台！</div>
                    <img src="https://attach.mobile01.com/attach/201212/mobile01-bfbfcae67fca0feaf51282bf59e29d27.jpg" alt="">`
    award.appendChild(div)
  } else if (json.prize === 'THIRD') {
    const div = document.createElement('div')
    div.classList.add('award__third')
    div.innerHTML = `<div class="award__title">恭喜你抽中三獎：知名 YouTuber 簽名握手會入場券一張，bang！</div>
                    <img src="https://www.marketersgo.com/wp-content/uploads/2018/11/youtube-crowd-uproar-protest-ss-19201920-800x450.jpg" alt="">`
    award.appendChild(div)
  } else if (json.prize === 'NONE') {
    body.classList.add('black')
    const div = document.createElement('div')
    div.classList.add('award__title')
    div.innerText = '鳴謝惠顧'
    div.classList.add('white')
    award.appendChild(div)
  } else {
    alert('系統不穩定,請再試一次')
  }
}

request.open('GET', 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery', true)
request.send()
