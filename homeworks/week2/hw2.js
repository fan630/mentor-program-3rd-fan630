function capitalize (str) {
  let char = str[0]
  if (char >= 'a' && char <= 'z') {
    return char.toUpperCase() + 'ick'
  } else {
    return str
  }
}

console.log(capitalize('nick'))
console.log(capitalize('Nick'))
console.log(capitalize(',hello'))
