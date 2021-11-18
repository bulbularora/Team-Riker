CREATE TABLE user(
    user_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE events(
    user_id INT,
    event_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(30) not null,
    course_name VARCHAR(30) not null,
    type VARCHAR(30) not null,
    due_date DATE,
    due_time TIME,
    description VARCHAR(300),
    state VARCHAR(50),
    files VARCHAR(300),
    PRIMARY KEY(event_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

