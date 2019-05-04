/* eslint-disable no-undef */
let isPrime = require('./hw3')

describe('判斷質數', () => {
  it('should return correct answer when n = 1', () => {
    expect(isPrime(1)).toBe(false)
  })
  it('should return correct answer when n = 1', () => {
    expect(isPrime(2)).toBe(true)
  })
  it('should return correct answer when n = 1', () => {
    expect(isPrime(5)).toBe(true)
  })
  it('should return correct answer when n = 1', () => {
    expect(isPrime(37)).toBe(true)
  })
})
