function join (str, concatStr) {
  let result = ''
  for (let i = 0; i < str.length; i++) {
    result += str[i] + `${concatStr}`
  }
  return result
}

function repeat (str, times) {
  let result = ''
  while (times > 0) {
    result += str
    times--
  }
  return result
}

console.log(join('a', '!'))
console.log(repeat('a', 5))
