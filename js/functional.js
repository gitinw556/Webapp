// Functional style
const numbers = [1, 2, 3, 4, 5, 6 ,7, 8, 9, 10];
const isEven = n => n % 2 === 0;
const square = n => n * n;
const result = numbers.filter(isEven).map(square);
console.log(result);

