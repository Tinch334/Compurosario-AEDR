<!DOCTYPE html>
<html lang="es">

<head>
    <title>COMPUROSARIO</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/tests/headerTemplate/header.css">

    <!--Page font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
    integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- page js -->
    <script src=">headerTemplate/header.js" defer></script>

    <!-- slick script cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/tests/Images/Main page/Favicon.png">
</head>
<body>
    <header class="page-header" id="page-hd">
        <img class="img-logo" src="/tests/Images/Main page/Logo.png" alt="logo pagina">
        
        <div class="page-interactive">
            <div class="search-bar-div">
                <input class="search-bar" type="text" placeholder="Busca un componente">
                <input type="image" src="Images/Main page/Magnifying glass.svg" class="search-button"/>
            </div>
            
            <button type="button" class="cart-button">
                <img class="cart-button-image" src="Images/Main page/Shopping cart.svg">
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

    <div id="login-modal" class="login-modal">
        <div class="login-modal-content">
            <div class="modal-header">
                <div class="modal-logo-header">
                    <img class="img-modal" src="Images\Main page\Logo no text.png" alt="logo pagina">
                    <p class="modal-text">COMPUROSARIO</p>
                </div>
                <span class="modal-close">&times;</span>
            </div>
            <div>
                <form method="post" class=login-form id="login-form">
                    <div class="login-username">
                        <input type="text" id="username" name="username" required=True  placeholder="Usuario">
                    </div>
                    <div class="login-password">
                        <input type="password" id="password" name="password" required=True  placeholder="Contraseña">
                    </div>
                    <div>
                        <input type="submit" value="Ingresar">
                    </div>
                </form>
            </div>
            <div class="modal-login-errors">
                <p id="modal-login-user-error">Usuario incorrecto</p>
                <p id="modal-login-verify-error">Usuario no verificado</p>
                <p id="modal-login-password-error">Contraseña incorrecta</p>
            </div>
            <div class="modal-register-link-div">
                <p class="modal-register-text">¿No tenes una cuenta? <a href="UserHandling/register.html" class="modal-register-link">Registrate!</a></p>
            </div>
        </div>
    </div>
</html>