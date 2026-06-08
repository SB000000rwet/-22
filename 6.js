function getRandomNumber() {
    return new Promise((resolve) => {
        setTimeout(() => {
            const randomNumber = Math.floor(Math.random() * 100) + 1;
            resolve(randomNumber);
        }, 1000);
    });
}

async function processNumber() {
    try {
        const number = await getRandomNumber();

        console.log("Отримане число:", number);

        if (number < 50) {
            const result = await Promise.resolve(number + 20);
            return result;
        } else {
            await Promise.reject("Занадто велике число!");
        }

    } catch (error) {
        console.error("Помилка:", error);
        return "Оброблено помилку";
    }
}

processNumber()
    .then(result => {
        console.log("Результат:", result);
    });