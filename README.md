# 🛒 WTECH 2024/25 – Laravel E-shop

This repository contains the source code for the semester project for the course **Web Technologies (WTECH)** at **FIIT STU** during the academic year **2024/25**.  
The goal was to build a fully functional e-commerce web application with both client-facing and admin sections, based on the project specifications.

---

## 👥 Authors

This project was developed as a team of two:

- [Marek Fejda](https://github.com/marekfejda)
- [Branislav Bučko](https://github.com/Picklemaster09)

---

## 🛠 Technologies Used

- **PHP**
- **Laravel**
- **PostgreSQL**
- **Blade (Laravel Templating)**
- **HTML, CSS, JavaScript**
- **Docker**

---

## ▶️ How to Run

**Prerequisites:**

- [Docker](https://www.docker.com/) must be installed

**Steps:**

```bash
git clone https://github.com/marekfejda/wtech_obchod.git
cd wtech_ishop
docker-compose up
```

---

## 🐳 Why Docker?

We decided to dockerize the application to gain hands-on experience with containerized development environments. This approach allowed us to:

- Learn the fundamentals of **Docker**, **Docker Compose**, and **volumes**
- Create a setup that is easy to **deploy**, **reproduce**, and **share**
- Isolate services (PHP, PostgreSQL) for better development workflow
- Automate the first-time database setup using a custom `entrypoint.sh` script  
  This script ensures that **seeders are run only on first startup**, while data is **persisted via Docker volumes** in subsequent runs


---

## 🔗 Accessing the Application

The application will be available at:

- [http://localhost:8000](http://localhost:8000)
- [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 👤 Demo Accounts

| Username      | Password |
|---------------|----------|
| Picklemaster  | 12345    |
| James Bond    | 12345    |
| Admin         | 12345    |

---

## ✅ Features

### Client Side

- Product listing by categories  
- Basic filtering (e.g., brand, price, color)  
- Pagination 
- Product sorting (e.g., by price)  
- Product detail view  
- Add product to cart (multiple quantity)  
- Full-text search  
- Cart view and editing  
- Shipping and payment selection  
- Enter delivery info and complete order  
- Guest checkout (no registration required)  
- User registration, login, logout  
- Cart portability after login  

### Admin Side

- Admin login/logout  
- Product list  
- Add new product (with images and metadata)  
- Edit product  
- Delete product (including images)   

---

## 💾 Database Schema

The following diagram presents the physical data model used in our application.  
It provides a visual overview of the main entities (such as Products, Orders, Users) and the relationships between them.

<p align="center">
  <img src="/database/database.png" width="65%" />
</p>

---

## 🧠 What We Learned

This project provided us with valuable hands-on experience in the following areas:

- Working with **PHP** and the **Laravel** framework  
- Using **ORM (Eloquent)** for database interaction  
- Creating **migrations** and **seeders** to manage database structure and initial data  
- Working with the **Blade** templating engine  
- Building RESTful controllers and **resource routes**  
- Managing user sessions, authentication, and roles  
- Using **Docker** for streamlined deployment and local development  
- Implementing **full-text search** and product filtering  
- Developing pagination and a responsive UI  
- Collaborating using **GIT**, ensuring fair distribution of work and traceable contributions  

---

## 🧱 Development Process

The development was divided into two main phases:

1. **Wireframing Phase**  
   We started by designing the basic layout and structure of the application using **Figma**. These wireframes served as a visual guide for the look and flow of the user interface.

2. **Frontend Prototyping Phase**  
   The wireframes were then translated into static templates using **HTML**, **CSS**, and **JavaScript**. This helped us validate the layout and interactions before integrating any backend logic.

3. **Server-side Integration Phase**  
   In the final phase, we converted the static templates into dynamic **Laravel Blade views** and implemented server-side rendering. Functionality such as routing, authentication, database communication, and full e-commerce logic was gradually integrated using Laravel’s MVC architecture.

---

<center>🎓 This project was created solely for academic purposes as part of our studies at FIIT STU.</center>
