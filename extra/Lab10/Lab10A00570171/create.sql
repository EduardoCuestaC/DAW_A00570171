create table Proveedor(
rfc char(13),
razonSocial varchar(50)
)

create table Entregan(
clave numeric(5),
rfc char(13),
numero numeric(5),
fecha datetime,
cantidad numeric(8, 2)
)
create table Material(
Clave numeric(5),
Descripcion varchar(50),
Costo numeric(8, 2)
)

create table Proyecto(
numero numeric(5),
denominacion varchar(50)
)