CREATE TABLE users (
  username varchar(50) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  PRIMARY KEY (username)
);

INSERT INTO users VALUES('viperzz33', 'hellokitty');
INSERT INTO users VALUES('elbert', 'alcantara');

CREATE TABLE papers (
  code varchar(7) NOT NULL UNIQUE,
  name varchar(50) NOT NULL,
  PRIMARY KEY (code)
);

INSERT INTO papers VALUES ('COSC326','Effective Programming');
INSERT INTO papers VALUES ('COSC349','Cloud Computing Architecture');

CREATE TABLE rootusers (
  username varchar(50) NOT NULL UNIQUE,
  password varchar(255) NOT NULL
  PRIMARY KEY (username)
);

INSERT INTO rootusers VALUES('elbert', 'alcantara');
