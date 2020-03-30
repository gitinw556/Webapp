
//Imperative style

let numbers = [1, 2, 3, 4, 5, 6 ,7, 8, 9, 10];
let squaredEvens = [];
for(let i = 0; i < numbers.length; i++) {
    let currentNumber = numbers[i];
    if(currentNumber % 2 === 0) {
        squaredEvens.push(currentNumber * currentNumber)
        
        }
    } 
console.log(squaredEvens );

