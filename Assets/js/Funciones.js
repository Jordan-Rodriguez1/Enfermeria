const base = document.getElementById("url").value;
const urls = base + "Entradas/ingresar";
const cotizacion = base + "Practicas/ingresar";


var URLactual = String(window.location);
var Posicion = URLactual.indexOf("?");
var Final = Posicion + 33;
let Part = URLactual.slice(Posicion, Final);

window.addEventListener("load", function () {
  ListaDetalle();
  ListaDetalleC();
});

$(document).ready(function () {
  //LLama a la función que procesa la entrada
  $("#procesarCompra").click(function () {
    var fila = $("#tablaDetalles tr").length;
    if (fila < 2) {
      Swal.fire({
        icon: "warning",
        title: "No hay productos en la venta",
        showConfirmButton: false,
        timer: 2500,
      });
    } else {
      Swal.fire({
        title: "¿Está seguro que deseas confirmar el movimiento?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Confirmar",
      }).then((result) => {
        if (result.isConfirmed) {
          const total = {
            total: $("#total").val(),
            descripcion: document.getElementById("descripcion").value,
            proveedor: document.getElementById("proveedor").value,
          };
          $.ajax({
            url: base + "Entradas/registrar",
            type: "POST",
            data: total,
            success: function (response) {
              Swal.fire({
                icon: "success",
                title: "Compra Generada",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalle();
            },
          });
        }
      });
    }
  });

  //LLama a la función que procesa la salida
  $("#procesarSalida").click(function () {
    var fila = $("#tablaDetalles tr").length;
    if (fila < 2) {
      Swal.fire({
        icon: "warning",
        title: "No hay productos en la venta",
        showConfirmButton: false,
        timer: 2500,
      });
    } else {
      Swal.fire({
        title: "¿Está seguro que deseas confirmar el movimiento?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Confirmar",
      }).then((result) => {
        if (result.isConfirmed) {
          const total = {
            total: $("#total").val(),
            descripcion: document.getElementById("descripcion").value,
            responsable: document.getElementById("responsable").value,
          };
          $.ajax({
            url: base + "Salidas/registrar",
            type: "POST",
            data: total,
            success: function (response) {
              Swal.fire({
                icon: "success",
                title: "Venta Generada",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalle();
            },
          });
        }
      });
    }
  });

  //LLama a la función que procesa la plantilla
  $("#procesarCotizacion").click(function () {
    var fila = $("#tablaDetalles tr").length;
    if (fila < 2) {
      Swal.fire({
        icon: "warning",
        title: "No hay productos en la venta",
        showConfirmButton: false,
        timer: 2500,
      });
    } else {
      Swal.fire({
        title: "¿Está seguro que deseas confirmar el movimiento?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Confirmar",
      }).then((result) => {
        if (result.isConfirmed) {
          const total = {
            total: $("#total").val(),
            descripcion: document.getElementById("descripcion").value,
            id: document.getElementById("id_plantilla").value,
          };
          $.ajax({
            url: base + "Practicas/registrar",
            type: "POST",
            data: total,
            success: function (response) {
              Swal.fire({
                icon: "success",
                title: "Plantilla Generada",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalleC();
            },
          });
        }  
      });
    }
  });
  
  //Eliminar detalle
  $("#AnularDetalle").click(function () {
    Swal.fire({
      title: "¿Está seguro que deseas anular?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Anular",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: base + "Entradas/anular",
          type: "POST",
          success: function (response) {
            ListaDetalle();
            ListaDetalleC();
            if (response != "error") {
              Swal.fire({
                icon: "success",
                title: "Anulado",
                showConfirmButton: false,
                timer: 1500,
              });
            }
          },
        });
      }
    });
  });

  //Eliminar 1 elemento de detalle
  $(document).on("click", ".eliminar", function () {
    var id = $(this).data("id");
    $.ajax({
      url: base + "Entradas/eliminar",
      type: "POST",
      data: {
        id,
      },
      success: function (response) {
        ListaDetalle();
        ListaDetalleC();
        if (response != "error") {
          Swal.fire({
            icon: "success",
            title: "Eliminado",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
    });
  });

  //Mensaje de alerta al inactivar algo
  $(".elim").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de ponerlo como inactivo?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar algo
  $(".elimper").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar permanentemente?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al subir grado
  $(".subir").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de subir de grado a TODOS los alumnos?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al reiniciar asistencias
  $(".horas").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title:
        "¿Está seguro de reiniciar las asistencias y faltas a TODOS los alumnos?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al restablecer contraseña
  $(".rest").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de restablecer la contraseña?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar todos los inactivos
  $(".Etodo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar TODOS los alumnos inactivos?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al reingresar todos los inactivos
  $(".Rtodo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de reingresar a TODOS los alumnos inactivos?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al cancelar práctica
  $(".Cprac").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de CANCELAR la práctica?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al cancelar práctica
  $(".Mprac").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title:
        "¿Estás seguro de TERMINAR la práctica y continuar con la salida de materiales?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de reingresar algo
  $(".confirmar").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de reingresar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al rechazar transacción
  $(".rechazo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de rechazar la transacción?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al registrase
  $(".registro").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de registrarte a esta práctica?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta de aprobar transacción
  $(".aprobado").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de aprobar la transacción?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });
});


//Trae el detalle de los productos mediante enter
function BuscarCodigo(e) {
  if (e.which == 13) {
    const codigo = document.getElementById("buscar_codigo").value;
    const url = document.getElementById("url").value;
    const urls = url + "Entradas/buscar";
    $.ajax({
      url: urls,
      type: "POST",
      data: {
        codigo,
      },
      success: function (response) {
        if (response != 0) {
          $("#error").addClass("d-none");
          var info = JSON.parse(response);
          document.getElementById("id").value = info.id;
          document.getElementById("nombre").value = info.nombre;
          document.getElementById("precio").value = info.precio;
          $("#stockD").val(info.cantidad);
          document.getElementById("cantidad").value = 1;
          document.getElementById("nombreP").innerHTML = info.nombre;
          document.getElementById("precioP").innerHTML = info.precio;
          document.getElementById("cantidad").focus();
        } else {
          $("#error").removeClass("d-none");
        }
      },
    });
  }
}

//Trae el detalle de los productos mediante botón
function BuscarCodigos() {
  const codigo = document.getElementById("buscar_codigo").value;
  const url = document.getElementById("url").value;
  const urls = url + "Entradas/buscar";
  $.ajax({
    url: urls,
    type: "POST",
    data: {
      codigo,
    },
    success: function (response) {
      if (response != 0) {
        $("#error").addClass("d-none");
        var info = JSON.parse(response);
        document.getElementById("id").value = info.id;
        document.getElementById("nombre").value = info.nombre;
        document.getElementById("precio").value = info.precio;
        $("#stockD").val(info.cantidad);
        document.getElementById("cantidad").value = 1;
        document.getElementById("nombreP").innerHTML = info.nombre;
        document.getElementById("precioP").innerHTML = info.precio;
        document.getElementById("cantidad").focus();
      } else {
        $("#error").removeClass("d-none");
        document.getElementById("cantidad").value = "";
        document.getElementById("nombreP").innerHTML = "";
        document.getElementById("precio").value = "";
      }
    },
  });
}

//Trae el detalle de los productos mediante enter (cotizaciones)
function BuscarCodigoC(e) {
  if (e.which == 13) {
    const codigo = document.getElementById("buscar_codigo").value;
    const url = document.getElementById("url").value;
    const urls = url + "Entradas/buscar";
    $.ajax({
      url: urls,
      type: "POST",
      data: {
        codigo,
      },
      success: function (response) {
        if (response != 0) {
          $("#error").addClass("d-none");
          var info = JSON.parse(response);
          document.getElementById("id").value = info.id;
          document.getElementById("nombre").value = info.nombre;
          $("#stockD").val(info.cantidad);
          document.getElementById("cantidad").value = 1;
          document.getElementById("nombreP").innerHTML = info.nombre;
          document.getElementById("cantidad").focus();
        } else {
          $("#error").removeClass("d-none");
        }
      },
    });
  }
}

//Trae el detalle de los productos mediante botón (cotizaciones)
function BuscarCodigosC() {
  const codigo = document.getElementById("buscar_codigo").value;
  const url = document.getElementById("url").value;
  const urls = url + "Entradas/buscar";
  $.ajax({
    url: urls,
    type: "POST",
    data: {
      codigo,
    },
    success: function (response) {
      if (response != 0) {
        $("#error").addClass("d-none");
        var info = JSON.parse(response);
        document.getElementById("id").value = info.id;
        document.getElementById("nombre").value = info.nombre;
        $("#stockD").val(info.cantidad);
        document.getElementById("cantidad").value = 1;
        document.getElementById("nombreP").innerHTML = info.nombre;
        document.getElementById("cantidad").focus();
      } else {
        $("#error").removeClass("d-none");
        document.getElementById("cantidad").value = "";
        document.getElementById("precio").value = "";
      }
    },
  });
}

//Ingresa producto a la lista de detalle mediente enter
function IngresarCantidad(e) {
  const stockD = $("#stockD").val();
  const nombre = document.getElementById("nombre").value;
  const cantidad = document.getElementById("cantidad").value;
  if (e.which == 13) {
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
        showConfirmButton: false,
        timer: 1500,
      });
    } else if (nombre == "") {  
      Swal.fire({
        icon: "warning",
        title: "Busque un producto.",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      $.ajax({
        url: urls,
        type: "POST",
        async: true,
        data: $("#frmDetalle").serialize(),
        success: function (response) {
          $("#frmDetalle").trigger("reset");
          $("#buscar_codigo").focus();
          $("#nombreP").html("");
          $("#precioP").html("");
          if (response == "actualizado") {
            Swal.fire({
              icon: "success",
              title: "Se actualizo la cantidad del producto",
              showConfirmButton: false,
              timer: 1500,
            });
            ListaDetalle();
          } else { 
            if (response == "errorcantidad") {
              Swal.fire({
                icon: "error",
                title: "Ingrese una cantidad válida", 
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalle();
            } else {
              if (response == "errorregistro") {
                Swal.fire({
                  icon: "info",
                  title: "Hubo un error con el registro, por favor contacte a soporte",
                });
                ListaDetalle();
              } else {
                if (response == "eliminado") {
                  Swal.fire({
                    icon: "success",
                    title: "Eliminado",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalle();
                } else {
                    Swal.fire({
                      icon: "success",
                      title: "Se agregó el producto",
                      showConfirmButton: false,
                      timer: 1500,
                    });
                    ListaDetalle();
                }
              }
            }
          }
        },
      });
    }
  }
}

//Ingresa producto a la lista de detalle mediente botón
function IngresarCantidades() {
  const stockD = $("#stockD").val();
  const nombre = document.getElementById("nombre").value;
  const cantidad = document.getElementById("cantidad").value;
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
        showConfirmButton: false,
        timer: 1500,
      });
    } else if (nombre == "") {  
      Swal.fire({
        icon: "warning",
        title: "Busque un producto.",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      $.ajax({
        url: urls,
        type: "POST",
        async: true,
        data: $("#frmDetalle").serialize(),
        success: function (response) {
          console.log("hola" + response);
          $("#frmDetalle").trigger("reset");
          $("#buscar_codigo").focus();
          $("#nombreP").html("");
          $("#precioP").html("");
          if (response == "actualizado") {
            Swal.fire({
              icon: "success",
              title: "Se actualizo la cantidad del producto",
              showConfirmButton: false,
              timer: 1500,
            });
            ListaDetalle();
          } else { 
            if (response == "errorcantidad") {
              Swal.fire({
                icon: "error",
                title: "Ingrese una cantidad válida",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalle();
            } else {
              if (response == "errorregistro") {
                Swal.fire({
                  icon: "success",
                  title: "Hubo un error con el registro, por favor contacte a soporte",
                });
                ListaDetalle();
              } else {
                if (response == "eliminado") {
                  Swal.fire({
                    icon: "success",
                    title: "Eliminado",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalle();
                } else {
                  Swal.fire({
                    icon: "success",
                    title: "Se agregó el producto",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalle();
                }
              }  
            }
          }
        },
      });
    }
}

//Ingresa producto a la lista de detalle mediente enter (cotizaciones)
function IngresarCantidadC(e) {
  const stockD = $("#stockD").val();
  const nombre = document.getElementById("nombre").value;
  const cantidad = document.getElementById("cantidad").value;
  if (e.which == 13) {
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
        showConfirmButton: false,
        timer: 1500,
      });
    } else if (nombre == "") {  
      Swal.fire({
        icon: "warning",
        title: "Busque un producto.",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      $.ajax({
        url: cotizacion,
        type: "POST",
        async: true,
        data: $("#frmDetalle").serialize(),
        success: function (response) {
          $("#frmDetalle").trigger("reset");
          $("#buscar_codigo").focus();
          $("#nombreP").html("");
          if (response == "actualizado") {
            Swal.fire({
              icon: "success",
              title: "Se actualizo la cantidad del producto",
              showConfirmButton: false,
              timer: 1500,
            });
            ListaDetalleC();
          } else {
            if (response == "errorcantidad") {
              Swal.fire({
                icon: "error",
                title: "Ingrese una cantidad válida",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalleC();
            } else {
              if (response == "errorregistro") {
                Swal.fire({
                  icon: "info",
                  title:
                    "Hubo un error con el registro, por favor contacte a soporte",
                });
                ListaDetalleC();
              } else {
                if (response == "eliminado") {
                  Swal.fire({
                    icon: "success",
                    title: "Eliminado",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalleC();
                } else {
                  Swal.fire({
                    icon: "success",
                    title: "Se agregó el producto",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalleC();
                }
              }
            }
          }
        },
      });
    }
  }
}

//Ingresa producto a la lista de detalle mediente botón (cotizaciones)
function IngresarCantidadesC() {
  const stockD = $("#stockD").val();
  const nombre = document.getElementById("nombre").value;
  const cantidad = document.getElementById("cantidad").value;
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
        showConfirmButton: false,
        timer: 1500,
      });
    } else if (nombre == "") {  
      Swal.fire({
        icon: "warning",
        title: "Busque un producto.",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      $.ajax({
        url: cotizacion,
        type: "POST",
        async: true,
        data: $("#frmDetalle").serialize(),
        success: function (response) {
          console.log("hola" + response);
          $("#frmDetalle").trigger("reset");
          $("#buscar_codigo").focus();
          $("#nombreP").html("");
          if (response == "actualizado") {
            Swal.fire({
              icon: "success",
              title: "Se actualizo la cantidad del producto",
              showConfirmButton: false,
              timer: 1500,
            });
            ListaDetalleC();
          } else {
            if (response == "errorcantidad") {
              Swal.fire({
                icon: "error",
                title: "Ingrese una cantidad válida",
                showConfirmButton: false,
                timer: 1500,
              });
              ListaDetalleC();
            } else {
              if (response == "errorregistro") {
                Swal.fire({
                  icon: "success",
                  title:
                    "Hubo un error con el registro, por favor contacte a soporte",
                });
                ListaDetalleC();
              } else {
                if (response == "eliminado") {
                  Swal.fire({
                    icon: "success",
                    title: "Eliminado",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalleC();
                } else {
                  Swal.fire({
                    icon: "success",
                    title: "Se agregó el producto",
                    showConfirmButton: false,
                    timer: 1500,
                  });
                  ListaDetalleC();
                }
              }
            }
          }
        },
      });
    }
}

//Muestra la lista de detalles de ventas/compras
function ListaDetalle() {
  $.ajax({
    url: base + "Entradas/detalle",
    type: "POST",
    success: function (response) {
      $("#ListaDetalle").html(response);
      const tl = $("#totalPagar").val();
      $("#total").val(tl);
      $("#totalD").html(tl);
    },
  });
}

//Muestra la lista de detalles de COTIZACIONES
function ListaDetalleC() {
  $.ajax({
    url: base + "Practicas/detalle",
    type: "POST",
    success: function (response) {
      $("#ListaDetalleC").html(response);
      const tl = $("#totalPagar").val();
      $("#total").val(tl);
      $("#totalD").html(tl);
    },
  });
}

//Obtiene el id en modal para subir img
function idModal() {
  let cargar_formato = document.getElementById('cargar_formato');
  $(document).on("show.bs.modal", (event) => {
    let button = event.relatedTarget;
    let id = button.getAttribute("data-bs-id");
    let inputId = cargar_formato.querySelector(".modal-body #id");
    inputId.value = id;
  });
}


//Gráfica de Barra

function BarrasAlumnos() {
  $.ajax({
    url: base + "Reportes/AsistenciasFaltas",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var faltas = [];
      var grado = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"]);
        faltas.push(data[i]["faltas"]);
        grado.push(data[i]["grado"] + "° Semestre");
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Asistencias = {
        label: "Asistencias",
        data: asistencias,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Faltas = {
        label: "Faltas",
        data: faltas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasAlumnos");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: grado,
          datasets: [Asistencias, Faltas],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasPracticas() {
  $.ajax({
    url: base + "Reportes/PracticasCaras",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var descripcion = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        descripcion.push(data[i]["descripcion"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Practicas = {
        label: "Precio $",
        data: total,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("PracticasCaras");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: descripcion,
          datasets: [Practicas],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasMateriales1() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasDinero" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas $",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas $",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales1");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: nombre,
          datasets: [Ventas, Compras],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasMateriales2() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasPiezas" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales2");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: nombre,
          datasets: [Ventas, Compras],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

//Graficas Pastel
function PastelSemestre1() {
  $.ajax({
    url: base + "Reportes/PastelSemestre1",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre2() {
  $.ajax({
    url: base + "Reportes/PastelSemestre2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre3() {
  $.ajax({
    url: base + "Reportes/PastelSemestre3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre4() {
  $.ajax({
    url: base + "Reportes/PastelSemestre4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre5() {
  $.ajax({
    url: base + "Reportes/PastelSemestre5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre6() {
  $.ajax({
    url: base + "Reportes/PastelSemestre6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre7() {
  $.ajax({
    url: base + "Reportes/PastelSemestre7",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre7");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelPracticas1() {
  $.ajax({
    url: base + "Reportes/PastelPracticas1",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas2() {
  $.ajax({
    url: base + "Reportes/PastelPracticas2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas3() {
  $.ajax({
    url: base + "Reportes/PastelPracticas3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var asistencia = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        asistencia.push(data[i]["asistencia"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: asistencia,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas4() {
  $.ajax({
    url: base + "Reportes/PastelPracticas4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var faltas = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        faltas.push(data[i]["faltas"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: faltas,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas5() {
  $.ajax({
    url: base + "Reportes/PastelPracticas5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas6() {
  $.ajax({
    url: base + "Reportes/PastelPracticas6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales1() {
  $.ajax({
    url: base + "Reportes/PastelMateriales1" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales2() {
  $.ajax({
    url: base + "Reportes/PastelMateriales2" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales3() {
  $.ajax({
    url: base + "Reportes/PastelMateriales3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales4() {
  $.ajax({
    url: base + "Reportes/PastelMateriales4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales5() {
  $.ajax({
    url: base + "Reportes/PastelMateriales5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales6() {
  $.ajax({
    url: base + "Reportes/PastelMateriales6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}