let num1 = Number(prompt("Введіть перше число:"));
let num2 = Number(prompt("Введіть друге число:"));
let num3 = Number(prompt("Введіть третє число:"));

let average = (num1 + num2 + num3) / 3;
console.log("Середнє арифметичне:", average);

console.log("Модуль першого числа:", Math.abs(num1));

console.log("Округлення другого числа в більшу сторону:", Math.ceil(num2));

console.log("Округлення третього числа в меншу сторону:", Math.floor(num3));

let powerResult = Math.pow(num1, 2); 
console.log("Перше число у квадраті:", powerResult);

let divisor = 5;

console.log(
    `Середнє арифметичне ділиться на ${divisor}:`,
    average % divisor === 0
);

console.log(
    `Результат степеня ділиться на ${divisor}:`,
    powerResult % divisor === 0
);

// Також можна перевірити на 7
console.log(
    "Перше число ділиться на 7:",
    num1 % 7 === 0
);

let a = Number(prompt("Введіть сторону a:"));
let b = Number(prompt("Введіть сторону b:"));
let c = Number(prompt("Введіть сторону c:"));

if (a + b > c && a + c > b && b + c > a) {
    console.log("Трикутник може існувати.");
} else {
    console.log("Трикутник не може існувати.");
}