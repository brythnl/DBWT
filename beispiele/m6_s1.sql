CREATE TABLE bewertung (
	gericht_id BIGINT(20) NOT NULL,
	bemerkung VARCHAR(800) NOT NULL CHECK (LENGTH(bemerkung) >= 5),
	sterne ENUM('sehr gut', 'gut', 'schlecht', 'sehr schlecht') NOT NULL,
	zeitpunkt DATETIME NOT NULL DEFAULT NOW(),
	FOREIGN KEY (gericht_id) REFERENCES gericht(id)
);
	
