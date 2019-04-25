function printStars (n) {
  let answer = ''
  for (let i = 1; i <= n; i++) {
    answer += '*' + '\n'
  }
  console.log(answer)
};

printStars(1)
printStars(3)
printStars(6)
