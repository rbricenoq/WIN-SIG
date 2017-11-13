<?php
// include Database connection file
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
    echo 'Ha ocurrido un error de conexión con la base de datos.';
    exit;
}

// check request
if(isset($_POST)){

    $id_fuente_hidrica = $_POST['id_fuente_hidrica'];
    $id_tipo_fuente_hidrica = $_POST['id_tipo_fuente_hidrica'];
    $id_tipo_uso = $_POST['id_tipo_uso'];
    $id_tipo_acceso = $_POST['id_tipo_acceso'];
    $num_dias_buscar_agua = $_POST['num_dias_buscar_agua'];
    $num_viajes = $_POST['num_viajes'];
    $cantidad_agua = $_POST['cantidad_agua'];
    $tiempo_viaje = $_POST['tiempo_viaje'];
    $poblacion_acceso = $_POST['poblacion_acceso'];
    $id_rancheria = $_POST['id_rancheria'];
    $id_municipio = $_POST['id_municipio'];

    $oxigeno_disuelto = $_POST['oxigeno_disuelto'];
    $oxigeno_saturacion = $_POST['oxigeno_saturacion'];
    $solidos_suspendidos = $_POST['solidos_suspendidos'];
    $demanda_quimica_oxigeno = $_POST['demanda_quimica_oxigeno'];
    $conductividad_electrica = $_POST['conductividad_electrica'];
    $ph_ica = $_POST['ph_ica'];
    $nitrogeno_ica = $_POST['nitrogeno_ica'];
    $fosforo_ica = $_POST['fosforo_ica'];

    $indice_oxigeno = 0;
    $indice_sst = 0;
    $indice_demanda_quimica_oxigeno=0;
    $indice_conductividad_electrica=0;
    $indice_ph=0;
    $indice_nt_pt=0;
    $ica=0;
    $e_ica="";
    $e_irca="";


//Valores para calcular IRCA

    $color_aparente = $_POST['color_aparente'];
    $olor = $_POST['olor'];
    $sabor = $_POST['sabor'];
    $turbiedad = $_POST['turbiedad'];
    $conductividad = $_POST['conductividad'];
    $ph_irca = $_POST['ph_irca']; 
    $antimonio = $_POST['antimonio'];
    $arsenico = $_POST['arsenico'];
    $bario = $_POST['bario']; 
    $cadmio = $_POST['cadmio'];
    $cianuro_libre_disociable = $_POST['cianuro_libre_disociable'];
    $cobre = $_POST['cobre'];
    $cromo = $_POST['cromo'];
    $mercurio = $_POST['mercurio'];
    $niquel = $_POST['niquel'];
    $plomo = $_POST['plomo']; 
    $selenio = $_POST['selenio'];
    $trihalometanos = $_POST['trihalometanos'];
    $hap = $_POST['hap'];
    $cot = $_POST['cot']; 
    $nitritos = $_POST['nitritos'];
    $nitratos = $_POST['nitratos']; 
    $fluoruros = $_POST['fluoruros']; 
    $calcio = $_POST['calcio'];
    $alcalinidad = $_POST['alcalinidad']; 
    $cloruros = $_POST['cloruros']; 
    $aluminio = $_POST['aluminio'];
    $dureza = $_POST['dureza']; 
    $hierro = $_POST['hierro'];
    $magnesio = $_POST['magnesio'];
    $manganeso = $_POST['manganeso']; 
    $molibdeno = $_POST['molibdeno'];
    $sulfatos = $_POST['sulfatos'];
    $zinc = $_POST['zinc']; 
    $fosfatos  = $_POST['fosfatos'];
    $cmt = $_POST['cmt']; 
    $plaguicidas = $_POST['plaguicidas'];
    $escherichia_coli = $_POST['escherichia_coli'];
    $coliformes = $_POST['coliformes'];
    $microorganismos_mesofilicos = $_POST['microorganismos_mesofilicos'];
    $giardia = $_POST['giardia'];
    $cryptosporidium = $_POST['cryptosporidium'];
    $detergente = $_POST['detergente'];
    $coagulante_sales_hierro = $_POST['coagulante_sales_hierro'];
    $coagulante_aluminio = $_POST['coagulante_aluminio']; 
    $calculo_irca = 0;
    $estado_irca = "";

    if (strcmp($escherichia_coli, "Ausencia en 100cm3") == 0 ) {
        $escherichia_coli = 1;
    } else {
        $escherichia_coli = 0;
    }

    if (strcmp($coliformes, "Ausencia en 100cm3") == 0 ) {
        $coliformes = 1;
    } else {
        $coliformes = 0;
    }    

    echo "<h2>escherichia_coli</h2>";
    echo($escherichia_coli);

    echo "<h2>coliformes</h2>";
    echo($coliformes);

    //LLamado a Funciones ICA

    $i_ox=indice_ox_disuelto($oxigeno_disuelto, $oxigeno_saturacion);
    $i_stt=indice_sst($solidos_suspendidos);
    $i_do=indice_demanda_oxigeno($demanda_quimica_oxigeno);
    $i_ce=indice_conductividad_electrica($conductividad_electrica);
    $i_ph=indice_ph($ph_ica);
    $i_ntf=indice_nitrogeno_fosfoto($nitrogeno_ica,$fosforo_ica);
    $c_ica=calcular_ica($i_ox, $i_stt, $i_do, $i_ce, $i_ph, $i_ntf);
    $e_ica=estado_ica($c_ica);

//LLamado a Funciones IRCA

    $c_irca=calcular_irca($color_aparente, $turbiedad, $ph_irca, $antimonio, $arsenico, $bario, $cadmio, $cianuro_libre_disociable, $cobre, $cromo, $mercurio, $niquel, $plomo, $selenio, $trihalometanos, $hap, $cot, $nitritos, $nitratos, $fluoruros, $calcio, $alcalinidad, $cloruros, $aluminio, $dureza, $hierro, $magnesio, $manganeso, $molibdeno, $sulfatos, $zinc, $fosfatos, $cmt, $plaguicidas, $scherichia_coli, $coliformes, $microorganismos_mesofilicos, $giardia, $cryptosporidium, $detergente, $coagulante_sales_hierro, $coagulante_aluminio, $calculo_irca, $estado_irca);

    $e_irca=estado_irca($c_irca);


// echo "<h2>Ox Disuelto</h2>";
// echo( $i_ox);

// echo "<h2>SST</h2>";
// echo( $i_stt);

// echo "<h2>DO</h2>";
// echo( $i_do);

// echo "<h2>CE</h2>";
// echo( $i_ce);

// echo "<h2>PH</h2>";
// echo( $i_ph);

// echo "<h2>NF</h2>";
// echo( $i_ntf);

// echo "<h2>ICA</h2>";
// echo( $c_ica);

// echo "<h2>Estado</h2>";
// echo( $e_ica);

// echo "<h2>Color</h2>";
// echo($olor);

// echo "<h2>Sabor</h2>";
// echo($sabor);

// echo "<h2>escherichia</h2>";
// echo($escherichia_coli_var);

// echo "<h2>coliformes_var</h2>";
// echo($coliformes_var);

// echo "<h2>antimonio</h2>";
// echo( $antimonio);

// echo "<h2>IRCA</h2>";
// echo( $c_irca);

// echo "<h2>Estado</h2>";
// echo( $e_irca);

//echo "<h2>YA VUELVO!!!!! voy a comer algo</h2>";

//------------------------------------
//            Funciones ICA
//------------------------------------

    function indice_ox_disuelto($oxigeno_disuelto, $oxigeno_saturacion){
        $saturacion_ox_disuelto = ($oxigeno_disuelto/$oxigeno_saturacion);
        if($saturacion_ox_disuelto > 1){
            $indice_oxigeno=1-(0.01*$saturacion_ox_disuelto-1);
        }
        else
            $indice_oxigeno=1-(1-0.01*$saturacion_ox_disuelto);
        return $indice_oxigeno;
    }

    function indice_sst($solidos_suspendidos){
        if ($solidos_suspendidos<= 4.5) {
            $indice_sst=1;
        }
        elseif ($solidos_suspendidos>=320) {
            $indice_sst=0;
        }
        else
            $indice_sst=1-(-0.02+0.003*$solidos_suspendidos);
        return $indice_sst;
    }

    function indice_demanda_oxigeno($demanda_quimica_oxigeno){
        if ($demanda_quimica_oxigeno<=20) {
            $indice_demanda_quimica_oxigeno = 0.91;
        }
        elseif ($demanda_quimica_oxigeno>20 and $demanda_quimica_oxigeno <= 25 ) {
            $indice_demanda_quimica_oxigeno = 0.71;
        }
        elseif ($demanda_quimica_oxigeno>25 and $demanda_quimica_oxigeno <= 40 ) {
            $indice_demanda_quimica_oxigeno = 0.51;
        }
        elseif ($demanda_quimica_oxigeno>40 and $demanda_quimica_oxigeno <= 80 ) {
            $indice_demanda_quimica_oxigeno = 0.26;
        }
        else 
            $indice_demanda_quimica_oxigeno = 0.125;
        return $indice_demanda_quimica_oxigeno;
    }

    function indice_conductividad_electrica($conductividad_electrica){
        if ($indice_conductividad_electrica<0) {
            $indice_conductividad_electrica=0;
        }
        else
            $indice_conductividad_electrica= 1 - pow(10, (-3.26+1.34*log10($conductividad_electrica)));
        return $indice_conductividad_electrica;
    }
    function indice_ph($ph_ica){
        if ($ph_ica < 4) {
            $indice_ph=0.1;
        }
        elseif($ph_ica >= 4 and $ph_ica <= 7){
            $indice_ph=0.02628419*exp($ph_ica*0.52002);
        }
        elseif($ph_ica > 7 and $ph_ica <= 8){
            $indice_ph=1;
        }
        elseif($ph_ica > 8 and $ph_ica<=11){
            $indice_ph=1*exp(($ph_ica-8)*(-0.5187742));
        }
        else
            $indice_ph=0.1;
        return $indice_ph;
    }
    function indice_nitrogeno_fosfoto($nitrogeno_ica, $fosforo_ica){
        $indice_nt_pt=$nitrogeno_ica/$fosforo_ica;
        if ($indice_nt_pt >= 15 and $indice_nt_pt <= 20) {
            $indice_nt_pt = 0.8;
        }
        elseif ($indice_nt_pt > 10 and $indice_nt_pt < 15) {
            $indice_nt_pt = 0.6;
        }
        elseif ($indice_nt_pt > 5 and $indice_nt_pt <= 10) {
            $indice_nt_pt = 0.35;
        }
        else
            $indice_nt_pt = 0.15;
        return $indice_nt_pt;
    }

/*    function indice_nitrogeno_fosfoto($nitrogeno_ica, $fosforo_ica){
        if($nitrogeno_ica!=0 and fosforo_ica!=0){
            $indice_nt_pt=$nitrogeno_ica/$fosforo_ica; 
            if ($indice_nt_pt >= 15 and $indice_nt_pt <= 20) {
                $indice_nt_pt = 0.8;
            }
            elseif ($indice_nt_pt > 10 and $indice_nt_pt < 15) {
                $indice_nt_pt = 0.6;
            }
            elseif ($indice_nt_pt > 5 and $indice_nt_pt <= 10) {
                $indice_nt_pt = 0.35;
            }
            else
                $indice_nt_pt = 0.15;
            
        } else
        $indice_nt_pt = "-";
        return $indice_nt_pt;
    }*/

    function calcular_ica($i_ox, $i_stt, $i_do, $i_ce, $i_ph, $i_ntf){
        $ica= (($i_ox + $i_stt + $i_do + $i_ce + $i_ntf)) * 0.17 + ($i_ph*0.15);
        return $ica;
    }

    function estado_ica($c_ica){
        if ($c_ica >= 0 and $c_ica <= 0.25) {
            $e_ica = 'Muy mala';
        }
        elseif ($c_ica > 0.26 and $c_ica <= 0.50) {
            $e_ica = "Mala";
        }
        elseif ($c_ica > 0.50 and $c_ica <= 0.70) {
            $e_ica = "Regular";
        }
        elseif ($c_ica > 0.70 and $c_ica <= 0.90) {
            $e_ica = "Aceptable";
        }
        elseif ($c_ica > 0.90 and $c_ica <= 1){
            $e_ica = "Buena";
        }
        else
            $e_ica = "Indice IRCA erroneo";
        return $e_ica;
    }

//------------------------------------
//            Funciones IRCA
//------------------------------------

    function calcular_irca($color_aparente, $turbiedad, $ph_irca, $antimonio, $arsenico, $bario, $cadmio, $cianuro_libre_disociable, $cobre, $cromo, $mercurio, $niquel, $plomo, $selenio, $trihalometanos, $hap, $cot, $nitritos, $nitratos, $fluoruros, $calcio, $alcalinidad, $cloruros, $aluminio, $dureza, $hierro, $magnesio, $manganeso, $molibdeno, $sulfatos, $zinc, $fosfatos, $cmt, $plaguicidas, $scherichia_coli, $coliformes, $microorganismos_mesofilicos, $giardia, $cryptosporidium, $detergente, $coagulante_sales_hierro, $coagulante_aluminio, $calculo_irca, $estado_irca){

        if ($color_aparente > 15) {
            $calculo_irca = $calculo_irca + 6;
        }
        elseif ($turbiedad > 2) {
            $calculo_irca = $calculo_irca + 15;
        }
        elseif ($ph_irca > 6.5 and $ph_irca < 9) {
            $calculo_irca = $calculo_irca + 1.5;
        }
        elseif ($cot > 5) {
            $calculo_irca = $calculo_irca + 3;
        }
        elseif ($nitritos > 0.1) {
            $calculo_irca = $calculo_irca + 3;
        }
        elseif ($nitratos > 10) {
            $calculo_irca = $calculo_irca + 1;
        }
        elseif ($fluoruros > 1) {
            $calculo_irca = $calculo_irca + 1;
        }
        elseif ($calcio > 60) {
            $calculo_irca = $calculo_irca + 1;
        }
        elseif ($alcalinidad > 200) {
            $calculo_irca = $calculo_irca + 1;
        }
        elseif ($cloruros > 250) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($aluminio > 0.2) {
            $calculo_irca = $calculo_irca + 3;
        }
        if ($dureza > 300) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($hierro > 0.3) {
            $calculo_irca = $calculo_irca + 1.5;
        }
        if ($magnesio > 36) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($manganeso > 0.1) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($molibdeno > 0.07) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($sulfatos > 250) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($zinc > 3) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($fosfatos > 0.5) {
            $calculo_irca = $calculo_irca + 1;
        }
        if ($escherichia_coli = 1){
            $calculo_irca = $calculo_irca + 25;
            $escherichia_coli = "Ausencia en 100cm3";
        }
        if ($coliformes = 1){
            $calculo_irca = $calculo_irca + 15;
            $coliformes = "Ausencia en 100cm3";
        }
        if ($detergente > 0.3 and $detergente < 2) {
            $calculo_irca = $calculo_irca + 15;
        }
        if ($coagulante_sales_hierro > 3){
            $calculo_irca = $calculo_irca + 1.5;
        }
        if ($coagulante_aluminio > 0.2){
            $calculo_irca = $calculo_irca + 3;
        }
        if ($antimonio > 0.02 or $arsenico > 0.01 or $bario > 0.7 or $cadmio > 0.003 or $cianuro_libre_disociable > 0.05 or $cobre > 1 or $cromo > 0.05 or $mercurio > 0.001 or $niquel > 0.02 or $plomo > 0.01 or $selenio > 0.01 or $trihalometanos > 0.2 or $hap > 0.01 or $cmt > 0.0001 or $plaguicidas > 0.1 or $giardia > 0 or $cryptosporidium > 0 ) {
            $calculo_irca = 100;        
        }
        return $calculo_irca;
    }

    function estado_irca ($c_irca){
        if ($c_irca >= 0 and $c_irca <= 5) {
            $e_irca = "Sin Riesgo";
        }
        elseif ($c_irca > 5 and $c_irca <= 14) {
            $e_irca = "Riesgo Bajo";
        }
        elseif ($c_irca > 14 and $c_irca <= 35) {
            $e_irca = "Riesgo Medio";
        }
        elseif ($c_irca > 35 and $c_irca <= 80) {
            $e_irca = "Riesgo Alto";
        }
        elseif ($c_irca > 80 and $c_irca <= 100){
            $e_irca = "Sanitariamente Inviable";
        }
        else
            $e_irca = "Indice irca erroneo";
        return $e_irca;
    }


    // Update detalles Fuente Hidrica
    $query1 = "UPDATE wintig.ica SET oxigeno_disuelto = '$oxigeno_disuelto', solidos_suspendidos = '$solidos_suspendidos', demanda_quimica_oxigeno = '$demanda_quimica_oxigeno', conductividad_electrica = '$conductividad_electrica', ph_ica = '$ph_ica', nitrogeno_ica = '$nitrogeno_ica', fosforo_ica = '$fosforo_ica', calculo_ica = '$calculo_ica', estado_ica = '$estado_ica' WHERE id_ica = '$id_fuente_hidrica'";

    $query2 = "UPDATE wintig.irca SET color_aparente = '$color_aparente', olor = '$olor', sabor = '$sabor', turbiedad = '$turbiedad', conductividad = '$conductividad', ph_irca = '$ph_irca', antimonio = '$antimonio', arsenico = '$arsenico', bario = '$bario', cadmio = '$cadmio', cianuro_libre_disociable = '$cianuro_libre_disociable', cobre = '$cobre', cromo = '$cobre', mercurio = '$mercurio', niquel = '$niquel', plomo = '$plomo', selenio = '$plomo', trihalometanos = '$trihalometanos', hap = '$hap', cot = '$cot', nitritos = '$nitritos', nitratos = '$nitratos', fluoruros = '$fluoruros', calcio = '$calcio', alcalinidad = '$alcalinidad', cloruros = '$cloruros', aluminio = '$aluminio', dureza = '$dureza', hierro = '$hierro', magnesio = '$magnesio', manganeso = '$manganeso', molibdeno = '$molibdeno', sulfatos = '$sulfatos', zinc = '$zinc', fosfatos = '$fosfatos', cmt = '$cmt', plaguicidas = '$plaguicidas', escherichia_coli = '$escherichia_coli', coliformes = '$coliformes', microorganismos_mesofilicos = '$microorganismos_mesofilicos', giardia = '$giardia', cryptosporidium = '$cryptosporidium', detergente = '$detergente', coagulante_sales_hierro = '$coagulante_sales_hierro', coagulante_aluminio = '$coagulante_aluminio', calculo_irca = '$calculo_irca', estado_irca = '$estado_irca' where id_irca = '$id_fuente_hidrica'";

    $query3 = "UPDATE wintig.uso SET id_tipo_uso = '$id_tipo_uso' where id_uso = '$id_fuente_hidrica'";

    $query4 = "UPDATE wintig.accesibilidad SET id_tipo_acceso = '$id_tipo_acceso', num_dias_buscar_agua = '$num_dias_buscar_agua', num_viajes = '$num_viajes', cantidad_agua = '$cantidad_agua', tiempo_viaje = '$tiempo_viaje', distancia = 5, poblacion_acceso = '$poblacion_acceso' where id_accesibilidad = '$id_fuente_hidrica'";

    $query5 = "UPDATE wintig.fuente_hidrica SET id_tipo_fuente_hidrica = '$id_tipo_fuente_hidrica', id_rancheria = '$id_rancheria', nom_fh = '$nom_fh', latitud_fh = '$latitud_fh', longitud_fh = '$longitud_fh' where id_fuente_hidrica = '$id_fuente_hidrica'"; 

    $result = pg_query($query1); 
    $result = pg_query($query2); 
    $result = pg_query($query3); 
    $result = pg_query($query4);  
    $result = pg_query($query5);
    
}