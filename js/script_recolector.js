function readRecordsR() {
    $.get("php/registros_rancheria.php", {}, function (data, status) {
        $(".records_content_r").html(data);
    });
}

function readRecordsFH() {
    $.get("php/registros_fh.php", {}, function (data, status) {
        $(".records_content_f").html(data);
    });
}

function readRecordsFHM(id) {
    $.get("php/registros_fh_mapa.php?id_fh="+id+"", {}, function (data, status) {
        $(".records_content_f_mapa").html(data);
    });
}

function borrar_rancheria(id_rancheria) {
    var conf = confirm("¿Esta seguro que desea eliminar esta rancheria?");
    if (conf == true) {
        $.post("php/borrar_rancheria.php", {
            id_rancheria: id_rancheria
        },
        function (data, status) {
                // reload Users by using readRecordsR();
                readRecordsR();
            }
            );
    }
}

function borrar_fh(id_fuente_hidrica) {
    var conf = confirm("¿Esta seguro que desea eliminar esta fuente hídrica?");
    if (conf == true) {
        $.post("php/borrar_fh.php", {
            id_fuente_hidrica: id_fuente_hidrica
        },
        function (data, status) {
                // reload Users by using readRecordsR();
                readRecordsFH();
            }
            );
    }
}

function detalles_rancheria(id_rancheria) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_rancheria_id").val(id_rancheria);
    $.post("php/leer_detalles_rancheria.php", {        
        id_rancheria: id_rancheria
    },
    function (data, status) {
        var rancheria = JSON.parse(data);
        $("#update_id_municipio").val(rancheria.id_municipio);
        $("#update_nom_rancheria").val(rancheria.nom_rancheria);
        $("#update_cantidad_personas").val(rancheria.cantidad_personas);
        $("#update_representante").val(rancheria.representante);
        $("#update_latitud_r").val(rancheria.latitud_r);
        $("#update_longitud_r").val(rancheria.longitud_r);
    }
    );
    $("#detalles_rancheria").modal("show");
}

function detalles_fh(id_fuente_hidrica) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_fh_id").val(id_fuente_hidrica);
    $.post("php/leer_detalles_fh.php", {        
        id_fuente_hidrica: id_fuente_hidrica
    },
    function (data, status) {
        var fuente_hidrica = JSON.parse(data);
        $("#update_nom_fh").val(fuente_hidrica.nom_fh);
        $("#update_latitud_f").val(fuente_hidrica.latitud_fh);
        $("#update_longitud_f").val(fuente_hidrica.longitud_fh);
        $("#update_tipo_fh").val(fuente_hidrica.id_tipo_fuente_hidrica);
        $("#update_tipo_uso").val(fuente_hidrica.id_tipo_uso);
        $("#update_tipo_acceso").val(fuente_hidrica.id_tipo_acceso);
        $("#update_dias").val(fuente_hidrica.num_dias_buscar_agua);
        $("#update_viajes").val(fuente_hidrica.num_viajes);
        $("#update_cantidad").val(fuente_hidrica.cantidad_agua);
        $("#update_tiempo").val(fuente_hidrica.tiempo_viaje);
        $("#update_rancheria").val(fuente_hidrica.id_rancheria);
        $("#update_municpio_2").val(fuente_hidrica.id_municipio);
        $("#update_so").val(fuente_hidrica.oxigeno_disuelto);
        $("#update_sst").val(fuente_hidrica.solidos_suspendidos);
        $("#update_dqo").val(fuente_hidrica.demanda_quimica_oxigeno);
        $("#update_nitrogeno").val(fuente_hidrica.nitrogeno_ica);
        $("#update_fosforo").val(fuente_hidrica.fosforo_ica);
        $("#update_ce_ica").val(fuente_hidrica.conductividad_electrica);
        $("#update_ph_ica").val(fuente_hidrica.ph_ica);
        $("#update_color").val(fuente_hidrica.color_aparente);
        $("#update_sabor").val(fuente_hidrica.olor);
        $("#update_olor").val(fuente_hidrica.sabor);
        $("#update_turbiedad").val(fuente_hidrica.turbiedad);
        $("#update_ce_irca").val(fuente_hidrica.conductividad);
        $("#update_ph_irca").val(fuente_hidrica.ph_irca);
        $("#update_antimonio").val(fuente_hidrica.antimonio);
        $("#update_arsenico").val(fuente_hidrica.arsenico);
        $("#update_bario").val(fuente_hidrica.bario);
        $("#update_cadmio").val(fuente_hidrica.cadmio);
        $("#update_cid").val(fuente_hidrica.cianuro_libre_disociable);
        $("#update_cobre").val(fuente_hidrica.cobre);
        $("#update_cromo").val(fuente_hidrica.cromo);
        $("#update_mercurio").val(fuente_hidrica.mercurio);
        $("#update_niquel").val(fuente_hidrica.niquel);
        $("#update_plomo").val(fuente_hidrica.plomo);
        $("#update_selenio").val(fuente_hidrica.selenio);
        $("#update_trihalomentanos").val(fuente_hidrica.trihalometanos);
        $("#update_hap").val(fuente_hidrica.hap);
        $("#update_cot").val(fuente_hidrica.cot);
        $("#update_nitritos").val(fuente_hidrica.nitritos);
        $("#update_nitratos").val(fuente_hidrica.nitratos);
        $("#update_fluoruros").val(fuente_hidrica.fluoruros);
        $("#update_calcio").val(fuente_hidrica.calcio);
        $("#update_alcalinidad").val(fuente_hidrica.alcalinidad);
        $("#update_cloruros").val(fuente_hidrica.cloruros);
        $("#update_aluminio").val(fuente_hidrica.aluminio);
        $("#update_dureza").val(fuente_hidrica.dureza);
        $("#update_hierro").val(fuente_hidrica.hierro);
        $("#update_magnesio").val(fuente_hidrica.magnesio);
        $("#update_manganeso").val(fuente_hidrica.manganeso);
        $("#update_molibdeno").val(fuente_hidrica.molibdeno);
        $("#update_sulfatos").val(fuente_hidrica.sulfatos);
        $("#update_zinc").val(fuente_hidrica.zinc);
        $("#update_fosfatos").val(fuente_hidrica.fosfatos);
        $("#update_cmt").val(fuente_hidrica.cmt);
        $("#update_plaguicidas").val(fuente_hidrica.plaguicidas);
        $("#update_coli").val(fuente_hidrica.escherichia_coli);
        $("#update_coliformes").val(fuente_hidrica.coliformes);
        $("#update_microorganismos").val(fuente_hidrica.microorganismos_mesofilicos);
        $("#update_giardia").val(fuente_hidrica.giardia);
        $("#update_cryptosporidium").val(fuente_hidrica.cryptosporidium);
        $("#update_detergente").val(fuente_hidrica.detergente);
        $("#update_coagulantes_hierro").val(fuente_hidrica.coagulante_sales_hierro);
        $("#update_coagulantes_aluminio").val(fuente_hidrica.coagulante_aluminio);
    }
    );
    // Open modal popup
    $("#detalles_fh").modal("show");
}

function actualizar_detalles_rancheria() {
    // get values    
    var nom_municipio = $("#update_nom_municipio").val();
    var id_municipio = $("#update_id_municipio").val();
    var nom_rancheria = $("#update_nom_rancheria").val();
    var cantidad_personas = $("#update_cantidad_personas").val();
    var representante = $("#update_representante").val();
    var latitud_r = $("#update_latitud_r").val();
    var longitud_r = $("#update_longitud_r").val();
    // get hidden field value
    var id_rancheria = $("#hidden_rancheria_id").val();
    // Update the details by requesting to the server using php
    $.post("php/actualizar_detalles_rancheria.php", {
        id_rancheria: id_rancheria,
        id_municipio: id_municipio,
        nom_municipio: nom_municipio,
        nom_rancheria: nom_rancheria,
        cantidad_personas: cantidad_personas,
        representante: representante,
        latitud_r: latitud_r,
        longitud_r: longitud_r
    },
    function (data, status) {
            // hide modal popup
            $("#detalles_rancheria").modal("hide");
            readRecordsR();
        }
        );
}

function actualizar_detalles_fh() {
    // get values    
    var nom_fh = $("#update_nom_fh").val();
    var latitud_fh = $("#update_latitud_f").val();
    var longitud_fh = $("#update_longitud_f").val();
    var id_tipo_fuente_hidrica = $("#update_tipo_fh").val();
    var id_tipo_uso = $("#update_tipo_uso").val();
    var id_tipo_acceso = $("#update_tipo_acceso").val();
    var num_dias_buscar_agua = $("#update_dias").val();
    var num_viajes = $("#update_viajes").val();
    var cantidad_agua = $("#update_cantidad").val();
    var tiempo_viaje = $("#update_tiempo").val();
    var poblacion_acceso = $("#update_acceso").val();
    var id_rancheria = $("#update_rancheria").val();
    var id_municipio = $("#update_municpio_2").val();
    var oxigeno_disuelto = $("#update_so").val();
    var solidos_suspendidos = $("#update_sst").val();
    var demanda_quimica_oxigeno = $("#update_dqo").val();
    var nitrogeno_ica = $("#update_nitrogeno").val();
    var fosforo_ica = $("#update_fosforo").val();
    var conductividad_electrica = $("#update_ce_ica").val();
    var ph_ica = $("#update_ph_ica").val();
    var color_aparente = $("#update_color").val();
    var olor = $("#update_olor").val();
    var sabor = $("#update_sabor").val();
    var turbiedad = $("#update_turbiedad").val();
    var conductividad = $("#update_ce_irca").val();
    var ph_irca = $("#update_ph_irca").val();
    var antimonio = $("#update_antimonio").val();
    var arsenico = $("#update_arsenico").val();
    var bario = $("#update_bario").val();
    var cadmio = $("#update_cadmio").val();
    var cianuro_libre_disociable = $("#update_cid").val();
    var cobre = $("#update_cobre").val();
    var cromo = $("#update_cromo").val();
    var mercurio = $("#update_mercurio").val();
    var niquel = $("#update_niquel").val();
    var plomo = $("#update_plomo").val();
    var selenio = $("#update_selenio").val();
    var trihalometanos = $("#update_trihalomentanos").val();
    var hap = $("#update_hap").val();
    var cot = $("#update_cot").val();
    var nitritos = $("#update_nitritos").val();
    var nitratos = $("#update_nitratos").val();
    var fluoruros = $("#update_fluoruros").val();
    var calcio = $("#update_calcio").val();
    var alcalinidad = $("#update_alcalinidad").val();
    var cloruros = $("#update_cloruros").val();
    var aluminio = $("#update_aluminio").val();
    var dureza = $("#update_dureza").val();
    var hierro = $("#update_hierro").val();
    var magnesio = $("#update_magnesio").val();
    var manganeso = $("#update_manganeso").val();
    var molibdeno = $("#update_molibdeno").val();
    var sulfatos = $("#update_sulfatos").val();
    var zinc = $("#update_zinc").val();
    var fosfatos = $("#update_fosfatos").val();
    var cmt = $("#update_cmt").val();
    var plaguicidas = $("#update_plaguicidas").val();
    var escherichia_coli = $("#update_coli").val();
    var coliformes = $("#update_coliformes").val();
    var microorganismos_mesofilicos = $("#update_microorganismos").val();
    var giardia = $("#update_giardia").val();
    var cryptosporidium = $("#update_cryptosporidium").val();
    var detergente = $("#update_detergente").val();
    var coagulante_sales_hierro = $("#update_coagulantes_hierro").val();
    var coagulante_aluminio = $("#update_coagulantes_aluminio").val();
    var id_fuente_hidrica = $("#hidden_fh_id").val();
    $.post("php/actualizar_detalles_fh.php", {
        id_fuente_hidrica: id_fuente_hidrica,
        nom_fh: nom_fh,
        latitud_fh: latitud_fh,
        longitud_fh: longitud_fh,
        id_tipo_fuente_hidrica: id_tipo_fuente_hidrica,
        id_tipo_uso: id_tipo_uso,
        id_tipo_acceso: id_tipo_acceso,
        num_dias_buscar_agua: num_dias_buscar_agua,
        num_viajes: num_viajes,
        cantidad_agua: cantidad_agua,
        tiempo_viaje: tiempo_viaje,
        id_rancheria: id_rancheria,
        id_municipio: id_municipio,
        oxigeno_disuelto: oxigeno_disuelto,
        solidos_suspendidos: solidos_suspendidos,
        demanda_quimica_oxigeno: demanda_quimica_oxigeno,
        nitrogeno_ica: nitrogeno_ica,
        fosforo_ica: fosforo_ica,
        conductividad_electrica: conductividad_electrica,
        ph_ica: ph_ica,
        color_aparente: color_aparente,
        olor: olor,
        sabor: sabor,
        turbiedad: turbiedad,
        conductividad: conductividad,
        ph_irca: ph_irca,
        antimonio: antimonio,
        arsenico: arsenico,
        bario: bario,
        cadmio: cadmio,
        cianuro_libre_disociable: cianuro_libre_disociable,
        cobre: cobre,
        cromo: cromo,
        mercurio: mercurio,
        niquel: niquel,
        plomo: plomo,
        selenio: selenio,
        trihalometanos: trihalometanos,
        hap: hap,
        cot: cot,
        nitritos: nitritos,
        nitratos: nitratos,
        fluoruros: fluoruros,
        calcio: calcio,
        alcalinidad: alcalinidad,
        cloruros: cloruros,
        aluminio: aluminio,
        dureza: dureza,
        hierro: hierro,
        magnesio: magnesio,
        manganeso: manganeso,
        molibdeno: molibdeno,
        sulfatos: sulfatos,
        zinc: zinc,
        fosfatos: fosfatos,
        cmt: cmt,
        plaguicidas: plaguicidas,
        escherichia_coli: escherichia_coli,
        coliformes: coliformes,
        microorganismos_mesofilicos: microorganismos_mesofilicos,
        giardia: giardia, 
        cryptosporidium: cryptosporidium,
        detergente: detergente,
        coagulante_sales_hierro: coagulante_sales_hierro,
        coagulante_aluminio: coagulante_aluminio
    },
    function (data, status) {
            // hide modal popup
            $("#detalles_fh").modal("hide");
            readRecordsFH();
        }
        );
}

$(document).ready(function () {
    readRecordsR();
    readRecordsFH();
    readRecordsFHM();
});