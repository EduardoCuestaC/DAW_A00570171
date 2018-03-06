(select * from entregan where clave=1030)
union
(select * from entregan where clave=1300)

select *
from entregan where clave != 1000

select * from entregan
where clave=1300 or clave=1030

sp_help material

set dateformat dmy
select distinct descripcion 
from material m, entregan e
where m.clave = e.clave and e.fecha 
between '01/01/00' and '31/12/00'

select p.numero, denominacion, fecha, cantidad
from proyecto p, entregan e
order by p.numero asc, fecha asc

select *
from Material
where descripcion like 'SI'


DECLARE @foo varchar(40); 
DECLARE @bar varchar(40); 
SET @foo = '¿Que resultado'; 
SET @bar = ' ¿¿¿??? ' 
SET @foo += ' obtienes?'; 
PRINT @foo + @bar; 


SELECT RFC FROM Entregan WHERE RFC LIKE '[A-D]%'; 
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%'; 
SELECT Numero FROM Entregan WHERE Numero LIKE '___6'; 

-- all tr sitodc, any, some or num op subq

SELECT RFC,Cantidad, Fecha,Numero 
FROM Entregan 
WHERE Numero Between 5000 and 5010 AND 
Exists ( SELECT RFC 
FROM Proveedor
WHERE RazonSocial LIKE 'La%' and Entregan.RFC = Proveedor.RFC)

--in hasparam

SELECT RFC,Cantidad, Fecha,Numero 
FROM Entregan 
WHERE Numero Between 5000 and 5010 AND 
rfc in ( SELECT RFC 
FROM Proveedor
WHERE RazonSocial LIKE 'La%' and Entregan.RFC = Proveedor.RFC)

SELECT RFC,Cantidad, Fecha,Numero 
FROM Entregan 
WHERE Numero Between 5000 and 5010 AND 
rfc not in ( SELECT RFC 
FROM Proveedor
WHERE RazonSocial not LIKE 'La%' and Entregan.RFC = Proveedor.RFC)

select cantidad 
from entregan
where clave = all (
select clave
from entregan
where clave = 1000 or clave = 1010)

select * from entregan

SELECT TOP 2 * FROM Proyecto 

SELECT TOP Numero FROM Proyecto

alter table Material add porcentajeImpuesto numeric (6, 2)

update Material set porcentajeImpuesto  = 2*clave/1000

select * from Material

select descripcion as 'material', sum(e.cantidad)*costo*(1+porcentajeImpuesto/100) as 'total'
from entregan e, material m
where e.clave = m.clave
group by costo, porcentajeImpuesto, descripcion


-- vistas ----------------------------------

create view dt
as 
select descripcion as 'material', sum(e.cantidad)*costo*(1+porcentajeImpuesto/100) as 'total'
from entregan e, material m
where e.clave = m.clave
group by costo, porcentajeImpuesto, descripcion
select * from dt

--

create view dtprovla (d1, d2, d3, d4)
as (
SELECT RFC,Cantidad, Fecha,Numero 
FROM Entregan 
WHERE Numero Between 5000 and 5010 AND 
rfc not in ( SELECT RFC 
FROM Proveedor
WHERE RazonSocial not LIKE 'La%' and Entregan.RFC = Proveedor.RFC)
)
select * from dtprovla

--
set dateformat dmy
create view materialesEntregados2000 (nombre_del_material)
as (
select distinct descripcion 
from material m, entregan e
where m.clave = e.clave and e.fecha 
between '01/01/00' and '31/12/00'
)
select * from materialesEntregados2000

--

create view rfcInitNotA (rfc_sin_A_inicio)
as
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%'; 

select * from rfcInitNotA

--
create view datos1300_1030 (clave_material, rfc_proveedor, numero_proyecto, fecha_entrega, cantidad_entrega)
as
select * from entregan
where clave=1300 or clave=1030

select * from datos1300_1030

-- fin de vistas


--ejercicios de consultas -------
select m.clave, descripcion
from material m, proyecto p, entregan e
where m.clave = e.clave and e.numero = p.numero 
and p.denominacion = 'Mexico sin ti no estamos completos'

select m.clave, descripcion
from material m, entregan e, proveedor pr
where m.clave = e.clave and pr.rfc = e.rfc
and pr.razonSocial = 'Acme tools'

select rfc
from entregan
where fecha between '01/01/00' and '31/12/00'
group by rfc
having avg(cantidad)>=300

select descripcion, sum(cantidad) as 'total entregas'
from entregan e, material m
where e.clave = m.clave and fecha between '01/01/00' and '31/12/00'
group by descripcion

select top 1 clave
from entregan 
where fecha between '01/01/01' and '31/12/01'
group by clave
order by sum(cantidad) desc

select descripcion
from material
where descripcion like '%ub%'



select denominacion, sum(costo*cantidad*(1+porcentajeImpuesto/100)) as 'total a pagar'
from material m, entregan e, proyecto p
where e.clave = m.clave and e.numero = p.numero
group by denominacion

drop view b
drop view a

create view a as
select rfc as rfca
from proyecto p, entregan e
where denominacion != 'Educando en coahuila'
and e.numero = p.numero

create view b as
select rfc as rfcb
from proyecto p, entregan e
where denominacion = 'Televisa en acción'
and e.numero = p.numero

select distinct p.rfc, razonSocInvestigación 2ial
from a, b, proveedor p
where rfca = rfcb
and rfca = p.rfc


select distinct denominacion, p.rfc, razonSocial
from proveedor p, entregan e, proyecto py
where denominacion = 'Televisa en acción'
and py.numero = e.numero 
and e.rfc not in (select rfc
from entregan e, proyecto py
where denominacion = 'Educando en coahuila'
and py.numero = e.numero)
and e.rfc = p.rfc


select costo, descripcion
from material m, entregan e, proyecto py
where denominacion = 'Televisa en accion'
and py.numero = e.numero
and e.rfc not in (select rfc
from entregan e, proyecto py
where denominacion != 'Educando en coahuila'
and py.numero = e.numero)
and e.clave = m.clave

drop view s

create view s as
select count(cantidad) as countc, sum(cantidad) as sumc, e.clave as clave
from material m, entregan e
where e.clave = m.clave
group by e.clave

select descripcion, countc, sumc*costo*(1+porcentajeImpuesto/100) as 'total'
from s, material 
where s.clave = material.clave
order by descripcion asc

select descripcion, count(cantidad) as 'cantidad de entregas', sum(cantidad*costo*(1+porcentajeImpuesto/100)) 'costo total'
from material m, entregan e
where m.clave = e.clave
group by descripcion