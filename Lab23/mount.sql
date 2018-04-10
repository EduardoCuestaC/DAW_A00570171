if exists(select * from INFORMATION_SCHEMA.TABLES 
	where TABLE_NAME = 'Cliente_banca')
	drop table Cliente_banca
create table Cliente_banca(
	noCuenta varchar(5) not null,
	nombre varchar(30),
	saldo numeric(10, 2),
	constraint pk_cliente_banca primary key (noCuenta)
)

if exists(select * from INFORMATION_SCHEMA.TABLES 
	where TABLE_NAME = 'Tipo_movimiento')
	drop table Tipo_movimiento
create table Tipo_movimiento(
	claveM varchar(2) not null,
	descripcion varchar(30),
	constraint pk_tipo_movimiento primary key (claveM)
)

if exists(select * from INFORMATION_SCHEMA.TABLES 
	where TABLE_NAME = 'Movimiento')
	drop table Movimiento
create table Movimiento(
	noCuenta varchar(5) not null,
	claveM varchar(2) not null,
	fecha datetime,
	monto numeric(10, 2),
	constraint fk_movimiento_cliente_banca foreign key (noCuenta) references cliente_banca (noCuenta),
	constraint fk_movimiento_tipo_movimiento foreign key (claveM) references tipo_movimiento (claveM),
	constraint pk_movimiento primary key (noCuenta, claveM, fecha, monto)

)


