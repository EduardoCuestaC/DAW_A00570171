set dateformat dmy
select sum(cantidad) as 'número de entregas', 
sum(cantidad*costo*(1+porcentajeImpuesto/100)) as 'importe total de entregas'
from entregan e, material m
where e.fecha between '01-01-97' and '31-12-97'
and e.clave = m.clave
group by e.clave

select razonSocial as 'razón social', 
count(e.rfc) as 'número de entregas',
sum(cantidad*costo*(1+porcentajeImpuesto/100)) as 'importe de entregas'
from proveedor p, entregan e, material m
where p.rfc = e.rfc and m.clave = e.clave
group by razonSocial

select e.clave, descripcion,
count(e.clave) as 'número de entregas',
min(cantidad) as 'cantidad mínima entregada',
max(cantidad) as 'cantidad máxima entregada'
from material m, entregan e
where m.clave = e.clave
group by e.clave, descripcion
having avg(cantidad) > 400


select a.srfc as 'rfc', razonSocial as 'razón social',
 a.sclave as 'clave', descripcion as 'descripción',
 a.savg as 'promedio de entregas'
from proveedor p, material m,
(select e.rfc as 'srfc', 
avg(cantidad) as 'savg',
e.clave as 'sclave'
from material m, entregan e, proveedor p
group by e.rfc, e.clave
having avg(cantidad) < 500) as a
where p.rfc = a.srfc
and a.sclave = m.clave
order by p.rfc asc

(select a.srfc as 'rfc', razonSocial as 'razón social',
 a.sclave as 'clave', descripcion as 'descripción',
 a.savg as 'promedio de entregas'
from proveedor p, material m,
(select e.rfc as 'srfc', 
avg(cantidad) as 'savg',
e.clave as 'sclave'
from material m, entregan e, proveedor p
group by e.rfc, e.clave
having avg(cantidad) < 370) as a
where p.rfc = a.srfc
and a.sclave = m.clave
)
union
(select a.srfc as 'rfc', razonSocial as 'razón social',
 a.sclave as 'clave', descripcion as 'descripción',
 a.savg as 'promedio de entregas'
from proveedor p, material m,
(select e.rfc as 'srfc', 
avg(cantidad) as 'savg',
e.clave as 'sclave'
from material m, entregan e, proveedor p
group by e.rfc, e.clave
having avg(cantidad) > 450) as a
where p.rfc = a.srfc
and a.sclave = m.clave
)


sp_help material
select * from material
insert into material values (1440, 'Pintura D 1030', 200, 2.8);
insert into material values (1450, 'Pintura D 1040', 250, 2.84);
insert into material values (1460, 'Pintura C 1013', 125, 2.7);
insert into material values (1470, 'Pintura B 1023', 125, 2.7);

select clave, descripcion
from material
where clave not in (select clave from entregan)

select distinct clave from entregan

select distinct razonSocial as 'razón social'
from proveedor p, entregan e, proyecto py
where denominacion = 'Vamos Mexico' or denominacion = 'Queretaro Limpio'
and e.numero = py.numero
and e.rfc = p.rfc

select * from proyecto

select distinct descripcion
from material
where clave not in (
select e.clave
from entregan e, proyecto py
where denominacion = 'CIT Yucatan'
and e.numero = py.numero
)

select razonSocial as 'razon social', avg(cantidad) as 'promedio de entregas'
from proveedor p, entregan e
where p.rfc = e.rfc
group by razonSocial
having avg(cantidad)>(
select avg(cantidad)
from entregan
where rfc = 'VAGO780901'
group by rfc
)


set dateformat ymd
select distinct p.rfc, razonSocial
from proveedor p, proyecto py, entregan e, 
(select sum(cantidad) as 'c0', rfc
from entregan
where fecha between '00-01-01' and '00-12-31'
group by rfc) cca,
(select sum(cantidad) as 'c1', rfc
from entregan
where fecha between '01-01-01' and '01-12-31'
group by rfc) ccb
where denominacion = 'Infonavit Durango'
and py.numero = e.numero
and e.rfc = cca.rfc
and e.rfc = ccb.rfc
and cca.c0 > ccb.c1
and e.rfc = p.rfc
