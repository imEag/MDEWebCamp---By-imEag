<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
    <h2>Calendario de eventos</h2>

    <?php
    try {
        require_once('includes/funciones/bd_conexion.php'); //incluye la conexion a la db
        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado 
        FROM eventos 
        INNER JOIN categoria_evento 
        ON eventos.id_cat_evento = categoria_evento.id_categoria 
        INNER JOIN invitados 
        ON eventos.id_inv = invitados.invitado_id "; //Código SQL para la consulta

        /* echo $sql; */

        $resultado = $conn->query($sql); //Ejecuta consulta y almacena resultados
    } catch (\Exception $e) {
        echo $e->getMessage(); //Excepción por si hay error
    }
    ?>

    <div class="calendario">
        <?php
        $calendario = array(); //Array donde se almacenará todo y se organizará por fecha


        while ($eventos = $resultado->fetch_assoc() /* organiza los datos traidos en forma de array formateado y lo alamacena */) {
            $fecha = $eventos['fecha_evento']; //Obtiene la fecha de cada evento

            $evento = array( //Nuevo Array formateado manualmente
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => "fa " . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );
            $calendario[$fecha][] = $evento; //Almacena el Array en otro Array y lo organiza por fecha

        } ?>

        <?php
        foreach ($calendario as $dia => $lista_eventos) { ?>
            <!-- Recorre el arreglo calendario -->
            <h3>
                <i class="fa fa-calendar"></i>
                <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8'); //Cambia el idioma de la hora a español (Linux y Mac)
                    setlocale(LC_TIME, 'spanish');    //Cambia el idioma de la hora a español (Windows)

                    echo strftime("%d de %B de %Y", strtotime($dia)); //le da formato a la hora
                    ?>
            </h3>
            <div class="eventos">
            <?php
                foreach ($lista_eventos as $evento) { ?>
                <div class="dia">
                    <p class="titulo">
                        <?php echo $evento['titulo']; ?>
                    </p>
                    <p class="hora">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php
                        echo $evento['fecha'] . " " . $evento['hora'];
                        ?>
                    </p>
                    <p>
                        <i class="<?php echo $evento['icono']; ?> " aria-hidden="true"></i>
                        <?php echo $evento['categoria']; ?>
                    </p>
                    <p>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo $evento['invitado']; ?></p>
                </div>
            <?php } ?>
            <!-- Fin foreach evento -->
            </div>
        <?php } ?>
        <!-- Fin foreach dia -->
       
        <!-- <pre>
            <?php
            /* var_dump($calendario); */ //Imprime el arreglo final
            ?>
        </pre> -->
        
    </div>

    <?php
    $conn->close(); //cierra la conexión a la db
    ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>