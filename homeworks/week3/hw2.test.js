/* eslint-disable no-undef */
let alphaSwap = require('./hw2')

describe('測試大小寫互換', () => {
  test('A1Lkk2大小寫互換後應為a1lKK2', function () {
    expect(alphaSwap('A1Lkk2')).toBe('a1lKK2')
  })
  test('ABCD大小寫互換後應為abcd', function () {
    expect(alphaSwap('ABCD')).toBe('abcd')
  })
  test(',hEllO122大小寫互換後應為,HeLLo122', function () {
    expect(alphaSwap(',hEllO122')).toBe(',HeLLo122')
  })
})
