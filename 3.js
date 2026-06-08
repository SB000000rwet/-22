const users = [
    { name: "Іван", age: 25 },
    { name: "Марія", age: 17 },
    { name: "Олександр", age: 30 },
    { name: "Анна", age: 20 },
    { name: "Петро", age: 15 }
];

const adults = users.filter(user => user.age > 18);

const names = users.map(user => user.name);

const totalAge = users.reduce((sum, user) => sum + user.age, 0);
const averageAge = totalAge / users.length;

console.log("Усі користувачі:", users);
console.log("Користувачі старше 18 років:", adults);
console.log("Імена користувачів:", names);
console.log("Середній вік користувачів:", averageAge);