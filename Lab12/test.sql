insert into Material values(1000, 'xxx', 1000)

select * from Material

delete from Material where clave = 1000 and costo = 1000

alter table Material 
add constraint llaveMaterial primary key (clave)

alter table Proyecto
add constraint llaveProyecto primary key (numero)

alter table Proveedor
add constraint llaveProveedor primary key (rfc)

alter table Entregan
add constraint llaveEntregan primary key (fecha, clave, numero, rfc)

sp_helpconstraint Entregan

insert into Entregan values (0, 'xxx', 0, '1-jan-02', 0)
sp_help Entregan
select * from Entregan

delete from Entregan where clave = 0

alter table Entregan
add constraint fkentreganmateriales
foreign key (clave) references Material (clave)

alter table Entregan 
drop constraint fkentreganmateriales

sp_helpconstraint Entregan

insert into entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0)

select * from entregan

delete from entregan where cantidad=0