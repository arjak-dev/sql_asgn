/* --------------- creating Table---------- */
create database IPL;

/*----------------- selcting the database---------------- */
use IPL;

/*---------------------- creating tables ----------------- */
create table team(team_id int auto_increment primary key,team_name char(20));

create table venue(venue_id int auto_increment primary key,venue_name char(40));

create table match_played(match_id int auto_increment primary key,Date date,venue_id int, team1_id int,team2_id int);

alter table match_played add foreign key(team1_id) references team(team_id);

alter table match_played add foreign key(team2_id) references team(team_id);

alter table match_played add foreign key(venue_id) references venue(venue_id);

create table captain(match_id int,team_id int,captain char(20),primary key(match_id,team_id));

alter table captain add foreign key(match_id) references match_played(match_id);

alter table captain add foreign key(team_id) references team(team_id);

create table result(match_id int primary key, toss_won char(20),match_won char(20));

alter table result add foreign key(match_id) references match_played(match_id);

/*-------------------Adding values to team table----------------*/

 insert into team(team_name) values("KKR");

 insert into team(team_name) values("RCB");

 insert into team(team_name) values("CSk");

 insert into team(team_name) values("MI");

/*----------------Adding values to the Venue Table---------------*/

insert into venue(venue_name) values("Eden Garden's");

insert into venue(venue_name) values("Rajiv Gandhi Intl.");

insert into venue(venue_name) values("Wankhede Stadium");

insert into venue(venue_name) values("M. Chinnaswamy Stadium");

/*--------------Adding values to the match table-----------------*/

insert into match_played(Date,venue_id,team1_id,team2_id) values('2020-01-22','1','2','3');

insert into match_played(Date,venue_id,team1_id,team2_id) values('2020-01-23','3','1','3');

insert into match_played(Date,venue_id,team1_id,team2_id) values('2020-01-24','1','3','2');

/*--------------Adding values in the captain tbale---------------------*/


insert into captain(match_id, team_id,captain) values('1','2','Virat Kholi');

insert into captain(match_id,team_id,captain) values('1','3','MS Dhoni');

insert into captain(match_id,team_id,captain) values('2','3','MS Dhoni');

insert into captain(match_id,team_id,captain) values('2','1','Dinesh karthik');

insert into captain(match_id,team_id,captain) values('3','3','MS Dhoni');

insert into captain(match_id,team_id,captain) values('3','2','Virat Kholi');

/*-----------------------------------Adding data in Result table--------------------------------*/

insert into result(match_id,toss_won,match_won) values('1','3','3');

insert into result(match_id,toss_won,match_won) values('2','1','1');

insert into result(match_id,toss_won,match_won) values('3','3','2');

/*-----------------------------Display all tables--------------------------------------*/

select * from team;

select * from venue;

select * from match_played;

select* from captain;

select * from result;

/*-------------------------------Sample Join---------------------------------------*/

select * from ((team t inner join match_played t1 on t.team_id = t1.team1_id)inner join match_played t2 on t.team_id = t2.team2_id);
 
