

document.addEventListener('DOMContentLoaded', function () {

    let formulario = document.querySelector("formularioAgenda");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',

        },


        events: "http://127.0.0.1:8000/agenda/mostrar",
        dateClick: function (info)  {


            var actual = new Date();
            if(info.date >= actual){
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede solicitar un Domo en una fecha vencida!',

                  })
             }

            formularioAgenda.reset();
            $("#ModalAgenda").modal("show");
            $("#btnGuardar").attr('disabled', false);
            $("#btnModificar").attr('disabled', true);
            $("#btnEliminar").attr('disabled', true);
        },
        eventClick: function (info) {
          /*  formulario.reset(); */

            var agenda = info.event;
            axios.get("http://127.0.0.1:8000/agenda/mostrar/" + agenda.id)
                .then(response => response.data).then(data => {
                    if (data) {
                        $("#btnGuardar").attr('disabled', true);
                        $("#btnModificar").attr('disabled', false);
                        $("#btnEliminar").attr('disabled', false);
                        $("#ModalAgenda").modal("show");
                        $('#fechainicio').val(data.fechainicio);
                        $('#horainicio').val(data.horainicio);
                        $('#fechafinal').val(data.fechafinal);
                        $('#horafinal').val(data.horafinal);
                        $('#idDomo').val(data.domo.id);
                        /* $('#color').val(data.color); */
                        $('#idAgenda').val(data.id);


                       /*  $('#idDomo').text(data.domo.nombre); */
                    }
                }).catch();
        }
    });
    calendar.render();

    $("#btnModificar").click((e) => {
        if ($('#idAgenda').val() != "") {
            var id = $('#idAgenda').val();
            var idDomo = $('#idDomo').val();
            var fechainicio = $('#fechainicio').val();
            var horainicio = $('#horainicio').val();
            var fechafinal = $('#fechafinal').val();
            var horafinal = $('#horafinal').val();
   /*          var color = $('#color').val(); */


            const datos = {
                idDomo: idDomo,
                fechainicio: fechainicio,
                horainicio: horainicio,
                fechafinal: fechafinal,
                horafinal: horafinal,
               /*  color: color */
            };
            axios.post('http://127.0.0.1:8000/agenda/editar/' + id, datos)
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Perfecto!',
                        text: 'Se modifico correctamente',
                        showConfirmButton: false,
                        timer: 2500

                    })
                    calendar.refetchEvents();
                    $("#ModalAgenda").modal("hide");
                })
                .catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                );
        }


    });

  /*   $("#btnEliminar").click((e) => {
        if ($('#idAgenda').val() != "") {
            var id = $('#idAgenda').val();
            Swal.fire({
                title: 'Está seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("http://127.0.0.1:8000/agenda/eliminar/" + id).then((data) => {
                        Swal.fire(
                            'Eliminada',
                            'Su agenda ha sido eliminada.',
                            'success'
                        )
                        calendar.refetchEvents();
                        $("#ModalAgenda").modal("hide");
                    }).catch(() => { })
                }
            })

        }
    }); */

    document.getElementById("btnGuardar").addEventListener("click", function () {

        var idDomo = $('#idDomo').val();
        var fechainicio = $('#fechainicio').val();
        var horainicio = $('#horainicio').val();
        var fechafinal = $('#fechafinal').val();
        var horafinal = $('#horafinal').val();
       /*  var color = $('#color').val(); */

        const datos = {
            idDomo: idDomo,
            fechainicio: fechainicio,
            horainicio: horainicio,
            fechafinal: fechafinal,
            horafinal: horafinal,
         /*    color: color */
        };
        console.log(datos);



        axios.post('http://127.0.0.1:8000/agenda/agregar', datos).
            then(
                (respuesta) => {
                    calendar.refetchEvents();
                    $("#ModalAgenda").modal("hide");
                    Swal.fire({
                        icon: 'success',
                        title: 'Perfecto!',
                        text: 'Se Guardo correctamente',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            ).catch(
                error => {
                    if (error.response) {
                        console.log(error.response.data);
                        Swal.fire(
                            'Aviso',
                            'Todos los campos son requeridos',
                            'warning'


                        );
                    }
                }
            )

    });

});
