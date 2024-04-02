create database project;
use project;
create table lang (
	lang_name varchar(10) primary key
);
insert into lang values('vi');
insert into lang values('fr');
insert into account values('ptntho', 'alo');
create table account(
	user_id varchar(50) primary key,
    passwd varchar(50) not null
);
insert into account values('admin', 'admin');
insert into account values('ptntho', 'alo');
insert into account values('npminh', 'secret-love');

create table review(
	rv_id int auto_increment  primary key,
    rv_content varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    rv_name varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    rv_description varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    lang_name varchar(10),
    FOREIGN KEY (lang_name) REFERENCES lang(lang_name)
);

insert into review (rv_content, rv_name, rv_description, lang_name) values('Chúng em - những sinh viên trẻ của ngành Ngôn ngữ Pháp đã cùng nhau lên ý tưởng và thành lập dự án “Le “', 'Phạm Thị Ngọc Thọ', 'Công tác thiện nguyện cho dự án Le', 'vi');
insert into review (rv_content, rv_name, rv_description, lang_name) values('Chúng em - những sinh viên trẻ của ngành Ngôn ngữ Pháp đã cùng nhau lên ý tưởng và thành lập dự án “Le “', 'Nguyễn Phước Minh', 'Công tác thiện nguyện cho dự án Le', 'vi');
insert into review (rv_content, rv_name, rv_description, lang_name) values('Bienvenue dans le monde du voyage, où chaque pas est une découverte et chaque rencontre une aventure', 'Nguyễn Phước Minh', 'Découvrez le monde, une aventure à chaque coin de rue', 'fr');
insert into review (rv_content, rv_name, rv_description, lang_name) values('Chúng em - những sinh viên trẻ của ngành Ngôn ngữ Pháp đã cùng nhau lên ý tưởng và thành lập dự án “Le “', 'Phạm Thị Ngọc Thọ', 'Công tác thiện nguyện cho dự án Le', 'vi');
insert into review (rv_content, rv_name, rv_description, lang_name) values('Chúng em - những sinh viên trẻ của ngành Ngôn ngữ Pháp đã cùng nhau lên ý tưởng và thành lập dự án “Le “', 'Nguyễn Phước Minh', 'Công tác thiện nguyện cho dự án Le', 'vi');
insert into review (rv_content, rv_name, rv_description, lang_name) values('Bienvenue dans le monde du voyage, où chaque pas est une découverte et chaque rencontre une aventure', 'Nguyễn Phước Minh', 'Découvrez le monde, une aventure à chaque coin de rue', 'fr');

create table tour(
	tour_id int primary key,
    tour_name  varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
);
insert into tour values (1, 'Cần Thơ-1');
insert into tour values (2, 'Cần Thơ-2');
insert into tour values (3, 'Cần Thơ-3');
insert into tour values (4, 'Cái Răng');

create table tour_detail(
	td_id int auto_increment primary key,
    td_type varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    td_des  varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    tour_id int,
    lang_name varchar(10),
    FOREIGN KEY (tour_id) REFERENCES tour(tour_id),
    FOREIGN KEY (lang_name) REFERENCES lang(lang_name)
);
delete from tour_detail where tour_id=1;
drop table tour;
drop table tour_detail;
insert into tour_detail  (td_type, td_des, tour_id, lang_name) values ("Food", "Bánh tằm ô môn, lẩu mắm, nem nướng, , bánh hỏi heo quay phong điền, chuối nếp nướng", 1, "vi");
insert into tour_detail (td_type, td_des, tour_id, lang_name) values ("Food", "Bánh cống, lẩu vịt nấu chao, lẩu bần phù sa, bún tôm khô", 2, "vi");
insert into tour_detail (td_type, td_des, tour_id, lang_name) values ("Food", "Bánh hỏi heo quay phong điền, chuối nếp nướng", 3, "vi");
select * from review where lang_name='fr';