<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);
include_once '../base_dir.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new UsuarioDAO();
            return $dao->listar();

        case 'salvar':
            $usuario = new UsuarioVO();
            $usuario->setNmUsuario($_POST['nm_usuario']);
            $usuario->setNrCpf($_POST['nr_cpf']);
            $usuario->setDsEmail($_POST['ds_email']);
            $usuario->setDsLogin($_POST['ds_login']);
            $usuario->setPwSenha($_POST['pw_senha']);
            $usuario->setIdPerfil($_POST['id_perfil']);
            $usuario->setAoStatus($_POST['ao_status']);
            $usuario->setIdUsuarioinclusao(1);
            $usuario->setIdUsuarioalteracao(1);
            $usuario->setDtCadastro(date('Y-m-d H:i'));
            $usuario->setDtAlteracao(date('Y-m-d H:i'));

            $dao = new UsuarioDAO();
            $dao->cadastrar($usuario);
            break;

        case 'editar':

            $usuario = new UsuarioVO();
            $usuario->setIdUsuario($_GET['id_usuario']);
            $usuario->setNmUsuario($_POST['nm_usuario']);
            $usuario->setNrCpf($_POST['nr_cpf']);
            $usuario->setDsEmail($_POST['ds_email']);
            $usuario->setDsLogin($_POST['ds_login']);
            $usuario->setPwSenha($_POST['pw_senha']);
            $usuario->setDtAlteracao(date('Y-m-d H:i'));

            $dao = new UsuarioDAO();
            $dao->editar($usuario);
            break;


        case 'excluir':
            $id_usuario = $_GET['id_usuario'];
            $usuario = new UsuarioVO();
            $usuario->setIdUsuario($id_usuario);

            $dao = new UsuarioDAO();
            $dao->excluir($usuario);
            break;
    }
} catch (Exception $exception) {
    die('Erro');
}
