# User Registration System

## Project Overview

This project is a simple User Registration System that allows users to register, log in, and manage their profiles. The system uses PHP sessions to handle user authentication and stores user data in a JSON file.

## Features

- **User Registration**: Users can create a new account with a username, email, and password.
- **User Login**: Registered users can log in using their username and password.
- **User Profile**: Authenticated users can view a profile page with a welcome message and a logout option.
- **Session Management**: The system uses PHP sessions to manage user authentication and access control.
- **Logout**: Users can log out and be redirected to the login page.

## Screenshots:
<img width="183" alt="signup" src="https://github.com/user-attachments/assets/508e36ef-15c2-425d-a3e6-1efaa70d2fc9"> <br>
<img width="151" alt="profile" src="https://github.com/user-attachments/assets/ee8e7342-6f2d-417f-b1a8-25114fc5dcf1"> <br>
<img width="185" alt="login" src="https://github.com/user-attachments/assets/2a254640-ad5d-4210-8bae-1a1968cf33b6"> <br>
<img width="283" alt="json" src="https://github.com/user-attachments/assets/53032a93-045e-4ec6-a28d-b0de9d956560"> <br>

## Components

### 1. `signup.php`

Handles user registration by collecting user details, validating the input, and saving user data to a JSON file. It also checks for existing usernames to avoid duplicates.

### 2. `login.php`

Handles user login by validating the entered username and password against the stored data in the JSON file. Upon successful login, users are redirected to the profile page.

### 3. `profile.php`

Displays the user's profile with a welcome message and provides a logout button. Access to this page is restricted to authenticated users only.

### 4. `logout.php`

Logs out the user by destroying the session and redirects to the login page.

## Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/lahcenboukbir/User-Registration-System.git
   cd Small Project

2. **Create the users.json File**:
Create a file named users.json in the project directory. This file will store user data in JSON format.
The file should be initially empty ([]).

3. **Configure Your Server**:
Ensure you have a PHP server running. You can use XAMPP, WAMP, MAMP, or a similar local server setup.

4. **Place the Files**:
Place signup.php, login.php, profile.php, and logout.php in the root directory of your PHP server.

6. **Access the Application**:
Open your browser and navigate to http://localhost/signup.php to start using the application.

## Usage

1. **Register a New User**:
Go to signup.php and fill out the registration form.

2. **Log In**:
After registration, log in using login.php with the registered username and password.

3. **View Profile**:
Once logged in, you will be redirected to profile.php where you can see your profile and have the option to log out.

4. **Log Out**:
Click the logout button on the profile page to end your session and be redirected to login.php.

## Notes
Ensure that your PHP server has write permissions to the directory where users.json is stored, as it needs to write user data.
For security purposes, consider hashing passwords before storing them in the JSON file.

## Contributing
Feel free to submit issues or pull requests if you have improvements or suggestions for the project.

## Contact
For any questions or support, please contact me.
