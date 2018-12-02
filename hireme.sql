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

ALTER TABLE Users MODIFY telephone VARCHAR(12);

LOCK TABLES 'Users' WRITE;
INSERT INTO 'Users' VALUES (0058, "Timothy", "Simpson", "passMeby", "8765851230", "tim_simpson@hireme.com", Sept 10 2018),
(0934, "Sabreen", "Hasan", "som3th1ng", "8764386910", "sabreen_hasan@hireme.com", Sept 21 2015),
(7651, "David", "Douglas", "doug13", "keepfresh@hireme.com", Feb 2 2018),
(8765, "Chris San", "Williams", "chrissyW", "chrisWilliams@hireme.com", Dec 23 2016),
(0010, "Jonah", "Whale", "meditation", "whale-jonah@hireme.com", July 17 2018),
(2222, "Zhavia", "Fletcher", "independent765", "rehctelf@hireme.com", Mar 29 2017),
(4903, "Monique", "McIntosh", "123funzywunzy", "monMac@hireme.com", Oct 3 2017),
(0000, "Vanqueesha", "Lavish", "bosslady", "admin@hireme.com", Jan 7 2015),
(1110, "Malique", "Thousand", "D$llars", "queenMoney@hireme.com", May 18 2018),
(5427, "Eileen", "Wilson", "password989", "neelieW@hireme.com", June 1 2017),



