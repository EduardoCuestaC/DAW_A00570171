BULK INSERT al570171.al570171.Proveedor
   FROM 'e:\wwwroot\al570171\proveedores.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
