
#the unhashed admin password = adminpass and the normal password = normalpass
#use the unhashed versions when testing the authentication form so that they match the hash when run through the code
INSERT INTO user (username, userpass, email, creationdate, realname, userstatus)
VALUES ('adminTest', '$2y$10$GMqiMVQLeDaNCys3MowIdeJj1Bia4nnmHtf4k4o9V4egLMXjKbxZ2', 'adminTest@example.com', now(), 'Steve Admin Suehring', 'A'),
	   ('normalTest', '$2y$10$o1FaUz6bAnR4IFiJ/y8Y2.Lu4auPLJ6H2l/.Z.0n6aG1R1WnB/y0a', 'normalTest@example.com', now(), 'John Normal Doe', 'A');
	
INSERT INTO role (rolename)
VALUES ('administrator'),('normal');

INSERT INTO user2role (userid,roleid)
VALUES (1,1), (2,2);