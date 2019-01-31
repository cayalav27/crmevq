$(document).ready(function(){
    $("#TxtCodPais").change(function () {                    
        $("#TxtCodPais option:selected").each(function () {
            TxtCodPais = $(this).val();
            $.post("core/ajaxciu.php", { TxtCodPais: TxtCodPais }, function(data){
                $("#TxtCodCiu").html(data);
            });            
        });
    });
});

$(document).ready(function(){                  
    $("#TxtCodPaisUpd option:selected").each(function () {
        TxtNomCiu = $(this).data('nomciu'); 
        TxtCodPaisUpd = $(this).val();
        $.post("core/ajaxciuupd.php", { TxtCodPaisUpd: TxtCodPaisUpd, TxtNomCiu:TxtNomCiu }, function(data){
            $("#TxtCodCiuUpd").html(data);
        });            
    });
    $("#TxtCodPaisUpd").change(function () {
        $("#TxtCodPaisUpd option:selected").each(function () {
            TxtCodPaisUpd = $(this).val();
            $.post("core/ajaxciusel.php", { TxtCodPaisUpd: TxtCodPaisUpd }, function(data){
                $("#TxtCodCiuUpd").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodCrg").change(function () {                    
        $("#TxtCodCrg option:selected").each(function () {
            TxtCodCrg = $(this).val();
            $.post("core/ajaxcrg.php", { TxtCodCrg: TxtCodCrg }, function(data){
                $("#TxtCodPrf").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodDetMrc").change(function () {                    
        $("#TxtCodDetMrc option:selected").each(function () {
            TxtCodDetMrc = $(this).val();
            $.post("core/ajaxprod.php", { TxtCodDetMrc: TxtCodDetMrc }, function(data){
                $("#TxtCodProd").html(data);
            });            
        });
    });
});

$(document).ready(function(){                  
    $("#TxtCodDetMrcUpd option:selected").each(function () {
        TxtNomProd = $(this).data('nomprod'); 
        TxtCodDetMrcUpd = $(this).val();
        $.post("core/ajaxprodupd.php", { TxtCodDetMrcUpd: TxtCodDetMrcUpd, TxtNomProd:TxtNomProd }, function(data){
            $("#TxtCodProdUpd").html(data);
        });            
    });
    $("#TxtCodDetMrcUpd").change(function () {
        $("#TxtCodDetMrcUpd option:selected").each(function () {
            TxtCodDetMrcUpd = $(this).val();
            $.post("core/ajaxprodsel.php", { TxtCodDetMrcUpd: TxtCodDetMrcUpd }, function(data){
                $("#TxtCodProdUpd").html(data);
            });            
        });
    });
});

$(document).ready(function(){                  
    $("#TxtCodDivUpd option:selected").each(function () {
        TxtCodEmpUpd = $(this).data('nomemp'); 
        TxtCodDivUpd = $(this).val();
        $.post("core/ajaxempupd.php", { TxtCodDivUpd: TxtCodDivUpd, TxtCodEmpUpd:TxtCodEmpUpd }, function(data){
            $("#TxtCodEmpUpd").html(data);
        });            
    });
    $("#TxtCodDivUpd").change(function () {
        $("#TxtCodDivUpd option:selected").each(function () {
            TxtCodDivUpd = $(this).val();
            $.post("core/ajaxempsel.php", { TxtCodDivUpd: TxtCodDivUpd }, function(data){
                $("#TxtCodEmpUpd").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodCli").change(function () {                    
        $("#TxtCodCli option:selected").each(function () {
            TxtCodCli = $(this).val();
            $.post("core/ajaxcont.php", { TxtCodCli: TxtCodCli }, function(data){
                $("#TxtCodCont").html(data);
            });            
        });
    });
});

$(document).ready(function(){                  
    $("#TxtCodCliUpd option:selected").each(function () {
        TxtNomCont = $(this).data('nomcont'); 
        TxtCodCliUpd = $(this).val();
        $.post("core/ajaxcontupd.php", { TxtCodCliUpd: TxtCodCliUpd, TxtNomCont:TxtNomCont }, function(data){
            $("#TxtCodContUpd").html(data);
        });            
    });
});

$(document).ready(function(){                  
    $("#TxtCodCliUp option:selected").each(function () {
        TxtCodContUp = $(this).data('nomcont'); 
        TxtCodCliUp = $(this).val();
        $.post("core/ajaxcliupd.php", { TxtCodCliUp: TxtCodCliUp, TxtCodContUp:TxtCodContUp }, function(data){
            $("#TxtCodContUp").html(data);
        });            
    });
    $("#TxtCodCliUp").change(function () {
        $("#TxtCodCliUp option:selected").each(function () {
            TxtCodCliUp = $(this).val();
            $.post("core/ajaxcontsel.php", { TxtCodCliUp: TxtCodCliUp }, function(data){
                $("#TxtCodContUp").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodCrg").change(function () {                    
        $("#TxtCodCrg option:selected").each(function () {
            TxtCodCrg = $(this).val();
            $.post("core/ajaxequip.php", { TxtCodCrg: TxtCodCrg }, function(data){
                $("#TxtCodEmp").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodRol").change(function () {                    
        $("#TxtCodRol option:selected").each(function () {
            TxtCodVnt = $(this).data('codvnt'); 
            TxtCodRol = $(this).val();
            $.post("core/ajaxstake.php", { TxtCodRol: TxtCodRol, TxtCodVnt: TxtCodVnt }, function(data){
                $("#TxtCodStk").html(data);
            });            
        });
    });
});
 
$(document).ready(function(){                  
    $("#TxtCodRolUpd option:selected").each(function () { 
        TxtNomStk = $(this).data('nomstk');
        TxtCodVnt = $(this).data('codvnt'); 
        TxtCodRolUpd = $(this).val();
        $.post("core/ajaxstakeupd.php", { TxtCodRolUpd: TxtCodRolUpd, TxtCodVnt:TxtCodVnt, TxtNomStk:TxtNomStk }, function(data){
            $("#TxtCodStkUpd").html(data);
        });            
    });
    $("#TxtCodRolUpd").change(function () {
        $("#TxtCodRolUpd option:selected").each(function () { 
            TxtCodVnt = $(this).data('codvnt'); 
            TxtCodRolUpd = $(this).val();
            $.post("core/ajaxstakesel.php", { TxtCodRolUpd: TxtCodRolUpd, TxtCodVnt: TxtCodVnt }, function(data){
                $("#TxtCodStkUpd").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodEmp").change(function () {                    
        $("#TxtCodEmp option:selected").each(function () {
            TxtCodEmp = $(this).val();
            $.post("core/ajaxemp.php", { TxtCodEmp: TxtCodEmp }, function(data){
                $("#TxtCodPrf").html(data);
            });            
        });
    });
});

$(document).ready(function(){
    $("#TxtCodDiv").change(function () {                    
        $("#TxtCodDiv option:selected").each(function () {
            TxtCodDiv = $(this).val();
            $.post("core/ajaxdiv.php", { TxtCodDiv: TxtCodDiv }, function(data){
                $("#TxtCodEmp").html(data);
            });            
        });
    });
});