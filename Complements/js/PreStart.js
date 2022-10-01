window.addEventListener("load", () => {

    load_Text();

    let ancho = window.screen.availWidth;
    let top_ima = document.querySelector("#Topimage");

    if (ancho > 500) {
        top_ima.classList.remove("imagCel");
        top_ima.classList.toggle("imagPc");

    } else {
        top_ima.classList.remove("imagPc");
        top_ima.classList.toggle("imagCel");        
    }
});



function load_Text() {

    let paginaN = document.querySelector("#Pg_var");

    if (paginaN.innerText == "Page_home") {

        let titulogg = document.querySelector(".txt_Tgg");
        let titulogg1 = document.querySelector(".txt_Tgg1");
        let subtitulogg = document.querySelector(".txt_Gg");

        titulogg.innerText = "Gastos Generales";
        titulogg1.innerText = "Gastos Generales";
        subtitulogg.innerText = `Aqui podras encontrar la informacion general de todos los gastos que realiza tu familia`;

        cargarTablaP(1);

    }

    if (paginaN.innerText == "Page_personal") {

        let titulogg = document.querySelector(".txt_Tgg");
        let titulogg1 = document.querySelector(".txt_Tgg1");
        let subtitulogg = document.querySelector(".txt_Gg");
        let vlr_tota = document.querySelector(".txt_Rgg");

        titulogg.innerText = "Mis Gastos Generales";
        titulogg1.innerText = "Mis Gastos Generales";
        subtitulogg.innerText = `Aqui podras encontrar la informacion general de todos los gastos que realiaste`;
        vlr_tota.innerText = `Total de Gastos :`;

        cargarTablaP(2);
    }

    if (paginaN.innerText == "Page_personalFamilia") {

        let titulogg = document.querySelector(".txt_Tgg");
        let titulogg1 = document.querySelector(".txt_Tgg1");
        let subtitulogg = document.querySelector(".txt_Gg");
        let vlr_tota = document.querySelector(".txt_Rgg");

        titulogg.innerText = "Mis Gastos Generales Famliares";
        titulogg1.innerText = "Mis Gastos Generales Famliares";
        subtitulogg.innerText = `Aqui podras encontrar la informacion general de todos los gastos que realiaste para tu familia`;
        vlr_tota.innerText = `Total de Gastos :`;

        cargarTablaP(3);
    }
}

function cargarTablaP(Npag) {

    let params;
    if (Npag == 1) {
        let tabla4 = document.querySelector(".th_tr1");
        tabla4.innerHTML = "<th>N#</th>\n<th>USUARIO</th>\n<th>FECHA</th>\n<th>PRODUCTO</th>\n<th>CANTIDAD</th>\n<th>TOTAL</th>";
        params = { "NombreFuncionOp": "SelectGastosG" };
    } else if (Npag == 2) {
        params = {
            "NombreFuncionOp": "SelectGastosGP",
            "ID_USER": $(".UsuarioAct").val()
        };
    } else if (Npag == 3) {
        params = {
            "NombreFuncionOp": "SelectGastosGPF",
            "ID_USER": $(".UsuarioAct").val()
        };
    }

    $.ajax({
        data: params,
        url: '../../Controler/Ajax/preStrat_ajax.php',
        dataType: 'json',
        type: 'post',
        success: function res(r) {
           
            let tbody = document.querySelector(".dts_table");

            let cont = 0;
            r.forEach(contenido => {
                cont++;
                let palabra = contenido[2].toLowerCase();
                let pt = palabra[0].toUpperCase() + palabra.substring(1);
                let tr = "";
                tr += `<tr>
                            <td>
                                <input id="id_prod"  hidden>
                                ${cont}
                            </td>
                            <td>${contenido[0]}</td>
                            <td>${contenido[5]}</td>
                            <td>${pt}</td>
                            <td>${contenido[3]}</td>
                            <td class="precioV">${contenido[4]}</td>`;
                if (Npag == 1) {
                    tr += `</tr>`;
                } else {
                    tr += `     <td>                                
                                <button onclick="editar_Prod(${contenido[1]});" id="btn_tbl_edit" class="btn btn-warning rounded-circle btn-sm">
                                <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button onclick="eliminar_Prod(${contenido[1]});" id="btn_tbl_delet" class="btn btn-danger rounded-circle btn-sm">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>` ;
                }

                tbody.insertAdjacentHTML("beforeend", tr);
            });

            Add_tbl();
        },

        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function Add_tbl() {
    $('.misfiltros').each(function () {
        var title = $(this).text();
        $(this).html(`<input class="form-control" type="text" placeholder="Filtrar ${title}" />`);
    });

    var table = $('#mydatatable').DataTable({
        "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
        "responsive": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [[0, "desc"]],
        "initComplete": function () {
            this.api().columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            })
        }
    });

    let precios = document.querySelectorAll(".precioV");
    let sump = 0;
    for (let i = 0; i < precios.length; i++) {
        sump = parseFloat(precios[i].innerText) + sump;
    }
    let vlr_tota = document.querySelector(".txt_Rgg");
    vlr_tota.innerHTML = `Total de Gastos : <b>${sump.toFixed(2)} $</b>`;
}

function editar_Prod(r) {
    let targetURL = `productos.php?val_page=Editproductos_${r}`;
    let newURL = document.createElement('a');
    newURL.setAttribute("class", 'tmep');
    newURL.href = targetURL;
    newURL.click();
    document.querySelector(".tmep").remove;
}

function eliminar_Prod(r) {

    let params = {
        "NombreFuncionOp": "eliminar_Prod",
        "ID_PROD": r
    };

    $.ajax({
        data: params,
        url: '../../Controler/Ajax/preStrat_ajax.php',
        dataType: 'html',
        type: 'post',
        success: function res(r) {
            if (r == 1) {
                swal({
                    title: "¡Bien echo!",
                    text: "La informacion se elimino Exitosamente",
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
                            window.location.reload();
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
}