(function () {
  "use strict";

  let regalo = document.getElementById('regalo');
  document.addEventListener('DOMContentLoaded', function () {

    console.log('Listo el DOM');


    //--------------------------Mapa----------------------------

    if($('#mapa').length > 0) {
    var map= L.map('mapa');
    map.setView([6.303819, -75.57272], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([6.303819, -75.57272]).addTo(map)
      .bindPopup('MDEWebCamp<br> Fácil llegada a Pedregal')
      .openPopup();
  } else {
    console.log('No hay mapa');
  }
    //----------------------FIN Mapa----------------------------



    //Campos datos usuario
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let email = document.getElementById('email');

    //Campos pases
    let pase_dia = document.getElementById('pase_dia');
    let pase_dosdias = document.getElementById('pase_dosdias');
    let pase_completo = document.getElementById('pase_completo');

    //Botones y divs
    let calcular = document.getElementById('calcular');
    let errorDiv = document.getElementById('errorDiv');
    let btnRegistro = document.getElementById('btnRegistro');
    let lista_productos = document.getElementById('lista_productos');
    let suma_total = document.getElementById('suma_total');

    //Extras
    let camisas = document.getElementById('camisa_evento');
    let etiquetas = document.getElementById('etiquetas')

    // Calcular

    if (calcular) {
      calcular.addEventListener('click', calcularMontos);

      //Mostrar Días
      pase_dia.addEventListener('blur', mostrarDias);
      pase_dosdias.addEventListener('blur', mostrarDias);
      pase_completo.addEventListener('blur', mostrarDias);

      //Validación de campos
      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarMail);

      function validarCampos() {
        if (this.value == '') {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Este campo es obligatorio";
          this.style.border = "1px solid red";
        } else {
          errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc"
        }
      }

      function validarMail() {
        if (this.value.indexOf('@') > -1) {
          errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc";
        } else {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "Aquí debe ir un correo electrónico válido";
          this.style.border = "1px solid red";
        }
      }

      //Función de calcular el listado  y valor a pagar total
      function calcularMontos(event) {
        event.preventDefault();
        if (regalo.value === '') { // este if verifica si se ha seleccionado un regalo
          alert('Debes elegir un regalo');
          regalo.focus();
        } else {
          console.log('ya elegiste regalo: ' + regalo.value);

          let boletosDia = parseInt(pase_dia.value, 10) || 0,
            boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
            boletoCompleto = parseInt(pase_completo.value, 10) || 0,
            cantCamisas = parseInt(camisas.value, 10) || 0,
            cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

          let totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 2);
          console.log('total a pagar: ' + totalPagar);

          let listadoProductosArray = [];

          if (boletosDia > 0) {
            listadoProductosArray.push(boletosDia + ' Pases por 1 Día');
          }
          if (boletos2Dias > 0) {
            listadoProductosArray.push(boletos2Dias + ' boletos por 2 días')
          }
          if (boletoCompleto > 0) {
            listadoProductosArray.push(boletoCompleto + ' boletos Completos')
          }
          if (cantCamisas > 0) {
            listadoProductosArray.push(cantCamisas + ' Camisas del evento')
          }
          if (cantEtiquetas > 0) {
            listadoProductosArray.push(cantEtiquetas + ' Etiquetas del evento')
          }
          lista_productos.style.display = "block";
          lista_productos.innerHTML = '';
          for (let i = 0; i < listadoProductosArray.length; i++) {
            lista_productos.innerHTML += `${listadoProductosArray[i]} <br/> `;
          }

          suma_total.innerHTML = '';
          suma_total.innerHTML = `$ ${totalPagar.toFixed(2)}`;

        }
      }
      //----------------------------------------------------------
      //----------------Activador de talleres---------------------
      //----------------------------------------------------------
      pase_dia.addEventListener('blur', mostrarDias);

      function mostrarDias() {
        if (pase_dia.value < 1) {
          document.getElementById('viernes').style.display = "none";
        } else {
          document.getElementById('viernes').style.display = "block";
        }
      }

      pase_dosdias.addEventListener('blur', mostrarDias2);

      function mostrarDias2() {
        if (pase_dosdias.value < 1) {
          document.getElementById('viernes').style.display = "none";
          document.getElementById('sabado').style.display = "none";
        } else {
          document.getElementById('viernes').style.display = "block";
          document.getElementById('sabado').style.display = "block";
        }
      }

      pase_completo.addEventListener('blur', mostrarDias3);

      function mostrarDias3() {
        if (pase_completo.value < 1) {
          document.getElementById('viernes').style.display = "none";
          document.getElementById('sabado').style.display = "none";
          document.getElementById('domingo').style.display = "none";
        } else {
          document.getElementById('viernes').style.display = "block";
          document.getElementById('sabado').style.display = "block";
          document.getElementById('domingo').style.display = "block";
        }
      }
      //----------------------------------------------------------
      //----------------FIN Activador de talleres-----------------
      //----------------------------------------------------------

    }
  }); //DOM Content loaded
})();

$(function () {

  //lettering.js
  $('.nombre-sitio').lettering();

  //Mostrar pagina actual del usuario

  $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

  //menu fijo

  let windowHeight = $(window).height();
  let barraAltura = $('.barra').innerHeight();

  //console.log('window height es: ' + windowHeight + ' y la altura de la barra es: ' + barraAltura)

  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({ 'margin-top': barraAltura + 'px' });

      //console.log('ya pasaste la altura de pantalla');
    } else {
      $('.barra').removeClass('fixed');
      $('body').css('margin-top', '0px');
      //console.log('aun no.');
    }
  });

  //Mostrar programas y conferencias

  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function () {
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    $('.ocultar').hide();
    let enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);

    return false;
  });



  //Animación para los numeros
  $('ul.cuenta-invitados li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
  $('ul.cuenta-invitados li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
  $('ul.cuenta-invitados li:nth-child(3) p').animateNumber({ number: 3 }, 600);
  $('ul.cuenta-invitados li:nth-child(4) p').animateNumber({ number: 9 }, 2000);


  //Cuenta regresiva
  $('.cuenta-regresiva').countdown('2019/12/31 23:59:59', function (event) {
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  });

  //Invitados
  $('.invitado-info').colorbox({inline:true, width:"50%"});

});