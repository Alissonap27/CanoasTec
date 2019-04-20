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

        <table>
            <thead>
                <tr>
                    <th width="35%">Nome</th>
                    <th width="10%">CPF</th>
                    <th width="35%">Email</th>
                    <th width="8%">Status</th>
                    <th width="40%">Data de Cadastro</th>
                    <th width="40%">Editar</th>
                    <th width="40%">Excluir</th>
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
