USE emensawerbeseite;

CREATE VIEW view_suppengerichte AS
SELECT name
FROM gericht
WHERE name LIKE '%suppe%';

CREATE VIEW view_anmeldungen AS
SELECT anzahlanmeldungen
FROM benutzer;
SELECT * FROM view_anmeldungen
ORDER BY anzahlanmeldungen DESC;

CREATE VIEW view_kategoriegerichte_vegetarisch AS
SELECT gericht.name, kategorie.name AS kategorie_name
FROM gericht
RIGHT JOIN gericht_hat_kategorie ON gericht.id = gericht_hat_kategorie.gericht_id
RIGHT JOIN kategorie ON gericht_hat_kategorie.kategorie_id = kategorie.id
WHERE gericht.name is null OR vegetarisch=1;

































