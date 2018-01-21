CREATE TABLE IF NOT EXISTS USERS(
    id_user INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(32),
    lastName VARCHAR(32),
    email VARCHAR(32),
    pass VARCHAR(64),
    address VARCHAR(50),
    phone VARCHAR(14),
    PRIMARY KEY (id_user)
);

CREATE TABLE IF NOT EXISTS PRODUCTS(
    id_product INT NOT NULL AUTO_INCREMENT,
    productName VARCHAR(32),
    productDescription VARCHAR(64),
    price VARCHAR(32),
    stock VARCHAR(14),
    ingredients VARCHAR(200),
    weight VARCHAR(15),
    conditions VARCHAR(100),
    image VARCHAR(30),
    PRIMARY KEY (id_product)
);

CREATE TABLE IF NOT EXISTS RECORDS(
    id_record INT NOT NULL AUTO_INCREMENT,
    quantity INT NOT NULL,
    id_user INT NOT NULL,
    id_product INT NOT NULL,
    PRIMARY KEY (id_record), 
    FOREIGN KEY (id_user) REFERENCES USERS(id_user),
    FOREIGN KEY (id_product) REFERENCES PRODUCTS(id_user)
);





