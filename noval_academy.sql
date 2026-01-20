CREATE DATABASE IF NOT EXISTS noval_academy;
USE noval_academy;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    description TEXT,
    image VARCHAR(255),
    category VARCHAR(50)
);

CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    course_id INT,
    progress INT DEFAULT 0,
    status ENUM('learning', 'completed') DEFAULT 'learning',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (title, description, image, category) VALUES
('HTML Dasar', 'Belajar struktur dasar web.', 'html.png', 'Frontend'),
('CSS Modern', 'Desain web dengan Tailwind dan Flexbox.', 'css.png', 'Frontend'),
('PHP Native', 'Backend programming dengan PHP & MySQL.', 'php.png', 'Backend');