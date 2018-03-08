# JeO-teste

## Descrição

Projeto construído para participar do teste para vaga de emprego na empresa J&O Software.

## Observação

* Foi informado que não era necessário salvar os dados no banco, porém achei valido mostrar que domino banco de dados.

* Além disso, adicionei algumas funcionalidades a mais.

* Desenvolvi o projeto pensando na ** escalabilidade, ** manutenibilidade, ** segurança e ** boas práticas.

* Os dados estão entrando no banco sanitizados com "FILTER_SANITIZE_SPECIAL_CHARS", porém criei uma forma simples e rápida para remover esse filtro. As instruções estão no arquivo App/classes/Cadastro.php.


## Requisitos:

* Banco de dados: MYSQL

* Permissão de pasta para o monolog/monolog conseguir criar relatórios de erros.

* Drives do PDO

* Para usar o projeto é necessário executar todas as querys da pasta SQL.

## Adicionais:

* ** Mascara nos inputs de telefone/celular.

* ** Validação no FRONT-END e BACK-END.

* ** Auto complete nos inputs de ESTADO e CIDADE.

* ** Registros salvos no banco.

* ** View pronta para facilitar a visualização dos dados no banco. (INNER JOIN nas 2 tabelas de cadastro).

* ** Ajax para validação.

* ** Tratamento de ERROS com monolog.

* ** Projeto todo orientado a objetos.

* ** Estrutura de pastas organizada.

* ** PHP e HTML estão completamente SEPARADOS.


