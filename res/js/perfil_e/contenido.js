
      //SISTEMA DE PAGINACION
      //datosContactos.js tiene en una matriz los datos de los contactos traidos desde la bd
      //y mediante este javascript formatear esos datos teniendo en cuenta el valor de la variable
      //items_per_page que contiene el numero de contactos que quiero mostrar por pagina.
      //el mismo codigo/libreria hace el proceso correspondiente

      //variable global: items por pagina
      var items_per_page = 16;

       // When document is ready, initialize pagination
       //cuando el documento este listo inicializar la paginacion
       $(document).ready(function(){      
        initPagination();
       });

       //funcion que prepara lo necesario para implementar la paginacion
       function initPagination() {
        //#Pagination es el div que muestra los links para las paginas
        //ej: [Anterior] [1] [2] [3] ... [20] [Siguiente]
        //ahora especifico: 
        //cantidad de contactos que estan en la matriz de datosContactos.js (contactos.length)
        //el llamado a la funcion pageselectCallback (callback: pageselectCallback)
        //y la cantidad de items por pagina (items_per_page: items_per_page)
        //con esos datos la libreria muestra la cantidad de paginas necesarias para mostrar el contenido
        $("#Pagination").pagination(pCatalogo.length, {
          callback: pageselectCallback,
          items_per_page: items_per_page
        });
       }

       //funcion que trae y formatea los datos, es llamada cuando el usuario hace clic en un link de pagina
       //es decir, cuando se hace clic en la pagina 2 o 3 por ejemplo.
       //parametros:
       //page_index: la pagina a la que hice clic (si hice clic en la pagina 1, esta variable es 0)
       //jq: el contenedor #Pagination que contiene los links de pagina, en forma de objeto jquery
       function pageselectCallback(page_index, jq) {
        //formula que establece la maxima cantidad de elementos a mostrar en c/pagina
        var max_elem = Math.min((page_index+1) * items_per_page, pCatalogo.length);
        //variable que contendran los datos ya formateados 
        var new_content = "";

        //for para iterar entre los elementos de la lista de contactos
        //con el formato definido para el html de panel7
        for (var i=page_index*items_per_page ; i<max_elem ; i++) {
          //concatenar a new_content los elementos del archivo datosContactos.js
          //en el formato especificado de html
          //new_content += (contactos[i][0] + " / " + contactos[i][1] + "<br>");
          new_content += '<div class="dpadre"> <div class="dhijo"> <div style="padding: 10px 10px 10px 10px;">';
           new_content += '<table width="100%">';
            new_content += '<tr>';
            new_content += '<td> <center> <img src="http://sm.proveedor.com.co/proveedor/' + pCatalogo[i][0] + '" style="min-width: 130px; max-width: 225px; min-height: 160px; max-height: 170px;" /> </center> </td>';
            new_content += '</tr>';
            new_content += '<tr>';
              new_content += '<td style="padding-top: 10px;"> <input type="checkbox" /> </td>';
            new_content += '</tr>';
            new_content += '<tr>';
              new_content += '<td style="padding-top: 0px; padding-left: 30px;">';
               new_content += '<p style="font-family: Arial; font-size: 13px; color: #484848;">' + pCatalogo[i][1] + '</p>';
               new_content += '<p style="font-family: Arial; font-size: 11px; color: #484848;"> <font color="#787878">' + pCatalogo[i][2] + '</font>' + pCatalogo[i][3] + '</p>';
               new_content += '<p style="font-family: Arial; font-size: 11px; color: #484848;"> <font color="#787878">' + pCatalogo[i][4] + '</font>' + pCatalogo[i][5] + '</p>';
              new_content += '</td>';
            new_content += '</tr>';
           new_content += '</table>';
          new_content += '</div> </div> </div>';
        }

        //se hace una especie de innerHTML en el gran div Searchresult, con el resultado de la consulta (?)
        //$('#Searchresult').empty().append(new_content);
        $('#Searchresult').html(new_content);

        // Prevent click event propagation
        return false;
       }
    