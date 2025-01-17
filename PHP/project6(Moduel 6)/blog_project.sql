-- Active: 1733042295683@@127.0.0.1@3306@blogs

-- authors table  

CREATE TABLE authors(
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_name VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)

-- categories table 

CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


)

CREATE TABLE blogs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    category_id INT NOT NULL,
    author_id INT NOT NULL,

     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Foreign Key (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
    Foreign Key (author_id) REFERENCES authors(id) ON DELETE CASCADE ON UPDATE CASCADE

)




SELECT * FROM authors;
SELECT * FROM authors WHERE id= 2;

UPDATE authors SET author_name = "Ealy" WHERE id= 2;

DELETE FROM authors WHERE id= 2;



SELECT * FROM categories;

more data delete
DELETE FROM categories WHERE id =1;
-- DELETE FROM categories WHERE id IN (4,5,6,7,8,9,10);




SELECT * FROM categories WHERE id = 2;

UPDATE  categories set category_name = "EALY" WHERE ID = 2;



SELECT * FROM blogs;

SELECT * FROM blogs WHERE id = 1;

UPDATE blogs SET title = "My Updated blog title" WHERE id = 2;, i


UPDATE blogs SET category_id = 4, author_id = 3 WHERE id = 4;
DELETE FROM blogs WHERE id = 3;



SELECT blogs.title, blogs.body, categories.category_name, authors.author_name
FROM blogs
JOIN categories ON blogs.category_id = categories.id
JOIN authors ON blogs.author_id;author_id = authors.id;



-- To ge all blogs written by a  specific autho 

SELECT  authors.author_name, blogs.title, blogs.body, categories.category_name
FROM  blogs
JOIN authors ON blogs.author_id = authors.id
JOIN categories ON blogs.category_id = categories.id
WHERE authors.id = 3;


-- get all blogs under a specific category 

SELECT categories.category_name,blogs.title,blogs.body
FROM blogs
JOIN categories ON blogs.category_id =categories.id
WHERE categories.category_name = "Technology";


SELECT categories.category_name,blogs.title,blogs.body
FROM blogs
JOIN  categories ON blogs.category_id = categories.id
WHERE categories.category_name = "Technology";