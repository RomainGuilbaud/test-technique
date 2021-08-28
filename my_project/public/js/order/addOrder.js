$(document).ready(function(){
    $("#addButton").click(function(){
        $(".form>*").clone().appendTo(".addProduct");
    });
});