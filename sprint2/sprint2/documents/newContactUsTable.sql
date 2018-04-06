CREATE TABLE contact_us (
id int not null primary key auto_increment,
insertTime date,
firstName varchar(255),
lastName varchar(255),
phoneNumber varchar(255),
email varchar(255),
feedback varchar(255)
);