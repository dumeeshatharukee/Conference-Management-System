#Conference Management System

How to Set Up and Run the Application

1. Requirements:
Install WampServer.
Ensure MySQL and PHP are configured correctly.
Place the project folder (conference) in the www directory of WampServer.

2. Database Setup:
Open phpMyAdmin (usually accessible via http://localhost/phpmyadmin).
Log in with the username: root (no password by default).
Create a database named conf.
Import the provided SQL file (conf.sql) to set up the necessary tables (participants, tracks, sessions, attendance).

3. Running the Application:
Start WampServer and ensure all services ( MySQL) are running.
Access the application via your browser at http://localhost/conference/home.php.

##Features Implemented

##Home Page:

Displays conference details, including date, location, and guest speakers.
![Image](https://github.com/user-attachments/assets/43285d63-f45c-41f4-bce6-39ed81b58e18)

##Schedule Page:

Lists conference topics and tracks with detailed information.
Includes a filter to find specific tracks.
![Image](https://github.com/user-attachments/assets/3deaa729-f0e7-4e6c-93ce-e26737084947)

![Image](https://github.com/user-attachments/assets/c196ab1c-b06b-4699-9132-3cdded9d51d5)

![Image](https://github.com/user-attachments/assets/e87ef33e-9ce4-4b7f-aaf6-e7235eb920f6)

##Registration Page:

Allows participants to register by submitting their details.
Data is stored in the participants table in the database.
![Image](https://github.com/user-attachments/assets/dc62fe2f-f560-4a5f-9738-aaa8fcf036c0)

##Login Page:

Authenticates users based on email and password.
Admin users can access the admin dashboard.
![Image](https://github.com/user-attachments/assets/cc6ff86a-7281-4bd8-bb1e-72daeee3b9f4)

##Admin Dashboard:

Manage participants, tracks, sessions, and attendance.
![Image](https://github.com/user-attachments/assets/9e3f718d-701b-4dcc-a1bf-d6b793250023)

![Image](https://github.com/user-attachments/assets/056df2d5-cd89-4a8e-b400-b715f3166bec)

All changes are reflected in the database in real-time.


1. *Clone the repository*:
   - Use the following command to clone the repository:  
     bash
     git clone  https://github.com/dumeeshatharukee/Conference-Management-System.git
2. *Navigate to the project folder*:
   - Change to the project directory:
     bash
     cd Conference-Management-System
