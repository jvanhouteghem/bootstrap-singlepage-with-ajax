drop table quoala;
create table quoala (id SERIAL, espece varchar(25), pays varchar(25), lastdate datetime, info varchar(255));

insert into quoala (espece, pays, lastdate, info) values ('Koala Breton', 'France', current_timestamp(), 'Le koala Breton mange des kouign amann et aime regarder la mer.');
insert into quoala (espece, pays, lastdate, info) values ('Koala Parisien', 'France', current_timestamp(), 'Le koala Parisien aime faire des brunch et respirer la pollution.');
insert into quoala (espece, pays, lastdate, info) values ('Koala Chti', 'France', current_timestamp(), 'Le koala Chti aime passer du temps avec sa soeur et regarder les films de Danny Boon.');

select * from quoala