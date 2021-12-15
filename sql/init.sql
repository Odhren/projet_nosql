CREATE TABLE myUser
(
    id_user SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL
);