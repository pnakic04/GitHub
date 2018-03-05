

drop database if exists team;
create database team character set utf8;

use team;

create table igraci(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
prezime varchar(50) not null,
br_registracije varchar(8) not null,
email varchar(50) not null,
datum_rodjenja datetime not null,
pozicija varchar(50) not null
); 




insert into igraci(sifra,ime, prezime, br_registracije, email, datum_rodjenja, pozicija) values 
(null,'Ivan', 'Horvat', '12345678', 'ihorvat@zns.hr', '1985-22-10', 'Branič'),
(null,'Antun', 'Marić', '33432213', 'amaric@zns.hr', '1989-12-11', 'Napadač'),
(null,'Marko', 'Perić', '99965556', 'mperic@zns.hr', '1994-07-01', 'Vezni'),
(null,'Ante', 'Mirić', '00001112', 'amiric@zns.hr', '1993-13-10', 'Napadač'),
(null,'Karlo', 'Ivić', '23456678', 'kivic@zns.hr', '1992-12-10', 'Branič'),
(null,'Miro', 'Ćerić', '44454442', 'mceric@zns.hr', '1995-05-11', 'Napadač'),
(null,'Ivo', 'Andrić', '23456789', 'iandric@zns.hr', '1985-05-10', 'Branič');




