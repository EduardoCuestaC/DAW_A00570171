BULK INSERT al570171.al570171.Material
   FROM 'e:\wwwroot\al570171\materiales.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
