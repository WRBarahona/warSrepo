#EL SIGUIENTE SCRIPT SIGUE LAS RECOMENDACIONES Y APORTACIONES DEL EQUIPO
#LA FINALIDAD DE ESTOS COMENTARIOS ES DIFERENCIAR LAS DISTINTAS VERSIONES CON CORRECCIONES
#VERSION 3.0
CREATE DATABASE db_solucionesTecnicas;
USE db_solucionesTecnicas;

#CREACION DE TABLAS 
#-------------------------
#TABLA ROL
CREATE TABLE rol(
idRol INT NOT NULL,
nivel varchar(30) NOT NULL,
estado INT DEFAULT 1
);

#-------------------------
#TABLA USUARIO
CREATE TABLE usuario(
idUsuario INT NOT NULL,
nombUsuario VARCHAR(30) NOT NULL UNIQUE,# Campo unico, El valor que reciba este campo no se podrá repetir en otro
pass VARCHAR(10) NOT NULL UNIQUE,#Campo unico, El valor que reciba este campo no se podrá repetir en otro
idRol INT NOT NULL,
estado INT DEFAULT 1
);

#-------------------------
#TABLA DEPARTAMENTOS
CREATE TABLE departamento(
idDepto INT NOT NULL,
nombDepto VARCHAR(30) NOT NULL
);

#-------------------------
#TABLA CLIENTE
CREATE TABLE cliente(
idCliente INT NOT NULL,
noCarnet INT NOT NULL,
idDepto INT NOT NULL,
nombre VARCHAR(30) NOT NULL,
tel VARCHAR(9) NOT NULL,
correo VARCHAR(30) NOT NULL,
idUsuario INT NOT NULL,
estado INT DEFAULT 1
);

#-------------------------
#TABLA TICKET
#NOTA: TICKET ES LA ÚNICA TABLA CUYA LLAVE PRIMARIA ES ASIGNADA DIRECTAMENTE ESTO ES POR EL ATRIBUTO DE AUTOINCREMENTO
CREATE TABLE ticket(
idTicket INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
fecha DATE NOT NULL,
Descrip VARCHAR(200) NOT NULL,
estado INT DEFAULT 1 #NOTA: ESTADO SI ES IGUAL A 1 ES ACTIVO Y 0 ES CERRADO POR DEFECTO AL INSERTAR SE ASIGNA 1.
);

#-------------------------
#TABLA TECNICO
CREATE TABLE tecnico(
idTecnico INT NOT NULL,
noCarnet INT NOT NULL,
nombre VARCHAR(30) NOT NULL,
Correo VARCHAR(30) NOT NULL,
tel VARCHAR(9) NOT NULL,
foto VARCHAR(100) NOT NULL,
idUsuario INT NOT NULL,
estado INT DEFAULT 1 #NOTA: ESTADO SI ES IGUAL A 1 ES DISPONIBLE Y 0 ES OCUPADO POR DEFECTO AL INSERTAR SE ASIGNA 1.
);

#-------------------------
#TABLA ASIGNACION
CREATE TABLE asignacion(
idTicket INT NOT NULL,
idTecnico INT NOT NULL
);

#-------------------------
#TABLA SOLUCIONTICKET
CREATE TABLE solucionTicket(
idTicket INT NOT NULL,
idTecnico INT NOT NULL,
fecha DATE NOT NULL,
categoria VARCHAR(30) NOT NULL,
parte VARCHAR(30) NOT NULL,
comentario VARCHAR(200) NOT NULL
);

#===========================================================================
#CREACION DE LLAVES PRIMARIAS 
#===========================================================================
#TABLA ROL
ALTER TABLE rol ADD CONSTRAINT pk_rol PRIMARY KEY(idRol);
#TABLA USUARIO
ALTER TABLE usuario ADD CONSTRAINT pk_usuario PRIMARY KEY(idUsuario);
#TABLA DEPARTAMENTO
ALTER TABLE departamento ADD CONSTRAINT pk_depto PRIMARY KEY(idDepto);
#TABLA CLIENTE
ALTER TABLE cliente ADD CONSTRAINT pk_cliente PRIMARY KEY(idCliente);
#TABLA TECNICO
ALTER TABLE tecnico ADD CONSTRAINT pk_tecnico PRIMARY KEY(idTecnico);
#TABLA ASIGNACION
ALTER TABLE asignacion ADD CONSTRAINT pk_asignacion PRIMARY KEY(idTicket, idTecnico);
#TABLA SOLUCION
ALTER TABLE solucionTicket ADD CONSTRAINT pk_solucionTicket PRIMARY KEY(idTicket, idTecnico);

#===========================================================================
#CREACION DE LLAVES FORENEAS
#===========================================================================
#LLAVE DE TABLA USUARIO A TABLA ROL
ALTER TABLE usuario ADD CONSTRAINT fk_usuario_rol FOREIGN KEY(idRol) REFERENCES rol(idRol);

#LLAVE DE TABLA CLIENTE A TABLA USUARIO
ALTER TABLE cliente ADD CONSTRAINT fk_cliente_usuario FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario);

#LLAVE DE TABLA CLIENTE A TABLA DEPARTAMENTO
ALTER TABLE cliente ADD CONSTRAINT fk_cliente_departamento FOREIGN KEY(idDepto) REFERENCES departamento(idDepto);

#LLAVE DE TABLA TICKET A TABLA CLIENTE
ALTER TABLE ticket ADD CONSTRAINT fk_ticket_cliente FOREIGN KEY(idCliente) REFERENCES cliente(idCliente);

#LLAVE DE TABLA TECNICO A TABLA USUARIO
ALTER TABLE tecnico ADD CONSTRAINT fk_tecnico_usuario FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario);

#LLAVE DE TABLA ASIGNACION A TABLA TECNICO
ALTER TABLE asignacion ADD CONSTRAINT fk_asignacion_tecnico FOREIGN KEY(idTecnico) REFERENCES tecnico(idTecnico);

#LLAVE DE TABLA SOLUCION A TABLA TECNICO
ALTER TABLE solucionTicket ADD CONSTRAINT fk_solucion_tecnico FOREIGN KEY(idTecnico) REFERENCES tecnico(idTecnico);