create table entrada(
  id int not null AUTO_INCREMENT,
  contenido varchar(50),
  mensaje varchar(25),
  fecha timestamp default CURRENT_TIMESTAMP,
  primary key (id)
)