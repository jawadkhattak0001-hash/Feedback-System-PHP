# Student Feedback System (PHP & MySQL)
**Developed by: MUHAMMAD JAWAD & ROHAIL AHMAD**

A professional web application designed to collect student feedback and store it securely in a MySQL database.

---

## 🚀 Key Features

* **Database-Driven Storage:** Every feedback entry (Name, Email, Message) is captured via PHP and stored permanently in a **MySQL database**.
* **Backend Processing:** Utilizes `save.php` for server-side validation and data handling.
* **Database Connectivity:** Features a dedicated `db.php` file to manage the connection between the web interface and the SQL server.
* **Data Integrity:** Ensures that user information is correctly formatted before being written to the database.

---

## 🛠️ Technical Stack

* **Frontend:** HTML5, CSS3
* **Backend Language:** PHP
* **Database:** MySQL
* **Local Server:** XAMPP / Apache

---

## ⚙️ How to Setup the Database

To run this project locally, you must import the database schema:

1. Start **Apache** and **MySQL** in your XAMPP Control Panel.
2. Open your browser and go to `localhost/phpmyadmin`.
3. Create a new database named `feedback_db`.
4. Click the **Import** tab and select the **`feedback.sql`** file from this project folder.
5. Click **Go** to create the tables automatically.