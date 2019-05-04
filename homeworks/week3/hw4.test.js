/* eslint-disable no-undef */
let isPalindromes = require('./hw4')

describe('判斷迴文', () => {
  it('should return correct answer when str = abcdcba', () => {
    expect(isPalindromes('abcdcba')).toBe(true)
  })
  it('should return correct answer when str = apple', () => {
    expect(isPalindromes('apple')).toBe(false)
  })
  it('should return correct answer when str = apple', () => {
    expect(isPalindromes('applppa')).toBe(true)
  })
})
