<?php 
include_once 'Header.php';
include_once DIR_UTIL . 'funcoes.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';




$dao = new UsuarioDAO();
?>

<div class="conteudo">
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        <form class="form-inline" method="POST" action="#">
            <input class="form-control mr-sm-2" type="text" name="pesquisar" placeholder="PESQUISAR" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button><br><br><br>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="25%">Nome</th>
                    <th scope="col" width="15%">CPF</th>
                    <th scope="col" width="20%">Email</th>
                    <th scope="col" width="15%">Perfil</th>
                    <th scope="col" width="10%">Status</th>
                    <th scope="col" width="35%">Data de Cadastro</th>
                    <th scope="col" width="35%">Editar</th>
                    <th scope="col" width="35%">Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_POST['pesquisar'])){
                    $pesquisar = $_POST['pesquisar'];
                }else{
                    $pesquisar='';
                }
                if($dao->listar($pesquisar) != true)
                {?>
                    <tr>
                        <td><?= 'nenhum registro encontrado';?></td>
                    </tr>
                <?php 
                }else{
                    foreach ($dao->listar($pesquisar) as $usuario) {                        
                ?>
                        
                        <tr>
                            <td><?=$usuario->getNmUsuario()?></td>
                            <td><?=mask($usuario->getNrCpf(),'###.###.###-##'); ?></td>
                            <td><?=$usuario->getDsEmail()?></td>
                            <td><?=perfil($usuario->getIdPerfil())?></td>
                            <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                            <td><?=date('d/m/Y ', strtotime($usuario->getDtCadastro()));?></td>
                            <td><a class="btn btn-secondary" href="../visao/GuiCadastroUsuario.php?editar&id_usuario=<?=$usuario->getIdUsuario();?> "> Editar</a>  </td>
                            <td><a class="btn btn-secondary" href="../controle/ControleUsuario.php?op=excluir&id_usuario=<?=$usuario->getIdUsuario();?> "> Excluir</a></td> 
                        </tr>
                    <?php
                    } 
                }?> 
            </tbody>
        </table><br><br>
    </div>
</div>

<?php include_once 'Footer.php'; ?>
