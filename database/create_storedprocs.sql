/*
**
**		INSERT LETTERS
**
*/


DELIMITER //
DROP PROCEDURE IF EXISTS db1_pwypaustralia.letters_insert
//

CREATE PROCEDURE db1_pwypaustralia.letters_insert
(
	p_firstname varchar(70),
	p_lastname varchar(70),
	p_postcode varchar(10),
	p_email varchar(200),
	p_message text
)
BEGIN
INSERT INTO db1_pwypaustralia.letters
(
	firstname,
	lastname,
	postcode,
	email,
	message
)
VALUES
(
	p_firstname,
	p_lastname,
	p_postcode,
	p_email,
	p_message
);

END//
DELIMITER ;

/*
**
**		COUNT LETTERS
**
*/

DELIMITER //
DROP PROCEDURE IF EXISTS db1_pwypaustralia.letters_count
//

CREATE PROCEDURE db1_pwypaustralia.letters_count()

BEGIN
SELECT count(*) FROM db1_pwypaustralia.letters;

END//
DELIMITER ;