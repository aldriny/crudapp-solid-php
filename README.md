# Online Shop Application

## Overview

The Online Shop Application is a PHP-based web application designed to manage products in an online store. Leveraging Object-Oriented Programming (OOP) principles, the application provides robust CRUD operations for products, adhering to SOLID principles and utilizing the Factory pattern to implement dependency inversion. This application offers a modern, responsive interface for seamless user interaction and efficient product management.

## Features

- **SOLID Principles**: Designed with SOLID principles to promote clean, maintainable, and scalable code. The application’s architecture ensures that components are well-structured and adhere to best practices.
- **Factory Pattern**: Implements the Factory pattern to achieve dependency inversion, facilitating easier management of object creation and enhancing flexibility in the application's design.
- **Product Management**: Create, read, update, and delete products with ease.
- **Secure Transactions**: Utilizes PDO for secure database interactions and validation to ensure data integrity.
- **Responsive Design**: A clean, modern design built with Bootstrap to ensure a great user experience across devices.
- **Professional Layout**: A well-structured and visually appealing design that ensures a consistent user experience and intuitive navigation.

## Technologies Used

- **PHP**: Server-side scripting language for application logic, utilizing OOP and SOLID principles.
- **MySQL**: Relational database management system for storing product data.
- **Bootstrap**: Front-end framework for responsive and contemporary design.
- **Composer**: Dependency management tool for PHP libraries.
- **PDO**: PHP Data Objects for secure and efficient database interactions.

### Prerequisites

- PHP 7.4 or higher
- MySQL
- Composer

### Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/yourusername/online-shop.git
    cd online-shop
    ```

2. **Install dependencies**:
    ```sh
    composer install
    ```

3. **Set up the database**:
    - Create a MySQL database and import the provided SQL schema to set up the necessary tables.

4. **Configure environment variables**:

    - Copy the `.env.example` file to `.env`:
    ```sh
    cp .env.example .env
    ```
    - Edit the `.env` file with your database configuration:
    ```plaintext
    DB_HOST=localhost
    DB_PORT=3306
    DB_NAME=online_shop
    DB_USER=root
    DB_PASS=
    ```

5. **Run the application**:
    - Ensure your local server (e.g., XAMPP, MAMP) is running.
    - Navigate to `http://localhost/online-shop` in your web browser to access the application.
