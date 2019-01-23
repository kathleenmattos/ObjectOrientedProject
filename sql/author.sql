ALTER DATABASE kmattos1 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS author;

CREATE TABLE author (
	authorId BINARY(16) NOT NULL,
	authorAvatarUrl VARCHAR(255),
	authorActivationToken char(32),
	authorEmail VARCHAR(128) NOT NULL,
	authorHash CHAR(97) NOT NULL,
	authorUsername VARCHAR(32) NOT NULL,
	UNIQUE(authorEmail),
	UNIQUE(authorUsername),
	INDEX(authorEmail),
	PRIMARY KEY(authorId)
)