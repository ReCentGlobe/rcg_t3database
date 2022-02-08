CREATE TABLE tx_rcgprojectdb_domain_model_project (
	image int(11) unsigned NOT NULL DEFAULT '0',
	title varchar(255) NOT NULL DEFAULT '',
	short_title varchar(255) NOT NULL DEFAULT '',
	account_number varchar(255) NOT NULL DEFAULT '',
	short_description text NOT NULL DEFAULT '',
	description text,
	contact text,
	funding_start int(11) NOT NULL DEFAULT '0',
	funding_end int(11) NOT NULL DEFAULT '0',
	funding_amount varchar(255) NOT NULL DEFAULT '',
	related_links int(11) unsigned NOT NULL DEFAULT '0',
	persons int(11) unsigned NOT NULL DEFAULT '0',
	tags int(11) unsigned NOT NULL DEFAULT '0',
	partners int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_rcgprojectdb_domain_model_person (
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT '',
	projects int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_rcgprojectdb_domain_model_tag (
	title varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_rcgprojectdb_domain_model_organization (
	project int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	logo int(11) unsigned NOT NULL DEFAULT '0',
	url varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_rcgprojectdb_domain_model_sociallink (
	project int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	type int(11) DEFAULT '0' NOT NULL,
	url varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_rcgprojectdb_domain_model_project (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_rcgprojectdb_project_person_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_rcgprojectdb_project_tag_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_rcgprojectdb_domain_model_person (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_rcgprojectdb_person_project_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
