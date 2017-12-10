(function () {
    'use strict';
    var dialogButton = document.querySelector('.dialog-button');
    var dialog = document.querySelector('#dialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function () {
        dialog.showModal();
        dialog.open();
      // document.getElementById('dialog').style.visibility=(true)?'visible':'hidden';
    });
    dialog.querySelector('button:not([disabled])')
            .addEventListener('click', function () {
                dialog.close();
            });
   
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
    dialog.querySelector('#MyButton').addEventListener('click', function () {
        generate_graph();
        dialog.close();
    });
    dialog.querySelector('#MyButtongraphique_comparaison_nb_co').addEventListener('click', function () {
        dialog.close();
        graphique_comparaison_nb_co();
    });
    dialog.querySelector('#MyButtongraphique_comparaison_note').addEventListener('click', function () {
        dialog.close();
        graphique_comparaison_note();
    });

}());