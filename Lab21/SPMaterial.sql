IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'crearMaterial' AND type = 'P')
    DROP PROCEDURE crearMaterial
GO
            
CREATE PROCEDURE crearMaterial
    @uclave NUMERIC(5,0),
    @udescripcion VARCHAR(50),
    @ucosto NUMERIC(8,2),
    @uimpuesto NUMERIC(6,2)
AS
    INSERT INTO Material VALUES(@uclave, @udescripcion, @ucosto, @uimpuesto)
GO

IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'modificarMaterial' AND type = 'P')
    DROP PROCEDURE modificarMaterial
GO
            
CREATE PROCEDURE modificarMaterial
    @uclave NUMERIC(5,0),
    @udescripcion VARCHAR(50),
    @ucosto NUMERIC(8,2),
    @uimpuesto NUMERIC(6,2)
AS
    update Material
	set descripcion = @udescripcion,
	costo = @ucosto,
	porcentajeImpuesto =  @uimpuesto
	where @uclave = clave
GO

IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'eliminarMaterial' AND type = 'P')
    DROP PROCEDURE eliminarMaterial
GO
            
CREATE PROCEDURE eliminarMaterial
    @uclave NUMERIC(5,0)
AS
    delete from Material where clave = @uclave
GO