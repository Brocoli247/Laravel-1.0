<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosméticos | Proyecto Tienda Online</title>
    <link rel="stylesheet" href="./Estilos.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Cosméticos</a>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#lista-1">Productos</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
            <div>
                <ul>
                    <li class="submenu">
                        <img src="./imagenes/car.svg" id="img-carrito" alt="Carrito de compras">
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="javascript:void(0);" id="vaciar-carrito" class="boton2">Vaciar Carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-content container">
            <div class="header-img">
                <img src="./imagenes/selenamaquillaje-removebg-preview.png" alt="Modelo promocional">
            </div>
            <div class="header-txt">
                <h1>Ofertas Especiales</h1>
                <a href="#lista-1" class="boton2">Compra ahora</a>
            </div>
        </div>
    </header>

    <section class="ofert container">
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="./imagenes/labialdior-removebg-preview.png" alt="Labial Dior">
            </div>
            <div class="ofert-txt">
                <h3>OFF% 🔥</h3>
            </div>
        </div>
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="./imagenes/maquillaje-elf-removebg-preview.png" alt="Maquillaje ELF">
            </div>
            <div class="ofert-txt">
                <h3>OFF% 🔥</h3>
            </div>
        </div>
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="./imagenes/rarebeautyblush-removebg-preview.png" alt="Blush Rare Beauty">
            </div>
            <div class="ofert-txt">
                <h3>OFF% 🔥</h3>
            </div>
        </div>
    </section>

    <main class="products container" id="lista-1">
        <h2>Productos</h2>
        <h3>TUS FAVORITOS DE ROSTRO</h3>
        <div class="products-content">

            <div class="products">
                <img src="./imagenes/glosself-rojo.jpg" alt="Labial rojo">
                <div class="product-txt">
                    <h3>Labial Mate Líquido Rojo</h3>
                    <p>Una explosión de color intenso y acabado mate...</p>
                    <p class="precio">$80</p>
                    <a href="#" class="agregar-carrito boton2" data-id="1">Agregar al carrito</a>
                </div>
            </div>

            <div class="products">
                <img src="./imagenes/paletaojos.jpg" alt="Paleta iluminadores">
                <div class="product-txt">
                    <h3>Paleta de Tres Colores de Iluminadores</h3>
                    <p>¡Brilla como nunca! Descubre esta paleta con tres tonos...</p>
                    <p class="precio">$250</p>
                    <a href="#" class="agregar-carrito boton2" data-id="2">Agregar al carrito</a>
                </div>
            </div>

            <div class="products">
                <img src="./imagenes/rimelbenefit.jpg" alt="Rímel Benefit">
                <div class="product-txt">
                    <h3>Máscara de Pestañas Duo Súper Alargadoras</h3>
                    <p>Para unas pestañas que impactan...</p>
                    <p class="precio">$130</p>
                    <a href="#" class="agregar-carrito boton2" data-id="3">Agregar al carrito</a>
                </div>
            </div>

            <div class="products">
                <img src="./imagenes/lacomeproductos.jpg" alt="Productos Lancôme">
                <div class="product-txt">
                    <h3>Lancôme Productos para el Cuidado de la Cara</h3>
                    <p>Consiente tu piel con este exclusivo set de cuidado facial...</p>
                    <p class="precio">$400</p>
                    <a href="#" class="agregar-carrito boton2" data-id="4">Agregar al carrito</a>
                </div>
            </div>

            <div class="products">
                <img src="./imagenes/brochas.jpg" alt="Set de brochas">
                <div class="product-txt">
                    <h3>Set de 5 Brochas de Maquillaje</h3>
                    <p>Completa tu colección con este set de brochas premium...</p>
                    <p class="precio">$350</p>
                    <a href="#" class="agregar-carrito boton2" data-id="5">Agregar al carrito</a>
                </div>
            </div>

            <div class="products">
                <img src="./imagenes/blushrarebeatyliquido.jpg" alt="Blush líquido">
                <div class="product-txt">
                    <h3>Contorno líquido para rostro</h3>
                    <p>Un contorno líquido ligero y fácil de difuminar...</p>
                    <p class="precio">$70</p>
                    <a href="#" class="agregar-carrito boton2" data-id="6">Agregar al carrito</a>
                </div>
            </div>

        </div>
    </main>

    <section class="blog container">
        <h2>PRÓXIMOS LANZAMIENTOS</h2>

        <div class="blog-1">
            <img src="./imagenes/enchinador.avif" alt="Enchinador Dior">
            <h3>Enchinador Dior</h3>
            <p>Dale a tus pestañas un rizo impecable y duradero...</p>
        </div>

        <div class="blog-1">
            <img src="./imagenes/setbrochascosmetiquera.avif" alt="Cosmetiquera con brochas">
            <h3>Cosmetiquera con 3 Brochas</h3>
            <p>Un combo esencial para tus rutinas de maquillaje...</p>
        </div>

        <div class="blog-1">
            <img src="./imagenes/cepilloparacejas.avif" alt="Lápiz para cejas">
            <h3>Lápiz de Cejas Súper Duradero</h3>
            <p>Definición y duración en un solo producto...</p>
        </div>
    </section>

    <footer class="footer" id="contacto">
        <div class="footer-content container">
            <div class="link">
                <h3>¿NECESITAS AYUDA?</h3>
                <ul>
                    <li>
                        <p>
                            Escríbenos a sistemas8vo@upem.com<br>
                            o Llámanos al 000-000-000<br>
                            Lunes a Sábado de 9 am a 9 pm
                        </p>
                    </li>
                </ul>
            </div>
            <div class="link">
                <h3>TECNOLOGÍAS WEB</h3>
                <ul>
                    <li>
                        <p>
                            Este proyecto fue desarrollado utilizando tecnologías clave como HTML, JavaScript y CSS.
                            <br><br>Alberto Arellano Álvarez
                            <br>César Uriel Barajas López
                            <br>Naomi Amayrami Barrientos Herrera
                            <br>José Francisco Guzmán Solís
                            <br>Leslie Ortiz Domínguez
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="./Carrito.js"></script>
</body>
</html>