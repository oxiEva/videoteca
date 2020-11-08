create table user
(
    id       int auto_increment
        primary key,
    email    varchar(180) not null,
    roles    json         not null,
    password varchar(255) not null,
    username varchar(255) not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email),
    constraint UNIQ_8D93D649F85E0677
        unique (username)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (1, 'lover@filmin.cat', '[]', 'string', 'lover');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (2, 'oxieva@filmin.cat', '[]', 'string', 'oxieva');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (3, 'rosca@filmin.cat', '[]', 'string', 'rosca');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (4, 'prusti@filmin.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$eThVOGNWdHc2MW1JclpEUw$3UcDAz7HuvJHu549fpa6QD9hXFocfGMLHcTF/5WViis', 'prusti');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (5, 'hater@filmin.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dGdUOFpNaEZ3QnJZU1IzeQ$dzzntO6jgZH0b2197NRd2iz5SVVBLgmYFBiKatMn8Rg', 'hater');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (6, 'zoitu@cat.cat', '[]', 'zoitul', 'zoitu');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (7, 'cloita@correu.cat', '[]', 'cloita', 'Cloe');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (8, 'buuu@email.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Und0THgzS3V3eGZBbHFKMA$V4cx9JJc7uwzlp6cjiuzfJ6DbHxupzbfXc0CtsvdEKA', 'Buuu');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (9, 'buuu@filmin.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$U2FQU2R1RWtLQlpob214MA$+5aLdHMQwDj+zOebESSNaarvRIyRSNfPFgTUsxgoOl8', 'BuuuTheDog');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (10, 'test@film.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dnM5dHVvdUJRWlFPUmkvYw$pk+Is4EKXh3Ync5aaivMKbJ1aA/Jxs503HOQcllINbc', 'test');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (11, 'testing@film.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Wm9Oa05iajNyMGZEc0ZSQg$McIS02z75YcZ37SrEMeGbfx8gzF/uKHyyEdgCQmNLRY', 'localhost');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (12, 'mail@film.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QnhNR25HN0txZGJYeFcvMg$khVRAjIQ/k5Vz4JPdznf2wXv4eZKZPqkto6xXexybuQ', 'Mailer');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (13, 'mail2@film.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$YVZaVUpvcUYyYUtmY1AvMA$apnjwYeQNPjjsYgQTGEozeCVDDR535BeSzFaz4KkuX8', 'My second mail ;)');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (14, 'mail3@film.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$c240N1VUbkVadmNQRE10eg$KrssjDSPKnLg6HflbeudUXL93bKWorJg7/szhk6OZt8', 'Spoiler');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (15, 'template@mail.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dHZ3S0hnam9ocnY5UEx1Zg$i1WjyuSk8kP4b6hA2Q2Oe751ayJzlW/gbCRmTmphj9A', 'Template');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (16, 'newTemplate@gmail.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WHlDU3U1LkxqSXViN3o4Rg$Kse4nX4yRE4mbp+/PPxHprmpcQ7Uraj2w0GSbZE2Y0E', 'Paraiso');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (17, 'dynameicMail@dynameic.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WEhRTVJvbktKczUva1NIeA$GMppFgL/SIfpgVLeFMz8fTlLgqhK0IxnMWiYv26z8k0', 'dynamic');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (18, 'myName@test.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$LnJXZWIxWkZuekVHNEdmWg$tEPjx2s6OtQmr3zGRXN+LohmBQA15Gv+ji/Xr6p5vEY', 'My name');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (19, 'propEmail@user.caty', '[]', '$argon2id$v=19$m=65536,t=4,p=1$cEFlWmd0TzR2dWROLkR5NA$1ZsvTQBm+DMhYwaGER0pwT1e+GzQlst9fRxfoV+6x0M', 'Props');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (20, 'markdown@email.cat', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WnVxTC5NSHFZeC5MQkdlUg$5YDNQXjALln7k5LUV4qfTntcKMPWTwlIIPk5jSD8NNE', 'Markdown');
INSERT INTO videoteca_db.user (id, email, roles, password, username) VALUES (21, 'myMail@cat.es', '[]', 'mininem78', 'update');