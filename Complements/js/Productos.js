window.addEventListener("load", () => {
    // let hid_imag = document.querySelector("#top_image");
    // hid_imag.setAttribute("hidden", "hidden");
    load_pageP();
    addConstries();

});

function load_pageP() {
    let paginaN = document.querySelector("#Pg_var");
    $("#st_pord").hide();
    $("#st_pord1").hide();

    let URLcompl = paginaN.innerText;
    let delitedit = URLcompl.split("_");

    if (paginaN.innerText == "Page_productosN") {

        $("#cls_btns").hide();
        let enviar = document.querySelector("#enviar_dts");
        enviar.innerText = "Registrar Producto"
        enviar.setAttribute("class", "btn btn-outline-success btn-user btn-lg");
        enviar.setAttribute("value", "101");
        let subtitle = document.querySelector("#st_pord");
        subtitle.innerText = "Seleccione el tipo de Gasto que desea realizar";
        $("#st_pord").show();
        let subtitle1 = document.querySelector("#st_pord1");
        subtitle1.innerHTML = `<p style="color:red;">Todos los elementos con ' * ' son de caracter obligatorio`;
        $("#st_pord1").show();

    } else if (delitedit[1] == "Editproductos") {

        let enviar = document.querySelector("#enviar_dts");
        enviar.innerText = "Modificar Producto"
        enviar.setAttribute("class", "btn btn-outline-warning fs-2 btn-user");
        enviar.setAttribute("value", "102");
        $("#enviar_dts").hide();
        let subtitle = document.querySelector("#st_pord");
        subtitle.innerHTML = `<p style="font-weight: 700; text-decoration:underline;">Seleccione el tipo de Gasto para continuar</p>`;
        $("#st_pord").show();
        let subtitle1 = document.querySelector("#st_pord1");
        subtitle1.innerHTML = `<p style="color:red;">Todos los elementos con ' * ' son de caracter obligatorio</p>`;
        $("#st_pord1").show();

        let params = {
            "NombreFuncionOp": "selectEditProductos",
            "Usuario": $(".UsuarioAct").val(),
            "ID_prod": delitedit[2]
        };

        $.ajax({
            data: params,
            url: '../../Controler/Ajax/productos_ajax.php',
            dataType: 'json',
            type: 'post',
            success: function res(r) {

                $("#nombre_prod").val(r.PROD_NOMBRE);
                $("#cantidad_prod").val(r.PROD_CANTIDAD);
                $("#precio_prod").val(r.PROD_VALOR_TOTAL);
                $("#direccion_prod").val(r.PROD_UBICACION);
                $("#comentario_prod").val(r.PROD_COMENTARIO);
                if (r.PROD_TIPO == "GP") {
                    selectBtn.firstElementChild.innerHTML = "Mis Gastos";
                } else {
                    selectBtn.firstElementChild.innerHTML = "Gastos familiares";
                }
            },
            error: function (xhr, status) {
                swal({
                    title: "Error!",
                    text: "Oops!.. Lo sentimos algo salio mal",
                    icon: "error",
                    button: false,
                    timer: 2000,
                });
                console.log(xhr.responseText);
                console.log(status);
            }
        });
    }
}

function pru() {
    let paginaN = document.querySelector("#Pg_var");
    let selecG = document.querySelector(".seleccionada").innerText;
    let tipoG = selecG == "Gastos familiares" ? "GF" : "GP";
    $("#tipoG_prod").val(tipoG);
    $("#cls_btns").show();
    $("#st_pord").hide();

    let URLcompl = paginaN.innerText;
    let delitedit = URLcompl.split("_");
    if (delitedit[1] == "Editproductos") {
        $("#enviar_dts").show();
    }
}

// let ho = document.querySelector("#enviar_dts");
// enviar_dts.addEventListener("click", ()=>{
// alert("hola");
// });

$("#enviar_dts").on("click", function (e) {
    e.preventDefault();

    let enviar = document.querySelector("#enviar_dts");

    console.log("enviar");

    if (enviar.value == 101) {

        if (validarCampos()) {

            let pre_Unit = parseFloat($("#precio_prod").val()) / parseFloat($("#cantidad_prod").val());

            let params = {
                "NombreFuncionOp": "saveProductos",
                "nombre_prod": $("#nombre_prod").val(),
                "cantidad_prod": $("#cantidad_prod").val(),
                "precio_prod": $("#precio_prod").val(),
                "direccion_prod": $("#direccion_prod").val(),
                "comentario_prod": $("#comentario_prod").val(),
                "tipoG_prod": $("#tipoG_prod").val(),
                "Usuario": $(".UsuarioAct").val(),
                "pre_Unit": pre_Unit.toFixed(2)
            };

            console.log(params);

            $.ajax({
                data: params,
                url: '../../Controler/Ajax/productos_ajax.php',
                dataType: 'html',
                type: 'post',
                success: function res(r) {
                    console.log(r);

                    if (r == 1) {
                        swal({
                            title: "¡Bien echo!",
                            text: "La informacion se guardo Exitosamente",
                            icon: "success",
                            closeOnClickOutside: false,
                            buttons: {
                                catch: {
                                    text: "OK",
                                    value: "catch",
                                }
                            }
                        }).then((value) => {
                            switch (value) {
                                case "catch":
                                    bootbox.confirm({
                                        message: "Deseas añadir otro producto?",
                                        buttons: {
                                            confirm: {
                                                label: 'Si',
                                                className: 'btn-success'
                                            },
                                            cancel: {
                                                label: 'No',
                                                className: 'btn-danger'
                                            }
                                        },
                                        callback: function (result) {
                                            if (result) {
                                                limpiarCaposProd();
                                            } else {
                                                let targetURL = `home.php?val_page=home`;
                                                let newURL = document.createElement('a');
                                                newURL.setAttribute("class", 'tmep1');
                                                newURL.href = targetURL;
                                                newURL.click();
                                                document.querySelector(".tmep1").remove;
                                            }
                                        }
                                    });
                                    break;
                            }
                        });

                    } else {
                        swal({
                            title: "Error!",
                            text: "Oops!.. Algo salio mal",
                            icon: "error",
                            button: false,
                            timer: 2000,
                        });
                    }
                },
                error: function (xhr, status) {
                    swal({
                        title: "Error!",
                        text: "Oops!.. Lo sentimos algo salio mal",
                        icon: "error",
                        button: false,
                        timer: 2000,
                    });
                    console.log(xhr.responseText);
                    console.log(status);
                }
            });

        } else {
            swal({
                title: "Oops..!",
                text: "Lo sentimos vuelva a revisar los campos por favor!",
                icon: "error",
                button: false,
                timer: 2000,
            });
        }
    } else if (enviar.value == 102) {

        let paginaN = document.querySelector("#Pg_var");
        let URLcompl = paginaN.innerText;
        let delitedit = URLcompl.split("_");

        if (validarCampos()) {

            let pre_Unit = parseFloat($("#precio_prod").val()) / parseFloat($("#cantidad_prod").val());

            let params = {
                "NombreFuncionOp": "editProductos",
                "nombre_prod": $("#nombre_prod").val(),
                "cantidad_prod": $("#cantidad_prod").val(),
                "precio_prod": $("#precio_prod").val(),
                "direccion_prod": $("#direccion_prod").val(),
                "comentario_prod": $("#comentario_prod").val(),
                "tipoG_prod": $("#tipoG_prod").val(),
                "Usuario": $(".UsuarioAct").val(),
                "pre_Unit": pre_Unit.toFixed(2),
                "ID_PRO": delitedit[2]
            };

            console.log(params);

            $.ajax({
                data: params,
                url: '../../Controler/Ajax/productos_ajax.php',
                dataType: 'html',
                type: 'post',
                success: function res(r) {
                    console.log(r);

                    if (r == 1) {
                        swal({
                            title: "¡Bien echo!",
                            text: "La informacion se actualizo Exitosamente",
                            icon: "success",
                            closeOnClickOutside: false,
                            buttons: {
                                catch: {
                                    text: "OK",
                                    value: "catch",
                                }
                            }
                        }).then((value) => {
                            switch (value) {
                                case "catch":
                                    let tipo = "";
                                    if ($("#tipoG_prod").val() == "GF") {
                                        tipo = "home.php?val_page=personalFamilia";
                                    }else{
                                        tipo = "home.php?val_page=personal";
                                    }
                                    let targetURL = tipo;
                                    let newURL = document.createElement('a');
                                    newURL.setAttribute("class", 'tmep2');
                                    newURL.href = targetURL;
                                    newURL.click();
                                    document.querySelector(".tmep2").remove;
                                    break;
                            }
                        });

                    } else {
                        swal({
                            title: "Error!",
                            text: "Oops!.. Algo salio mal",
                            icon: "error",
                            button: false,
                            timer: 2000,
                        });
                    }
                },
                error: function (xhr, status) {
                    swal({
                        title: "Error!",
                        text: "Oops!.. Lo sentimos algo salio mal",
                        icon: "error",
                        button: false,
                        timer: 2000,
                    });
                    console.log(xhr.responseText);
                    console.log(status);
                }
            });

        } else {
            swal({
                title: "Oops..!",
                text: "Lo sentimos vuelva revisar los campos por favor!",
                icon: "error",
                button: false,
                timer: 2000,
            });
        }
    }

});

function validarCampos() {
    if (validarVacios(($("#nombre_prod").val())) &&
        validarVacios($("#cantidad_prod").val()) &&
        validarVacios($("#precio_prod").val()) &&
        validarSoloNum($("#cantidad_prod").val()) &&
        validarSoloNum($("#precio_prod").val())) {
        return true;
    } else {
        return false;
    }
}

function limpiarCaposProd() {
    $("#nombre_prod").val("");
    $("#cantidad_prod").val("");
    $("#precio_prod").val("");
    $("#direccion_prod").val("");
    $("#comentario_prod").val("");
    addConstries();
}

// ****************************************** SELECT SEARCH *************************
const wrapper = document.querySelector(".attr-srch_select_box");
const selectBtn = wrapper.querySelector(".attr-srch_select_select");
const options = wrapper.querySelector(".attr-srch_select_options");
const searchBtn = document.querySelector(".search_select");

var countries = [
    "Gastos familiares",
    "Mis Gastos"
];

function addConstries(seleccountry) {

    options.innerHTML = "";
    countries.forEach(country => {
        let selecioncountry = country == seleccountry ? "seleccionada" : "";
        let li = `<li class="attr-srch_select_options_color ${selecioncountry}" onclick="rename(this); pru();">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}

function rename(e) {
    searchBtn.value = "";
    addConstries(e.innerHTML.trim());
    wrapper.classList.remove("Activa");
    selectBtn.firstElementChild.innerHTML = e.innerHTML;//aki el nombre de la base
};

searchBtn.addEventListener("keyup", () => {
    let arr = [];
    let searchedVal = searchBtn.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchedVal);
    }).map(data => `<li class="attr-srch_select_options_color" onclick="rename(this)"> ${data} </li>`).join("");
    options.innerHTML = arr ? arr : `<p style="color:red;"> Oops! no se ha encontrado </p>`;
});

selectBtn.addEventListener("click", () => {
    wrapper.classList.toggle("Activa");
});
// ------------------------------------------------- FIN SELECT SEARCH -------------------------------------