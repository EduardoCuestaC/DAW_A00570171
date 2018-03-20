IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'crearEntrega' AND type = 'P')
    DROP PROCEDURE crearEntrega
GO
CREATE PROCEDURE crearEntrega
    @uclave NUMERIC(5,0),
    @urfc CHAR(13),
	@unumero NUMERIC(5,0),
	@ufecha datetime,
	@ucantidad NUMERIC(5,0)
AS
    INSERT INTO Entregan VALUES(@uclave, @urfc, @unumero, @ufecha, @ucantidad)
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'modificarEntrega' AND type = 'P')
    DROP PROCEDURE modificarEntrega
GO
CREATE PROCEDURE modificarEntrega
    @uclave NUMERIC(5,0),
    @urfc CHAR(13),
	@unumero NUMERIC(5,0),
	@ufecha datetime,
	@ucantidad NUMERIC(5,0)
AS
	update Entregan
	set cantidad = @ucantidad
	where 
	clave = @uclave and
	rfc = @urfc and
	numero = @unumero and
	fecha = @ufecha
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'eliminarEntrega' AND type = 'P')
    DROP PROCEDURE eliminarEntrega
GO
CREATE PROCEDURE eliminarEntrega
    @uclave NUMERIC(5,0),
    @urfc CHAR(13),
	@unumero NUMERIC(5,0),
	@ufecha datetime,
	@ucantidad NUMERIC(5,0)
AS
    delete from Entregan where 
	clave = @uclave and
	rfc = @urfc and
	numero = @unumero and
	fecha = @ufecha
GO
