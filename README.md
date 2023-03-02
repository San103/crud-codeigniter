Codeigniter Project - CRUD Operation

To start this Project use XAMPP as a webserver and run the below sql syntax to create your database
Database Name: ci4tutorial
CREATE TABLE news (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    slug VARCHAR(128) NOT NULL,
    body TEXT NOT NULL,
    image_url VARCHAR(255),
    PRIMARY KEY (id),
    UNIQUE slug (slug)
);
