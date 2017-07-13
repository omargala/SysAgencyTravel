$(document).ready(function(){
    $("#inicio").click(function(event) {               
        $('#main').load('<?=base_url();?>/Home');
    });
    $("#altaLocalizador").click(function(event) {              
        $('#main').load('<?=base_url();?>/Localizador/altaLocalizador');
    });
    $("#listaLocalizador").click(function(event) {               
        $('#main').load('<?=base_url();?>//Localizador/listaLocalizadores');
    });
    $("#Reportes").click(function(event) {                
        $('#main').load('<?=base_url();?>/Localizador/consultaLocalizador');
    }); 
 })