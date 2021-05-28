## Sobre

Solução do [desafio](https://github.com/cd2tec/PHPtest)

## Requisitos

- PHP 7+

## Uso

- Clonar esse repositório `git clone https://github.com/mateusmsant/PHPtest.git`

- Servir a aplicação com `php -S localhost:8000` e acessar do browser

## Conexão

- A conexão padrão com o banco usa MySQL no localhost, na porta 3306.
- O nome do banco de dados padrão é "cd2tec", o usuário é "root" e a senha é vazia.
- Caso queira modificar essa conexão, as mudanças podem ser feitas em `utils/db_data.php`.
- É necessário criar um banco de dados. Recomenda-se usar o nome "cd2tec" para não ter que mexer no código.
- A tabela será criada ao rodar a aplicação pela primeira vez.

## Consultas

As consultas estão sendo feitas apenas quando o CEP não está no banco.

## Erros

A aplicação lida com erros da API de duas formas.

Caso a consulta seja inválida, retorna um erro danger.

![danger](https://i.imgur.com/9AIhIkL.png)

Caso a consulta seja válida, mas o CEP não esteja no banco do ViaCEP, retorna um erro warning.

![warning](https://i.imgur.com/66Y8VXM.png)
