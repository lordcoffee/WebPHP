$(document).ready(function () {
    $("input#openEntry").click(function(){
        $.ajax({
            type: "POST",
            url: "script/dbOpen.php", 
            data: $('form.open').serialize(),
            success: function(msg){
                $("#open").modal('hide');
                setTimeout("location.reload(true);", 900);
            },
            error: function(){
                alert("open");
            }
        });
    });
    $("input#modifyEntry").click(function(){
        $.ajax({
            type: "POST",
            url: "script/dbUpdate.php", 
            data: $('form.modify').serialize(),
            success: function(msg){
                $("#modify").modal('hide');
                setTimeout("location.reload(true);", 900);
            },
            error: function(){
                alert("modify");
            }
        });
    });
    $("input#createDB").click(function(){
        $.ajax({
            type: "POST",
            url: "script/dbCreate.php", 
            data: {},
            success: function(msg){
                $("#create").modal('hide');
                setTimeout("location.reload(true);", 900);
            },
            error: function(){
                alert("create");
            }
        });
    });
});