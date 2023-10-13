## Best-seller uma aplicação para gerenciar suas vendas.

Essa aplicação tem por objetivo de disponibilizar uma API e a aplicação para gerir vendas.
Nela é possível cadastrar os vendedores, cadastrar vendas, enviar email e receber no fim do dia
um email com o relatório das vendas realizados no dia.

### Iniciando a aplicação

#### Configurando o Docker

Para subir a aplicação e seus respectivos containers execute:


```sh
$ docker-compose up -d
```

Após isso acesso o container app com o bash atraves do comando:
```sh
$ docker-compose exec app bash
```

#### Configurando o Laravel

Crie o .env do projeto:

```sh
$ cp .env.example .env
```

Instale as dependências do projeto:

```sh
$ composer install
```

Gere a key do projeto Laravel:

```sh
$ php artisan key:generate
```

Execute as Migrations:

```sh
$ php artisan migrate
```


### Exemplos de uso da API

#### Cadastro de vendedores

POST
http://localhost:8989/api/sellers

body:
```json
{
    "name": "Lucas Goncalves",
    "email": "lucas@email.com"
}
```

response:
201
```json
{
    "data": {
        "id": 3,
        "nome": "Lucas Goncalves",
        "email": "lucas@email.com"
    }
}
```


#### Listar todos os vendedores

GET
http://localhost:8989/api/sellers

response:
200
```json
{
    {
        "data": [
            {
                "id": 1,
                "nome": "Lucas Goncalves",
                "email": "lucas@email.com"
            },
            {
                "id": 2,
                "nome": "Matteo Albuquerque",
                "email": "matteo@email.com"
            }
        ]
    }
}
```


#### Listar um determinado vendedor

GET
http://localhost:8989/api/sellers/{id}

response:
200
```json
{
    "data": {
        "id": 1,
        "nome": "Lucas Goncalves",
        "email": "lucas@email.com"
    }
}
```

#### Cadastro das vendas

POST
http://localhost:8989/api/sales

body:
```json
{
    "seller_id": "3",
    "amount": "3500.00",
    "sale_date": "2023-10-15"
}
```

response:
201
```json
{
    "data": {
        "id": 7,
        "seller_id": 3,
        "amount": "3500.00",
        "sale_date": "15/10/2023"
    }
}
```


#### Listar todas as vendas

GET
http://localhost:8989/api/sales

response:
200
```json
{
    "data": [
        {
            "id": 1,
            "seller_id": 1,
            "amount": 100,
            "sale_date": "01/10/2023"
        },
        {
            "id": 2,
            "seller_id": 1,
            "amount": 750.5,
            "sale_date": "13/10/2023"
        },
        {
            "id": 3,
            "seller_id": 1,
            "amount": 1500.7,
            "sale_date": "13/10/2023"
        },
        {
            "id": 4,
            "seller_id": 2,
            "amount": 2000,
            "sale_date": "10/10/2023"
        },
        {
            "id": 5,
            "seller_id": 2,
            "amount": 52750.75,
            "sale_date": "10/10/2023"
        },
        {
            "id": 6,
            "seller_id": 1,
            "amount": 3500.82,
            "sale_date": "10/10/2023"
        },
        {
            "id": 7,
            "seller_id": 3,
            "amount": 3500,
            "sale_date": "15/10/2023"
        }
    ]
}
```


#### Listar uma determinada venda

GET
http://localhost:8989/api/sales/{id}

response:
200
```json
{
    "data": {
        "id": 5,
        "seller_id": 2,
        "amount": 52750.75,
        "sale_date": "10/10/2023"
    }
}
```

#### Listar vendas de um determinado vendedor 

GET
http://localhost:8989/api/sales-sellers/{id}

response:
200
```json
{
    "data": [
        {
            "id": 4,
            "seller_id": 2,
            "amount": 2000,
            "sale_date": "10/10/2023"
        },
        {
            "id": 5,
            "seller_id": 2,
            "amount": 52750.75,
            "sale_date": "10/10/2023"
        }
    ]
}
```


### Aplicação

Para a utilizar a aplicação web acesse o endereço:

```web
http://localhost:8989/
```


#### Servidor de email

O servidor de email para realização de testes
pode ser acessado pelo endereço

```web
http://localhost:8025/
```
