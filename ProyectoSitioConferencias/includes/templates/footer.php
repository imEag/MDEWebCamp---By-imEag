
  <footer class="site-footer">
    <div class="contenedor grid-footer">
      <div class="footer.info">
        <h3>Sobre <span>MDEWebCamp</span></h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, possimus eos voluptatem natus minus
          nostrum totam molestiae, necessitatibus laborum veniam dolorem adipisci! Lorem ipsum dolor sit, amet
          consectetur adipisicing elit. Molestias possimus perferendis aspernatur ad veritatis sed? Exercitationem,
          ducimus nisi natus, alias in similique, maiores neque hic ipsam accusantium iste commodi nemo? </p>
      </div>
      <div class="ultimos-tweets">
        <h3>Últimos <span>Tweets</span></h3>
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. @iureSaepe</li>
          <li>Lorem ipsum dolor. consectetur adipisicing elit @iureSaepe</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing @iureSaepe</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos reservados <span>MDEWebCamp</span> &copy; 2019</p>
  </footer>



  <!--fin MI CODIGO-->

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')

  </script>

  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>
  <?php //Vamos a cargar un archivo dependiendo de la página
     $archivo = basename($_SERVER['PHP_SELF']); //se obtiene el nombre del archivo
     $pagina = str_replace(".php", "", $archivo); //se quita el .php del nombre(opcional)
     if($pagina == 'invitados' || $pagina == 'index') { //si la página es invitados
      echo '<script src="js/jquery.colorbox.js"></script>';
    } else if($pagina == 'conferencia') { //si la página es conferencia
      echo '<script src="js/lightbox.js"></script>';
     }
  ?>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')

  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>