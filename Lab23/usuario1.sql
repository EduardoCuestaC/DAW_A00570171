BEGIN TRANSACTION PRUEBA1
INSERT INTO CLIENTE_BANCA VALUES('001', 'Manuel Rios Maldonado', 9000);
INSERT INTO CLIENTE_BANCA VALUES('002', 'Pablo Perez Ortiz', 5000);
INSERT INTO CLIENTE_BANCA VALUES('003', 'Luis Flores Alvarado', 8000);
COMMIT TRANSACTION PRUEBA1 

select * from cliente_banca

BEGIN TRANSACTION PRUEBA2
INSERT INTO CLIENTE_BANCA VALUES('004','Ricardo Rios Maldonado',19000); 
INSERT INTO CLIENTE_BANCA VALUES('005','Pablo Ortiz Arana',15000); 
INSERT INTO CLIENTE_BANCA VALUES('006','Luis Manuel Alvarado',18000);

ROLLBACK TRANSACTION PRUEBA2 

BEGIN TRANSACTION PRUEBA3
INSERT INTO TIPO_MOVIMIENTO VALUES('A','Retiro Cajero Automatico');
INSERT INTO TIPO_MOVIMIENTO VALUES('B','Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3


BEGIN TRANSACTION PRUEBA4
INSERT INTO MOVIMIENTO VALUES('001','A',GETDATE(),500);
UPDATE CLIENTE_BANCA SET SALDO = SALDO -500
WHERE NoCuenta='001'
COMMIT TRANSACTION PRUEBA4

select * from movimiento




BEGIN TRANSACTION PRUEBA5
INSERT INTO CLIENTE_BANCA VALUES('005','Rosa Ruiz Maldonado',9000);
INSERT INTO CLIENTE_BANCA VALUES('006','Luis Camino Ortiz',5000);
INSERT INTO CLIENTE_BANCA VALUES('001','Oscar Perez Alvarado',8000);

IF @@ERROR = 0
COMMIT TRANSACTION PRUEBA5
ELSE
BEGIN
PRINT 'A transaction needs to be rolled back'
ROLLBACK TRANSACTION PRUEBA5
END

IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'registar_retiro_cajero' AND type = 'P')
    DROP PROCEDURE registar_retiro_cajero
GO
CREATE PROCEDURE registar_retiro_cajero
    @uNoCuenta varchar(5),
    @uMonto numeric(10, 2)
AS
    BEGIN TRANSACTION rrct
	insert into Movimiento values(@uNoCuenta, 'A', CURRENT_TIMESTAMP, @uMonto)

	IF @@ERROR = 0
	COMMIT TRANSACTION rrct
	ELSE
	BEGIN
	PRINT 'A transaction needs to be rolled back'
	ROLLBACK TRANSACTION rrct
	END
GO

sp_help Movimiento

IF EXISTS (SELECT name FROM sysobjects 
            WHERE name = 'registar_deposito_ventanilla' AND type = 'P')
    DROP PROCEDURE registar_deposito_ventanilla
GO
CREATE PROCEDURE registar_deposito_ventanilla
    @uNoCuenta varchar(5),
    @uMonto numeric(10, 2)
AS
    BEGIN TRANSACTION rdvt
	insert into Movimiento values(@uNoCuenta, 'B', CURRENT_TIMESTAMP, @uMonto)

	IF @@ERROR = 0
	COMMIT TRANSACTION rdvt
	ELSE
	BEGIN
	PRINT 'A transaction needs to be rolled back'
	ROLLBACK TRANSACTION rdvt
	END
GO


execute registar_retiro_cajero '001', 500
execute registar_deposito_ventanilla'001', 500

