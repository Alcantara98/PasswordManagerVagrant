CREATE TABLE papers (
  code varchar(7),
  name varchar(50) NOT NULL,
  PRIMARY KEY (code)
);

INSERT INTO papers VALUES ('COSC326','Effective Programming');
INSERT INTO papers VALUES ('COSC349','Cloud Computing Architecture');

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO papers VALUES('viperzz33', 'hellokitty');
INSERT INTO papers VALUES('elbert', 'alcantara');
