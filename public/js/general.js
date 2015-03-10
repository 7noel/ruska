$(document).ready(function(){
	//MAYUSCULAS
	$(".delete").submit(function(e){
	    if (!confirm("Seguro que desea eliminar el Registro?"))
		{
			e.preventDefault();
			return;
		} 
	});
	$('.uppercase').change(function(){
		var cadena=$(this).val();
		cadena = cadena.replace("  "," ");
		cadena = cadena.toUpperCase();
		$(this).val(cadena);
	});

	//carga provincias
	$('#lstDepartamento').change(function(){
		cargaProvincias();
		var depa=$('#lstDepartamento').val();
		if (depa=='') {$('#lstProvincia').html("");};
		$('#lstDistrito').html("");
		//$('#lstProvincia').focus();
	});
	
	//carga distritos
	$('#lstProvincia').change(function(){
		cargaDistritos();
		var prov=$('#lstProvincia').val();
		if (prov=='') {$('#lstDistrito').html("");};
		//$('#lstDistrito').focus();
	});
	//carga modelos
	$('#brand_id').change(function(){
		cargaModelos();
		var marca=$('#brand_id').val();
		if (marca=='') {$('model_id').html("");};
	});
});
	
/*cargar provincias*/
function cargaProvincias(){
	var idDepartamento = $('#lstDepartamento option:selected').val();
	var page ="/ruska/public/listarProvincias/" + idDepartamento;
	if(idDepartamento != ''){
		$.get(page, function(data){
			$('#lstProvincia').empty();
			$('#lstProvincia').append("<option value=''>SELECCIONAR</option>");
			$.each(data, function (index, ProvinciaObj) {
				$('#lstProvincia').append("<option value='"+ProvinciaObj.provincia+"'>"+ProvinciaObj.provincia+"</option>");
			});
			
		});
	}
}

/*cargar distritos*/
function cargaDistritos(){
	var idDepartamento = $('#lstDepartamento option:selected').val();
	var rel=$('#lstProvincia option:selected').val();
	var page = "/ruska/public/listarDistritos/" + idDepartamento + "/" +rel;
	if(rel !=''){
		$.get(page, function(data){
			console.log(data);
			$('#lstDistrito').empty();
			$('#lstDistrito').append("<option value=''>SELECCIONAR</option>");
			$.each(data, function (index, DistritoObj) {
				$('#lstDistrito').append("<option value='"+DistritoObj.id+"'>"+DistritoObj.distrito+"</option>");
			});
			
		});
	}
}
/*cargar modelos*/
function cargaModelos(){
	var id = $('#brand_id option:selected').val();
	var page = "/ruska/public/listarModelos/" + id;
	if(id !=''){
		$.get(page, function(data){
			console.log(data);
			$('#model_id').empty();
			$('#model_id').append("<option value=''>SELECCIONAR</option>");
			$.each(data, function (index, ModelObj) {
				$('#model_id').append("<option value='"+ModelObj.id+"'>"+ModelObj.name+"</option>");
			});
			
		});
	}
}
function toDate1 (fecha) {
	var reggie = /(\d{4})-(\d{2})-(\d{2})/;
	var dateArray = reggie.exec(fecha);
	var dateObject = new Date(
		(+dateArray[1]),
		(+dateArray[2])-1, // Careful, month starts at 0!
		(+dateArray[3])
	); 
	return dateObject;
}
function toDate2 (fecha) {
	var reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/;
	var dateArray = reggie.exec(fecha);
	var dateObject = new Date(
		(+dateArray[1]),
		(+dateArray[2])-1, // Careful, month starts at 0!
		(+dateArray[3])
		(+dateArray[4]),
		(+dateArray[5]),
		(+dateArray[6])
	); 
	return dateObject;
}