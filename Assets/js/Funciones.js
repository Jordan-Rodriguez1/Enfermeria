const base = document.getElementById("url").value;
const urls = base + "Entradas/ingresar";
const cotizacion = base + "Practicas/ingresar";

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
      const total = {
        total: $("#total").val(),
        descripcion: document.getElementById("descripcion").value,
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

  //Eliminar detalle
  $("#AnularDetalle").click(function () {
    Swal.fire({
      title: "¿Estás seguro que deseas anular?",
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

  //Mensaje de alerta al subir grado
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

  //Mensaje de alerta al subir grado
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

  //Mensaje de alerta al subir grado
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

  //Mensaje de alerta al subir grado
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
  const cantidad = document.getElementById("cantidad").value;
  if (e.which == 13) {
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
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
                title: "Ingrese una cantidad válida", //PENDIENTE
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
  const cantidad = document.getElementById("cantidad").value;
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
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
  const cantidad = document.getElementById("cantidad").value;
  if (e.which == 13) {
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
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
                title: "Ingrese una cantidad válida", //PENDIENTE
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
  const cantidad = document.getElementById("cantidad").value;
    if (cantidad == "") {
      Swal.fire({
        icon: "warning",
        title: "Ingrese la cantidad",
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


//Esto aún no se edita

// chart Barra

function reportes() {
  $.ajax({
    url: base + "Reportes/reportes",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var mes = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        mes.push(data[i]["mes"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Bar Chart Example
      var ctx = document.getElementById("myBarChartVe");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: mes,
          datasets: [
            {
              label: "Ventas",
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
        options: {
          scales: {
            xAxes: [
              {
                time: {
                  unit: "month",
                },
                gridLines: {
                  display: false,
                },
                ticks: {
                  maxTicksLimit: 6,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  min: 0,
                  max: 5000,
                  maxTicksLimit: 5,
                },
                gridLines: {
                  display: true,
                },
              },
            ],
          },
          legend: {
            display: false,
          },
        },
      });
    },
  });
}
function reportes2() {
  $.ajax({
    url: base + "Reportes/reportes2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var mes = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        mes.push(data[i]["mes"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Bar Chart Example
      var ctx = document.getElementById("myBarChartCo");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: mes,
          datasets: [
            {
              label: "Compras",
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
        options: {
          scales: {
            xAxes: [
              {
                time: {
                  unit: "month",
                },
                gridLines: {
                  display: false,
                },
                ticks: {
                  maxTicksLimit: 6,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  min: 0,
                  max: 5000,
                  maxTicksLimit: 5,
                },
                gridLines: {
                  display: true,
                },
              },
            ],
          },
          legend: {
            display: false,
          },
        },
      });
    },
  });
}
function reportes3() {
  $.ajax({
    url: base + "Reportes/reportes3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var mes = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        mes.push(data[i]["mes"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Bar Chart Example
      var ctx = document.getElementById("myBarChartBa");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: mes,
          datasets: [
            {
              label: "Ganancia",
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
        options: {
          scales: {
            xAxes: [
              {
                time: {
                  unit: "month",
                },
                gridLines: {
                  display: false,
                },
                ticks: {
                  maxTicksLimit: 6,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  min: -5000,
                  max: 5000,
                  maxTicksLimit: 5,
                },
                gridLines: {
                  display: true,
                },
              },
            ],
          },
          legend: {
            display: false,
          },
        },
      });
    },
  });
}
function reportes4() {
  $.ajax({
    url: base + "Reportes/reportes4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var mes = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        mes.push(data[i]["mes"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Bar Chart Example
      var ctx = document.getElementById("myBarChartIn");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: mes,
          datasets: [
            {
              label: "Ingresos",
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
        options: {
          scales: {
            xAxes: [
              {
                time: {
                  unit: "month",
                },
                gridLines: {
                  display: false,
                },
                ticks: {
                  maxTicksLimit: 6,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  min: 0,
                  max: 5000,
                  maxTicksLimit: 5,
                },
                gridLines: {
                  display: true,
                },
              },
            ],
          },
          legend: {
            display: false,
          },
        },
      });
    },
  });
}
function reportes5() {
  $.ajax({
    url: base + "Reportes/reportes5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var mes = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        mes.push(data[i]["mes"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Bar Chart Example
      var ctx = document.getElementById("myBarChartGa");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: mes,
          datasets: [
            {
              label: "Gastos",
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
        options: {
          scales: {
            xAxes: [
              {
                time: {
                  unit: "month",
                },
                gridLines: {
                  display: false,
                },
                ticks: {
                  maxTicksLimit: 6,
                },
              },
            ],
            yAxes: [
              {
                ticks: {
                  min: 0,
                  max: 5000,
                  maxTicksLimit: 5,
                },
                gridLines: {
                  display: true,
                },
              },
            ],
          },
          legend: {
            display: false,
          },
        },
      });
    },
  });
}
// chart torta
function reportesTorta() {
  $.ajax({
    url: base + "Reportes/reportesTorta",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var producto = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        producto.push(data[i]["producto"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("myPieChartPro");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: producto,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
      });
    },
  });
}

function reportesTorta2() {
  $.ajax({
    url: base + "Reportes/reportesTorta2",
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
      var ctx = document.getElementById("myPieChartCli");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
      });
    },
  });
}
function reportesTorta3() {
  $.ajax({
    url: base + "Reportes/reportesTorta3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var personaje = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        personaje.push(data[i]["personaje"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("myPieChartPer");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: personaje,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
      });
    },
  });
}
function reportesTorta4() {
  $.ajax({
    url: base + "Reportes/reportesTorta4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var categoria = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        categoria.push(data[i]["categoria"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("myPieChartCat");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: categoria,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "Red",
                "Blue",
                "Yellow",
                "Green",
                "Purple",
                "Orange",
                "crimson",
                "teal",
                "fuchsia",
                "lime",
              ],
            },
          ],
        },
      });
    },
  });
}
