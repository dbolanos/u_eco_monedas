$( document ).ready(function() {
    console.log( "Inicio-Canje-Materiales" );

    var canjeMateriales = {cantidad_items : 0, total_ecomonedas : 0, detalles_items : []};

    // this.llenarCanjeMateriales();
    renderCanjeMateriales();

    function llenarCanjeMateriales(){
        canjeMateriales = $('#array_canje_materiales').val();
        console.log(canjeMateriales);
    }

    $('#agregar_material').on('click', function () {
        material            = $('#material').val();
        cantidad_material   = $('#cantidad_material').val();
        material_id         = $('#material').val();

        if(cantidad_material > 0 && material_id > 0){

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {"id_material" : material},
                //Cambiar a type: POST si necesario
                type: "GET",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "get-material",
            })
                .done(function( data, textStatus, jqXHR ) {
                    if ( console && console.log ) {
                        material = {id_material : data['id'], nombre_material : data['nombre'], ruta_imagen: data['ruta_imagen'],
                            valor_ecomoneda : data['valor_ecomoneda'], cantidad_material : cantidad_material,
                            total_valor_item : (data['valor_ecomoneda'] * cantidad_material)
                        };
                        canjeMateriales['detalles_items'].push(material);
                        canjeMateriales['cantidad_items']   +=  parseInt(material['cantidad_material']);
                        canjeMateriales['total_ecomonedas'] +=  material['total_valor_item'];
                        renderCanjeMateriales();
                        $('#cantidad_material').val(0);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus + '  ' + errorThrown);
                        alert('Error, no se ha logrado la transaccion');
                    }
                });

        }
        else{
            alert('Verifica tus datos, en materiales');
        }
    })

    function renderCanjeMateriales(){
        var html_tbody = '';

        if(canjeMateriales['cantidad_items'] > 0){
            // var detalles_items.push(canjeMateriales['detalles_items']);
            // console.log(detalles_items);
            $.each(canjeMateriales['detalles_items'], function( key, item ) {
                var row_table = '<tr>'+
                    '<td>'+ item['nombre_material'] +'</td>'+
                    '<td>'+ item['cantidad_material'] +'</td>'+
                    '<td>'+ item['total_valor_item'] +'</td>'+
                    '<td><button type="button" class="btn btn-danger eliminar" data-key="'+key+'">'+
                    '<span class="glyphicon glyphicon-trash"></span> Eliminar'+
                    '</button></td>'+
                    '</tr>';
                html_tbody    += row_table;
            });
        }

        $('#Tabla_Material > tbody').html(html_tbody);
        $('#total_eco_monedas').text(canjeMateriales['total_ecomonedas']);
        $('#total_materiales').text(canjeMateriales['cantidad_items']);

    }

    $('.eliminar').on('hidden.bs.modal', function () {
        console.log('eliminando...');
        var key = this.data("key");
        var material = canjeMateriales['detalles_items'][key];
        console.log(JSON.stringify(material));

    })


    $('#canjear_materiales').on('click', function () {
        console.log('Canjenado...');

        var cliente             = $('#cliente').val();
        var usuario             = $('#usuario_id').val();
        var centro_acopio_id    = $('#id_centro_acopio').val();

        if(canjeMateriales['cantidad_items'] > 0 && cliente != null){


            $.ajax({
                //Como se ejecuta un POST necesitamos el token de CSRF, (lo tomamos de un meta que esta en el blade)
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {"detalles" : canjeMateriales, "cliente_id" : cliente, "centro_acopio_id" : centro_acopio_id, "usuario_id" : usuario},
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "guardar-canje-material",
            })
                .done(function( data, textStatus, jqXHR ) {
                    if ( console && console.log ) {
                        console.log( "Exito, " + JSON.stringify(data) );
                        alert(data);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        alert('Error en la transaccion');
                        console.log( "La solicitud a fallado: " +  textStatus + ' ' + errorThrown);
                    }
                });

        }
        else{
            alert('No se han agregado Materiales o no se encontro el cliente');
        }

    })

});