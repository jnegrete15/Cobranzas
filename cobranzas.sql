DROP DATABASE cobranzas;

CREATE DATABASE `cobranzas` CHARACTER SET 'UTF8' COLLATE 'utf8_spanish_ci';


USE cobranzas;



DROP TABLE IF EXISTS `propietarios`;

CREATE TABLE `propietarios` (
  
	`usuario` int(11) NOT NULL,

	`password` varchar(50) NOT NULL,
  
	`correo` varchar(50) NOT NULL,
  
	PRIMARY KEY (`usuario`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



insert  into `propietarios`(`usuario`,`password`,`correo`)
values ('1234554321','qweRty789','admin@ucol.mx');




DROP TABLE IF EXISTS `deudores`;

CREATE TABLE `deudores` (
  
	`idDeudor` int(11) NOT NULL AUTO_INCREMENT,
  
	`nombre` varchar(50) NOT NULL,
  
	`telefono` varchar(10) NOT NULL,
  
	`correo` varchar(50) NOT NULL,
  
	`password` varchar(100) NOT NULL,
  
	`deudaTotal` double,
  PRIMARY KEY (`idDeudor`)
  
)ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS `deudas`;

CREATE TABLE `deudas` (
  
	`idDeuda` int(11) NOT NULL AUTO_INCREMENT,
  
	`idDeudor` int(11) NOT NULL,
  
	`monto` double NOT NULL,
  
	`fecha` datetime NOT NULL,
  
	`concepto` varchar(50) NOT NULL,
  
	`adeudo` double NOT NULL,
  
	`estadoDeuda` varchar(50) NOT NULL,
  
	PRIMARY KEY (`idDeuda`),
  
	KEY `idDeudor` (`idDeudor`),
  
	CONSTRAINT `deudores_ibfk_1` FOREIGN KEY (`idDeudor`) REFERENCES `deudores` (`idDeudor`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  
	`idPago` int(11) NOT NULL AUTO_INCREMENT,
  
	`idDeuda` int(11) NOT NULL,
  
	`idDeudor` int(11) NOT NULL,
  
	`monto` double NOT NULL,
  
	`fecha` datetime NOT NULL,
  
	PRIMARY KEY (`idPago`),
  
	KEY `idDeudor` (`idDeudor`),
  
	CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idDeuda`) REFERENCES `deudas` (`idDeuda`),
  
	CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idDeudor`) REFERENCES `deudores` (`idDeudor`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;





#__________________________________________________________________________________________________________________


DROP TRIGGER IF EXISTS nuevaDeuda;

DELIMITER //

CREATE TRIGGER nuevaDeuda AFTER INSERT ON deudas
  
FOR EACH ROW 

	BEGIN
        
		UPDATE deudores SET deudores.deudaTotal = deudores.deudaTotal + new.monto WHERE deudores.idDeudor = NEW.idDeudor;
	
END//
DELIMITER ;


#___________________________________________________________________________________________________________

DROP TRIGGER IF EXISTS nuevoPago;

DELIMITER //

CREATE TRIGGER nuevoPago AFTER INSERT ON pagos
  
FOR EACH ROW 
 
	BEGIN
 
   
	   UPDATE deudores SET deudores.deudaTotal = deudores.deudaTotal - new.monto WHERE deudores.idDeudor = NEW.idDeudor;
    
           UPDATE deudas SET deudas.adeudo = deudas.adeudo - new.monto WHERE deudas.idDeuda = NEW.idDeuda;
	
    
	   UPDATE deudas SET estadoDeuda = 'PAGADO' WHERE deudas.idDeuda = new.idDeuda AND adeudo = 0;

	END//

DELIMITER ;

#___________________________________________________________________________________________________________
				
				
