<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once DIR_UTIL . 'funcoes.php';

                
?>


<div class="container">
    <br><br><br>
    <form class="form-horizontal" id="cadUsuario" method="POST" action="../controle/ControleUsuario.php?<?php echo $action; ?>">
    
       
        <div class="form-row">
            <div class="form-group col-md-5">
                <label >Nome</label>
                <input class="form-control form-control-sm" type="text" name="nm_usuario" id="nm_usuario" value="<?= $nm_usuario ?>" required>
            </div>
            <div class="form-group col-md-5">
                <label >CPF</label>
                <input class="form-control form-control-sm" pattern="^((\d{3})(\d{3})(\d{3})(\d{2}))*$" type="text" name="nr_cpf" id="nr_cpf" value="<?= $nr_cpf ?>" required>
            </div>
        </div>    
        <div class="form-row">
            <div class="form-group col-md-5"> 
                <label>Login</label>
                <input class="form-control form-control-sm" type="text" name="ds_login" id="ds_login" value="<?= $ds_login ?>" required>
            </div>
            <div class="form-group col-md-5">
                <label>Senha</label>
                <input class="form-control form-control-sm" type="password" name="pw_senha" id="pw_senha" value="<?= $pw_senha ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Email</label>
                <input class="form-control form-control-sm" type="email" name="ds_email" id="ds_email" value="<?= $ds_email ?>" required>
            </div>
            <div class="form-group col-md-5">
                <label>Perfil</label>
                <select  class="form-control form-control-sm" name="id_perfil" id="id_perfil" value="<?= $id_perfil ?>" required>
                    <option value="1">Administrador</option>
                    <option value="2">Atendente</option>
                    <option value="3">Desenvolvedor</option>
                </select>
            </div>
        </div>    
        <div class="form-group form-check">
            <label>Ativo ?</label>
            <input type="checkbox" name="ao_status" id="ao_status" value="1">
        </div>
        <div class="botoes">
            <button type="submit" class="btn btn-secondary">Salvar</button>
            <a href="GuiUsuarios.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
        </div>
    </form>
</div>

<?php
include_once 'Footer.php';
?>
