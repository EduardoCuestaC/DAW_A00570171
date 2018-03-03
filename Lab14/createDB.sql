create table Usuario(
    username varchar(50) not null,
    password varchar(50),
    nombre varchar(50),
    apaterno varchar(50),
    amaterno varchar(50),
    primary key (username)
);

create table Nota(
    id int not null AUTO_INCREMENT primary key,
    username varchar(50) not null,
    content varchar(100),
    foreign key (username) references Usuario(username)
);

insert into Usuario values ('juanlp', '123', 'JUAN', 'LOPEZ', 'PEREZ');
insert into Usuario values ('pedropp', '456', 'PEDRO', 'PEREZ', 'PEDROZA');
insert into Nota (username, content) values ('juanlp', 'nota1');
insert into Nota (username, content) values ('juanlp', 'nota2');
insert into Nota (username, content) values ('pedropp', 'nota3');
insert into Nota (username, content) values ('pedropp', 'nota4');