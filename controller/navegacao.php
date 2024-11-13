<?php

switch ($_POST) {
        //Caso a variavel seja nula mostrar tela de login
    case empty($_POST):
        include_once '../view/login.php';
        break;

        //---Primeiro Acesso--//
    case isset($_POST["btnPrimeiroAcesso"]):
        include_once '../view/primeiroAcesso.php';
        break;

        //---Cadastrar--//
    case isset($_POST["btnCadastrar"]):
        require_once './UsuarioController.php';
        $uController = new UsuarioController();
        if ($uController->inserir(
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            $_POST["txtSenha"]
        )) {
            include_once '../view/cadastroRealizado.php';
        } else {
            include_once '../view/cadastroNaoRealizado.php';
        }
        break;


        //--Atualizar--//
    case isset($_POST["btnAtualizar"]):
        require_once '../Controller/UsuarioController.php';
        $uController = new UsuarioController();
        if ($uController->atualizar(
            $_POST["txtID"],
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            date("Y-m-d", strtotime($_POST["txtData"]))
        )) {
            include_once '../view/atualizacaoRealizada.php';
        } else {
            include_once '../view/operacaoNaoRealizada.php';
        }
        break;


    case isset($_POST["btnLogin"]):
        require_once '../Controller/UsuarioController.php';
        $uController = new UsuarioController();
        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
            include_once '../view/principal.php';
        } else {
            include_once '../view/cadastroNaoRealizado.php';
        }
        break;

        //--Adicionar Formacao-//
    case isset($_POST["btnAddFormacao"]):
        require_once '../controller/FormacaoAcadController.php';
        include_once '../model/Usuario.php';
        $fController = new FormacaoAcadController();
        if (
            $fController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioFA"])),
                date("Y-m-d", strtotime($_POST["txtFimFA"])),
                $_POST["txtDescFA"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
        ) {
            include_once '../view/cadastroRealizado.php';
        } else {
            include_once '../view/cadastroNaoRealizado.php';
        }
        break;

        //--Excluir Formacao-//
    case isset($_POST["btnExcluirFA"]):
        require_once '../controller/FormacaoAcadController.php';
        include_once '../model/Usuario.php';
        $fController = new FormacaoAcadController();
        if ($fController->remover($_POST["id"]) == true) {
            include_once '../view/informacaoExcluida.php';
        } else {
            include_once '../view/operacaoNaoRealizada.php';
        }
        break;




        //--Adicionar Experiencia-//
    case isset($_POST["btnAddEP"]):
        require_once '../controller/ExperienciaProfissionalController.php';
        include_once '../model/Usuario.php';
        $eController = new ExperienciaProfissionalController();
        if (
            $eController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioEP"])),
                date("Y-m-d", strtotime($_POST["txtFimEP"])),
                $_POST["txtEmpEP"],
                $_POST["txtDescEP"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
        ) {
            include_once '../view/cadastroRealizado.php';
        } else {
            include_once '../view/cadastroNaoRealizado.php';
        }
        break;

        //--Excluir Experiencia-//
    case isset($_POST["btnExcluirEP"]):
        require_once '../controller/ExperienciaProfissionalController.php';
        include_once '../model/Usuario.php';
        $eController = new ExperienciaProfissionalController();
        if ($eController->remover($_POST["id"]) == true) {
            include_once '../view/informacaoExcluida.php';
        } else {
            include_once '../view/operacaoNaoRealizada.php';
        }
        break;




    case isset($_POST["btnAddOF"]):
        require_once '../controller/OutrasFormacoesController.php';
        include_once '../model/Usuario.php';
        $fController = new OutrasFormacoesController();
        if (
            $fController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioOF"])),
                date("Y-m-d", strtotime($_POST["txtFimOF"])),
                $_POST["txtDescOF"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
        ) {
            include_once '../view/cadastroRealizado.php';
        } else {
            include_once '../view/cadastroNaoRealizado.php';
        }
        break;

        //--Excluir Outras Formacoes-//
    case isset($_POST["btnExcluirOF"]):
        require_once '../controller/OutrasFormacoesController.php';
        include_once '../model/Usuario.php';
        $fController = new OutrasFormacoesController();
        if ($fController->remover($_POST["id"]) == true) {
            include_once '../view/informacaoExcluida.php';
        } else {
            include_once '../view/operacaoNaoRealizada.php';
        }
        break;
}

if (isset($_POST["btnLoginADM"])) {
    require_once '../controller/administradorController.php';
    $aController = new AdministradorController();
    if ($aController->login($_POST['txtLoginADM'], $_POST['txtSenhaADM'])) {
        include_once '../view/ADMPrincipal.php';
    } else {
    }
}


if (isset($_POST["btnADM"])) {
    include_once '../view/ADMLogin.php';
}


if (isset($_POST["btnListarCadastrados"])) {
    include_once '../view/ADMListarCadastrados.php';
}


if (isset($_POST["btnVoltar"])) {
    include_once '../view/ADMPrincipal.php';
}


if (isset($_POST["btnVoltarListados"])) {
    include_once '../view/ADMListarCadastrados.php';
}


if (isset($_POST["btnVisualizar"])) {
    require_once '../model/Usuario.php';        
    $verUsuario = new Usuario();
    if ($verUsuario->verUsuario($_POST["userID"])) {
        include_once '../view/ADMVisualizarCadastro.php';
    } else {
    }
}

?>
