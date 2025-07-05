# PHP Blog with User Authentication and CRUD

This is a blog web application built using **PHP** and **MySQL**. It includes user registration, login, logout, and full CRUD (Create, Read, Update, Delete) operations for blog posts. It uses session-based authentication to restrict post creation/editing to logged-in users.


##  Features

-  User Registration and Login (with password hashing)
-  Session-based Authentication
-  Create New Posts
-  Edit Existing Posts
-  Delete Posts
-  View All Posts (Public)
-  Clean and Responsive UI



##  Project Structure

project/
│
├── db.php # Database connection
├── index.php # Home page displaying blog posts
├── login.php # Login form
├── register.php # Register form
├── logout.php # Ends the session
├── create.php # Create new post
├── edit.php # Edit existing post
├── delete.php # Delete a post
└── README.md # Project documentation


##  Technologies Used

- PHP (Core PHP, no frameworks)
- MySQL (via MySQLi)
- HTML/CSS (inline styling)
- Sessions for auth handling


##  Setup Instructions

### Requirements

- PHP 
- MySQL/MariaDB
- Apache/Nginx or use **XAMPP** for local development

###  Installation

1. Clone this repository or download the ZIP.
2. Create a MySQL database (e.g., `blog`) and import the following schema:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Configure the db.php file:



Place the files in htdocs/ (if using XAMPP)

Start Apache and MySQL

Visit http://localhost/project-folder/
