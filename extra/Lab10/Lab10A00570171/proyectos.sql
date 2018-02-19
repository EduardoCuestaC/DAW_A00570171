BULK INSERT al570171.al570171.Proyecto
   FROM 'e:\wwwroot\al570171\proyectos.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
