(function () {
  "use strict";

  let regalo = document.getElementById('regalo');
  document.addEventListener('DOMContentLoaded', function () {

    console.log('Listo el DOM');

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
    calcular.addEventListener('click', calcularMontos);

    //Mostrar Días
    pase_dia.addEventListener('blur', mostrarDias);
    pase_dosdias.addEventListener('blur', mostrarDias);
    pase_completo.addEventListener('blur', mostrarDias);

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
        for(let i=0; i<listadoProductosArray.length; i++) {
            lista_productos.innerHTML += `${listadoProductosArray[i]} <br/> `;
        }

        suma_total.innerHTML = '';
        suma_total.innerHTML = `$ ${totalPagar.toFixed(2)}`;
        
      }
    }

    function mostrarDias(){ 
        let boletosDia = parseInt(pase_dia.value, 10) || 0,
            boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
            boletoCompleto  = parseInt(pase_completo.value, 10) || 0;

        let diasElegidos = [];

        if(boletosDia > 0) {
            diasElegidos.push('viernes');
            console.log(diasElegidos);
        }
        if(boletos2Dias > 0) {
            diasElegidos.push('viernes', 'sabado');
            console.log(diasElegidos);
        }
        if(boletoCompleto > 0) {
            diasElegidos.push('viernes', 'sabado', 'domingo');
            console.log(diasElegidos);
        }
        for(let i=0; i<diasElegidos.length; i++){
            document.getElementById(diasElegidos[i]).style.display = "block";
        }
    }

  }); //DOM Content loaded
})();
