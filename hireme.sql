DROP DATABASE IF EXISTS hireme;
CREATE DATABASE hireme;
USE hireme;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Jobs;
DROP TABLE IF EXISTS JobsAppliedFor;

CREATE TABLE 'Users' (
	id int(11) NOT NULL auto_increment,
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT '',
	password varchar(255) NOT NULL,
	telephone varchar(12) NOT NULL UNIQUE DEFAULT '',
	email varchar(255) NOT NULL UNIQUE,
	date_joined DATE,
	PRIMARY KEY(id)
);

CREATE TABLE 'Jobs' (
	id int(11) NOT NULL auto_increment,
	job_title varchar(255) NOT NULL,
	job_description varchar(255) NOT NULL,
	category varchar(255) NOT NULL,
	company_name varchar(255) NOT NULL,
	company_location varchar(255) NOT NULL,
	date_posted DATE NOT NULL,
	PRIMARY KEY(id)
); 

LOCK TABLES 'Jobs' WRITE;
INSERT INTO 'Jobs' VALUES (8483, 'UI/UX Designer', 'We are looking for a UI/UX Designer to turn our software into easy-to-use products for our clients.UI/UX Designer responsibilities include gathering user requirements, designing graphic elements and building navigation components. To be successful in this role, you should have experience with design software and wireframe tools. If you also have a portfolio of professional design projects that includes work with web/mobile applications, we’d like to meet you. Ultimately, you’ll create both functional and appealing features that address our clients’ needs and help us grow our customer base.', 'Design', 'Jamaica Yellow Pages', 'Kingston, Jamaica', 'November 1, 2018'),
(4324, 'Software Engineer', 'We are looking for a Software Engineer who can determine operational feasibility by evaluating analysis, problem definition, requirements, solution development, and proposed solutions. He/ she must be able to document and demonstrate solutions by developing documentation, flowcharts, layouts, diagrams, charts, code comments and clear code. Prepare and install solutions by determining and designing system specifications, standards, and programming. This as well as improve operations by conducting systems analysis; recommending changes in policies and procedures. The protection of operations should be done by keeping information confidential. Lastly, he/ she must develop software solutions by studying information needs; conferring with users; studying systems flow, data usage, and work processes; investigating problem areas; following the software development lifecycle.', 'Programming', 'Basecamp', 'Port-Antonio, Portland', 'May 5, 2018'),
(0010, 'Senior Systems Engineer', 'We are looking for a Systems Engineer to help build out, maintain, and troubleshoot our rapidly expanding infrastructure.  You will be part of a talented team of engineers that demonstrate superb technical competency, delivering mission critical infrastructure and ensuring the highest levels of availability, performance and security. Qualified systems engineers will have a background in IT, computer systems engineering, or systems engineering and analysis. Responsibilities may include the management and monitoring all installed systems and infrastructure, install, configure, test and maintain operating systems, application software and system management tools as well as write and maintain custom scripts to increase system efficiency and lower the human intervention time on any tasks', 'Development, Operations & System Administration', 'Sagicor Bank', 'Savanna-La-Mar, Westmoreland', 'October 20, 2018'),
(9876, 'Director Customer Support', 'The Director of Customer Service position is responsible for maintaining effective customer service for all internal and external customers by utilizing excellent, in-depth knowledge of company products and programs as well as team members within the Customer Service Department. Responsibilities may include setting performance standards to meet service goals of company, coach Customer Service Team in order to achieve high performance, structure the training agenda for department members and measure Customer Service Representatives’ performance and make employment decisions while providing feedback to the company regarding service failures or customer concerns.', 'Customer Support', 'UWI Bursary', 'Mona, Kingston', 'October 20, 2018'),
(1113, 'Business Analyst-Scrum Master', 'The Business Analyst-Scrum Master is responsible for leading the analysis, development, documentation, and communication of functional and non-functional business requirements for new solutions as well as lead the elicitation, analysis, development, documentation, and communication of business requirements. He/she should represent business/stakeholder interests by understanding and interpreting business needs and value to implementation while working with the Business Solution Lead and Business Architect to understand business strategy and translate into product requirements.', 'Business & Management', 'NCB', 'Old Harbour, St. Catherine', 'November 1, 2018'),
(2845, 'Software Engineer', 'We are looking for a Software Engineer who can determine operational feasibility by evaluating analysis, problem definition, requirements, solution development, and proposed solutions. He/ she must be able to document and demonstrate solutions by developing documentation, flowcharts, layouts, diagrams, charts, code comments and clear code. Prepare and install solutions by determining and designing system specifications, standards, and programming. This as well as improve operations by conducting systems analysis; recommending changes in policies and procedures. The protection of operations should be done by keeping information confidential. Lastly, he/ she must develop software solutions by studying information needs; conferring with users; studying systems flow, data usage, and work processes; investigating problem areas; following the software development lifecycle.', 'Programming', 'UWI-MITS', 'Mona, Kingston', 'November 2, 2018'),
(5555, 'Product Marketing Manager', 'A role which works across different organisational departments is a product marketing manager. They undertake market research on new products, establish timescales for developing products, influence pricing and packaging, guide sales teams, develop messaging and market positioning around products and take part in presentations and events. Often product marketing managers are the ‘voice of the customer’ within their organisation, carefully researching customer needs and experiences. They are mainly found in private sector companies but can be employed by any organisation that sells products.','Sales & Marketing', 'Jamaica Gleaner', 'Kingston, Jamaica', 'November 3, 2018');

CREATE TABLE 'JobsAppliedFor'(
	id int(11) NOT NULL auto_increment,
	job_id int(11) NOT NULL,
	user_id int(11) NOT NULL,
	date_applied DATE NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(job_id) references Jobs(id) on update cascade on delete restrict,
	FOREIGN KEY(user_id) references Users(id) on update cascade on delete restrict
);