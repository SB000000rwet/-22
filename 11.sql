CREATE DATABASE library;
USE library;

CREATE TABLE books (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(50),
    year_published INT,
    genre VARCHAR(30)
);

CREATE TABLE loans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    book_id INT,
    borrower_name VARCHAR(50),
    loan_date DATE,
    FOREIGN KEY (book_id) REFERENCES books(id)
        ON DELETE CASCADE
);

CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    book_id INT,
    review_text TEXT,
    rating INT,
    FOREIGN KEY (book_id) REFERENCES books(id)
        ON DELETE SET NULL
);

CREATE TABLE book_tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    book_id INT,
    tag VARCHAR(30),
    FOREIGN KEY (book_id) REFERENCES books(id)
        ON DELETE SET NULL
);

INSERT INTO books (title, author, year_published, genre) VALUES
('Дюна', 'Френк Герберт', 1965, 'фантастика'),
('Шерлок Холмс', 'Артур Конан Дойл', 1892, 'детектив'),
('Гаррі Поттер', 'Дж. К. Роулінг', 1997, 'фентезі'),
('Код да Вінчі', 'Ден Браун', 2003, 'детектив'),
('Марсіанин', 'Енді Вейр', 2011, 'фантастика');

INSERT INTO loans (book_id, borrower_name, loan_date) VALUES
(1, 'Іван Петренко', '2025-01-10'),
(2, 'Олена Коваль', '2025-02-12'),
(3, 'Андрій Шевченко', '2025-03-01'),
(4, 'Марія Іванова', '2025-03-15'),
(5, 'Петро Сидоренко', '2025-04-01');

INSERT INTO loans (book_id, borrower_name, loan_date) VALUES
(1, 'Іван Петренко', '2025-01-10'),
(2, 'Олена Коваль', '2025-02-12'),
(3, 'Андрій Шевченко', '2025-03-01'),
(4, 'Марія Іванова', '2025-03-15'),
(5, 'Петро Сидоренко', '2025-04-01');

INSERT INTO book_tags (book_id, tag) VALUES
(1, 'космос'),
(1, 'політика'),
(2, 'розслідування'),
(2, 'Лондон'),
(5, 'Марс'),
(5, 'виживання');

UPDATE books
SET title = 'Дюна (оновлене видання)'
WHERE id = 1;

UPDATE loans
SET loan_date = '2025-05-01'
WHERE id = 3;

DELETE FROM books
WHERE id = 2;

-- loans: запис повинен зникнути
SELECT * FROM loans;

-- reviews: book_id стане NULL
SELECT * FROM reviews;

-- book_tags: book_id стане NULL
SELECT * FROM book_tags;

SELECT * FROM books;

SELECT * FROM books
WHERE genre = 'фантастика';

SELECT * FROM books
ORDER BY year_published ASC;

SELECT * FROM books
WHERE genre = 'детектив'
ORDER BY title ASC;