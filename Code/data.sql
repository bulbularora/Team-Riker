CREATE TABLE User(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(10) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE Events(
    user_id INT,
    event_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(30) not null,
    course_name VARCHAR(30) not null,
    type VARCHAR(30) not null,
    due_date DATE,
    due_time TIME,
    description VARCHAR(500),
    state VARCHAR(50),
    PRIMARY KEY(event_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

