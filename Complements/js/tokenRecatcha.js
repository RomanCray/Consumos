window.addEventListener("load", () => {
    $("#entrar").on("click", function res(e) {
        e.preventDefault();
        ingresarLg();
    });

    let inte = document.querySelector("#passwords");
    inte.addEventListener("keypress", (e) => {
        if (e.charCode === 13) {
            ingresarLg();
        }
    });
});

function ingresarLg() {

    let email = document.getElementById('mails');
    let pass = document.getElementById('passwords');

    if (validarEmail(email.value) || pass.value.trim()) {

        let params = {
            "NombreFuncionOp": "validarUsers",
            "email": email.value,
            "pass": pass.value
        };   
        console.log("valida preajax");     

        $.ajax({
            data: params,
            url: '../../Controler/Ajax/Inter.php',
            dataType: 'json',
            type: 'post',
            success: function res(r) {
                console.log(r);  
                if (r == null) {
                    swal("Oops..!", "Lo sentimos hay problema con sus credenciales!", "error");
                } else {

                    var nombreCompleto = r['NOM_COMP'];
                    var ID_usuario = r['FAM_ID'];
                    var us_imagen = r['FAM_IMAGEN']; 

                    console.log(r['NOM_COMP'] + ' ' + r['FAM_ID'] + ' '+ r['FAM_IMAGEN'] );
                    console.log(r.NOM_COMP + ' ' + r.FAM_ID + ' '+ r.FAM_IMAGEN );

                    grecaptcha.ready(function res() {
                        grecaptcha.execute('6LdVqnIbAAAAAEEdPfgNjUYxBTaYjRhJjtwB8saa', {
                            action: 'validarUsuario'
                        }).then(function (token) {
                            $('#frm_registro').prepend(
                                '<input type="hidden" name="token" value="' + token + '" >');
                            $('#frm_registro').prepend(
                                '<input type="hidden" name="action" value="validarUsuario" >'
                            );

                            $('#frm_registro').prepend(
                                '<input type="hidden" name="nombreCompleto" value="' + nombreCompleto + '" >'
                            );
                            $('#frm_registro').prepend(
                                '<input type="hidden" name="ID_usuario" value="' + ID_usuario + '" >'
                            );
                            $('#frm_registro').prepend(
                                '<input type="hidden" name="us_imagen" value="' + us_imagen + '" >'
                            );

                            $('#frm_registro').submit();
                        });
                    });
                }
            },
            error: function (xhr, status) {
                swal({
                    title: "Error!",
                    text: "Oops!.. Lo sentimos ERROR al iniciar sesión",
                    icon: "error",
                    button: false,
                    timer: 2000,
                });
                console.log(xhr.responseText);
                console.log(status);
            }
        });      
    
    } else {
        swal("Oops..!", "Lo sentimos credenciales incorrectas!", "error");
    }
}


