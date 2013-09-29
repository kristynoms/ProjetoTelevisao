SELECT * FROM classificacaoetaria
SELECT * FROM emissora
SELECT * FROM genero
SELECT * FROM grade
SELECT * FROM programa
SELECT * FROM usuario
SELECT * FROM tipo

INSERT INTO tipo VALUES(1, 'Novela'),(2, 'Serie'), (3,'Informátivo'), (4,'Filme');

INSERT INTO grade (fk_programa,dataExibicao,horaExibicao) VALUES (1,'30/09/2013','00:00')

ALTER TABLE grade ADD COLUMN horaExibicao VARCHAR(200)

SELECT programa.nome,cl.nome AS classificacao,g.nome AS genero,emissora.`nome` AS emissora,t.nome AS tipo,dataExibicao,horaExibicao FROM grade 
JOIN programa ON grade.`fk_programa` = programa.id LEFT JOIN
classificacaoetaria cl ON cl.id = programa.`fk_classificacao_id` LEFT JOIN
genero g ON g.id = programa.`fk_genero_id` LEFT JOIN tipo t ON t.id = programa.`fk_tipo_id` 
LEFT JOIN emissora ON emissora.`id` = programa.`fk_emissora_id` WHERE emissora.id = 1