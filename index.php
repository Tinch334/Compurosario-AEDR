<!DOCTYPE html>
<html lang="es">

<head>
    <title>COMPUROSARIO</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Page font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- page js -->
    <script src="script.js" defer></script>

    <!-- slick script cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="Images/Main page/Favicon.png">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/tests/headerTemplate/header.php"; ?>

    <div class="navbar">     
        <div class="cpu-dropdown dropdown">
            <button class="cpu-dropdown-button dropdown-button">CPUs 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="cpu-dropdown-content dropdown-content">
                <a href="#">Intel - LGA 1200</a>
                <a href="#">Intel - LGA 1700</a>
                <a href="#">AMD - AM4</a>
            </div>
        </div>

        <div class="motherboard-dropdown dropdown">
            <button class="motherboard-dropdown-button dropdown-button">MOTHERBOARDS 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="motherboard-dropdown-content dropdown-content">
                <a href="#">Intel - LGA 1200</a>
                <a href="#">Intel - LGA 1700</a>
                <a href="#">AMD - AM4</a>
            </div>
        </div>

        <div class="memorias-dropdown dropdown">
            <button class="memorias-dropdown-button dropdown-button">MEMORIAS 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="memorias-dropdown-content dropdown-content">
                <a href="#">DDR5</a>
                <a href="#">DDR4</a>
                <a href="#">DDR3</a>
                <a href="#">SODIMM</a>
            </div>
        </div>

        <div class="perifericos-dropdown dropdown">
            <button class="perifericos-dropdown-button dropdown-button">PERIFERICOS 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="perifericos-dropdown-content dropdown-content">
                <a href="#">Mouse</a>
                <a href="#">Teclados</a>
                <a href="#">Auriculares</a>
                <a href="#">Parlantes</a>
                <a href="#">Microfonos</a>
            </div>
        </div>
        
        <a href="#">ALMACENAMIENTO</a>
        <a href="#">REFIGERACION</a>
        <a href="#">FUENTES</a>
        <a href="#">GABINETES</a>
        <a href="#">NOTEBOOKS</a>
        <a href="#">IMPRESORAS</a>
        <a href="#">MONITORES</a>
    </div>

    <div class="carousel-title">
        <h1>DESCUENTOS</h1>
    </div>
    <section class="slider">
        <ul id="autoWidthDiscount" class="cs-hidden">	
            <!--1------------------------------------>	
            <li class="item-a">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/AMD ATHLON.png" alt="1">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>  
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador AMD Athlon</a>
                            <span>2 núcleos, 3.5GHz de frecuencia</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            <!--2------------------------------------>	
            <li class="item-b">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Core i5.png" alt="2">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Core i5</a>
                            <span>Intel Core i5-10400F BX8070110400F</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            <!--3------------------------------------>	
            <li class="item-c">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Gigabyte 3090.png" alt="3">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Gigabyte RTX 3090</a>
                            <span>RTX 3090 GV-N3090GAMING OC-24GD OC Edition 24GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>

            <!--4------------------------------------>	
            <li class="item-d">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/GPU Zotac.png" alt="4">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">GPU Zotac</a>
                            <span>RTX 2060 Black Nvidia Zotac Gddr6 6 GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            
            <!--5------------------------------------>	
            <li class="item-e">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/i5 10ma.png" alt="5">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Core i5 (10ma generacion)</a>
                            <span>Graf. Integr, 8 De Ram, 1000 GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            
            <!--6------------------------------------>	
            <li class="item-f">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Intel Celeron.png" alt="6">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Celeron</a>
                            <span>Intel Celeron G5905 BX80701G5905</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            <!--7------------------------------------>	
            <li class="item-g">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Pentium Gold.png" alt="7">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Pentium Gold</a>
                            <span>Intel Pentium G6400 BX80701G6400</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
            <!--8------------------------------------>	
            <li class="item-h">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/RAM Corsair.png " alt="8">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>	
                            <a href="#" class="buy-btn">Visitar pagina</a>	
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Memoria RAM DDR4 Corsair</a>
                            <span>(8GB) Corsair CMSX8GX4M1A2400C16</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>		
            </li>
        </ul>
    </section>


    <div class="carousel-title">
        <h1>PRODUCTOS NUEVOS</h1>
    </div>
    <section class="slider">
        <ul id="autoWidthNew" class="cs-hidden">   
            <!--1------------------------------------>  
            <li class="item-a">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/AMD ATHLON.png" alt="1">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>  
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador AMD Athlon</a>
                            <span>2 núcleos, 3.5GHz de frecuencia</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            <!--2------------------------------------>  
            <li class="item-b">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Core i5.png" alt="2">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Core i5</a>
                            <span>Intel Core i5-10400F BX8070110400F</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            <!--3------------------------------------>  
            <li class="item-c">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Gigabyte 3090.png" alt="3">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Gigabyte RTX 3090</a>
                            <span>RTX 3090 GV-N3090GAMING OC-24GD OC Edition 24GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>

            <!--4------------------------------------>  
            <li class="item-d">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/GPU Zotac.png" alt="4">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">GPU Zotac</a>
                            <span>RTX 2060 Black Nvidia Zotac Gddr6 6 GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            
            <!--5------------------------------------>  
            <li class="item-e">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/i5 10ma.png" alt="5">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Core i5 (10ma generacion)</a>
                            <span>Graf. Integr, 8 De Ram, 1000 GB</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            
            <!--6------------------------------------>  
            <li class="item-f">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Intel Celeron.png" alt="6">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Celeron</a>
                            <span>Intel Celeron G5905 BX80701G5905</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            <!--7------------------------------------>  
            <li class="item-g">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/Pentium Gold.png" alt="7">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Procesador Intel Pentium Gold</a>
                            <span>Intel Pentium G6400 BX80701G6400</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
            <!--8------------------------------------>  
            <li class="item-h">
                <!--box-slider--------------->
                <div class="box">
                    <!--img-box---------->
                    <div class="slide-img">
                    <img src="Images/Main page/products/RAM Corsair.png " alt="8">
                        <!--overlayer---------->
                        <div class="overlay">
                            <!--buy-btn------>  
                            <a href="#" class="buy-btn">Visitar pagina</a>  
                        </div>
                    </div>
                    <!--detail-box--------->
                    <div class="detail-box">
                        <!--type-------->
                        <div class="type">
                            <a href="#">Memoria RAM DDR4 Corsair</a>
                            <span>(8GB) Corsair CMSX8GX4M1A2400C16</span>
                        </div>
                        <!--price-------->
                        <a href="#" class="price">$23</a>
            
                    </div>
        
                </div>      
            </li>
        </ul>
    </section>

    <?php include $_SERVER['DOCUMENT_ROOT']."/tests/footerTemplate/footer.php"; ?>
</body>
</html>

<!-- Lightsldier -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightslider.css">
<script type="text/javascript" src="lightslider.js"></script>