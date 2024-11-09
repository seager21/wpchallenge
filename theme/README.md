# Champions WordPress Theme - Homepage com dois blocos Gutenberg

Este tema foi realizado como parte de um projeto-desafio para a WYPerformance, que visa na criação de uma Homepage com header, hero, footer, e dois blocos Gutenberg, (1) apresentar uma galeria em slider que deve ser editável em backoffice, e (2) apresenta um título, descrição, e uma lista de até 6 artigos (com título, descrição e imagem) em que seja possível editar os campos do bloco e ainda alterar o número de artigos a mostrar.


## Conteúdo
- [Requesitos](#Requesitos)
- [Tecnologias Utilizadas](#technologies-used)
- [Instalação](#Instalação)
- [Utilidade](#Utilidade)
- [Customização](#Customização)

---

## Requesitos

- **Custom Gutenberg Blocks**:
  - **Slider Gallery**: Dispõe uma galeria em slider.
  - **Article List**: Dispõe uma lista dos artigos, com título, descrição, imagem e link.
- **Responsive Design**: Realizado com layout responsivo em CSS e Bootstrap
- **Custom Post Type for Events**: Lista de eventos, em que são postos em um novo Post Type e são listados num template diferente, com paginação
- **Custom Templates**: `header.php`, `footer.php`, `index.php`, com templates customizados para eventos e motor de pesquisa.

---

## Tecnologias Utilizadas

- **WordPress**: Gestão de conteúdos.
- **Advanced Custom Fields (ACF)**: Plugin de criação de blocos customizãveis.
- **Bootstrap 4**: Responsivo.
- **HTML, CSS, JavaScript**: Interatividade e desenvolvimento do código padrão.
- **Visual Studio Code**: Ferramenta utilizada para realização da edição de código.
- **XAMPP/MySQL**: Painel de controlo para criaçaõ da base de dados em MySQL, para ser realizado localmente.

---

## Instalação

1. **Clonar Repository**: Este repositório pode ser clonado através da diretoria `wp-content/themes`
   ```bash
   git clone https://github.com/seager21/wpchallenge.git
2. **Base de dados**: Pelo `http://localhost/phpmyadmin/`, criação de uma base de dados onde irá se instalar o WordPress, para a realização do projeto
3. **Import Theme**: Importação do tema para o WordPress
---

## Utilidade
- **Add Content to Blocks**
  - **Slider Gallery**
  - **Article List**
- **Events**
- **Search Page**

---

## Customização

-  Foi utilizado, pelo CSS, a gestão do layout, das cores, estilos, e o template dos campos personalizáveis. A realização da extensão dos blocos Gutenberg podem ser alterados em backoffice em `template-parts` na pasta raiz do tema.