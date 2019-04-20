<?php

	function mask($val, $mask){

		 $maskared = '';

		 $k = 0;

		for($i = 0; $i<=strlen($mask)-1; $i++){

			if($mask[$i] == '#'){

				if(isset($val[$k]))

				 	$maskared .= $val[$k++];

			}else{

				if(isset($mask[$i]))

				 	$maskared .= $mask[$i];

			}

		}

		return $maskared;

	}
     
                
    if (isset($_REQUEST['editar'])){
            $id_usuario = $_REQUEST['id_usuario'];
            $dao = new UsuarioDAO();
            foreach ($dao->getUsuarioById($id_usuario) as $usuario) {
            $nm_usuario = $usuario->getNmUsuario();
            $nr_cpf = $usuario->getNrCpf();
            $ds_email = $usuario->getDsEmail();
            $ds_login = $usuario->getDsLogin();
            $pw_senha = $usuario->getPwSenha();
            $id_perfil = $usuario->getIdPerfil();
            $ao_status = $usuario->getAoStatus();
      		}
                     
            $action = "op=editar&id_usuario=" . $id_usuario;
            }else{            
                    
    
            $nm_usuario ="";  $nr_cpf=""; $ds_email ="";
            $ds_login ="";  $pw_senha =""; $id_perfil=""; $ao_status="";
            $action = "op=salvar";

    }