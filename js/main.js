$(document).ready(function () {
	
$("#recherche").keyup(function(){
	if($(this).val()!=""){
console.log("OK!");
var requete="requete="+$(this).val();
$.ajax({
	type:"GET",
	url:"crud/get_etudiant.php",
	data:requete,
	success:function(server_response){
		$("#resultat").html(server_response).show();
	}
});
}else{
	$("#resultat").html("").show();
}
});

});