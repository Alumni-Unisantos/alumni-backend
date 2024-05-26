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