DELIMITER $$
CREATE function user_login(user varchar(20), pwd varchar(20)) returns int
BEGIN
	IF EXISTS ( SELECT * FROM cartasx.usuario WHERE userName = user and passwd = pwd) THEN
		return 1;
	ELSE
		return 0;
    END IF;
END $$



DELIMITER $$
CREATE FUNCTION user_existe(user varchar(20)) returns INT
BEGIN
	IF EXISTS ( SELECT id FROM cartasx.usuario WHERE userName = user ) THEN
		return 1;
	ELSE
		return 0;
    END IF;
END $$


--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

DELIMITER $$
CREATE PROCEDURE user_crear(user varchar(20), passwd varchar(20),coins INT)
BEGIN
	INSERT INTO cartasx.usuario(Nombre, Passwd, Coins) values(user, passwd, coins);
END $$



DELIMITER $$
CREATE PROCEDURE user_datos(user varchar(20))
BEGIN
    SELECT * FROM cartasx.usuario WHERE Nombre = user;
END $$

--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

CREATE PROCEDURE `criatura_all` ()
BEGIN
	SELECT * FROM carta c, jugable j, criatura cri where
    c.idCarta = j.idJugable and cri.idCriatura = j.idJugable;
END






--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
CREATE TABLE `cartasx`.`carta` (
  `idCarta` INT NOT NULL AUTO_INCREMENT,
  `clase` VARCHAR(40) NULL,
  `descripcion` VARCHAR(100) NULL,
  `costoOro` INT NULL,
  `imagen` VARCHAR(50) NULL,
  PRIMARY KEY (`idCarta`));

CREATE TABLE `cartasx`.`ambiente` (
  `idAmbiente` INT NOT NULL AUTO_INCREMENT,
  `ataque` INT NULL,
  `defensa` INT NULL,
  PRIMARY KEY (`idAmbiente`));

CREATE TABLE `cartasx`.`jugable` (
  `idJugable` INT NOT NULL,
  `idAmbiente` INT NOT NULL,
  `costoMana` INT NULL,
  `habilidad` VARCHAR(40) NULL,
  `habilidadEntorno` VARCHAR(40) NULL,
  PRIMARY KEY (`idJugable`));

CREATE TABLE `cartasx`.`poder` (
  `idPoder` INT NOT NULL,
  PRIMARY KEY (`idPoder`));


CREATE TABLE `cartasx`.`criatura` (
  `idcriatura` INT NOT NULL,
  `ataque` INT NULL,
  `defensa` INT NULL,
  PRIMARY KEY (`idcriatura`));


CREATE TABLE `cartasx`.`hechizo` (
  `idHechizo` INT NOT NULL,
  `duracion` INT NULL,
  PRIMARY KEY (`idHechizo`));


CREATE TABLE `cartasx`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(20) NULL,
  `passwd` VARCHAR(20) NULL,
  `email` VARCHAR(50) NULL,
  `emblema` VARCHAR(20) NULL,
  `coins` INT NULL,
  PRIMARY KEY (`idUsuario`));


CREATE TABLE `cartasx`.`moneda` (
  `idMoneda` INT NOT NULL AUTO_INCREMENT,
  `tiempo` INT NULL,
  PRIMARY KEY (`idMoneda`));


CREATE TABLE `cartasx`.`dado` (
  `idDado` INT NOT NULL AUTO_INCREMENT,
  `valor` INT NULL,
  PRIMARY KEY (`idDado`));

CREATE TABLE `cartasx`.`entorno` (
  `idDado` INT NOT NULL,
  `idMoneda` INT NOT NULL,
  PRIMARY KEY (`idDado`, `idMoneda`));


CREATE TABLE `cartasx`.`afecta` (
  `idDado` INT NOT NULL,
  `idMoneda` INT NOT NULL,
  `idJugable` INT NOT NULL,
  PRIMARY KEY (`idDado`, `idMoneda`, `idJugable`));



CREATE TABLE `cartasx`.`tienecarta` (
  `idUser` INT NOT NULL,
  `idCarta` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idCarta`));



CREATE TABLE `cartasx`.`tienemazo` (
  `idUser` INT NOT NULL,
  `idMazo` INT NOT NULL,
  `idCarta` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idMazo`, `idCarta`));

CREATE TABLE `cartasx`.`mazo` (
  `idMazo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NULL,
  PRIMARY KEY (`idMazo`));

--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

insert into carta(tipo, clase, nombre, descripcion, CostoOro, imagen)
values('ambiente', 'trueno', 'volcan activo', '', 100, 'img/cartas/amb/t/1.png');

insert into ambiente(idAmbiente, ataque, defensa) values(8, 3, 3);



insert into carta(tipo, clase, nombre, descripcion, imagen)
values('poder', 'luz', 'estandar temur', 'Aumenta +1 las reservas de mana, roba una carta al azar del rival', 'img/cartas/pod/l/1.png');

insert into jugable(idJugable, idAmbiente, costoMana, habilidad, HabilidadEntorno)
values(13, 0, 30, '', '');

insert into criatura values(13, 0, 0);




	BEGIN
		INSERT INTO tienecarta VALUES(id,10);
	  INSERT INTO tienecarta VALUES(id,11);
	  INSERT INTO tienecarta VALUES(id,12);
	  INSERT INTO tienecarta VALUES(id,13);
	  INSERT INTO tienecarta VALUES(id,14);

	  INSERT INTO tienemazo VALUES(id,1,10);
	  INSERT INTO tienemazo VALUES(id,1,11);
	  INSERT INTO tienemazo VALUES(id,1,12);
	  INSERT INTO tienemazo VALUES(id,1,13);
	  INSERT INTO tienemazo VALUES(id,1,14);
	END
	--//...........................................

insert into tienecarta values();
insert into tienecarta values();
insert into tienecarta values();
insert into tienecarta values();
insert into tienecarta values();

insert into tienemazo values();
insert into tienemazo values();
insert into tienemazo values();
insert into tienemazo values();
insert into tienemazo values();






insert into ambiente values(1, 20, 30);

insert into cartasx.jugable(idJugable, IdAmbiente, costoMana, habilidad, HabilidadEntorno)
values(1, 1, 10, 'destello segador', 'Sol Intenso')


insert into cartasx.criatura values(1, 10, 5);

insert into cartasx.hechizo values(1, 10);
/*

*/
insert into cartasx.carta(clase, nombre, descripcion, CostoOro, imagen)
values('luz', 'Hypericia', 'Magica Carta lapicera', 15, 'img/1.jpg');

insert into cartasx.jugable(idJugable, IdAmbiente, costoMana, habilidad, HabilidadEntorno)
values(2, 1, 15, 'HyperMorber', 'Destello critico');


insert into criatura(idCriatura, ataque, defensa) values(2, 10, 15);
insert into cartasx.hechizo values(2, 15);





--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


ALTER TABLE `cartasx`.`jugable`
ADD CONSTRAINT `fk_jCarta`
  FOREIGN KEY (`idJugable`)
  REFERENCES `cartasx`.`carta` (`idCarta`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cartasx`.`jugable`
ADD CONSTRAINT `fk_jAmbiente`
  FOREIGN KEY (`idAmbiente`)
  REFERENCES `cartasx`.`carta` (`idAmbiente`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


--^^^^^^^^^^^^^^

ALTER TABLE `cartasx`.`criatura`
ADD CONSTRAINT `fk_cJugable`
  FOREIGN KEY (`idcriatura`)
  REFERENCES `cartasx`.`jugable` (`idJugable`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `cartasx`.`hechizo`
ADD CONSTRAINT `fk_hJugable`
  FOREIGN KEY (`idHechizo`)
  REFERENCES `cartasx`.`jugable` (`idJugable`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
