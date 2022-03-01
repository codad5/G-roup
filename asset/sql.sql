CREATE TABLE users (
    user_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name varchar(300) NOT NULL,
    user_email varchar(300) NOT NULL,
    user_password varchar(300) NOT NULL,
    user_active boolean NOT NULL,
    otp varchar(11) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);