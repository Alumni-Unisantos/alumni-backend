Para executar o projeto, é necessário ter uma versão do php instalada em sua máquina (Versão >= 8.0)

https://www.apachefriends.org/pt_br/index.html


Após a instalação do servidor apache e do php por meio do link acima, é necessário efetuar a instalação do composer e também do framework symfony CLI

--> Composer: https://getcomposer.org/download/

--> Symfony CLI: https://symfony.com/download

Após concluir a instalação, é necessário

acessar a pasta alumni-rest-api e na raiz desta pasta, executar o comando:

composer install

PONTO IMPORTANTE: Ajuste o arquivo .env (responsável pela conexão com a base dados) de acordo com as suas informações

Por fim, execute o comando:
symfony server:start


Dica: Segue um vídeo bem útil referente a execução de um projeto php por meio do symfony: https://www.youtube.com/watch?v=dMdOKT4hfwc&ab_channel=Binaryboxtuts

**#Criação do Feed**\
Integrantes:\
-Alec Emil Meier\
-Adrielle Valascvijus Fernandes\
-Daniel Domingues Gama\
-Gustavo Andrade\
-Henry Mitsuo Kasai\
-Lavínia Lopes de Lana\
-Leonardo Wright Lima\
-Matheus Gois Rocha\
-Matheus Moledo Fonseca Vasconcelos\
-Michael Douglas Santos Costa\
-Raquel Nazaré Belfort Costa\
-Thiago Conrado Martins\

**Alterações**:
	Criação da página de feed com as funcionalidades de buscar postagens e inserir postagens.\
  Ao abrir a página é realizada uma requisição ao back-end buscando as postagens em ordem decrescente da data da postagem e retornado ao front-end para serem exibidas.\
  Contudo, é possível observar que a integração com o banco de dados foi realizada de forma local e a estrutura de usuários ainda não foi criada, e por isso está sendo exibido uma imagem padrão na foto do usuário, assim com um nome padrão.
  
**Algumas possíveis sugestões de melhorias futuras são:**\
-Criação da estrutura de usuários, assim como a integração deles com o banco de dados;\
-Inserção de novas funcionalidades sobre as postagens. Exemplo: editar, excluir, curtir, comentar, compartilhar.\
-Inserir novos tipos de postagens. Exemplo: evento, enquete, inserção de imagens.
