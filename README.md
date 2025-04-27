# 🌍 Consulta de Municípios Brasil

## Projeto AULA FATEC

**Desenvolvido por:** Kevin Dourado, Gabriel Soares Velozo e Vinícius Ferraz Castro

## 📝 Descrição

Este projeto foi desenvolvido como parte das atividades acadêmicas da FATEC, com foco na integração e consumo de APIs públicas utilizando PHP. A aplicação consome a API de Municípios do IBGE, permitindo aos usuários visualizar todos os estados brasileiros e seus respectivos municípios de forma dinâmica e interativa.

## 🚀 Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada no backend para realizar requisições HTTP e processar dados
- **API IBGE**: [Documentação Oficial](https://servicodados.ibge.gov.br/api/docs/localidades) - Fonte dos dados geográficos brasileiros
- **Bulma CSS**: Framework CSS para criação de interfaces responsivas e modernas
- **HTML5**: Estruturação semântica do conteúdo web
- **JavaScript**: Implementação de interatividade e requisições dinâmicas

## 🎯 Funcionalidades

- Listagem completa dos estados brasileiros com suas siglas e nomes
- Consulta dinâmica de municípios filtrados por estado selecionado
- Interface de usuário intuitiva, responsiva e moderna usando Bulma CSS
- Requisições assíncronas à API do IBGE via PHP
- Exibição organizada dos resultados em formato de lista

## ⚙️ Como Executar o Projeto

### Pré-requisitos

- Servidor web (Apache, Nginx, etc.)
- PHP 7.2 ou superior
- Conexão com a internet (para acessar a API do IBGE)

### Instalação e Execução

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/php-api-fatec.git
   cd php-api-fatec
   ```

2. **Configure seu servidor web:**
   - Coloque os arquivos do projeto no diretório do seu servidor web
   - Para XAMPP: `htdocs/php-api-fatec`
   - Para WAMP: `www/php-api-fatec`

3. **Inicie seu servidor web:**
   - XAMPP: Inicie os serviços Apache pelo painel de controle
   - WAMP: Inicie os serviços pelo ícone na bandeja do sistema

4. **Acesse a aplicação:**
   - Abra seu navegador e digite: `http://localhost/php-api-fatec`
   - Ou, se estiver usando uma porta específica: `http://localhost:porta/php-api-fatec`

### Executando sem servidor web local

Você também pode utilizar o servidor embutido do PHP para testes:

```bash
cd php-api-fatec
php -S localhost:8000
```

Agora basta acessar `http://localhost:8000` no seu navegador.

## 🔍 Uso da Aplicação

1. Ao acessar a página inicial, você verá a lista de todos os estados brasileiros
2. Selecione um estado para visualizar todos os seus municípios
3. Os municípios serão exibidos em ordem alfabética
4. É possível voltar à seleção de estados a qualquer momento

## 🔧 Estrutura do Projeto

```
php-api-fatec/
│
├── index.php                # Página principal da aplicação
├── readme.md                # Documentação do projeto
├── styles.css               # Personalizações sobre o Bulma
├── printgetpostman.png              # Print da requisição GET no Postman

```

## 📝 Licença

Este projeto é distribuído sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests com melhorias e correções.

## 📧 Contato

Para questões, sugestões ou feedback sobre o projeto:
- Kevin Dourado - [kevin.email@example.com](mailto:kevin.email@example.com)
- Gabriel Soares Velozo - [gabriel.email@example.com](mailto:gabriel.email@example.com)
- Vinícius Ferraz Castro - [vinicius.email@example.com](mailto:vinicius.email@example.com)
