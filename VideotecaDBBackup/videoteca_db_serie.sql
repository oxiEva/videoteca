create table serie
(
    id          int auto_increment
        primary key,
    name        varchar(255) not null,
    description longtext     not null,
    seasons     int          null
)
    collate = utf8mb4_unicode_ci;

