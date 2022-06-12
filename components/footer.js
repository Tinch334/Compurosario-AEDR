const footerTemplate = document.createElement('template');

footerTemplate.innerHTML = `
<style>
html {
    visibility: hidden;
}

body {
    font-family: 'Poppins', sans-serif;
}

.start-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: white;
    background-color: #112B3C;
}

.info-footer {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-around;
    width: 70%;
    align-items: flex-start;
}

.info-footer div {
    width: 30%;
}

.info-footer h3 {
    font-weight: bold;
}

.footer-info ul, .footer-brands ul {
    padding: 0;
    list-style-type: none;
    margin: 10px 0;
    font-size: 120%;
}

.footer-brands-list {
    column-count: 2;
}

.copyright-footer {
    margin-top: 1%;
    margin-bottom: 1%
    background-color: red;
}
</style>

<footer class="start-footer">
    <div class="info-footer">
        <div class="footer-info">
            <h3>INFORMACION</h3>
            <ul>
                <li><b>Dirección:</b> Pueyrredón 1257</li>
                <li><b>Teléfono:</b> +54 (341) 9684 3870</li>
                <li><b>Email:</b> compurosario@ags.com</li>
                <li><b>Horario:</b> Lunes a Viernes (09 a 18)</li>
            </ul>
        </div>
    
        <div class="footer-brands">
            <h3>NUESTRAS MARCAS</h3>
            <ul class="footer-brands-list">
                <li>Intel</li>
                <li>AMD</li>
                <li>Gigabyte</li>
                <li>Logitech</li>
                <li>Asus</li>
                <li>Asrock</li>
                <li>Corsair</li>
                <li>HyperX</li>
                <li>LG</li>
                <li>Samsung</li>
            </ul>
        </div>

        <div class="footer-who-are-we">
            <h3>QUIENES SOMOS</h3>
            Somos una empresa familiar que se dedica a este rubro desde hace 6 años, nuestros clientes nos recomiendan porbuena atención y nuestros precios baratos, pero no tanto ;) Nos comprometemos a mantener una política de atención prioriza al cliente y su comodidad. Ante cualquier cosa, no dudes en comunicarte por medio de nuestro mail, mucgracias!
        </div>
    </div>
    
    <div class="copyright-footer">
            © 2022 COMPUROSARIO - Todos los Derechos Reservados
    </div>      
</footer>
`;

class Footer extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'closed' });

        shadowRoot.appendChild(footerTemplate.content);
    }
}

customElements.define('footer-component', Footer);