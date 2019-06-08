#Inserción de datos en tablas comunes

use db_solucionesTecnicas;

#Tabla Rol
select * from rol;
insert into rol (idRol, nivel, estado) values(1,'cliente',default);
insert into rol (idRol, nivel, estado) values(2,'tecnico',default);
insert into rol (idRol, nivel, estado) values(3,'admin',default);

#Tabla de usuarios
select * from usuario;
#Usuarios con nivel de tecnico
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (1,'Roberto Dimas','135718',2,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (2,'William Barahona','033218',2,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (3,'Nelson Urrutia','219118',2,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (4,'Mario Valdez','138918',2,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (5,'Mariano Arce','198418',2,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (6,'Rafael Jurado','124578',2,default);
#Usuarios nivel de cliente
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (7,'Carla Hernandez','100100',1,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (8,'Pedro Paramo','200200',1,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (9,'Cornelio Suarez','300300',1,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (10,'Margarita Montalvo','400400',1,default);
#Usuarios nivel administrador
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (11,'RAFD','000001',3,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (12,'WARB','000002',3,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (13,'NEUM','000003',3,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (14,'JMARM','000004',3,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (15,'RJG','000005',3,default);
INSERT INTO `usuario`(`idUsuario`, `nombUsuario`, `pass`, `idRol`, `estado`) VALUES (16,'MJVH','000006',3,default);

#Tabla de departamentos
select * from departamento;
INSERT INTO `departamento`(`idDepto`, `nombDepto`) VALUES (1,'RRHH');
INSERT INTO `departamento`(`idDepto`, `nombDepto`) VALUES (2,'Contaduria');
INSERT INTO `departamento`(`idDepto`, `nombDepto`) VALUES (3,'Compras y suministros');
INSERT INTO `departamento`(`idDepto`, `nombDepto`) VALUES (4,'Otros');

#Tabla de clientes
INSERT INTO cliente values(1,100100,1,'Carla Hernandez','2356-8974','carhern@gmail.com',7,default);
INSERT INTO cliente values(2,200200,2,'Pedro Paramo','2254-4444','pedropar@gmail.com',8,default);
INSERT INTO cliente values(3,300300,3,'Cornelio Suarez','2257-7778','corsuarez@gmail.com',9,default);
INSERT INTO cliente values(4,400400,4,'Margarita Montalvo','2678-9878','margritamotal@gmail.com',10,default);



