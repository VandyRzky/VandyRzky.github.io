create table kamera(
id int(5) not null,
nama varchar(255) not null,
deskripsi varchar(255) not null,
foto varchar(255) not null,
primary key(id)
)auto_increment = 10;

alter table kamera modify id int (5) not null auto_increment, auto_increment=10;