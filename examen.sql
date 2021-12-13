INSERT INTO
    alumnos (nombre)
VALUES
    ('Antonio'),
    ('Beatriz'),
    ('Carla');

INSERT INTO
    ccee (ce, descripcion)
VALUES
    ('CE1a', 'Hacer el pino'),
    ('CE1b', 'Contar hasta tres'),
    ('CE2a', 'Hacer la cama');

INSERT INTO
    notas(alumno_id, ccee_id, nota)
VALUES
    (1, 1, 3),
    (1, 2, 6),
    (1, 3, 5),
    (2, 1, 7),
    (2, 2, 5),
    (2, 3, 9),
    (3, 1, 4),
    (3, 2, 3),
    (3, 3, 1);

/*4. Visualizar la tabla alumnos con nota final */
CREATE VIEW v_alumnos AS
    SELECT a.id, a.nombre, round(sum(n.nota)/count(n.nota), 1) AS nota_final
      FROM alumnos a LEFT JOIN notas n
        ON a.id = n.alumno_id
     GROUP BY a.id, a.nombre
;
