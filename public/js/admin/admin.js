$(document).ready(function(){
	//carga seguro
	$('#use_type_id').change(function(){
		cargaCategoriasSeguro();
	});
});
	
/*cargar categorias de seguro*/
function cargaCategoriasSeguro(){
	var idtipo = $('#use_type_id option:selected').val();
	var page = "/ruska/public/listarCategoriasSeguro/" + idtipo;
	if(idtipo !=''){
		$.get(page, function(data){
			console.log(data);
			$('#insurance_category_id').empty();
			$('#insurance_category_id').append("<option value=''>SELECCIONAR</option>");
			$.each(data, function (index, SegObj) {
				$('#insurance_category_id').append("<option value='"+SegObj.id+"'>"+SegObj.name+"</option>");
			});
			
		});
	}
	var uso=$('#use_type_id').val();
	if (uso=='') {$('#insurance_type_id').html("");};
}
