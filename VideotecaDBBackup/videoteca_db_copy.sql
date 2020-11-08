create table copy
(
    id               int auto_increment
        primary key,
    vendor_id        int          not null,
    price            int          not null,
    language         varchar(255) null,
    status           varchar(255) null,
    date_of_sale     date         null,
    creation_date    date         not null,
    title            varchar(255) not null,
    original_film_id int          not null,
    constraint FK_4DBABB82F603EE73
        foreign key (vendor_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_4DBABB82F603EE73
    on copy (vendor_id);

INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (1, 2, 18, 'es', 'Perfect', '2020-10-24', '2020-10-04', 'Coco', 1);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (2, 8, 20, 'en', 'Perfect', '2020-10-24', '2020-10-07', 'Coco', 1);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (3, 8, 22, 'en', 'Perfect', null, '2020-10-23', 'Your Name', 6);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (4, 7, 20, 'English', 'New', null, '2020-10-17', 'Your Name', 6);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (5, 8, 17, 'English', 'Small stroke', null, '2020-10-18', 'Princess Mononoke', 3);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (6, 3, 9, 'English', 'Without box', null, '2020-10-13', 'Coco', 1);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (7, 3, 17, 'en', 'New', null, '2020-10-25', 'Joker', 4);
INSERT INTO videoteca_db.copy (id, vendor_id, price, language, status, date_of_sale, creation_date, title, film_id) VALUES (8, 2, 25, 'en', 'Perfect', null, '2020-11-01', 'Grave of the Fireflies', 9);