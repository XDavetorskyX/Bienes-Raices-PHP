<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Contamos con un amplio historial en este tipo de negocio, como dice el titulo llevamos 25 años en el mercado, por lo que le garantizamos que esta trabajando con profecionales que pueden orientarlo y guiarlo por el camino</p>

                <p>Tambien resaltamos y presumimos una larga lista de exitos y clientes satisfechos con su nueva adquisicion, asi que puede estar calmado por el trato, interes y atencion que le brindaremos, nosotros nos comprometemos a ser serviciales, atentos y amigables hacia usted.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Tenemos una seguridad de elite colaborando con un equipo profecional por lo que puedes confiar con nosotros</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Con un plan de un unico pago podras adquirir una casa en cuestion de segundos, ademas de que los costos son competentes y justos</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>No te irrites por el papeleo molesto, nosotros lo hacemos por ti, cuidando de tu informacion y siendo mas rapidos que un relampago</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>