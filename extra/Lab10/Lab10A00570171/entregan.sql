SET DATEFORMAT dmy

BULK INSERT al570171.al570171.Entregan
   FROM 'e:\wwwroot\al570171\entregan.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
