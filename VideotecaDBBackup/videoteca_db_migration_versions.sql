create table migration_versions
(
    version     varchar(14) not null
        primary key,
    executed_at datetime    not null comment '(DC2Type:datetime_immutable)'
)
    collate = utf8mb4_unicode_ci;

INSERT INTO videoteca_db.migration_versions (version, executed_at) VALUES ('20201020173024', '2020-10-20 17:34:36');
INSERT INTO videoteca_db.migration_versions (version, executed_at) VALUES ('20201024095718', '2020-10-24 09:57:34');
INSERT INTO videoteca_db.migration_versions (version, executed_at) VALUES ('20201025123135', '2020-10-25 12:32:10');
INSERT INTO videoteca_db.migration_versions (version, executed_at) VALUES ('20201108093056', '2020-11-08 09:33:11');
INSERT INTO videoteca_db.migration_versions (version, executed_at) VALUES ('20201108094418', '2020-11-08 09:45:07');