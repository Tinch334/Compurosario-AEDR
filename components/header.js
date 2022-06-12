const headerTemplate = document.createElement('template');

headerTemplate.innerHTML = `
<style>
html {
    visibility: hidden;
}

body {
    font-family: 'Poppins', sans-serif;
}

.page-header {
    background-color: #112B3C;
}

.page-header {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: flex-end;
}

.img-logo {
    width: 120px;
    height:auto;
    margin: 0.5em;
}

.page-interactive {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    margin-bottom: 0.3em;
}

.search-bar-div {
    width: 100%;
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: center;
    margin-left: 0.3%;
    margin-left: 4%;
    margin-right: 4%;
}

.search-bar {
    width: 100%;
    height: 30px;
    border: 1.5px solid #707070;
    border-radius: 4px;
}

.search-button {
    width: 1.5em;
    height: auto;
    margin-left: 0.5em;
    filter: invert(1);
}

.header-button-text {
    font-size: 100%;
    font-weight: bold;
    margin-left: 0.05em;
    color: white;
}

.page-interactive button {
    height: 30px;
    cursor: pointer;
    background-color: #F66B0E;
    border: none;
    outline: none;
    border-radius: 5px;
    margin-right: 0.3%;
}

.cart-button {
    width: 160px;
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    width: 180px;
    height: 30px;
    cursor: pointer;
    background-color: #F66B0E;
    border: none;
    outline: none;
    border-radius: 5px;
    margin-right: 0.3%;
 }
 
.cart-button-image {
    width: 25%;
    height: auto;
    transform: scaleX(-1);
}

.login-button {
    width: 100px;
}

.profile-button {
    width: 70px;
}
</style>

<header class="page-header" id="page-hd">
    <img class="img-logo" src="../Images/Main page/Logo.png" alt="logo pagina">
    
    <div class="page-interactive">
        <div class="search-bar-div">
            <input class="search-bar" type="text" placeholder="Busca un componente">
            <input type="image" src="../Images/Main page/Magnifying glass.svg" class="search-button"/>
        </div>
        
        <button type="button" class="cart-button">
            <img class="cart-button-image" src="../Images/Main page/Shopping cart.svg">
            <span class="header-button-text">CARRITO (0)</span>
        </button>

        <button type="button" id="login-button" class="login-button">
            <span class="header-button-text">INGRESAR</span>
        </button>

        <button type="button" id="profile-button" class="profile-button" onclick="location.href='/TRES/Profile/profile.html';">
            <span class="header-button-text">PERFIL</span>
        </button>
    </div>
</header>
`;

class Header extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'closed' });

        shadowRoot.appendChild(headerTemplate.content);
    }
}

customElements.define('header-component', Header);