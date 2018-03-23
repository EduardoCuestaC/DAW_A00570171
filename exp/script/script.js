$(document).ready(function(){
    $("#userSubmit").click(function(event){
        event.preventDefault();
        var inputText =  $("#userInput").val();
        if(inputText == null || inputText == ""){
            $(".calert").first().show();
            return;
        }else
            $(".calert").first().hide();
        console.log("h");
        $.post("controller/insertEntrada.php",{
                input: inputText
            },
            function(data, status){
                console.log("d: "+data);
            }
        );
    });
    $("#selector").change(function(){
        $.post("controller/queryEntrada.php",{
                reportType: $(this).val()
            },
            function(data, status){
                $("#reports").html(data);
            }
        );
    });
});