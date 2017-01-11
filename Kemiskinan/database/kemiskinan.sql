DROP DATABASE kemiskinan;
CREATE DATABASE kemiskinan;
USE kemiskinan;

CREATE TABLE IF NOT EXISTS level (
  id_level int AUTO_INCREMENT PRIMARY KEY,
  nama_level varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO level (nama_level) VALUES
('admin'),
('petugas');



/*ADMIN*/
CREATE TABLE IF NOT EXISTS admin (
  id_admin int(10) PRIMARY KEY AUTO_INCREMENT,
  username varchar(50) NOT NULL ,
  password varchar(50) NOT NULL,
  email varchar(250) NOT NULL,
  nama varchar(15) NOT NULL,
  id_level int NOT NULL DEFAULT 1,
  FOREIGN KEY (id_level) REFERENCES level (id_level)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin (username, password, email, nama) VALUES
('biekaeksa', '244b754768ffa8757687216361105b6b', 'biekaeksabiek@gmail.com','Biekaeksa');


/*PEGAWAI*/
CREATE TABLE IF NOT EXISTS pegawai (
  id_pegawai int(10) PRIMARY KEY AUTO_INCREMENT,
  username varchar(50) NOT NULL ,
  password varchar(50) NOT NULL,
  email varchar(250) NOT NULL,
  nama varchar(15) NOT NULL,
  no_telp varchar(12) NOT NULL,
  alamat varchar(50) NOT NULL,
  foto varchar(50) NOT NULL,
  id_level int NOT NULL DEFAULT 2,
  FOREIGN KEY (id_level) REFERENCES level (id_level)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





