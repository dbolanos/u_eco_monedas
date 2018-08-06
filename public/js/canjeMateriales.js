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

        if(cantidad_material > 0 ){

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
                        console.log( "La solicitud se ha completado correctamente."+ JSON.stringify(data) );
                        material = {id_material : data['id'], nombre_material : data['nombre'], ruta_imagen: data['ruta_imagen'],
                            valor_ecomoneda : data['valor_ecomoneda'], cantidad_material : cantidad_material,
                            total_valor_item : (data['valor_ecomoneda'] * cantidad_material)
                        };
                        canjeMateriales['detalles_items'].push(material);
                        canjeMateriales['cantidad_items']   +=  parseInt(material['cantidad_material']);
                        canjeMateriales['total_ecomonedas'] +=  material['total_valor_item'];
                        console.log(canjeMateriales);
                        renderCanjeMateriales();
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
            alert('Debe ingresar una cantidad de materiales');
        }
    })

    function renderCanjeMateriales(){
        var html_tbody = '';

        if(canjeMateriales['cantidad_items'] > 0){
            // var detalles_items.push(canjeMateriales['detalles_items']);
            // console.log(detalles_items);
            $.each(canjeMateriales['detalles_items'], function( key, item ) {
                console.log(JSON.stringify(item['nombre_material']));
                var row_table = '<tr>'+
                    '<td>'+ item['nombre_material'] +'</td>'+
                    '<td>'+ item['cantidad_material'] +'</td>'+
                    '<td>'+ item['total_valor_item'] +'</td>'+
                    '<td><a href="'+ key +'" class="eliminar">Eliminar</a></td>'+
                    '</tr>';
                console.log(row_table);
                html_tbody    += row_table;
            });
        }

        // console.log(html_tbody);

        $('#Tabla_Material > tbody').html(html_tbody);

        $('#total_eco_monedas').text(canjeMateriales['total_ecomonedas']);
        $('#total_materiales').text(canjeMateriales['cantidad_items']);

    }

});