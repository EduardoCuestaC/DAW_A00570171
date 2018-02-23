if exists(select * from INFORMATION_SCHEMA.TABLES where TABLE_NAME = 'Material')
	drop table Material
create table Material(
	clave numeric(5) not null,
	descripcion varchar(50), 
	costo numeric(8, 2)
)

if exists(select * from INFORMATION_SCHEMA.TABLES where TABLE_NAME = 'Proveedor')
	drop table Proveedor
create table Proveedor(
	rfc char(13) not null,
	razonSocial varchar(50)
)

if exists(select * from INFORMATION_SCHEMA.TABLES where TABLE_NAME = 'Proyecto')
	drop table Proyecto
create table Proyecto(
	numero numeric(5) not null,
	denominacion varchar(50)
)

if exists(select * from INFORMATION_SCHEMA.TABLES where TABLE_NAME = 'Entregan')
	drop table Entregan
create table Entregan(
	clave numeric(5) not null,
	rfc char(13) not null,
	numero numeric(5) not null,
	fecha dateTime not null,
	cantidad numeric(8, 2)
)


bulk insert al570171.al570171.Material
from 'e:\wwwroot\al570171\materiales.csv'
with(
	codepage = 'ACP',
	fieldterminator = ',',
	rowterminator = '\n'
)

bulk insert al570171.al570171.Proyecto
from 'e:\wwwroot\al570171\proyectos.csv'
with(
	codepage = 'ACP',
	fieldterminator = ',',
	rowterminator = '\n'
)

bulk insert al570171.al570171.Proveedor
from 'e:\wwwroot\al570171\proveedores.csv'
with(
	codepage = 'ACP',
	fieldterminator = ',',
	rowterminator = '\n'
)
set dateformat dmy
bulk insert al570171.al570171.Entregan
from 'e:\wwwroot\al570171\entregan.csv'
with(
	codepage = 'ACP',
	fieldterminator = ',',
	rowterminator = '\n'
)