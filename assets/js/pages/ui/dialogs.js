$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'confirm') {
            showConfirmMessage();
        }
        else if (type === 'cancel') {
            showCancelMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/
function showBasicMessage() {
    swal("Here's a message!");
}

function showWithTitleMessage() {
    swal("Here's a message!", "It's pretty, isn't it?");
}

function showSuccessMessage() {
    swal("Good job!", "You clicked the button!", "success");
}

function showConfirmMessage() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}

function showCancelMessage() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
}

function showWithCustomIconMessage() {
    swal({
        title: "Sweet!",
        text: "Here's a custom image.",
        imageUrl: "../../images/thumbs-up.png"
    });
}

function showHtmlMessage() {
    swal({
        title: "HTML <small>Title</small>!",
        text: "A custom <span style=\"color: #CC0000\">html<span> message.",
        html: true
    });
}

function showAutoCloseTimerMessage() {
    swal({
        title: "Auto close alert!",
        text: "I will close in 2 seconds.",
        timer: 2000,
        showConfirmButton: false
    });
}

function showPromptMessage() {
    swal({
        title: "An input!",
        text: "Write something interesting:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Write something"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("You need to write something!"); return false
        }
        swal("Nice!", "You wrote: " + inputValue, "success");
    });
}

function showAjaxLoaderMessage() {
    swal({
        title: "Ajax request example",
        text: "Submit to run ajax request",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function () {
        setTimeout(function () {
            swal("Ajax request finished!");
        }, 2000);
    });


}

$('.btn-exit').on('click', function(){
    swal({
        title: '¿Quieres salir del sistema?',
        text: "La sesión actual se cerrará y dejará el sistema",
        type: "info",
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            window.location='salir'; 
        }
    });
});

$('.btn-DltVnt').on('click', function(){

    var CodVnt = $(this).data('id');

    swal({
        title: '¿Quieres eliminar la venta?',
        text: "El registro no se podrá recuperar luego de confirmar",
        imageUrl: "assets/images/ventaeliminada.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            window.location=encodeURIComponent('venta&a=DltVnt&CodVnt=')+CodVnt; 
        } else {
            swal("Cancelado", "Tu oportunidad de venta esta a salvo", "error");
        }
    });
});

$('.btn-UpdVntC').on('click', function(){

    var CodVnt = $(this).data('id');

    swal({
        title: '¿Quieres culminar la venta?',
        text: "Al confirmar se cerrara el proceso de venta",
        imageUrl: "assets/images/ventaconcluida.png",
        showCancelButton: true,
        confirmButtonColor: "#4CAF50",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            window.location=encodeURIComponent('venta&a=UpdVntC&CodVnt=')+CodVnt; 
        } else {
            swal("Cancelado", "Tu oportunidad de venta no fue modificado", "error");
        }
    });
});

$('.btn-UpdVntP').on('click', function(){

    var CodVnt = $(this).data('id');

    swal({
        title: '¿Quieres perder la venta?',
        text: "Al confirmar se actualizará a perdidos",
        imageUrl: "assets/images/ventaperdida.png",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            window.location=encodeURIComponent('venta&a=UpdVntP&CodVnt=')+CodVnt; 
        } else {
            swal("Cancelado", "No realizaste ningún cambio de tu oportunidad venta", "error");
        }
    });
});

$('.btn-DltDetVnt').on('click', function(){

    var CodDetVnt = $(this).data('id');
    var CodVnt = $(this).data('codvnt');
    var Ind = $(this).data('ind');

    if (Ind == 1) {
        swal({
            title: '¿Quieres desactivar este producto?',
            text: "El registro se inactivará y no podrás editarlo",
            imageUrl: "assets/images/detallevnteliminar.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("detallevnt&a=DltDetVnt",
                    {
                        CodDetVnt:CodDetVnt,
                        CodVnt:CodVnt
                    }
                )
                window.location=encodeURIComponent('detallevnt&a=DetalleVnt&CodDetVnt=')+CodDetVnt+encodeURIComponent('&CodVnt=')+CodVnt;
            } else {
                swal("Cancelado", "Tu producto registrado está a salvo", "error");
            }
        });
    }
    else {
        swal({
            title: '¿Quieres activar este producto?',
            text: "El registro se activará al confirmar el mensaje",
            imageUrl: "assets/images/detalleactivo.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("detallevnt&a=UpdActDetVnt",
                    {
                        CodDetVnt:CodDetVnt,
                        CodVnt:CodVnt
                    }
                )
                window.location=encodeURIComponent('detallevnt&a=DetalleVnt&CodDetVnt=')+CodDetVnt+encodeURIComponent('&CodVnt=')+CodVnt;
            } else {
                swal("Cancelado", "Tu producto registrado está a salvo", "error");
            }
        });
    }
});

$('.btn-DltAgn').on('click', function(){

    var CodAgn = $(this).data('id');
    var CodVnt = $(this).data('codvnt');

    swal({
        title: '¿Quieres eliminar este evento?',
        text: "El registro se eliminara y no se podrá recuperar",
        imageUrl: "assets/images/eventoagenda.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("agenda&a=DltAgn",
                {
                    CodAgn:CodAgn,
                    CodVnt:CodVnt
                }
            )
            window.location=encodeURIComponent('agenda&a=Index&CodVnt=')+CodVnt; 
        } else {
            swal("Cancelado", "Tu evento registrado está a salvo", "error");
        }
    });
});

$('.btn-DltStk').on('click', function(){

    var CodStk = $(this).data('id');
    var CodVnt = $(this).data('codvnt');
    var Ind = $(this).data('ind');

    if (Ind == 1) {
        swal({
            title: '¿Quieres desactivar este stakeholder?',
            text: "El registro se inactivará y no podrá editarlo",
            imageUrl: "assets/images/stakeholder.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("stakeholder&a=DltStk",
                        {
                            CodStk:CodStk,
                            CodVnt:CodVnt
                        }
                    )
                window.location=encodeURIComponent('stakeholder&a=Index&CodVnt=')+CodVnt;
            } else {
                swal("Cancelado", "El stakeholder registrado está a salvo", "error");
            }
        });
    }
    else {
        swal({
            title: '¿Quieres activar este stakeholder?',
            text: "El registro se activará al confirmar el mensaje",
            imageUrl: "assets/images/stakeholder.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("stakeholder&a=UpdActStk",
                        {
                            CodStk:CodStk,
                            CodVnt:CodVnt
                        }
                    )
                window.location=encodeURIComponent('stakeholder&a=Index&CodVnt=')+CodVnt;
            } else {
                swal("Cancelado", "El stakeholder registrado está a salvo", "error");
            }
        });
    }
});

$('.btn-DltEqp').on('click', function(){

    var CodEqp = $(this).data('id');
    var CodVnt = $(this).data('codvnt');
    var Ind = $(this).data('ind');

    if (Ind == 1) {
        swal({
            title: '¿Quieres desactivar la visualización?',
            text: "Tu compañero(@) no podrá visualizar esta oportunidad de venta y no podrás editar",
            imageUrl: "assets/images/equipovnt.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("equipo&a=DltEqp",
                    {
                        CodEqp:CodEqp,
                        CodVnt:CodVnt
                    }
                )
                window.location=encodeURIComponent('equipo&a=Index&CodVnt=')+CodVnt; 
            } else {
                swal("Cancelado", "Tu compañero(@) asignado está a salvo", "error");
            }
        });
    }
    else {
        swal({
            title: '¿Quieres activar la visualización?',
            text: "Al confirmar tu compañero(@) visualizara esta oportunidad de venta",
            imageUrl: "assets/images/equipovnt.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                $.post("equipo&a=UpdActEqp",
                    {
                        CodEqp:CodEqp,
                        CodVnt:CodVnt
                    }
                )
                window.location=encodeURIComponent('equipo&a=Index&CodVnt=')+CodVnt; 
            } else {
                swal("Cancelado", "Tu compañero(@) asignado está a salvo", "error");
            }
        });
    }
});

$('.btn-DltCont').on('click', function(){

    var CodCont = $(this).data('id');
    var CodCli = $(this).data('codcli');

    swal({
        title: '¿Quieres eliminar este contacto?',
        text: "Al confirmar no se podrá recuperar y posible afecte los datos asociados al cliente.",
        imageUrl: "assets/images/contacto.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("contacto&a=DltCont",
                {
                    CodCont:CodCont,
                    CodCli:CodCli
                }
            ) 
            window.location=encodeURIComponent('contacto&a=Index&CodCli=')+CodCli; 
        } else {
            swal("Cancelado", "El contacto registrado está a salvo", "error");
        }
    });
});

$('.btn-DltBkl').on('click', function(){

    var CodCont = $(this).data('id');

    swal({
        title: '¿Quieres eliminar este Backlog?',
        text: "Al confirmar no se podrá recuperar el registro",
        imageUrl: "assets/images/Backlog.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
            window.location=encodeURIComponent('backlog&a=DltBkl&CodBkl=')+CodCont; 
        } else {
            swal("Cancelado", "Tu backlog registrado está a salvo", "error");
        }
    });
});

$('input[name=txtestdettot]').change(function(){

    var CodDetTot = $(this).data('coddettot');
    var CodVnt = $(this).data('codvnt');
    var EstDetTot = $(this).data('estdettot');

    if (EstDetTot == 1) {
        $.post("detallevnt&a=UpdDetTotMnl",
            {
                CodDetTot:CodDetTot,
                CodVnt:CodVnt
            }
        )
        window.location=encodeURIComponent('detallevnt&a=Index&CodVnt=')+CodVnt; 
    }
    else {
        $.post("detallevnt&a=UpdDetTotAut",
            {
                CodDetTot:CodDetTot,
                CodVnt:CodVnt
            }
        )
        window.location=encodeURIComponent('detallevnt&a=Index&CodVnt=')+CodVnt; 
    }
});

$('.btn-DltCns').on('click', function(){

    var CodCli = $(this).data('id');
    var CodCliCns = $(this).data('codcli');

    swal({
        title: '¿Quieres eliminarlo del consorcio?',
        text: "Al confirmar se retirará del grupo",
        imageUrl: "assets/images/clientedlt.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
                $.post("consorcio&a=UpdDltCliCns",
                {
                    CodCli:CodCli,
                    CodCliCns:CodCliCns
                }
            )
            window.location=encodeURIComponent('consorcio&a=Index&CodCli=')+CodCliCns; 
        } else {
            swal("Cancelado", "La empresa asignada está a salvo", "error");
        }
    });
});

$('.btn-DltCnsForm').on('click', function(){

    var CodCli = $(this).data('id');
    var CodCliCns = $(this).data('codcli');

    swal({
        title: '¿Quieres eliminarlo del consorcio?',
        text: "Al confirmar se retirará del grupo",
        imageUrl: "assets/images/clientedlt.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
                $.post("consorcioformulador&a=UpdDltCliCns",
                {
                    CodCli:CodCli,
                    CodCliCns:CodCliCns
                }
            )
            window.location=encodeURIComponent('consorcioformulador&a=Index&CodCli=')+CodCliCns; 
        } else {
            swal("Cancelado", "La empresa asignada está a salvo", "error");
        }
    });
});

$('.btn-DltCnsMkt').on('click', function(){

    var CodCli = $(this).data('id');
    var CodCliCns = $(this).data('codcli');

    swal({
        title: '¿Quieres eliminarlo del consorcio?',
        text: "Al confirmar se retirará del grupo",
        imageUrl: "assets/images/clientedlt.png",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Sí',
        cancelButtonText:  'No',
        closeOnConfirm: false,
        closeOnCancel: false
        
    },
    function(isConfirm) {
        if (isConfirm) {
                $.post("consorciomkt&a=UpdDltCliCns",
                {
                    CodCli:CodCli,
                    CodCliCns:CodCliCns
                }
            )
            window.location=encodeURIComponent('consorciomkt&a=Index&CodCli=')+CodCliCns; 
        } else {
            swal("Cancelado", "La empresa asignada está a salvo", "error");
        }
    });
});

/*
swal({
            title: '¿Quieres cambiar a automático?',
            text: "Al confirmar los montos serán automáticos",
            imageUrl: "assets/images/subtotal.png",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Sí',
            cancelButtonText:  'No',
            closeOnConfirm: false,
            closeOnCancel: false
            
        },
        function(isConfirm) {
            if (isConfirm) {
                
            } else {
                swal("Cancelado", "Los cambios no fueron confirmados", "error");
            }

        });
*/