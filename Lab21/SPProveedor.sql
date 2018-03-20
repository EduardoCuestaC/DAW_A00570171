IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'crearProveedor' AND type = 'P')
    DROP PROCEDURE crearProveedor
GO
CREATE PROCEDURE crearProveedor
    @urfc CHAR(13),
    @urazonsocial VARCHAR(50)
AS
    INSERT INTO Proveedor VALUES(@urfc, @urazonsocial)
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'modificarProveedor' AND type = 'P')
    DROP PROCEDURE modificarProveedor
GO
CREATE PROCEDURE modificarProveedor
    @urfc CHAR(13),
    @urazonsocial VARCHAR(50)
AS
	update Proveedor
	set razonSocial = @urazonsocial
	where rfc = @urfc
GO


IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'eliminarProveedor' AND type = 'P')
    DROP PROCEDURE eliminarProveedor
GO
CREATE PROCEDURE eliminarProveedor
    @urfc CHAR(13)
AS
    delete from Proveedor where rfc = @urfc
GO
