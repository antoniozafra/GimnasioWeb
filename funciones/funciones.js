2/*ANTONIO JESUS ZAFRA ARIAS*/
/*PROYECTO FINAL DESARROLLO DE APLICACIONES WEB*/


/*

FÓRMULA DE CÁLCULO PARA LAS KCAL NECESARIAS:

HOMBRES -->66,473+(13,751 X PESO )+(5,0033 X ALTURA ) - (6,7550 X EDAD)

MUJERES --> 65,1+(9,463 X PESO)+(1,8 X ALTURA)-(4,6756 X ESTATURA)

*/


$(document).ready(function(){ //Hacia arriba
  irArriba();
});

function irArriba(){
  $('.ir-arriba').click(function(){ $('body,html').animate({ scrollTop:'0px' },1000); });
  $(window).scroll(function(){
    if($(this).scrollTop() > 0){ $('.ir-arriba').slideDown(600); }else{ $('.ir-arriba').slideUp(600); }
  });
  $('.ir-abajo').click(function(){ $('body,html').animate({ scrollTop:'1000px' },1000); });
}


/*FUNCION GESTION DE CALORIAS*/
function calcular_calorias() {
    
    /*GUARDAMOS LAS VARIABLES INTRODUCIDAS POR EL USUARIO*/

    //NOMBRE COMPLETO
    var nombreCompleto = document.getElementById("nombre").value;
    //EDAD
    var edad = document.getElementById("edad").value;
    //PESO(kgs)
    var peso = document.getElementById("peso").value;
    //ALTURA (cm)   
    var altura = document.getElementById("altura").value;
    //GENERO
    var genero = document.getElementById("sexo").value;
    //NIVEL DE ACTIVIDAD FÍSICA
    var nivel_actividad_fisica = document.getElementById("actividad_fisica").value;
    
    


    //COMPROBAMOS CON EL CONDICIONAL SI ES HOMBRE O MUJER, PARA SABER QUE FORMULA APLICAREMOS
    if (genero == "hombre") {
        
        
        
        //HOMBRES -->66,473+(13,751 X PESO )+(5,0033 X ALTURA ) - (6,7550 X EDAD)
        //GUARDAMOS EL RESULTADO EN UNA VARIABLE
        var resultado = 66.473 + (13.751 * peso) + (5.033 * altura) - (6.7550 * edad);


        //ABRIMOS UNA  ESTRUCTURA SWITCH PARA SABER EL NIVEL DE ACTIVIDAD FISICA
        switch (nivel_actividad_fisica) {
            case "no_activo":
                resultado=resultado;
                break;

            case "algo_activo":
                resultado= resultado*1.3;
                break;

            case "activo":
                resultado=resultado*1.4;
                break;

            case "muy_activo":
                resultado=resultado*1.55;
                break;

            default:
                alert("LO SENTIMOS, HA OCURRIDO UN ERROR  AL RELLENAR EL CUESTIONARIO");
                break;
        }//FIN SWITCH

        var calorias_bajar_peso = parseInt(resultado) - 500;
        var calorias_mantener_peso = parseInt(resultado);
        var calorias_subir_peso = parseInt(resultado + 500);


        //CAMBIAMOS LOS VALORES YA QUE HEMOS APLICADO LA FORMULA
        document.getElementById("datos_bajar_peso").innerHTML = "<p id='datos_bajar_peso'><strong>" + parseInt(calorias_bajar_peso) + "-"+parseInt(calorias_bajar_peso + 500)+ "</strong> KCAL APROX</p>";

        document.getElementById("datos_mantener_peso").innerHTML = "<strong>" + parseInt(calorias_mantener_peso) + "-" + parseInt(calorias_mantener_peso + 500) + "</strong> KCAL APROX";
        document.getElementById("datos_subir_peso").innerHTML = "<strong> " + parseInt(calorias_subir_peso) + "-" + parseInt(calorias_subir_peso + 500) + "</strong> KCAL APROX";
    
    }//FIN IF
    
    else {
        
        alert(" ERES UNA MUJER");
        //MUJERES --> 655,1+(9,463 X PESO)+(1,8 X ALTURA)-(4,6756 X ESTATURA)
        
        //GUARDAMOS EL RESULTADO EN UNA VARIABLE
        var resultado = 655.1 + (9.463 * peso) + (1.8 * altura) - (4.6756 * altura);
        
        //ABRIMOS UNA  ESTRUCTURA SWITCH PARA SABER EL NIVEL DE ACTIVIDAD FISICA
        switch (nivel_actividad_fisica) {
            case "no_activo":
                resultado=resultado;
                break;

            case "algo_activo":
                resultado= resultado*1.25;
                break;

            case "activo":
                resultado=resultado+1.35;
                break;

            case "muy_activo":
                resultado=resultado*1.5;
                break;

            default:
                alert("LO SENTIMOS, HA OCURRIDO UN ERROR");
                break;
        }//FIN SWITCH
        
        var calorias_bajar_peso = parseInt(resultado) - 100;
        var calorias_mantener_peso = parseInt(resultado);
        var calorias_subir_peso = parseInt(resultado + 500);
        
        //CAMBIAMOS LOS VALORES YA QUE HEMOS APLICADO LA FORMULA
        document.getElementById("datos_bajar_peso").innerHTML = "<p id='datos_bajar_peso'><strong>" + parseInt(calorias_bajar_peso) + "-"+parseInt(calorias_bajar_peso + 250)+ "</strong> KCAL APROX</p>";

        document.getElementById("datos_mantener_peso").innerHTML = "<strong>" + parseInt(calorias_mantener_peso) + "-" + parseInt(calorias_mantener_peso + 500) + "</strong> KCAL APROX";
        document.getElementById("datos_subir_peso").innerHTML = "<strong> " + parseInt(calorias_subir_peso) + "-" + parseInt(calorias_subir_peso + 500) + "</strong> KCAL APROX";
        
    }//FIN ELSE

} //FIN FUNCION GESTION DE CALORIAS






document.getElementById("menu").addEventListener("click",function(){
  
  document.getElementById("navega").classList.toggle("mostrar");
});

