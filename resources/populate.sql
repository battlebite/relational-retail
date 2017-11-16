create table manufacturers (
	name varchar(255),
    website_url varchar(255),
    country varchar(255),
    phone_number bigint(15),
    primary key(name)
);

create table products (
	id int AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	price decimal(6,2),
	quantity int not null default 0,
	image_url varchar(255),
	description varchar(255),
	manufacturer varchar(255),
	category varchar(255), 
	primary key(id),
	foreign key(manufacturer) references manufacturers(name)
);

create table users (
		id int AUTO_INCREMENT,
    name varchar(255), 
    username varchar(255),
    password varchar(255), 
    address varchar(255),
    credit_card_number bigint(19),
    is_admin bit not null default 0,
    primary key (id)
);

create table cart (
	id int AUTO_INCREMENT,
	user_id int,
	product_id varchar(255),
	quantity int not null default 1,
	total decimal(6,2),
	primary key(id),
	foreign key(user_id) references users(id)
);

create table transactions (
	id int AUTO_INCREMENT,
	user_id int,
	total decimal(6,2),
	primary key(id),
	foreign key(user_id) references users(id)
);

create table transactions_products (
	transaction_id int,
	product_id int,
	quantity int,
	price decimal(6,2),
	foreign key(transaction_id) references transactions(id),
	foreign key(product_id) references products(id)
);

-- Populate Tables
insert into manufacturers values
	( "Sony",
		"https://sony.com",
		"Japan",
	18002227669),
	( "Microsoft",
		"https://microsoft.com",
		"USA",
	18006427676),
	( "Nintendo",
		"https://nintendo.com",
		"Japan",
		18002553700);

insert into products values
	( null,
		"PS4 Pro",
		449.99,
		0,
		"./img/ps4_pro.jpg",
		"A powerful system",
		"Sony",
		"console"
	),
	( null,
		"Ark: Survival Evolved",
		59.99,
		0,
		"./img/ark_ps4.jpg",
		"Game",
		"Sony",
		"game"
	),
	( null,
		"Bioshock Collection",
		59.99,
		0,
		"./img/bioshock_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Darksiders",
		59.99,
		0,
		"./img/darksiders_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Destiny 2",
		59.99,
		0,
		"./img/destiny_2_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Dishonored 2",
		59.99,
		0,
		"./img/dishonored_2_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Doom",
		59.99,
		0,
		"./img/doom_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Forza 6",
		59.99,
		0,
		"./img/forza_6_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Horizon: Zero Dawn",
		59.99,
		0,
		"./img/horizon_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Madden \'18",
		59.99,
		0,
		"./img/madden_18_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Mario Kart 8",
		59.99,
		0,
		"./img/mario_kart_8_switch.jpg",
		"Game",
		"Nintendo",
		"game"),
	( null,
		"Mario Odyssey",
		59.99,
		0,
		"./img/mario_odyssey_switch.jpg",
		"Game",
		"Nintendo",
		"game"),
	( null,
		"Doom",
		59.99,
		0,
		"./img/mortal_kombat_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Past Cure",
		59.99,
		0,
		"./img/past_cure_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Road Rage",
		59.99,
		0,
		"./img/road_rage_xbone.jpg",
		"Game",
		"Microsoft",
		"game"),
	( null,
		"Shadow of War",
		59.99,
		0,
		"./img/shadow_of_war_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Elder Scrolls V: Skyrim",
		59.99,
		0,
		"./img/skyrim_switch.jpg",
		"Game",
		"Nintendo",
		"game"),
	( null,
		"South Park: The Fractured But Whole",
		59.99,
		0,
		"./img/south_park_ps4.jpg",
		"Game",
		"Sony",
		"game"),
	( null,
		"Splatoon 2",
		59.99,
		0,
		"./img/splatoon_switch.jpg",
		"Game",
		"Nintendo",
		"game"),
	( null,
		"Nintendo Switch",
		259.99,
		0,
		"./img/switch.jpg",
		"Console",
		"Nintendo",
		"console"),
	( null,
		"Microsoft Xbox One",
		359.99,
		0,
		"./img/xbone.jpg",
		"Console",
		"Microsoft",
		"console"),
	( null,
		"Legend of Zelda: Breath of the Wilds",
		59.99,
		0,
		"./img/zelda_botw_switch.jpg",
		"Game",
		"Nintendo",
		"game");