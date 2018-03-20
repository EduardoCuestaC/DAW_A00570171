

EXECUTE crearMaterial 5000,'Martillos Acme',250,15 

select * from Material where clave = 5000

execute crearMaterial 5001, 'prueba', 100, 15
select *  from material
execute modificarMaterial 5001, 'modificado', 101, 16
select * from material where clave = 5001

execute eliminarMaterial 5001

select * from material


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'queryMaterial' AND type = 'P')
    DROP PROCEDURE queryMaterial
GO                       
CREATE PROCEDURE queryMaterial
    @udescripcion VARCHAR(50),
    @ucosto NUMERIC(8,2)
                            
AS
    SELECT * FROM Material WHERE descripcion 
    LIKE '%'+@udescripcion+'%' AND costo > @ucosto 
GO

EXECUTE queryMaterial 'Lad',20



