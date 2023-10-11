--/Applications/MAMP/Library/bin/
--./mysql -h localhost -u root -p

CREATE TABLE usuario (
  usuario_id int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  id varchar(23) NOT NULL,
  paterno varchar(30) NOT NULL,
  nombres varchar(35) NOT NULL,
  correo varchar(100) NOT NULL,
  clave varchar(80) NOT NULL,
  PRIMARY KEY (usuario_id),
  UNIQUE KEY unique_id (id),
  UNIQUE KEY correo (correo)
) ;


INSERT INTO usuario (id, paterno, nombres, correo, clave) VALUES (?,?,?,?,?);