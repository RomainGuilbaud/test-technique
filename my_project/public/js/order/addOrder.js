$(document).ready(function(){
    $("#addButton").click(function(){
        $(".body>*").clone().appendTo(".addProduct");
    });
});