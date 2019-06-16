const btn = document.querySelector('.btn')
btn.addEventListener('click', () => {
  const email = document.querySelector('#email')
  const nickName = document.querySelector('#nickName')
  const registerOption1 = document.querySelector('.form__registerOption1')
  const registerOption2 = document.querySelector('.form__registerOption2')
  const coding = document.querySelector('#coding')
  const others = document.querySelector('#others')

  if (email.value === '') {
    document.querySelector('.form__email').style.background = 'pink'
    document.querySelector('.reminder1').style.display = 'block'
    return false
  } else if (nickName.value === '') {
    document.querySelector('.form__nickName').style.background = 'pink'
    document.querySelector('.reminder2').style.display = 'block'
    return false
  } else if (!registerOption1.checked && !registerOption2.checked) {
    document.querySelector('.form__register').style.background = 'pink'
    document.querySelector('.reminder3').style.display = 'block'
    return false
  } else if (coding.value === '') {
    document.querySelector('.form__coding').style.background = 'pink'
    document.querySelector('.reminder4').style.display = 'block'
    return false
  } else {
    console.log(email.value)
    console.log(nickName.value)
    console.log(typeCheck())
    console.log(others.value)
    alert('Submitted!')
    return true
  }
})

function typeCheck () {
  const type1 = document.querySelector('.type1')
  const type2 = document.querySelector('.type2')
  if (!type1.checked && !type2.checked) {
    document.querySelector('.form__register').style.background = 'pink'
    document.querySelector('.reminder3').style.display = 'block'
    return false
  } else if (type1.checked === true) {
    return '工程師培養班（每週付出四十小時，從零培養到工程師，學費是一個月薪水)'
  } else {
    return '業餘班（依照個人目標訂立學習計畫，學費一萬五千元'
  }
}
