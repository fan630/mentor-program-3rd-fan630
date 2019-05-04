/* eslint-disable no-undef */
let add = require('./hw5')

describe('大數相加', () => {
  it('should return correct answer when a = 123 and b =456', () => {
    expect(add('123', '456')).toBe('579')
  })
  it('should return correct answer when a = 3776 and b = 2154', () => {
    expect(add('3776', '2154')).toBe('5930')
  })
})
