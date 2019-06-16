// 紀錄第一組數字
let firstNumber = 0
// 紀錄第二組數字
let secondNumber = 0
// 紀錄加減乘除的地方
let operator = ''

const numberBtn = document.querySelectorAll('.numberBtn')
for (let i = 0; i < numberBtn.length; i += 1) {
  numberBtn[i].addEventListener('click', (e) => {
    let num = 0
    switch (e.target.id) {
      case 'one':
        num = 1
        break
      case 'two':
        num = 2
        break
      case 'three':
        num = 3
        break
      case 'four':
        num = 4
        break
      case 'five':
        num = 5
        break
      case 'six':
        num = 6
        break
      case 'seven':
        num = 7
        break
      case 'eight':
        num = 8
        break
      case 'nine':
        num = 9
        break
      case 'zero':
        num = 0
        break
    }
    // setResult(num)
    clickNumber(num)
  })
}

function clickNumber (num) {
  appendResult(num)
}

// 可以做到更換數字
function setResult (num) {
  document.querySelector('.calc__display').innerText = num
}

// 可以做到數字相加
function appendResult (num) {
  document.querySelector('.calc__display').innerText += num
}

// 計算符號
const opBtn = document.querySelectorAll('.opBtn')
OperatorBtn()
function OperatorBtn (op) {
  for (let i = 0; i < opBtn.length; i += 1) {
    opBtn[i].addEventListener('click', (e) => {
      if (e.target.id === 'minus') {
        handleOperator('-')
      } else if (e.target.id === 'plus') {
        handleOperator('+')
      } else {
        handleOperator('=')
      }
    })
  }
}

function handleOperator (op) {
  if (op === '=') {
    secondNumber = Number(getResult())
    if (operator === '+') {
      setResult(firstNumber + secondNumber)
    } else if (operator === '-') {
      setResult(firstNumber - secondNumber)
    }
  } else {
    firstNumber = Number(getResult())
    setResult('')
    operator = op
  }
}

// 回傳數字的地方,這一段真的看不是很懂
function getResult (num) {
  return document.querySelector('.calc__display').innerText
}
