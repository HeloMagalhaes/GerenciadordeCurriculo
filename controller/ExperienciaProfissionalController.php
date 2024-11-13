<?php
if (!isset($_SESSION)) {
    session_start();
}
class ExperienciaProfissionalController
{

    public function inserir($inicio, $fim, $empresa ,$descricao, $idusuario)
    {
        require_once '../model/ExperienciaProfissional.php';
        $experiencia = new ExperienciaProfissional();
        $experiencia->setInicio($inicio);
        $experiencia->setFim($fim);
        $experiencia->setEmpresa($empresa);
        $experiencia->setDescricao($descricao);
        $experiencia->setIdUsuario($idusuario);
        $r = $experiencia->inserirBD();
        return $r;
    }

    public function remover($id)
    {
        require_once '../model/ExperienciaProfissional.php';
        $experiencia = new ExperienciaProfissional();
        $r = $experiencia->excluirBD($id);
        return $r;
    }


    public function gerarLista($idusuario)
    {
        require_once '../model/ExperienciaProfissional.php';
        $experiencia = new ExperienciaProfissional();
        return $results = $experiencia->listaExperiencias($idusuario);
    }
}


?>