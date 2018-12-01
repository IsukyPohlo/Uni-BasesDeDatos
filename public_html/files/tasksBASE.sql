CREATE TABLE P01_Usuarios (
idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
contra VARCHAR(20) NOT NULL,
nombre VARCHAR (25) NOT NULL, ap_Paterno VARCHAR(30) NOT NULL, ap_Materno VARCHAR (30) NOT NULL,
email VARCHAR (20) NOT NULL
);


CREATE TABLE P01_Login (
idLogin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
idUsuario INT NOT NULL,
fechaSesion TIMESTAMP,
FOREIGN KEY (idUsuario) REFERENCES P01_Usuarios (idUsuario)
 );

CREATE  TABLE P01_Operadores (
idOper INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idUsuario INT,
FOREIGN KEY (idUsuario) REFERENCES P01_Usuarios (idUsuario)
);

CREATE  TABLE P01_Ajustadores (
idAjust INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idUsuario INT,
FOREIGN  KEY (idUsuario) REFERENCES P01_Usuarios (idUsuario)
);

CREATE TABLE P01_Clientes (
idCliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR (30), ap_Paterno VARCHAR(30), ap_Materno VARCHAR(30), email VARCHAR (25), tel INT
);

CREATE TABLE P01_Vehiculos (
idVehiculo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
modelo VARCHAR(15),
PLACAS vARCHAR(10)
);

CREATE TABLE P01_Conduce (
idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idVehiculo INT,
idAjust INT,
fechaInicio DATETIME,
fechaFin DATETIME,
FOREIGN KEY (idVehiculo) REFERENCES P01_Vehiculos (idVehiculo),
FOREIGN KEY (idAjust) REFERENCES P01_Ajustadores (idAjust)
);

CREATE TABLE P01_Ubicacion (
idUbicacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idVehiculo INT,
km INT,
fecha DATETIME,
altitud DECIMAL (10,6),
longitud DECIMAL(10,6),
FOREIGN KEY (idVehiculo) REFERENCES P01_Vehiculos (idVehiculo)
);
CREATE TABLE P01_Siniestros (
idSiniestro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idOper INT,
idAjust INT,
idCliente INT, 
estado VARCHAR(20),
municipio VARCHAR (20),
colonia VARCHAR (20),
calle VARCHAR(20), 
fecha DATETIME,
FOREIGN KEY (idOper) REFERENCES P01_Operadores (idOper),
FOREIGN KEY (idAjust) REFERENCES P01_Ajustadores (idAjust),
FOREIGN KEY (idCliente) REFERENCES P01_Clientes (idCliente)
);

