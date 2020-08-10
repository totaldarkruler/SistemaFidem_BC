

function printPage() {
    var actual = document.body.innerHTML;
    if (document.all) {
        document.all.panelImprimir.style.visibility = 'hidden';
        //document.all.style.border = 'none';

        window.print();
    }
    else {
        document.getElementById('panelImprimir').style.visibility = 'hidden';
        //document.all.style.border = 'none';
        //var newstr = document.getElementById("hoja1").innerHTML;
        //document.body.innerHTML = newstr;
        window.print();

    }

    document.body.innerHTML = actual;
}


function nt(gg)
{

    aa=gg.split(",");
    bb=new Array()
    ax=0;
    while (aa[ax])
    {
        a=aa[ax];

        x=a.length;
        l="";
        //-------------- unidades -----------------
        if(a.length>0)
        {	
            u=a.substr(x-1,1);
            //alert("u="+u)
            switch (u)
            {
                case "0": l="cero";
                    break;
                case "1": if (ax==0){l="uno";}else{l="una";}
                    break;
                case "2": l="dos";
                    break;
                case "3": l="tres";
                    break;
                case "4": l="cuatro";
                    break;
                case "5": l="cinco";
                    break;
                case "6": l="seis";
                    break;
                case "7": l="siete";
                    break;
                case "8": l="ocho";
                    break;
                case "9": l="nueve";
                    break;
            }
        }		

        //--------------------- decenas -----------------
        if(a.length>1)
        {
            x--;
            d=a.substr(x-1,1);
            //alert("d="+d)
            switch (d)
            {
                case "1": 
                    switch (u)
                    {
                        case "0": l="diez";
                            break;
                        case "1": l="once";
                            break;
                        case "2": l="doce";
                            break;
                        case "3": l="trece";
                            break;
                        case "4": l="catorce";
                            break;
                        case "5": l="quince";
                            break;
                        default: l="dieci"+l;
                    }
                    break;
                case "2": 
                    switch (u)
                    {
                        case "0": l="veinte";
                            break;
                        default: l="veinti"+l;
                    }
                    break;
                case "3": 
                    switch (u)
                    {
                        case "0": l="treinta";
                            break;
                        default: l="treinta y "+l;
                    }
                    break;
                case "4": 
                    switch (u)
                    {
                        case "0": l="cuarenta";
                            break;
                        default: l="cuarenta y "+l;
                    }
                    break;
                case "5": 
                    switch (u)
                    {
                        case "0": l="cincuenta";
                            break;
                        default: l="cincuenta y "+l;
                    }
                    break;
                case "6": 
                    switch (u)
                    {
                        case "0": l="sesenta";
                            break;
                        default: l="sesenta y "+l;
                    }
                    break;
                case "7": 
                    switch (u)
                    {
                        case "0": l="setenta";
                            break;
                        default: l="setenta y "+l;
                    }
                    break;
                case "8": 
                    switch (u)
                    {
                        case "0": l="ochenta";
                            break;
                        default: l="ochenta y "+l;
                    }
                    break;
                case "9": 
                    switch (u)
                    {
                        case "0": l="noventa";
                            break;
                        default: l="noventa y "+l;
                    }
                    break;
            }
        }

        //------------------------------------------------ centenas -------------------------------------
        if(a.length>2)
        {
            x--;
            c=a.substr(x-1,1);
            //alert("c="+c)
            switch (c)
            {
                case "1": 
                    switch (l)
                    {
                        case "cero": l="cien";
                            break;
                        default: l="ciento "+l;
                    }
                    break;
                case "2": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="doscientos";}else{l="doscientas";}
                            break;
                        default: if (ax==0){l="doscientos "+l;}else{l="doscientas "+l;}
                    }
                    break;
                case "3": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="trescientos";}else{l="trescientas";}
                            break;
                        default: if (ax==0){l="trescientos "+l;}else{l="trescientas "+l;}
                    }
                    break;
                case "4": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="cuatrocientos";}else{l="cuatrocientas";}
                            break;
                        default: if (ax==0){l="cuatrocientos "+l;}else{l="cuatrocientas "+l;}
                    }
                    break;
                case "5": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="quinientos";}else{l="quinientas";}
                            break;
                        default: if (ax==0){l="quinientos "+l;}else{l="quinientas "+l;}
                    }
                    break;
                case "6": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="seiscientos";}else{l="seiscientas";}
                            break;
                        default: if (ax==0){l="seiscientos "+l;}else{l="seiscientas "+l;}
                    }
                    break;
                case "7": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="setecientos";}else{l="setecientas";}
                            break;
                        default: if (ax==0){l="setecientos "+l;}else{l="setecientas "+l}
                    }
                    break;
                case "8": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="ochocientos";}else{l="ochocientas";}
                            break;
                        default: if (ax==0){l="ochocientos "+l;}else{l="ochocientas "+l}
                    }
                    break;
                case "9": 
                    switch (l)
                    {
                        case "cero": if (ax==0){l="novecientos";}else{l="novecientas";}
                            break;
                        default: if (ax==0){l="novecientos "+l;}else{l="novecientas "+l;}
                    }
                    break;
            }
        }

        //----------------------------------- unidades de millar ----------------------------
        if(a.length>3)
        {
            x--;
            um=a.substr(x-1,1);
            //alert("um="+um)
            switch (um)
            {
                case "1": 
                    pcm="una mil";
                    switch (l)
                    {
                        case "cero": l="mil";
                            break;
                        default: l="mil "+l;
                    }
                    break;
                case "2": 
                    switch (l)
                    {
                        case "cero": l="dos mil";
                            break;
                        default: l="dos mil "+l;
                    }
                    break;
                case "3": 
                    switch (l)
                    {
                        case "cero": l="tres mil";
                            break;
                        default: l="tres mil "+l;
                    }
                    break;
                case "4": 
                    switch (l)
                    {
                        case "cero": l="cuatro mil";
                            break;
                        default: l="cuatro mil "+l;
                    }
                    break;
                case "5": 
                    switch (l)
                    {
                        case "cero": l="cinco mil";
                            break;
                        default: l="cinco mil "+l
                    }
                    break;
                case "6": 
                    switch (l)
                    {
                        case "cero": l="seis mil";
                            break;
                        default: l="seis mil "+l
                    }
                    break;
                case "7": 
                    switch (l)
                    {
                        case "cero": l="siete mil";
                            break;
                        default: l="siete mil "+l
                    }
                    break;
                case "8": 
                    switch (l)
                    {
                        case "cero": l="ocho mil";
                            break;
                        default: l="ocho mil "+l
                    }
                    break;
                case "9": 
                    switch (l)
                    {
                        case "cero": l="nueve mil";
                            break;
                        default: l="nueve mil "+l
                    }
                    break;
            }
        }
        //******************************* decenas de millar ----------------------------------------------------
        if(a.length>4)
        {
            x--;
            dm=a.substr(x-1,1);
            if (l=="cero"){l="";}	
            //alert("d="+d)
            switch (dm)
            {
                case "1":
                    switch (um)
                    {
                        case "0": l="diez mil "+l;
                            break;
                        case "1": l=l.replace("mil","once mil");
                            break;
                        case "2": l=l.replace("dos mil","doce mil");
                            break;
                        case "3": l=l.replace("tres mil","trece mil");
                            break;
                        case "4": l=l.replace("cuatro mil","catorce mil");
                            break;
                        case "5": l=l.replace("cinco mil","quince mil");
                            break;
                        default: l="dieci"+l;
                    }
                    break;
                case "2": 
                    switch (um)
                    {
                        case "0": l="veinte mil "+l;
                            break;
                        case "1": if (ax==0){l="veintiun "+l;}else{l="veintiuna "+l;}
                            break;
                        default: l="veinti"+l;
                    }
                    break;
                case "3": 
                    switch (um)
                    {
                        case "0": l="treinta mil "+l;
                            break;
                        case "1": if (ax==0){l="treinta y un "+l;}else{l="treinta y una "+l;}
                            break;
                        default: l="treinta y "+l;
                    }
                    break;
                case "4": 
                    switch (um)
                    {
                        case "0": l="cuarenta mil "+l;
                            break;
                        case "1": if (ax==0){l="cuarenta y un "+l;}else{l="cuarenta y una "+l;}
                            break;
                        default: l="cuarenta y "+l;
                    }
                    break;
                case "5": 
                    switch (um)
                    {
                        case "0": l="cincuenta mil "+l;
                            break;
                        case "1": if (ax==0){l="cincuenta y un "+l;}else{l="cincuenta y una "+l;}
                            break;
                        default: l="cincuenta y "+l;
                    }
                    break;
                case "6": 
                    switch (um)
                    {
                        case "0": l="sesenta mil "+l;
                            break;
                        case "1": if (ax==0){l="sesenta y un "+l;}else{l="sesenta y una "+l;}
                            break;
                        default: l="sesenta y "+l;
                    }
                    break;
                case "7": 
                    switch (um)
                    {
                        case "0": l="setenta mil "+l;
                            break;
                        case "1": if (ax==0){l="setenta y un "+l;}else{l="setenta y una "+l}
                            break;
                        default: l="setenta y "+l;
                    }
                    break;
                case "8": 
                    switch (um)
                    {
                        case "0": l="ochenta mil "+l;
                            break;
                        case "1": if (ax==0){l="ochenta y un "+l;}else{l="ochenta y una "+l;}
                            break;
                        default: l="ochenta y "+l;
                    }
                    break;
                case "9": 
                    switch (um)
                    {
                        case "0": l="noventa mil "+l;
                            break;
                        case "1": if (ax==0){l="noventa y un "+l;}else{l="noventa y una "+l;}
                            break;
                        default: l="noventa y "+l;
                    }
                    break;
            }
        }
        //------------------------------------- centenas de millar --------------------------------------------
        if(a.length>5)
        {
            x--;
            cm=a.substr(x-1,1);
            //alert("cm="+dm+um)
            switch (cm)
            {
                case "1": 
                    switch (""+dm+um)
                    {
                        case "00": l="cien mil "+l;
                            break;
                        case "01": if (ax==0){l="ciento un "+l;}else{l="ciento una "+l;}
                            break;
                        default: l="ciento "+l;
                    }
                    break;
                case "2": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="doscientos mil "+l;}else{l="doscientas mil "+l;}
                            break;
                        default: if (ax==0){l="doscientos "+l;}else{l="doscientas "+l;}
                    }
                    break;
                case "3": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="trescientos mil "+l;}else{l="trescientas mil "+l;}
                            break;
                        default: if (ax==0){l="trescientos "+l;}else{l="trescientas "+l;}
                    }
                    break;
                case "4": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="cuatrocientos mil "+l;}else{l="cuatrocientas mil "+l;}
                            break;
                        default: if (ax==0){l="cuatrocientos "+l;}else {l="cuatrocientas "+l;}
                    }
                    break;
                case "5": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="quinientos mil "+l;}else{l="quinientas mil "+l;}
                            break;
                        default: if (ax==0){l="quinientos "+l;}else{l="quinientas "+l;}
                    }
                    break;
                case "6": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="seiscientos mil "+l;}else{l="seiscientas mil "+l;}
                            break;
                        default: if (ax==0){l="seiscientos "+l;}else{l="seiscientas "+l;}
                    }
                    break;
                case "7": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="setecientos mil "+l;}else{l="setecientas mil "+l;}
                            break;
                        default: if (ax==0){l="setecientos "+l;}else{l="setecientas "+l;}
                    }
                    break;
                case "8": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="ochocientos mil "+l;}else{l="ochocientas mil "+l;}
                            break;
                        default: if (ax==0){l="ochocientos "+l;}else{l="ochocientas "+l;}
                    }
                    break;
                case "9": 
                    switch (""+dm+um)
                    {
                        case "00": if (ax==0){l="novecientos mil "+l;}else{l="novecientas mil "+l;}
                            break;
                        default: if (ax==0){l="novecientos "+l;}else{l="novecientas "+l;}
                    }
                    break;
            }
        }
        //-------------------------------------------- unidades de millon -------------------------
        if(a.length>6)
        {
            x--;	
            ul=a.substr(x-1,1);
            //alert("ul="+ul)
            switch (ul)
            {
                case "1": l="un millon "+l;
                    break;
                case "2": l="dos millones "+l;
                    break;
                case "3": l="tres millones "+l;
                    break;
                case "4": l="cuatro millones "+l;
                    break;
                case "5": l="cinco millones "+l;
                    break;
                case "6": l="seis millones "+l;
                    break;
                case "7": l="siete millones "+l;
                    break;
                case "8": l="ocho millones "+l;
                    break;
                case "9": l="nueve millones "+l;
                    break;
            }
        }
        //--------------------- decenas de millon-----------------
        if(a.length>7)
        {
            x--;
            dl=a.substr(x-1,1);
            //alert("dl="+dl)
            switch (dl)
            {
                case "1": 
                    switch (ul)
                    {
                        case "0": l="diez millones "+l;
                            break;
                        case "1": l=l.replace("un mill&oacute;n ","once millones ");
                            break;
                        case "2": l=l.replace("dos millones ","doce millones ");
                            break;
                        case "3": l=l.replace("tres millones ","trece millones ");
                            break;
                        case "4": l=l.replace("cuatro millones ","catorce millones ");
                            break;
                        case "5": l=l.replace("cinco millones ","quince millones ");
                            break;
                        default: l="dieci"+l;
                    }
                    break;
                case "2": 
                    switch (ul)
                    {
                        case "0": l="veinte millones "+l;
                            break;
                        default: l="veinti"+l;
                    }
                    break;
                case "3": 
                    switch (ul)
                    {
                        case "0": l="treinta millones "+l;
                            break;
                        default: l="treinta y "+l;
                    }
                    break;
                case "4": 
                    switch (ul)
                    {
                        case "0": l="cuarenta millones "+l;
                            break;
                        default: l="cuarenta y "+l;
                    }
                    break;
                case "5": 
                    switch (ul)
                    {
                        case "0": l="cincuenta millones "+l;
                            break;
                        default: l="cincuenta y "+l;
                    }
                    break;
                case "6": 
                    switch (ul)
                    {
                        case "0": l="sesenta millones "+l;
                            break;
                        default: l="sesenta y "+l;
                    }
                    break;
                case "7": 
                    switch (ul)
                    {
                        case "0": l="setenta millones "+l;
                            break;
                        default: l="setenta y "+l;
                    }
                    break;
                case "8": 
                    switch (ul)
                    {
                        case "0": l="ochenta millones "+l;
                            break;
                        default: l="ochenta y "+l;
                    }
                    break;
                case "9": 
                    switch (ul)
                    {
                        case "0": l="noventa millones "+l;
                            break;
                        default: l="noventa y "+l;
                    }
                    break;
            }
        }	
        //------------------------------------- centenas de millon --------------------------------------------
        if(a.length>8)
        {
            x--;
            cl=a.substr(x-1,1);
            //alert("cm="+dm+um)
            switch (cl)
            {
                case "1": 
                    switch (""+dl+ul)
                    {
                        case "00": l="cien millones "+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","ciento un millones ");
                            break;
                        default: l="ciento "+l;
                    }
                    break;
                case "2": 
                    switch (""+dl+ul)
                    {
                        case "00": l="doscientos millones "+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","doscientos un millones ");
                            break;
                        default: l="doscientos "+l;
                    }
                    break;
                case "3": 
                    switch (""+dl+ul)
                    {
                        case "00": l="trescientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","trescientos un millones ");
                            break;
                        default: l="trescientos "+l;
                    }
                    break;
                case "4": 
                    switch (""+dl+ul)
                    {
                        case "00": l="cuatrocientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","cuatrocientos un millones ");
                            break;
                        default: l="cuatrocientos "+l;
                    }
                    break;
                case "5": 
                    switch (""+dl+ul)
                    {
                        case "00": l="quinientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","quinientos un millones ");
                            break;
                        default: l="quinientos "+l;
                    }
                    break;
                case "6": 
                    switch (""+dl+ul)
                    {
                        case "00": l="seiscientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","seiscientos un millones ");
                            break;
                        default: l="seiscientos "+l;
                    }
                    break;
                case "7": 
                    switch (""+dl+ul)
                    {
                        case "00": l="setecientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","setecientos un millones ");
                            break;
                        default: l="setecientos "+l;
                    }
                    break;
                case "8": 
                    switch (""+dl+ul)
                    {
                        case "00": l="ochocientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","ochocientos un millones ");
                            break;
                        default: l="ochocientos "+l;
                    }
                    break;
                case "9": 
                    switch (""+dl+ul)
                    {
                        case "00": l="novecientos millones"+l;
                            break;
                        case "01": l=l.replace("un mill&oacute;n ","novecientos un millones ");
                            break;
                        default: l="novecientos "+l;
                    }
                    break;
            }
        }
        //----------------------------------- unidades de millar de millon----------------------------
        if(a.length>9)
        {
            x--;
            um=a.substr(x-1,1);
            //alert("um="+um)
            switch (um)
            {
                case "1": 
                    pcm="una mil";
                    switch (l)
                    {
                        case "cero": l="mil";
                            break;
                        default: l="mil "+l;
                    }
                    break;
                case "2": 
                    switch (l)
                    {
                        case "cero": l="dos mil";
                            break;
                        default: l="dos mil "+l;
                    }
                    break;
                case "3": 
                    switch (l)
                    {
                        case "cero": l="tres mil";
                            break;
                        default: l="tres mil "+l;
                    }
                    break;
                case "4": 
                    switch (l)
                    {
                        case "cero": l="cuatro mil";
                            break;
                        default: l="cuatro mil "+l;
                    }
                    break;
                case "5": 
                    switch (l)
                    {
                        case "cero": l="cinco mil";
                            break;
                        default: l="cinco mil "+l
                    }
                    break;
                case "6": 
                    switch (l)
                    {
                        case "cero": l="seis mil";
                            break;
                        default: l="seis mil "+l
                    }
                    break;
                case "7": 
                    switch (l)
                    {
                        case "cero": l="siete mil";
                            break;
                        default: l="siete mil "+l
                    }
                    break;
                case "8": 
                    switch (l)
                    {
                        case "cero": l="ocho mil";
                            break;
                        default: l="ocho mil "+l
                    }
                    break;
                case "9": 
                    switch (l)
                    {
                        case "cero": l="nueve mil";
                            break;
                        default: l="nueve mil "+l
                    }
                    break;
            }
        }
        bb[ax]=l
        ax++;
    }
    var deci=new Array(""," d&eacute;cimas"," cent&eacute;simas"," mil&eacute;simas"," diezmil&eacute;simas"," cienmil&eacute;simas"," millon&eacute;simas"," diezmillon&eacute;simas"," cienmillon&eacute;simas"," milmillon&eacute;simas")
    ax=0;
    while(bb[ax])
    {
        if (ax==0){l=bb[0];}
        if(ax==1){if (bb[1]!='cero'){l+=" con "+bb[1]+deci[aa[1].length];}}
        ax++
    }
    return (l)
}
// mostrar formato de moneda
function format2(n, currency) {
    console.log("n: " + n);
    var strNum = parseFloat(n);
    console.log("strNum: " + strNum);
    if (!isNaN(strNum))
        return currency + " " + strNum.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    else
        if (strNum == "NaN")
            return "$ 0.00";
}

$(function() {
    $("[data-moneda]").formatCurrency();
    $('[data-moneda]').blur(function(){
        $('[data-moneda]').formatCurrency();
    });

    $(document.body).on('click', '.lnkEliminarDocumentoActual', function(e) {
        var iIndice = $(this).parent().parent().index();  //$(this).parent().index();

        $("#otros-documentos > div").eq(iIndice).remove();
        e.preventDefault();
    });

    $(document.body).on('click', '.lnkAgregarOtroDocumento', function(e) {
        $("#otros-documentos").append('' + 
                                      "<div class='grid_12'>" +
                                      "<div class='grid_7 alpha'>" +
                                      "<label class='grid_2 alpha omega'>Adjuntar Archivo:</label>" +
                                      "<input type='file' name='documento[]' class='grid_5 alpha omega' />" +
                                      "</div>" +
                                      "<div class='grid_2'>" +
                                      "<a href='#' class='lnkAgregarOtroDocumento'>Agregar otro</a>" +                           
                                      "</div>" +
                                      "<div class='grid_3 omega'>" +                           
                                      "<a href='#' class='lnkEliminarDocumentoActual'>Eliminar este archivo</a>" + 
                                      "</div>" +
                                      "</div>");

        e.preventDefault();
    });

    //$('.moneda').mask('###0.00', {reverse: true});

    /*
    $(document.body).on('change', '.moneda', function(e) {
        console.log("1");
        // separar por punto
        var str = $(this).val();
        str = str.replace(',','');
        var res = str.split(".");
        var dValorEntero = nt(res[0]);

        if (res[1] != null)
            var dValorDecimal = nt(res[1]);
        else
            dValorDecimal = "cero";

        console.log("2");
        console.log("valor entero: " + dValorEntero + " valor decimal: " + dValorDecimal);
        //var sMonedaALetra = nt($(this).val());

        $(".moneda-letra").val(dValorEntero + " con " + dValorDecimal + " centavos");
    });

    */

    $("#txtFechaInicio, #txtFechaFin").change(function(e) {
        var fecha_inicio = $("#txtFechaInicio").val();
        //fecha_inicio = fecha_inicio.split("-").reverse().join("/");

        var fecha_fin = $("#txtFechaFin").val();
        //fecha_fin = fecha_fin.split("-").reverse().join("/");

        var date1 = new Date(fecha_inicio);
        var date2 = new Date(fecha_fin);

        // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
        var date1_unixtime = parseInt(date1.getTime() / 1000);
        var date2_unixtime = parseInt(date2.getTime() / 1000);

        // This is the calculated difference in seconds
        var timeDifference = date2_unixtime - date1_unixtime;

        // in Hours
        var timeDifferenceInHours = timeDifference / 60 / 60;

        // and finaly, in days :)
        var timeDifferenceInDays = timeDifferenceInHours  / 24;
        $("#txtPeriodoDias").val(timeDifferenceInDays + " dias");
    });
    
    
    $("#frmEvaluacionAgregarEvaluador").submit(function(e){
        var iIndice = $("#frmEvaluacionAgregarEvaluador select[name=evaluador_id] option:selected").index();
        
        if(iIndice == 0)
            e.preventDefault();
    });


    $("#mensaje-notificador, #mensaje-error").css('opacity', '0');
    $("#mensaje-notificador, #mensaje-error").css('right', '0');

    $("#mensaje-notificador, #mensaje-error").animate({
        'right' : '20px',
        'opacity' : '1'
    }, 500, function(){
        setInterval(function(){
            $("#mensaje-notificador, #mensaje-error").animate({
                'right': '0',
                'opacity': '0'
            }, 500, function(){
                $("#mensaje-notificador, #mensaje-error").hide();
            });
        }, 3000);
    });


    // mostra rsubmenu de menu al hacer clic 
    $("#panel-control > #panel > a.solicitudes-registro").click(function(e){
        $("#panel-control > #panel > div").hide();
        $(this).next("div").toggle(); 

        e.preventDefault();
    });

    $("nav#submenu-cedula-administrador a, nav#submenu-cedula a").click(function(e){
        var link = $(this);
        $('html, body').stop().animate({ scrollTop: $(link.attr('href')).offset().top}, 1000);
        e.preventDefault();
    });

    $("#lnkEnviarCedula").click(function(e){
        $("#transparencia").fadeIn(function(){
            $("#dialogo-enviar-cedula").fadeIn();
        });
        e.preventDefault();
    });

    $("#transparencia, .cerrar-dialogo, #lnkCancelarEnvioCedula").click(function(){
        $(".dialogo").fadeOut(function(){
            $("#transparencia").fadeOut();
        });
    });
    /*
    $("#lnkAcuseRecibo").click(function(e){
        $("#transparencia").fadeIn(function(){
            $("#dialogo-acuse-recibo").fadeIn();
        });
        e.preventDefault();
    });
*/
    $("#lnkImprimirCedulaAdministrador, #lnkAcuseRecibo").click(function(e){
        $("#forma-imprimir-cedula").submit();
        e.preventDefault();
    });

    $("#lnkGuardarCedula").click(function(e){
        //$("[data-moneda]").formatCurrency();
        $("#forma-cedula").submit();

        e.preventDefault();
    });

    $("#lnkNuevoCostoProyecto").click(function(e){
        $("#transparencia").fadeIn(function(){

            $.ajax({
                type: "POST",
                url: "/cedula/actualizarAJAX",
                data: $("#forma-cedula").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data);
                    //alert(data); // show response from the php script.
                }
            });

            $("#dialogo-nuevo-costo-proyecto").fadeIn();
        });


        e.preventDefault();
    });

    $("#lnkNuevoApoyo").click(function(e){
        $("#transparencia").fadeIn(function(){

            $.ajax({
                type: "POST",
                url: "/cedula/actualizarAJAX",
                data: $("#forma-cedula").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data);
                    //alert(data); // show response from the php script.
                }
            });

            $("#dialogo-nuevo-apoyo").fadeIn();

        });

        e.preventDefault();
    });

    $("#lnkNuevoEntregable").click(function(e){
        $("#transparencia").fadeIn(function(){

            $.ajax({
                type: "POST",
                url: "/cedula/actualizarAJAX",
                data: $("#forma-cedula").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data);
                    //alert(data); // show response from the php script.
                }
            });

            $("#dialogo-nuevo-entregable").fadeIn();
        });

        e.preventDefault();
    });
    
     $("#lnkNuevoEntregable2").click(function(e){
        $("#transparencia").fadeIn(function(){
/*
            $.ajax({
                type: "POST",
                url: "/cedula/actualizarAJAX",
                data: $("#forma-cedula").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data);
                    //alert(data); // show response from the php script.
                }
            });
*/
            $("#dialogo-nuevo-entregable2").fadeIn();
        });

        e.preventDefault();
    });

    $("#lnkGuardarCedulaAdministrador").click(function(e){
        $("#forma-cedula-administrador").submit();

        e.preventDefault();
    });

    $("#lnkAgregarActividad").click(function(e){           
        $("#transparencia").fadeIn(function(){

            $.ajax({
                type: "POST",
                url: "/cedula/actualizarAJAX",
                data: $("#forma-cedula").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data);
                    //alert(data); // show response from the php script.
                }
            });

            $("#dialogo-nueva-actividad").fadeIn();
        });

        e.preventDefault();
    });

    // mostrar la direccion dependiendo de la institucion seleccionada
    // a traves de ajax para que no se pierdan los valores ya ingresados
    $("#id-institucion").change(function(e){
        e.preventDefault();
        var institucion_id = $(this).val();

        $.ajax({
            url: '/institucion/obtenerDireccionPorInstitucion',
            data: {'institucion_id': institucion_id}, // change this to send js object
            dataType: 'html',
            type: "post",
            success: function(data){
                $('#direccion-institucion').val(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });




    // validar los campos oblogatorios antes de ser enviados
    $('form').submit(function(e){
        // revisar informacion requerida

        campos = $(this).find('[data-requerido]');
        enviar = true;

        campos.removeClass('campo-faltante');
        for(i = 0; i < campos.size(); i++)
        {
            if (campos.eq(i).val() == "")
            {
                campos.eq(i).addClass('campo-faltante');
                enviar = false;
            }

            if (!enviar)
                e.preventDefault();

        }

        if (!enviar)
        {
            alert("Por favor ingresa la información marcada en rojo");
            e.preventDefault();   
        }


        campos = $(this).find('[data-numerico]');
        enviar = true;

        campos.removeClass('campo-faltante');
        for(i = 0; i < campos.size(); i++)
        {
            if (isNaN(campos.eq(i).val()) || campos.eq(i).val() == null || campos.eq(i).val() == "")
            {
                campos.eq(i).addClass('campo-faltante');
                enviar = false;
            }
        }

        if (!enviar)
            e.preventDefault();

        // validar que sea moneda
        campos = $(this).find('.moneda');
        enviar = true;

        campos.removeClass('campo-faltante');
        for(i = 0; i < campos.size(); i++)
        {

            if (isNaN(campos.eq(i).val()) || campos.eq(i).val() == null || campos.eq(i).val() == "")
            { 
                var regex  = /^\d+(?:\.\d{0-9,2})$/;
                var str = campos.eq(i).val();

                str = str.split("$").join("");
                str = str.split(",").join("");

                console.log("el valor de str: " + str);
                if(regex.test(str))
                {
                    console.log("entro con: " + str);
                    campos.eq(i).addClass('campo-faltante');
                    enviar = false;
                }

            }
        }

        if (!enviar)
        {
            alert("Por favor ingresa valores numericos. Por ejemplo: 458.59");
            e.preventDefault();
        }

        /*
        // revisar los inputs que sean de tipo file
        $('input[type="file"]').each(function() {
            var $this = $(this);

            if ($(this).hasClass('requerido'))
            {
                var ext = $this.val().split('.').pop().toLowerCase();
                if($.inArray(ext, ['pdf']) == -1) {
                    alert('Por favor revise que los archivos ingresados sean en formato PDF (.pdf)');
                    enviar = false;
                }
            }

            if (!enviar)
                e.preventDefault();

        });
*/
    }); 

    $('input[type="file"]').change(function(e){
        var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['pdf']) == -1) {
            alert('Por favor revise que los archivos ingresados sean en formato PDF (.pdf)');
            enviar = false;
            $(this).val('');
        }

        if (!enviar)
            e.preventDefault();

    });

    /***** MASKEDINPUT *******/

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: "yy-mm-dd",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: ''


        /*buttonImage: "ui-icon-calendar.png",
            buttonImageOnly: true,
            showOn: 'button'*/
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);

    $("[data-fecha]").datepicker();

    $('#chkEntendidoReglas').change(function() {
        if($(this).is(":checked")) {
            $("#btnEnviarFormularioTerminosReferencia").prop("disabled", false);
        }
        else
            $("#btnEnviarFormularioTerminosReferencia").prop("disabled", true);
    });


    $("select#tipo_estudio_id").change(function(){
        var iOpcionSeleccionada = $("#tipo_estudio_id > option:selected").val();

        if (iOpcionSeleccionada == 7)
        {
            $("#seccion-11-otros").val("").focus();
            $("#seccion-11-otros").prop("disabled", false);
        } 
        else
        {
            $("#seccion-11-otros").val("");
            $("#seccion-11-otros").prop("disabled", true);
        }

        if (iOpcionSeleccionada == 8)
        {
            var justificarOtroEstudio = $("#justificar_otro_estudio_oculto").val();
            if(justificarOtroEstudio!= null && justificarOtroEstudio!="")
                $("#seccion-11-justificacion").val(justificarOtroEstudio).focus();
            else
                $("#seccion-11-justificacion").val("").focus();
            
            $("#seccion-11-justificacion").prop("disabled", false);            
            $("#btnGuardarCedula").prop("disabled", false);
            $("#estudio-seleccionado").prop("disabled", true);
        }
        else
        {
            $("#seccion-11-justificacion").val("");
            $("#seccion-11-justificacion").prop("disabled", true);
            $("#btnGuardarCedula").prop("disabled", false);
            $("#estudio-seleccionado").prop("disabled", false);
        }


    });

    $("#forma-cedula").submit(function(e){
        var iOpcionSeleccionada = $("#tipo_estudio_id > option:selected").val();
        var ext = $("#estudio-seleccionado").val().split('.').pop().toLowerCase();
        if(ext == "" && iOpcionSeleccionada != 8) {
            alert('Por favor seleccione el archivo a adjuntar');
            e.preventDefault();
        }


    });
    
    
    /* evaluacion proyecto */
    $("#lnkGuardarEvaluacionProyecto").click(function(e){
        var iProyectoID = $("#frmEvaluacionProyecto input[name='proyecto_id']").val();
        var iEvaluadorID = $("#frmEvaluacionProyecto input[name='evaluador_id']").val();
        
        $("#frmEvaluacionProyecto input[type=hidden]").remove();
         $("#frmEvaluacionProyecto").append("<input type='hidden' name='proyecto_id' value='" + iProyectoID + "'>");
         $("#frmEvaluacionProyecto").append("<input type='hidden' name='evaluador_id' value='" + iEvaluadorID + "'>");
        $( ".contenido-pregunta input:checked" ).each(function(){
            $("#frmEvaluacionProyecto").append("<input type='hidden' name='respuesta_id[]' value='" + $(this).val() + "'>");
            console.log($(this).val() + ";");
        });
         $("#frmEvaluacionProyecto").append("<input type='hidden' name='observaciones' value='" + $("#txtObservaciones").val() + "'>");
        
        $("#frmEvaluacionProyecto").submit();
        e.preventDefault();
    });
    
      /* finalizar proyecto */
    $("#lnkFinalizarEvaluacionProyecto").click(function(e){
        if(confirm('Una vez finalizada la evaluación no se podrá realizar modificaciones. ¿Desea continuar?'))
            {
                 var iProyectoID = $("#frmEvaluacionProyecto input[name='proyecto_id']").val();
        var iEvaluadorID = $("#frmEvaluacionProyecto input[name='evaluador_id']").val();
       
        
        $("#frmFinalizarProyecto input[type=hidden]").remove();
         $("#frmFinalizarProyecto").append("<input type='hidden' name='proyecto_id' value='" + iProyectoID + "'>");
         $("#frmFinalizarProyecto").append("<input type='hidden' name='evaluador_id' value='" + iEvaluadorID + "'>");
        $( ".contenido-pregunta input:checked" ).each(function(){
            $("#frmFinalizarProyecto").append("<input type='hidden' name='respuesta_id[]' value='" + $(this).val() + "'>");
           
        });
        $("#frmFinalizarProyecto").append("<input type='hidden' name='observaciones' value='" + $("#txtObservaciones").val() + "'>");
        
        $("#frmFinalizarProyecto").submit();
            }
       
        e.preventDefault();
    });
    
    
      $("#frmEvaluadorCambiarContrasena").submit(function(e){
          var sContrasena = $("#txtContrasena").val();
          var sConfirmacionContrasena = $("#txtConfirmacionContrasena").val();
          
          if (sContrasena != sConfirmacionContrasena)
              {
                  alert("Por favor revise que la confirmacion de la contraseña sea igual");
                  
                  e.preventDefault();
              }
      });
    
     $(".lnkEvaluadorImprimirCedula").click(function(e){
         var proyecto_id = $(this).attr('data-rel');
         
         $("#forma-imprimir-cedula input[name=proyecto_id]").val(proyecto_id);
         $("#forma-imprimir-cedula").submit();
         
         e.preventDefault();
     });
    
    
    
});
	
	 
