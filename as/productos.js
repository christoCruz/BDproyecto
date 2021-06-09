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

var formularioDatos;

var refeClientes;

var ref_idCliente2;

var tablaMostrar;

var CREATE = "Agregar producto";

var UPDATE = "Actualizar producto";

var CAMBIO = CREATE;



function inicializarPagina(){

  formularioDatos = document.getElementById('formDatos');


  formularioDatos.addEventListener("submit", enviarDatos, false);



  tablaMostrar = document.getElementById("tablaFB");



  refeClientes = firebase.database().ref().child("productos");

  mostrarTabla();

}



function enviarDatos(event){

  event.preventDefault();

  switch (CAMBIO) {

    case CREATE:

      if (formularioDatos !== "") {

          refeClientes.push({

            nombre: event.target.nombre.value,

            sistema: event.target.sistema.value,

            superficie: event.target.superficie.value,

            tipo: event.target.tipo.value,

            precio: event.target.precio.value

          });



          swal(

            'Éxito!',

            'Producto insertado con éxito!',

            'success'

          );

      }else {

          swal(

            'Error!',

            'El producto no fue insertado con éxito!',

            'danger'

          );

      }

      break;

    case UPDATE:

      ref_idCliente2.update({

            nombre: event.target.nombre.value,

            sistema: event.target.sistema.value,

            superficie: event.target.superficie.value,

            tipo: event.target.tipo.value,

            precio: event.target.precio.value

      });

      document.getElementById('btnAdd').value = CREATE;

      CAMBIO = CREATE;



      swal(

        'Éxito!',

        'Producto actualizado con éxito!',

        'success'

      );

      break;



  }



  formularioDatos.reset();

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

                              '<button class="btn btn-danger btn-round pull-right btn-fab btn-fab-mini borrarCliente" dataCliente = "'+documento+'">'+

                                '<span class="fa fa-trash"></span>'+

                              '</button>'+

                              '<button class="btn btn-info btn-round pull-right btn-fab btn-fab-mini editarCliente" dataCliente2 = "'+documento+'">'+

                                '<span class="fa fa-edit"></span>'+

                              '</button>'+

                           '</td>'+

                       "</tr>";

    }

    tablaMostrar.innerHTML = filaDocumento;

    if(filaDocumento !== ""){

      var documentosEditar = document.getElementsByClassName('editarCliente');

      for (var i = 0; i < documentosEditar.length; i++) {

        documentosEditar[i].addEventListener("click",editarClientes,false);

      }

      var documentosBorrar = document.getElementsByClassName('borrarCliente');

      for (var i = 0; i < documentosBorrar.length; i++) {

        documentosBorrar[i].addEventListener("click",borrarClientes,false);

      }

    }

  });

}



function borrarClientes() {

    var idCliente = this.getAttribute("dataCliente");

    var ref_idCliente = refeClientes.child(idCliente);

    

    swal({
	  title: "¿Estás seguro?",
	  text: "Una vez eliminado no podrás recuperarlo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	  cancelButtonColor: '#d33',
	  cancelButtonText: "Cancelar",
	  showCancelButton: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	  	ref_idCliente.remove();
	    swal("El producto ha sido eliminado correctamente!", {
	      icon: "success",
	    });
	  } else {
	    swal("El producto ha sido conservado");
	  }
	});
	

}



function editarClientes() {

  var idCliente2 = this.getAttribute("dataCliente2");

  ref_idCliente2 = refeClientes.child(idCliente2);

  ref_idCliente2.once("value",function(snap) {

      var datosSnap = snap.val();

      document.getElementById('nombre').value = datosSnap.nombre;

      document.getElementById('sistema').value = datosSnap.sistema;

      document.getElementById('superficie').value = datosSnap.superficie;

      document.getElementById('tipo').value = datosSnap.tipo;

      document.getElementById('precio').value = datosSnap.precio;

  });

  document.getElementById('btnAdd').value = UPDATE;

  CAMBIO = UPDATE;

}

