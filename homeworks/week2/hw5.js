function join (arr, concatStr) {
  let result = ''
  let result2 = ''
  for (let i = 1; i < arr.length; i++) {
    result += `${concatStr}` + arr[i]
    result2 = arr[0] + result
  }
  return result2
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
console.log(join(['a', 'b', 'c'], '!'))
console.log(join(['a', 1, 'b', 2, 'c', 3], ','))
console.log(repeat('a', 5))
