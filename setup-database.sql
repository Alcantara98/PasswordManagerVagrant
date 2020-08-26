CREATE TABLE users (
  username varchar(50) NOT NULL UNIQUE,
  password varchar(200) NOT NULL,
  isroot boolean NOT NULL,
  PRIMARY KEY (username)
);

INSERT INTO users VALUES('hello', 'kitty', 0);
INSERT INTO users VALUES('elbert', 'alcantara', 1);

CREATE TABLE useraccounts (
  website varchar(100) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(200) NOT NULL,
  UNIQUE(website, username, password)
);

CREATE TABLE papers (
  code varchar(7) NOT NULL UNIQUE,
  name varchar(50) NOT NULL,
  PRIMARY KEY (code)
);

INSERT INTO papers VALUES ('COSC326','Effective Programming');
INSERT INTO papers VALUES ('COSC349','Cloud Computing Architecture');

