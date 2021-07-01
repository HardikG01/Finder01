create database VINDER;
use VINDER;

drop table if exists USERS;
create table USERS
  (user_id bigint AUTO_INCREMENT,
  username varchar(100) Not NULL,
  fname varchar(25) Not NULL,
  lname varchar(25) Not NULL,
  gender varchar(10) Not NULL,
  age int Not NULL,
  bdate date Not NULL,
  password varchar(250) Not NULL,
  location varchar(100),
  photo varchar(100),
  constraint pk PRIMARY KEY(user_ID),
  constraint username_uk UNIQUE(username));

drop table if exists LIKES;
create table LIKES
  (uid1 int,
  uid2 int,
  constraint likes_pk PRIMARY KEY(uid1, uid2));

drop table if exists BLOCKED;
create table BLOCKED
  (uid1 int,
  uid2 int,
  constraint blocked_pk PRIMARY KEY(uid1, uid2));

drop table if exists MESSAGES;
create table MESSAGES
  (message_id int AUTO_INCREMENT,
  to_user_id int Not NULL,
  from_user_id int Not NULL,
  message text,
  time timestamp DEFAULT current_timestamp, 
  constraint msg_pk PRIMARY KEY(message_id));