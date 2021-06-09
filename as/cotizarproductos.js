var config = {
    apiKey: "AIzaSyBtBmp1nSRss67nCIp2jwsT_eLH3_tZPzg",
    authDomain: "ejemplo1-73a89.firebaseapp.com",
    databaseURL: "https://ejemplo1-73a89.firebaseio.com",
    projectId: "ejemplo1-73a89",
    storageBucket: "ejemplo1-73a89.appspot.com",
    messagingSenderId: "603737096607"
  };
  firebase.initializeApp(config);

  // Para volver reactiva nuestra página

window.onload = inicializarPagina;




//Variables globales


var refeClientes;

var tablaMostrar;

var carro;

var pie;


function inicializarPagina(){

  tablaMostrar = document.getElementById("tablaFB");

  carro = document.getElementById("tab");

  pie = document.getElementById("foot");

  refeClientes = firebase.database().ref().child("productos");

  mostrarTabla();

}






function mostrarTabla(){

  refeClientes.on("value", function(snap) {

    var datosArray = snap.val();

    var filaDocumento = "";

    for(var documento in datosArray){

      filaDocumento += "<tr>" +

                          "<td>"+ datosArray[documento].nombre +"</td>"+

                          "<td>"+ datosArray[documento].sistema +"</td>"+

                          "<td>"+ datosArray[documento].superficie +"</td>"+

                          "<td>"+ datosArray[documento].tipo +"</td>"+

                          "<td>"+ datosArray[documento].precio +"</td>"+

                          '<td>'+

                              '<button class="btn btn-rose btn-round agregar" dataCliente = "'+documento+'">+</button>'+

                           '</td>'+

                       "</tr>";

    }

    tablaMostrar.innerHTML = filaDocumento;

      if(filaDocumento !== ""){

      var carr = document.getElementsByClassName('agregar');

      for (var i = 0; i < carr.length; i++) {

        carr[i].addEventListener("click",carrito,false);

      }

    }


  });

}



var filaDocumento = "";

var total= parseInt("0");

function carrito(){

  var idCliente = this.getAttribute("dataCliente");

  var ref_idCliente = refeClientes.child(idCliente);



  var task = firebase.database().ref("productos/"+idCliente);

  
var pieDocumento = "";
      task.on("value", function(snap){
      var taskValue = snap.val();


      total = parseInt(taskValue.precio)+total;


      filaDocumento +=
                            "<tr>" +

                          "<td>"+ taskValue.nombre +"</td>"+

                          "<td>"+ taskValue.sistema +"</td>"+

                          "<td>"+ taskValue.superficie +"</td>"+

                          "<td>"+ taskValue.tipo +"</td>"+

                          "<td>"+ taskValue.precio +"</td>"+

                          //"<td>"+

                         // '<button class="btn btn-danger btn-round pull-right btn-fab btn-fab-mini borrar">'+

                              //'<span class="fa fa-trash"></span>'+

                          ////'</button>'+

                          "</td>"+

                       "</tr>";

      pieDocumento +=

                         "<tr>"+

                          '<td ></td>'+

                          '<td ></td>'+

                          '<td ></td>'+

                          '<td class="td-total"> Total </td>'+

                          '<td class="td-price">'+"<small>$</small>"+total+"</td>"+

                      "</tr>";

    });

  carro.innerHTML = filaDocumento;
  pie.innerHTML = pieDocumento;



}

