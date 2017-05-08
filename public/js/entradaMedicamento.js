$(document).ready(function(){
    
    $("#buscarEntradaMedicamento").click(function(evento){
        var medicamento = $("#medicamento").val();
        //alert("hola "+medicamento);


        $.ajax({
                url:"http://localhost:8000/optiene/medicamentos",
                type:"POST",
                data:{medicamento:medicamento},
                success:function(respuesta){
                alert(respuesta);
            }
        });


    });



   
});