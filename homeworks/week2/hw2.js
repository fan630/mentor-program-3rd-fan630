// function capitalize (str) {
//   let result = ''
//   let result1 = ''
//   let result2 = ''
//   result = result1 + result2
//   for (var i = 0; i < str.length - 1; i++) {
//     if (i === 0) {
//       result = str[i].toUpperCase()
//     } else {
//       result2 = str.slice(1)
//     }
//     return result
//   }
// }

function capitalize (str) {
  return str[0].toUpperCase() + str.slice(1)
}

console.log(capitalize('nick'))
console.log(capitalize('Nick'))
console.log(capitalize(',hello'))
