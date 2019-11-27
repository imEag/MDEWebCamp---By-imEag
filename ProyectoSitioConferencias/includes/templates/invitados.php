
    <?php
    try {
        require_once('includes/funciones/bd_conexion.php'); //importa conexion con la db
        $sql = "SELECT * FROM invitados"; //Código de la consulta SQL
        $resultado = $conn->query($sql); //Realiza la conslta
    } catch (\Exception $e) {
        echo $e->getMessage(); //Excepcion
    }
    ?>



    <section class="invitados contenedor seccion">
        <h2>Invitados</h2>
        <ul class="lista-invitados">
            <?php while ($invitados = $resultado->fetch_assoc()) { ?> <!-- Acomoda los resultados en array y trae todos los datos-->
                <li>
                    <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>"> <!-- link al invitado -->
                        <div class="invitado">
                            <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="Imagen invitado"> <!-- Imagen del invitado -->
                            <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></p> <!-- Nombre -->
                        </div>
                    </a>
                </li>
                <div style="display:none"> <!-- Pop up de la info del invitado con colorbox.js -->
                    <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                        <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></h2>
                        <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="Imagen invitado">
                        <p><?php echo $invitados['descripcion']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </ul>
    </section>
    <?php $conn->close(); ?>
    <!-- cierra la conexión a la db -->
