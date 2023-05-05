<h1 align="center">Alice in Chains Archive</h1>
<h3 align="center">Repositório referente ao projeto final do programa Aprendiz Betabit</h3>

![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/aliceinchains.jpg)

## :memo: Descrição
Alice in Chains Archive é um projeto web full stack responsivo, feito para os fãs da banda, a aplicação consiste em uma página biografica da banda, aonde você poderá ler sobre a história, informações e curiosidades da banda, descrições dos albums e letras músicas enquanto ouve elas, além da principal funcionalidade do site, que permite que usuários logados possam efetuar seus reviews, com nota e contéudo.

Tive como inspiração alguns sites que gosto de utilizar como por exemplo o LastFM, RateYourMusic, Pitchfork e sites biograficos de bandas, porém algo que encontrei em comum foi que nenhum deles haviam todas as funcionalidades que me interessavam, por esse motivo, decidi criar um projeto que englobasse tudo isso.
a história da banda, informações sobre ela, albums e descrições, músicas e suas letras, a reprodução tanto dos albums tanto das músicas e a feature de realizar suas proprias reviews sobre os albums.

## :books: Funcionalidades
A principal funcionalidade do projeto é o CRUD das reviews, após o usuário se registrar e efetuar o login com sucesso, essa funcionalidade é liberada, as reviews são únicas, logo, caso você faça a reviews de album X não poderá fazer novamente, apenas editar e excluir caso deseje, as reviews são publicas e são mostradas na página do album, tanto usuários logados tanto usuários visitantes podem ver a sua opinião sobre o album e a nota que foi dada a ele. 

O sistema permite o registro de novos usuários e o login do mesmo após o finalizar com exito, durante o cadastro no sistema, é exigido um nome de usuário e email, que deverão ser únicos. Após o login, o usuário é autenticado no sistema liberando novas páginas e a opção de realizar o review, a página de perfil é aonde o usuário pode realizar todas as ações em relação a sua conta, nela ele poderá editar os reviews já efetuados ou exclui-los, caso deseje alterar as informações relacionados ao cadastro, o usuário é encaminhado a página de edição de perfil, nela, é possivel fazer a alteração do nome de usuário, email e foto de perfil, seguindo todo o fluxo de validação.

As reviews estão atreladas a um album e um usuário através de chaves estrangeiras e chaves primárias, dessa forma, apenas as reviews que o usuário criou, poderão ser alteradas, essa mesma lógica também é utilizada na visualização delas, na página de cada album, serão mostradas as reviews de todos os usuários que fizeram sobre esse album. 

## :wrench: Tecnologias utilizadas
### Front End
- Vue 3 
- Vue Router
- Axios
- CSS 3 

### Back end
- Laravel 10
- Laravel Sanctum

### Banco de Dados
- MySQL

## :rocket: Layouts
### Desktop

### Home
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/home.png)
### About
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/biography.png)
### Albums
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/albums.png)
### Songs
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/songs1.png)
### Album
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/album1.png)
![](https://github.com/paulohenriquechi/assets/blob/main/desktop/album2.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/albumguest.png)
### Song
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/song.png)
aqui por algum motivo não apareceu o iframe do spotify na screenshot
### Login
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/login.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/loginerror.png)
### Register
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/register.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/registererror.png)
### Profile
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/profile.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/profileedit.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop/profilepicture.png)
![](https://raw.githubusercontent.com/paulohenriquechi/assets/main/desktop//profileerror.png)

### Mobile
As screenshots de mobile ficaram muito compridas, segue o mesmo padrão do desktop
https://github.com/paulohenriquechi/assets/tree/main/mobile


