insert into Material values(1000, 'xxx', 1000)

select * from Material

delete from Material where clave = 1000 and costo = 1000

alter table Material 
add constraint llaveMaterial primary key (clave)

sp_helpconstraint Material