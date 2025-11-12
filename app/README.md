# Conexão SQL Server com PDO

Este projeto demonstra como conectar-se a um banco de dados SQL Server utilizando PHP e PDO. O objetivo é fornecer uma maneira simples de acessar os dados de uma tabela `Clientes` e exibi-los em uma página web.

## Estrutura do Projeto

- `index.php`: O arquivo principal que realiza a conexão com o banco de dados, executa uma consulta SQL e exibe os dados da tabela `Clientes` em uma tabela HTML.
- `config.example.php`: Um arquivo de exemplo com as configurações do banco de dados. Este arquivo deve ser renomeado para `config.php` e configurado corretamente com suas credenciais de banco de dados.
- `.gitignore`: Um arquivo que impede que o `config.php` com credenciais sensíveis seja versionado no Git.

## Instruções de Uso

### Passo 1: Configurar o Arquivo de Configuração

Renomeie o arquivo `config.example.php` para `config.php` e edite-o com suas credenciais de banco de dados:

```php
<?php
// config.php

return [
    'servername' => 'seu_servidor.database.windows.net',
    'username'   => 'seu_usuario',
    'password'   => 'sua_senha',
    'dbname'     => 'seu_banco_de_dados',
];
?>
```


## Como Configurar o Banco de Dados no Azure

Se você deseja usar o **Azure SQL Database** para armazenar os dados da tabela `Clientes`, siga os passos abaixo:

### Passo 1: Criar uma Conta no Azure

1. Se você ainda não tiver uma conta no Azure, crie uma em [Azure Portal](https://portal.azure.com/).
2. Após criar sua conta, faça login no portal do Azure.

### Passo 2: Criar um Banco de Dados SQL no Azure

1. No painel principal do Azure, clique em **Criar um recurso**.
2. Na barra de pesquisa, digite **SQL Database** e selecione a opção **SQL Database**.
3. Clique em **Criar**.
4. Preencha os campos obrigatórios:
   - **Assinatura**: Escolha sua assinatura do Azure.
   - **Grupo de recursos**: Crie um novo ou escolha um grupo existente.
   - **Nome do banco de dados**: Dê um nome para seu banco de dados, por exemplo, `db_clientes`.
   - **Servidor**: Clique em **Criar novo** para criar um servidor SQL. Preencha os campos:
     - **Nome do servidor**: Defina um nome único.
     - **Localização**: Escolha a região mais próxima de você.
     - **Administrador do servidor**: Defina um usuário e senha para acesso administrativo ao servidor.
5. Clique em **Revisar + Criar** e depois em **Criar** para concluir o processo.

### Passo 3: Configurar as Regras de Firewall

1. Após a criação do banco de dados, acesse a página do **Servidor SQL**.
2. Na seção **Configurações**, clique em **Regras de firewall**.
3. Adicione a sua faixa de IP para permitir que seu servidor de desenvolvimento ou aplicação possa acessar o banco de dados.

### Passo 4: Criar a Tabela `Clientes`

Agora, você precisa criar a tabela `Clientes` no seu banco de dados:

1. No portal do Azure, vá até o **SQL Database** que você acabou de criar.
2. Na seção **Consulta**, clique em **Nova Consulta**.
3. Execute o seguinte script SQL para criar a tabela `Clientes`:

```sql
CREATE TABLE Clientes (
    Id_Cliente INT IDENTITY(1,1) PRIMARY KEY,
    Nome VARCHAR(100),
    Endereco VARCHAR(255),
    Cidade VARCHAR(100),
    Telefone VARCHAR(15)
);
