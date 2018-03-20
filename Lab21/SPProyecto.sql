IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'crearProyecto' AND type = 'P')
    DROP PROCEDURE crearProyecto
GO
CREATE PROCEDURE crearProyecto
    @unumero NUMERIC(5,0),
    @udenominacion VARCHAR(50)
AS
    INSERT INTO Proyecto VALUES(@unumero, @udenominacion)
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'modificarProyecto' AND type = 'P')
    DROP PROCEDURE modificarProyecto
GO
CREATE PROCEDURE modificarProyecto
    @unumero NUMERIC(5,0),
    @udenominacion VARCHAR(50)
AS
	update proyecto
	set denominacion = @udenominacion
	where numero = @unumero
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'eliminarProyecto' AND type = 'P')
    DROP PROCEDURE eliminarProyecto
GO
CREATE PROCEDURE eliminarProyecto
    @unumero NUMERIC(5,0)
AS
    delete from proyecto where numero = @unumero
GO
