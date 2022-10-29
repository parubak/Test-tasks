create table conferences
(
	id int auto_increment
		constraint `PRIMARY`
			primary key,
	title varchar(255) not null,
	data date not null,
	map_lat double null,
	map_lng double null,
	country varchar(100) null
);


