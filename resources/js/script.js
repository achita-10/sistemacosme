(function(){
    $("#btnModalCategoria").on("click",function(){
        $("#modalCategoria").modal("show");
        $("#formCategoria")[0].reset();
    });
    $("#btnModalActividad").on("click",function(){
        $('.btn-update-actividad').hide();
        $('.btn-submit-actividad').show();
        $("#modalActividad").modal("show");
        $("#formActividad")[0].reset();
    });
    $("#btnModalUser").on("click",function(){
        $('.btn-update-user').hide();
        $('.btn-submit-user').show();
        $("#modalUser").modal("show");
        $("#formUser")[0].reset();
    });
}())
