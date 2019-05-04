function alphaSwap (str) {
  var newStr = ''
  for (var i = 0; i < str.length; i++) {
    if (str[i] >= 'A' && str[i] <= 'Z') {
      newStr += str[i].toLowerCase()
    } else if (str[i] >= 'a' && str[i] <= 'z') {
      newStr += str[i].toUpperCase()
    } else if (str[i] !== 'A') {
      newStr += str[i]
    }
  }
  return newStr
}
module.exports = alphaSwap
