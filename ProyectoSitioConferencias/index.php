<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, beatae consectetur ad sunt optio sequi in quidem
    laborum explicabo facilis vel quaerat exercitationem atque molestias perferendis? Facilis porro libero
    distinctio.
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat dolore recusandae officiis laborum excepturi ab
    nesciunt! Earum possimus consectetur maxime dolorum.
  </p>
</section><!-- fin .seccion-->

<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="img/bg-talleres.jpg" muted>
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">
    </video>
  </div>
  <!--fin .contenedor-video-->
  <div class="contenedor-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del evento</h2>

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php'); //incluye la conexion a la db
          $sql = "SELECT * FROM `categoria_evento` "; //Código SQL para la consulta
          $resultado = $conn->query($sql); //Ejecuta consulta y almacena resultados
        } catch (\Exception $e) {
          echo $e->getMessage(); //Excepción por si hay error
        }
        ?>

        <nav class="menu-programa">
          <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat['cat_evento']; ?>
            <a href="#<?php echo strtolower($categoria); ?>"><i class="fas <?php echo $cat['icono']; ?>" aria-hidden="true"></i><?php echo $categoria; ?></a>
          <?php } ?>
        </nav>

        <?php
        try {
          require_once 'includes/funciones/bd_conexion.php';
          $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado 
           FROM eventos 
           INNER JOIN categoria_evento 
           ON eventos.id_cat_evento = categoria_evento.id_categoria 
           INNER JOIN invitados 
           ON eventos.id_inv = invitados.invitado_id 
           AND eventos.id_cat_evento = 1 
           ORDER BY evento_id LIMIT 2; 
          SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado 
           FROM eventos 
           INNER JOIN categoria_evento 
           ON eventos.id_cat_evento = categoria_evento.id_categoria 
           INNER JOIN invitados 
           ON eventos.id_inv = invitados.invitado_id 
           AND eventos.id_cat_evento = 2 
           ORDER BY evento_id LIMIT 2; 
          SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado 
           FROM eventos 
           INNER JOIN categoria_evento 
           ON eventos.id_cat_evento = categoria_evento.id_categoria 
           INNER JOIN invitados 
           ON eventos.id_inv = invitados.invitado_id 
           AND eventos.id_cat_evento = 3 
           ORDER BY evento_id LIMIT 2;";
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>

        <?php $conn->multi_query($sql) ?>

        <?php
        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?>
          <?php if ($i % 2 == 0) { ?>
            <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar">
            <?php } ?>
            <?php foreach ($row as $evento) { ?>

              <div class="detalle-evento">
                <h3><?php echo utf8_encode($evento['nombre_evento']); ?></h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                <p><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $evento['fecha_evento']; ?></p>
                <p><i class="fas fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
              </div>

              <?php if($i % 2 == 1) { ?>
                <a href="calendario.php" class="boton">Ver todos</a>
              </div> <!-- .talleres -->
              <?php } ?>
          <?php $i++; } $resultado->free(); ?>
        <?php } while ($conn->more_results() && $conn->next_result());
        ?>


      </div>
      <!--fin .programa-evento-->
    </div>
    <!--fin .contenedor-->
  </div>
  <!--fin .contenido-programa-->
</section>
<!--fin .programa-->

<?php include_once 'includes/templates/invitados.php'; ?>
<!-- Invitados -->

<div class="contador parallax ">
  <div class="contenedor">
    <ul class="cuenta cuenta-invitados">
      <li>
        <p class="numero">6</p>Invitados
      </li>
      <li>
        <p class="numero">15</p>Talleres
      </li>
      <li>
        <p class="numero">3</p>Días
      </li>
      <li>
        <p class="numero">9</p>Conferencias
      </li>
    </ul>
  </div>
</div>

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precio">
      <li>
        <div class="tabla-precio">
          <h3>Pase por día</h3>
          <p class="numero">$30</p>
          <ul>
            <li><i class="fas fa-check"></i>Bocadillos gratis</li>
            <li><i class="fas fa-check"></i>Todas las conferencias</li>
            <li><i class="fas fa-check"></i>Todos los talleres</li>
          </ul>
          <a href="#" class="boton hollow">Comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li><i class="fas fa-check"></i>Bocadillos gratis</li>
            <li><i class="fas fa-check"></i>Todas las conferencias</li>
            <li><i class="fas fa-check"></i>Todos los talleres</li>
          </ul>
          <a href="#" class="boton">Comprar</a>
        </div>
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Pase por dos días</h3>
          <p class="numero">$45</p>
          <ul>
            <li><i class="fas fa-check"></i>Bocadillos gratis</li>
            <li><i class="fas fa-check"></i>Todas las conferencias</li>
            <li><i class="fas fa-check"></i>Todos los talleres</li>
          </ul>
          <a href="#" class="boton hollow">Comprar</a>
        </div>
      </li>
    </ul>
  </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor">
    <div class="testimonial">
      <blockquote>
        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, unde
          inventore, distinctio saepe fugit
          dolores laboriosam possimus vero.</p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--fin .testimonial-->

    <div class="testimonial">
      <blockquote>
        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, unde
          inventore, distinctio saepe fugit
          dolores laboriosam possimus vero.</p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--fin .testimonial-->

    <div class="testimonial">
      <blockquote>
        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, unde
          inventore, distinctio saepe fugit
          dolores laboriosam possimus vero.</p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--fin .testimonial-->
  </div>
</section>

<div class="parallax newsletter">
  <div class="contenido contenedor">
    <p>Regístrate el newsletter:</p>
    <h3>MDEWebCamp</h3>
    <a href="#" class="boton transparente">Registro</a>
  </div>
</div>

<section class="seccion">
  <h2>Faltan</h2>
  <div class="contenedor">
    <ul class="cuenta cuenta2 cuenta-regresiva">
      <li>
        <p id="dias" class="numero"></p>Días
      </li>
      <li>
        <p id="horas" class="numero"></p>Horas
      </li>
      <li>
        <p id="minutos" class="numero"></p>Minutos
      </li>
      <li>
        <p id="segundos" class="numero"></p>Segundos
      </li>
    </ul>
  </div>
</section>
<?php include_once 'includes/templates/footer.php'; ?>