let n = Number(prompt("Введіть число n:"));

let factorial = 1;
let i = 1;

while (i <= n) {
    factorial *= i;
    i++;
}

console.log(`${n}! = ${factorial}`);