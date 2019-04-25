function reverse (str) {
  let result = ''
  let len = str.length - 1
  for (let i = 0; i <= len; i++) {
    result += str[len - i]
  } return result
}

console.log(reverse('yoyoyo'))
console.log(reverse('1abc2'))
console.log(reverse('1,2,3,2,1'))
