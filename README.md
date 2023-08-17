# Gerenciador de Metas - README

O Gerenciador de Metas é uma aplicação multiusuário que surgiu da minha necessidade pessoal de gerenciar minhas próprias metas. Ele oferece uma maneira simples e eficaz de acompanhar suas metas, possibilitando adicionar, filtrar, editar, concluir e cancelar metas. Este projeto foi um grande aprendizado e agora está disponível para uso por outras pessoas.

## Funcionalidades Principais

- **Cadastro de Usuários:** Cada usuário pode se cadastrar, fazer login e começar a gerenciar suas metas.
- **Criação de Metas:** Adicione metas, definindo uma descrição e uma data limite.
- **Edição de Metas:** Edite as descrições e datas limite das metas existentes.
- **Filtragem de Metas:** Filtragem por status (Concluídas, Canceladas) para uma visualização organizada.
- **Marcação de Metas:** Marque metas como concluídas ou canceladas.

## Uso Local

### Pré-requisitos

- PHP 7.0 ou superior
- Servidor web (ex: Apache) ou servidor embutido do PHP
- MySQL (ou outro sistema de gerenciamento de banco de dados)

### Configuração

1. Clone o repositório:

git clone https://github.com/PedroHenriquedeLima/metas-ja-system

2. Instale as dependências:



3. Crie um banco de dados MySQL e importe o arquivo `config/script.sql` para criar a estrutura das tabelas.

4. Configure a conexão com o banco de dados:
- Abra o arquivo `app/Database/Connection.php`.
- Preencha as informações de conexão (host, dbname, user, pass).

5. Inicie o servidor web embutido do PHP ou configure um servidor web (consulte instruções abaixo).

### Iniciando o Servidor Web Embutido do PHP

Se você deseja usar o servidor embutido do PHP, execute o seguinte comando dentro da pasta do projeto:

php -S localhost:8000



Acesse `http://localhost:8000` no seu navegador para acessar o aplicativo.

### Configuração do Apache (Windows)

1. Abra o arquivo `httpd.conf` no diretório de configuração do Apache (geralmente em `C:\xampp\apache\conf`).
2. Adicione o seguinte Virtual Host ao arquivo:


<VirtualHost *:80>
DocumentRoot "C:\CAMINHO_PARA_O_PROJETO"
ServerName localhost
</VirtualHost>



3. Reinicie o servidor Apache.

Acesse `http://localhost` no seu navegador para acessar o aplicativo.

### Configuração do Apache (Linux Ubuntu)

1. Crie um arquivo de configuração para o Virtual Host (substitua `SEU_PROJETO_PATH` pelo caminho absoluto para o projeto):

2. Adicione o seguinte conteúdo ao arquivo:


sudo nano /etc/apache2/sites-available/gerenciador-de-metas.conf

2. Adicione o seguinte conteúdo ao arquivo:


<VirtualHost *:80>
ServerAdmin webmaster@localhost
DocumentRoot /CAMINHO-PARA-O-PROJETO
ServerName metas-ja-system.local
<Directory /CAMINHO-PARA-O-PROJETO>
AllowOverride All
Order allow,deny
Allow from all
</Directory>
ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


3. Habilite o site e reinicie o Apache:


sudo a2ensite metas-ja-system.conf
sudo service apache2 restart


4. Adicione a entrada ao arquivo hosts:


Adicione a seguinte linha:


127.0.0.1 metas-ja-system


5. Acesse `http://metas_ja_system.local` no seu navegador para acessar o aplicativo.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir **issues** ou enviar **pull requests** para melhorar o aplicativo.

## Licença

Este projeto é licenciado sob a Licença MIT - consulte o arquivo [LICENSE](LICENSE) para obter detalhes.

## Aviso

Este é um projeto pessoal que pode ser usado por outras pessoas. Certifique-se de ajustar as configurações de segurança, autenticação e outras necessidades específicas para o seu ambiente.
