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
        material_seleccionado   = $('#material').val();
        cantidad_material       = $('#cantidad_material').val();

        if(cantidad_material > 0 && material_seleccionado > 0){

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {"id_material" : material_seleccionado},
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
                            valor_ecomoneda : data['valor_ecomoneda'], cantidad_material : parseInt(cantidad_material),
                            total_valor_item : (data['valor_ecomoneda'] * cantidad_material)
                        };
                        canjeMateriales['detalles_items'].push(material);
                        canjeMateriales['cantidad_items']   +=  parseInt(material['cantidad_material']);
                        canjeMateriales['total_ecomonedas'] +=  material['total_valor_item'];
                        renderCanjeMateriales();

                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus + '  ' + errorThrown);
                        $('.msg_alerts').html('<div class="alert alert-warning" role="alert">'+
                                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                                'No se ha logrado la transaccion del material'+
                                            '</div>');
                    }
                    $('body,html').animate({scrollTop : 0}, 500);
                });

        }
        else{
            $('.msg_alerts').html('<div class="alert alert-warning" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    'Verifica tus datos, en la seccion de materiales'+
                                '</div>');
            $('body,html').animate({scrollTop : 0}, 500);
        }

    });

    function renderCanjeMateriales(){
        var html_tbody = '';

        if(canjeMateriales['cantidad_items'] > 0){

            $.each(canjeMateriales['detalles_items'], function( key, item ) {
                var row_table = '<tr>'+
                    '<td>'+ item['nombre_material'] +'</td>'+
                    '<td>'+ item['cantidad_material'] +'</td>'+
                    '<td>'+ item['valor_ecomoneda'] +'</td>'+
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
        $('#cantidad_material').val(0);
        $('#material').val(0);

    }

    $(document).on('click', '.eliminar', '', function () {
        console.log('eliminando...');
        var key = $(this).data("key");
        //Metodo splice saca el elemento de un array, el espacio de "key" indica el indice y el 1 es la cantidad de elemento a eliminar
        var material = canjeMateriales['detalles_items'].splice(key, 1);

        canjeMateriales['cantidad_items']   -=  parseInt(material[0]['cantidad_material']);
        canjeMateriales['total_ecomonedas'] -=  material[0]['total_valor_item'];
        renderCanjeMateriales();
    });



    $('#canjear_materiales').on('click', function () {
        console.log('Canjenado...');

        var cliente             = $('#cliente').val();
        var centro_acopio_id    = $('#id_centro_acopio').val();

        if(cliente > 0){

            if(canjeMateriales['cantidad_items'] > 0){

                $.ajax({
                    //Como se ejecuta un POST necesitamos el token de CSRF, (lo tomamos de un meta que esta en el blade)
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // En data puedes utilizar un objeto JSON, un array o un query string
                    data: {"detalles" : canjeMateriales, "cliente_id" : cliente, "centro_acopio_id" : centro_acopio_id},
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
                            // alert(data);
                            $('.msg_alerts').html('<div class="alert alert-success" role="alert">'+
                                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                                    '<h4 class="alert-heading">Canje Materiales Exitoso!!</h4>'+
                                                    '<p>El canje se ha llevado con exito. Este es el id de tu factura: '+ data +' </p>'+
                                                '</div>');
                            canjeMateriales = {cantidad_items : 0, total_ecomonedas : 0, detalles_items : []};
                            renderCanjeMateriales();
                            $('#cliente').val(0);
                            $('body,html').animate({scrollTop : 0}, 500);
                        }
                    })
                    .fail(function( jqXHR, textStatus, errorThrown ) {
                        if ( console && console.log ) {
                            console.log( "La solicitud a fallado: " +  textStatus + ' ' + errorThrown);
                            $('.msg_alerts').html('<div class="alert alert-danger" role="alert">'+
                                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                                    'Error, ha ocurrido un problema en la transaccion'+
                                                '</div>');
                        }
                    });

            }
            else{
                console.log('Error, no hay materiales en la transaccion');
                $('.msg_alerts').html('<div class="alert alert-warning" role="alert">'+
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                        'No se han encontrado materiales en el canje'+
                                    '</div>');
            }
        }
        else{
            console.log('Error, no esta el cliente seleccionado');
            $('.msg_alerts').html('<div class="alert alert-warning" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    'No se ha seleccionado el cliente'+
                                '</div>');
        }
        $('body,html').animate({scrollTop : 0}, 500);
    });

});