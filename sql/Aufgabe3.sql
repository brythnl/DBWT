SELECT * FROM gericht;
SELECT erfasst_am FROM gericht;
SELECT name, erfasst_am FROM gericht ORDER BY name DESC; 
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5 OFFSET 5;
SELECT DISTINCT typ FROM allergen;
SELECT name FROM gericht WHERE name LIKE 'K%';
SELECT id, name FROM gericht WHERE name LIKE '%suppe%';
SELECT * FROM kategorie WHERE eltern_id IS NULL;

UPDATE allergen
SET name = 'Kamut'
WHERE code = 'a6';
SELECT * FROM allergen;

/*INSERT INTO gericht 
VALUES (21, 'Currywurst mit Pommes', 'Bratwurst mit Currysauce und gefrittierte Pommes', '2022-11-11', 0, 0, 2.8, 5);
*/

/*INSERT INTO gericht_hat_kategorie
VALUES (21, 3);
*/
SELECT * FROM gericht_hat_kategorie;