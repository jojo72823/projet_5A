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

        <title>Material Design Lite</title>

        <link rel="stylesheet" href="./mdl/material.min.css">
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

        <!-- Accent-colored raised button with ripple -->
        <!--        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Button
                </button>
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                    <i class="material-icons">add</i>
                </button>-->



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
                <div class="page-content"> 



                    <div class="mdl-grid">
                        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Paramètres du graphique</h2>
                            </div>
                            <div>
                                <table style="margin-right: auto;margin-left: auto;">
                                    <tr >
                                        <td>NB_MESSAGES_READ</td>
                                        <td><input id="tr_nb_messages_read" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>NB_MESSAGES_SENT</td>
                                        <td><input id="tr_nb_messages_send" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>NB_FILES_UPLOAD</td>
                                        <td><input id="tr_nb_files_upload" type="checkbox"></td>
                                    <tr>
                                    <tr>
                                        <td>NB_FILES_DOWNLOAD</td>
                                        <td><input id="tr_nb_files_download" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>NB_CONNECTION_USER</td>
                                        <td><input id="tr_nb_connection_users" type="checkbox"></td>
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
                                        <td>NB_MESSAGES_SENT_USER</td>
                                        <td><input id="tr_nb_messages_sent_users" type="checkbox"></td>
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
                                        <td>NB_MESSAGES_READ_USER</td>
                                        <td><input id="tr_nb_messages_read_users" type="checkbox"></td>
                                        <td> 
                                            <select name="nb_messages_read_users" style=width:100px>
                                                <?php
                                                require_once 'inc/accessBd.inc';
                                                list_user();
                                                ?>
                                            </select> 
                                        </td>
                                    </tr>
                                </table>

                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="MyButton">
                                    Calculer résultats
                                </a>

                            </div> 
                        </div>

                        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Graphique</h2>
                            </div>

                            <div class='wrapper'>
                                <div id='container'></div>
                            </div>

                        </div>
                    </div>



                </div>







                </body>
                </html>
