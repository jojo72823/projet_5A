var select_indicators = ["nb_messages_read", "nb_messages_sent", "nb_files_upload", "nb_files_download", "nb_connection_user", "nb_mess_sent_user", "nb_mess_read_user"];
var select_indicators_new = new Array();
var count = 0;
var data_print = new Array();
var legende_print = new Array();

var data = new Array();

var nb_messages_read;
var nb_messages_send;
var nb_files_upload;
var nb_files_download;
var nb_messages_sent_users;
var nb_connection_users;
var nb_messages_read_users;
var select_nb_connection_users;
var select_nb_messages_sent_users;
var select_nb_messages_read_users;

var id_select_nb_connection_users;
var id_select_nb_messages_sent_users;
var id_select_nb_messages_read_users;

var data_indicator = new Array();

$(document).ready(function () {

    $('#MyButton').click(function () {
        alert("get_select_indicators");

        //GET USERS_INDICATORS 
        select_nb_connection_users = $('select[name=nb_connection_users]').val();
        select_nb_messages_sent_users = $('select[name=nb_messages_sent_users]').val();
        select_nb_messages_read_users = $('select[name=nb_messages_read_users]').val();

       //GET SELECT_INDICATORS
        var checkbox = $(this).parent().children("table").children("tbody").children("tr").children("td").next("td").children("input");
        var selects = $(this).parent().children("table").children("tbody").children("tr").next("tr").next("tr").next("tr").next("tr").next("tr").children("td").next("td").next("td").next("td").children("select");
        for (var i = 0; i < selects.length; i++) {
            var id_selected = selects[i].val();

        }
        
        select_indicators_new.length = 0;
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                select_indicators_new.push("true");
            } else {
                select_indicators_new.push("false");
            }
        }
        pre_print_graph();
    });



});

function moteur_calcul_indicateur() {


    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_messages_read'},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_messages_read = objetJson;
            } else {
                alert("erreur nb_messages_read! ");
            }
        },
        cache: false
    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_messages_sent'},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_messages_send = objetJson;
            } else {
                alert("erreur nb_messages_sent! ");
            }
        },
        cache: false
    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_files_upload'},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_files_upload = objetJson;
            } else {
                alert("erreur nb_files_upload! ");
            }
        },
        cache: false
    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_files_download'},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_files_download = objetJson;
            } else {
                alert("erreur nb_files_download! ");
            }
        },
        cache: false
    });

    //get id of user
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'get_id_user', p_name_user: select_nb_connection_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                id_select_nb_connection_users = objetJson;
            } else {
                alert("erreur nb_files_download! ");
            }
        },
        cache: false
    });

    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'get_id_user', p_name_user: select_nb_messages_sent_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                id_select_nb_messages_sent_users = objetJson;
            } else {
                alert("erreur nb_files_download! ");
            }
        },
        cache: false
    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'get_id_user', p_name_user: select_nb_messages_read_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                id_select_nb_messages_read_users = objetJson;
            } else {
                alert("erreur nb_files_download! ");
            }
        },
        cache: false
    });
    
    alert("id_recupéré");

    //get indicator for user
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_connection_users', p_idUser: id_select_nb_connection_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_connection_users = objetJson;
            } else {
                alert("erreur nb_connection_users! ");
            }
        },
        cache: false
    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_messages_sent_users', p_idUser: id_select_nb_messages_sent_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_messages_sent_users = objetJson;
            } else {
                alert("erreur nb_messages_sent_users! ");
            }
        },
        cache: false

    });
    $.ajax({
        url: 'php/accessFonctions.php',
        data: {fonction: 'nb_messages_read_users', p_idUser: id_select_nb_messages_read_users},
        type: 'POST',
        dataType: 'json',
        success: function (objetJson) {
            if (objetJson != null) {
                nb_messages_read_users = objetJson;
            } else {
                alert("erreur nb_messages_read_users! ");
            }
        },
        cache: false
    });




}

function pre_print_graph() {

    moteur_calcul_indicateur();
    alert("wait ....moteur_calcul_indicateur");

    legende_print.length = 0;
    data_print.length = 0;
    data_indicator.length = 0;
    count = 0;
   
    data_indicator.push(nb_messages_read);
    data_indicator.push(nb_messages_send);
    data_indicator.push(nb_files_upload);
    data_indicator.push(nb_files_download);
    data_indicator.push(nb_connection_users);
    data_indicator.push(nb_messages_sent_users);
    data_indicator.push(nb_messages_read_users);

    for (var cpt = 0; cpt < select_indicators.length; cpt++) {

        if (select_indicators_new[cpt] == "true") {
            legende_print.push(select_indicators[cpt]);
            data_print.push(data_indicator[cpt]);
        }
    }
    print_graph();
}


function print_graph() {
    Highcharts.chart('container', {
        chart: {
            polar: true
        },
        title: {
            text: 'TP CMC'
        },
        pane: {
            startAngle: 0,
            endAngle: 360
        },
        xAxis: {
            tickInterval: 360 / legende_print.length,
            min: 0,
            max: 360,
            labels: {
                formatter: function () {
                    var value = legende_print[count];

                    count++;


                    return value;
                }
            }
        },
        yAxis: {
            min: 0

        },
        plotOptions: {
            series: {
                pointStart: 0,
                pointInterval: 360 / legende_print.length
            },
            column: {
                pointPadding: 0,
                groupPadding: 0
            }
        },
        series: [{
                type: 'area',
                name: 'Results',
                data: data_print
            }]
    });
}

