# Clientes CRUD – Laravel

Projeto de API RESTful para gerenciamento de **Players**, desenvolvido com **Laravel**, **PostgreSQL** e **Docker**, com foco em CRUD, organização básica e testes automatizados.

---

## 📌 Tecnologias Utilizadas

* PHP 8.4
* Laravel 12
* PostgreSQL
* Docker / Docker Compose
* PHPUnit (Testes automatizados)

---

## 📂 Estrutura do Projeto

* `app/Models` – Modelos Eloquent
* `app/Http/Controllers` – Controllers da API
* `routes/api.php` – Rotas da API
* `database/migrations` – Migrations do banco de dados
* `tests/Feature` – Testes automatizados de API

---

## ▶️ Como rodar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/SEU_USUARIO/clientes-crud-laravel.git
cd clientes-crud-laravel
```

---

### 2. Subir os containers Docker

```bash
docker compose up -d
```

---

### 3. Acessar o container da aplicação

```bash
docker compose exec app bash
```

---

### 4. Instalar dependências do Laravel

```bash
composer install
```

---

### 5. Criar o arquivo de ambiente

```bash
cp .env.example .env
```

---

### 6. Gerar a chave da aplicação

```bash
php artisan key:generate
```

---

### 7. Rodar as migrations

```bash
php artisan migrate
```

> ⚠️ Observação: como o banco roda em container, ao derrubar os containers o banco é recriado.

---

### 8. Rodar os testes automatizados

```bash
php artisan test
```

---

## 🌐 Endpoints da API

| Método | Endpoint            | Descrição                    |
| ------ | ------------------- | ---------------------------- |
| GET    | `/api/players`      | Lista todos os players       |
| POST   | `/api/players`      | Cria um novo player          |
| GET    | `/api/players/{id}` | Retorna um player específico |
| PUT    | `/api/players/{id}` | Atualiza um player           |
| DELETE | `/api/players/{id}` | Remove um player             |

---

## 🧪 Testes Automatizados

Os testes de API estão localizados em:

```
tests/Feature/PlayerApiTest.php
```

Eles cobrem:

* Listagem de players
* Criação
* Consulta individual
* Atualização
* Exclusão

---

## 📝 Observações Adicionais

* Para o melhor funcionamento da API, insira em formado **JSON** `nome` `email` e `telefone(Irá funcionar se não houver telefone)`. Caso não tenham essas informações, a API irá retornar um erro esperado para tal ocorrência.

* O projeto tem finalidade **educacional e demonstrativa**.
* Foram aplicados padrões como **PSR-12** ou tratamento centralizado de exceções.
* O ambiente está preparado para facilitar testes locais via Docker.
* Caso esteja recebendo um status `200:OK` lembre-se de configurar o POSTMAN para:
| Key          | Value            |
| ------------ | ---------------- |
| Accept       | application/json |
| Content-Type | application/json |


---

## 📄 Licença

Este projeto é de uso livre para fins de estudo e demonstração técnica.
