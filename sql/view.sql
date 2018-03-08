/* Vew para testar se os dados estão certinhos */

CREATE view completo AS 
SELECT c.nome, c.email, c.estado, c.cidade, t.telefone, t.celular, t.contatoWpp, c.mensagem
FROM `cadastro` as c
LEFT JOIN `telefone` as t
on t.id_cadastro = c.idCadastro

