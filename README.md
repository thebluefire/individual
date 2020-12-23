# symfony-individual


# db creation

create database my_db;
use my_db;
create table book(
id int not null AUTO_INCREMENT primary key,
name nvarchar(255) not null,
price int null, 
genre_id int null
);
create table genre(
id int not null AUTO_INCREMENT primary key,
name nvarchar(255) not null
);
