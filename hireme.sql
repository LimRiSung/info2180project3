DROP DATABASE IF EXISTS hireme;
CREATE DATABASE hireme;
USE hireme;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Jobs;
DROP TABLE IF EXISTS JobsAppliedFor;

CREATE TABLE Users (
	id int(11) NOT NULL auto_increment,
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT '',
	password varchar(255) NOT NULL,
	telephone varchar(10) NOT NULL DEFAULT '',
	email varchar(255) NOT NULL UNIQUE,
	date_joined DATE,
	PRIMARY KEY(id)
);

CREATE TABLE Jobs (
	id int(11) NOT NULL auto_increment,
	job_title varchar(255) NOT NULL,
	job_description varchar(255) NOT NULL,
	category varchar(255) NOT NULL,
	company_name varchar(255) NOT NULL,
	company_location varchar(255) NOT NULL,
	date_posted DATE NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE JobsAppliedFor(
	id int(11) NOT NULL auto_increment,
	job_id int(11) NOT NULL,
	user_id int(11) NOT NULL,
	date_applied DATE NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(job_id) references Jobs(id) on update cascade on delete restrict,
	FOREIGN KEY(user_id) references Users(id) on update cascade on delete restrict
);