//Steve Ludwig de Jesus Beltran Florentino------------------------------------

var ordenar = '';
$(document).ready(function(){
	// Llamando a la funcion de busqueda al cargar la pagina
	filtrar()
});

function filtrar()
{	
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax.php?action=prestar",
			success: function(data){
				var html = '';
				if(data.length > 0){
					$.each(data, function(i,item){
						html += '<tr>'
							html += '<td>'+item.claveejemplar+'</td>'
							html += '<td>'+item.titulo+'</td>'
							html += '<td>'+item.idioma+'</td>'
							html += '<td>'+item.formato+'</td>'
							html += '<td>'+item.nombre+'</td>'
							html += '<td>'+item.autor+'</td>'
							html += '<td>'+item.estado+'</td>'
							html += '<td>'+item.hasta+'</td>'
						html += '</tr>';
															
					});					
				}
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
			}
	  });
}