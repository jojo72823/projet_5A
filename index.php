<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>TRAVIS</title>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" />

        <link rel="stylesheet" href="css/monCss.css">
        <script src="./mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="code/highcharts.js"></script>
        <script src="code/highcharts-more.js"></script>
        <script type='text/javascript' src='js/main.js'></script>
        
        <?php
        require_once 'inc/accessBd.inc';
        ?>

    </head>
    <body>
        <!-- Uses a transparent header that draws on top of the layout's background -->
        <style>
            .demo-layout-transparent {
                /*background: url('../assets/demos/transparent.jpg') center / cover;*/
            }
            .demo-layout-transparent .mdl-layout__header,
            .demo-layout-transparent .mdl-layout__drawer-button {
                /* This background is dark, so we set text to white. Use 87% black instead if
                   your background is light. */
                color: white;
            }
        </style>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
             mdl-layout--fixed-header">
            <header class="mdl-layout__header" style="background: #3b5e98">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                         mdl-textfield--floating-label mdl-textfield--align-right">
                        <label class="mdl-button mdl-js-button mdl-button--icon"
                               for="fixed-header-drawer-exp">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" name="sample"
                                   id="fixed-header-drawer-exp">
                        </div>
                    </div>
                </div>
            </header>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer" >
                <div class="mdl-layout__drawer" style="background: #3b5e98;color: white">
                    <span class="mdl-layout-title">Travis</span>
                    <nav class="mdl-navigation" >
                        <a class="mdl-navigation__link" href="" style="color: white">DataViz</a>
                        <a class="mdl-navigation__link" href="" style="color: white">Time Machine</a>
                        <a class="mdl-navigation__link" href="" style="color: white">Préférences</a>
                    </nav>
                </div>

            </div>
            <main class="mdl-layout__content">
                <div id="page_content" class="page-content"> 
                    <div id="grid_graph" class="mdl-grid">


                    </div>
                </div>

                <button id="show-dialog" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect fab mdl-button--colored">
                    <i class="material-icons">add</i>
                </button>

            </main>


            <dialog class="mdl-dialog" style="width: 50%">
                <h4 class="mdl-dialog__title">Paramètres du graphique</h4>
                <div class="mdl-dialog__content">
                    <table id='table_param'>  
                        <tr ><td>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_messages_read"> <input id="tr_nb_messages_read" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de messages lus</span>
                        </label>
                        </td></tr>
                        <tr><td>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_messages_send"> <input id="tr_nb_messages_send" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de messages envoyés</span>
                        </label>
                        </td></tr>
                        <tr><td>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_files_upload"> <input id="tr_nb_files_upload" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de fichier envoyés</span>
                        </label>
                        </td><tr>
                        <tr><td>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_files_download"> <input id="tr_nb_files_download" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de fichier téléchargés</span>
                        </label>
                        </td></tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_connection_users"> <input id="tr_nb_connection_users" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de connexion de l'utilisateur</span>
                                </label>
                            </td>
                            <td> 
                                <select name="nb_connection_users" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_user();
                                    ?>
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_messages_sent_users"> <input id="tr_nb_messages_sent_users" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de message envoyés par l'utilisateur</span>
                                </label></td>
                            <td> 
                                <select name="nb_messages_sent_users" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_user();
                                    ?>
                                </select> 
                            </td>

                        </tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_messages_read_users"> <input id="tr_nb_messages_read_users" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de message lus par l'utilisateur</span>
                                </label></td>
                            <td> 
                                <select name="nb_messages_read_users" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_user();
                                    ?>
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_files_upload_users"> <input id="tr_nb_files_upload_users" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de fichiers uploadés par l'utilisateur</span>
                                </label></td>
                            <td> 
                                <select name="nb_files_upload_users" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_user();
                                    ?>
                                </select> 
                            </td>

                        </tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_files_download_users"> <input id="tr_nb_files_download_users" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre de fichiers downloadés par l'utilisateur</span>
                                </label></td>
                            <td> 
                                <select name="nb_files_download_users" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_user();
                                    ?>
                                </select> 
                            </td>

                        </tr>
                        <tr>
                            <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="tr_nb_display_forum"> <input id="tr_nb_display_forum" type="checkbox" class="mdl-checkbox__input"><span class="mdl-checkbox__label">Nombre d'affichage du forum</span>
                                </label></td>
                            <td> 
                                <select name="nb_display_forum" style=width:100px>
                                    <?php
                                    require_once 'inc/accessBd.inc';
                                    list_forum();
                                    ?>
                                </select> 
                            </td>

                        </tr>
                    </table>
                     <button class="mdl-button mdl-js-button mdl-button--raised" style="margin: 10px;" id="MyButton">
                        Générer le graphique avec les paramètres
                    </button>
        
                    
                    <h4>Graphiques prédéfinis</h4>
                    <button class="mdl-button mdl-js-button mdl-button--raised" style="margin: 10px;" id="MyButtongraphique_comparaison_nb_co">
                        Comparaison nombre de connexion
                    </button>
                    <button class="mdl-button mdl-js-button mdl-button--raised" style="margin: 10px;" id="MyButtongraphique_comparaison_note">
                        Comparaison des notes
                    </button>
                    


                </div>
                <div class="mdl-dialog__actions">
                  
                    <button type="button" class="mdl-button close">Fermer</button>
                </div>
            </dialog>
            <script>
                var dialog = document.querySelector('dialog');
                var showDialogButton = document.querySelector('#show-dialog');
                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                showDialogButton.addEventListener('click', function () {
                    dialog.showModal();
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
            </script>






    </body>
</html>
