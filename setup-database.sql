CREATE TABLE users (
  username varchar(50) BINARY NOT NULL UNIQUE,
  password varchar(200) BINARY NOT NULL,
  isroot boolean NOT NULL,
  PRIMARY KEY (username)
);

INSERT INTO users VALUES('hello', 'kitty', 0);
INSERT INTO users VALUES('elbert', 'alcantara', 1);

CREATE TABLE useraccounts (
  accwebsite varchar(100) BINARY NOT NULL,
  accusername varchar(50) BINARY NOT NULL,
  accpassword varchar(200) BINARY NOT NULL,
  username varchar(50) BINARY NOT NULL,
  UNIQUE(accwebsite, accusername, accpassword, username),
  FOREIGN KEY (username) REFERENCES users(username)
);

