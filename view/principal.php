<?php

if (!isset($_SESSION)) {
    session_start();
}


include_once '../model/Usuario.php';
include_once '../controller/formacaoAcadController.php';
include_once '../controller/OutrasFormacoesController.php';
include_once '../controller/ExperienciaProfissionalController.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <meta httpequiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EnlatadosJuarez</title>
    <style>
        /* Definimos que a sidebar terá uma largura de 120px e cor a cord de fundo #222 */
        .w3-sidebar {
            width: 120px;
        }

        /*Define Fonte para todas as tags listadas abaixo*/
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }
    </style>
</head>

<body class="w3-light-grey">

<header class="w3-container w3-padding-32 w3-center " id="home">
        <h1>
            <img src="../Img/Enlatados.png" alt="Logo" class="w3-image" width="10%">
            </br>
        </h1>
        <a class="w3-text-cyan" href="http://www.freepik.com">Designed by brgfx / Freepik</a>
        <br>
        <h1 class="w3-text-cyan">SISTEMA DE CURRICULOS</h1>
    </header>

    <nav class="w3-sidebar w3-bar-block w3-center w3-blue w3-top">
        <a href="#home" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-textlight-grey">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="#dPessoais" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-greyw3-hover-textcyan w3-text-light-grey">
            <i class="fa-regular fa-address-book w3-xxlarge"></i>
            <p>Dados Pessoais</p>
        </a>
        <a href="#formacao" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-greyw3-hover-textcyan w3-text-light-grey">
            <i class="fa fa-mortar-board w3-xxlarge"></i>
            <p>Formação</p>
        </a>
    </nav>

    <div class="w3-padding-large" id="main">
    </div>

    <div class="w3-padding-128 w3-content w3-text-grey" id="dPessoais">
        <h2 class="w3-text-cyan">Dados Pessoais</h2>
        <form action="" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%;">
            <input class="w3-input w3-border w3-round-large" name="txtID" type="hidden" value="<?php echo unserialize($_SESSION['Usuario'])->getID(); ?>">
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-user"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtNome" type="text" placeholder="Nome Completo" value="<?php echo unserialize($_SESSION['Usuario'])->getNome(); ?>">
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtData" type="date"
                            placeholder=""
                            value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento(); ?>">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-drivers-license"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtCPF" type="text"
                            placeholder="CPF: 33333333333"
                            value="<?php echo unserialize($_SESSION['Usuario'])->getCPF(); ?>">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-envelope-o"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtEmail" type="text"
                            placeholder="Email"
                            value="<?php echo unserialize($_SESSION['Usuario'])->getEmail(); ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="w3-padding-128 w3-content w3-text-grey" id="formacao">
        <h2 class="w3-text-cyan">Formação Acadêmica</h2>
        <form action="" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-res">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioFA" type="date" placeholder="">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date"
                            placeholder="">
                    </div>
                </div>
                <div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescFA" type="text"
                                placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-center">
                            <button name="btnAddFormacao" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="w3-container">
            <table class="w3-table-all w3-centered" style="width:70%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <?php
                $fCon = new FormacaoAcadController();
                $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 10%;">' . $row->fim . '</td>';
                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                        echo '<td style="width: 5%;">
                        <form action="/controller/navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $row->idformacaoAcademica . '">
                        <button name="btnExcluirFA" class="w3-button w3-block w3-blue w3-cell w3-round-large">
                        <i class="fa fa-user-times"></i> </button></td>
                        </form>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>


    <div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional" style="margin-top:60px;">

        <h2 class="w3-text-cyan">Experiência Profissional</h2>
        <form action=" " method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width: 70%;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-res">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioEP" type="date" placeholder="">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimEP"
                            type="date" placeholder="">
                    </div>
                </div>
                <div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtEmpEP"
                                type="text" placeholder="Centro Paula Souza">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescEP"
                                type="text" placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Desenvolvimento de Páginas WEB">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-center">
                            <button name="btnAddEP" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="w3-container">
        <table class="w3-table-all w3-centered" style="width:70%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Empresa</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <?php
                $fCon = new ExperienciaProfissionalController();
                $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 10%;">' . $row->fim . '</td>';
                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                        echo '<td style="width: 65%;">' . $row->empresa . '</td>';
                        echo '<td style="width: 5%;">
                        <form action="../controller/navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $row->idexperienciaprofissional . '">
                        <button name="btnExcluirEP" class="w3-button w3-block w3-blue w3-cell w3-round-large">
                        <i class="fa fa-user-times"></i> </button></td>
                        </form>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>




    <div class="w3-padding-128 w3-content w3-text-grey" id="outras-formacoes" style="margin-top:60px;">
        <h2 class="w3-text-cyan">Outras Formações</h2>
        <form action="" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-res">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioOF" type="date" placeholder="">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimOF" type="date"
                            placeholder="">
                    </div>
                </div>
                <div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescOF" type="text"
                                placeholder="Descrição: Ex.: Técnico em Eletrônica - Centro Paula Souza">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-center">
                            <button name="btnAddOF" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="w3-container">
            <table class="w3-table-all w3-centered" style="width:70%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>
                </thead>

                <?php
                $fCon = new OutrasFormacoesController();
                $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 10%;">' . $row->fim . '</td>';
                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                        echo '<td style="width: 5%;">
<form action="/Controller/Navegacao.php" method="post">
<input type="hidden" name="id" value="' . $row->idOutrasFormacoes . '">
<button name="btnExcluirOF" class="w3-button w3-block w3-blue w3-cell w3-round-large">
<i class="fa fa-user-times"></i> </button></td>
</form>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>




</body>

</html>