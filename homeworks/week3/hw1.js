function stars (n) {
  var str = ''
  var result = []
  for (var i = 1; i <= n; i++) {
    str += '*'
    result.push(str)
  }
  return result
}
console.log(stars(1))
console.log(stars(3))
console.log(stars(6))

module.exports = stars
