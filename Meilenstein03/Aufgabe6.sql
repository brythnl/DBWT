SELECT gericht.name, allergen.name
FROM gericht
JOIN gericht_hat_allergen ON gericht.id = gericht_hat_allergen.gericht_id
JOIN allergen ON gericht_hat_allergen.code = allergen.code;

SELECT gericht.name, allergen.name
FROM gericht
LEFT JOIN gericht_hat_allergen ON gericht.id = gericht_hat_allergen.gericht_id
LEFT JOIN allergen ON gericht_hat_allergen.code = allergen.code;

SELECT gericht.name, allergen.name
FROM gericht
RIGHT JOIN gericht_hat_allergen ON gericht.id = gericht_hat_allergen.gericht_id
RIGHT JOIN allergen ON gericht_hat_allergen.code = allergen.code;

SELECT kategorie.name, COUNT(gericht.name) AS anzahl
FROM gericht
JOIN gericht_hat_kategorie ON gericht.id = gericht_hat_kategorie.gericht_id
JOIN kategorie ON gericht_hat_kategorie.kategorie_id = kategorie.id
GROUP BY kategorie.name
ORDER BY anzahl ASC;

SELECT kategorie.name, COUNT(gericht.name) AS anzahl
FROM gericht
JOIN gericht_hat_kategorie ON gericht.id = gericht_hat_kategorie.gericht_id
JOIN kategorie ON gericht_hat_kategorie.kategorie_id = kategorie.id
GROUP BY kategorie.name
HAVING anzahl > 2
ORDER BY anzahl ASC;






