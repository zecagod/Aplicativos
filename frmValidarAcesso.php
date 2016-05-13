<?php
session_start();
#include('conexaoSql.php');
$con = odbc_connect("DRIVER={SQL Server}; SERVER=201.20.54.186;DATABASE=dbsistema;", "zeca","@meuacesso@");
//Atribuição dos valores enviados pelo formulário de Login as variaveis
#$login=$_POST["nomeusu"];
#$senha=$_POST["senha"];


/* original
$login=$_POST["Username"];
$senha=$_POST["Password"];


$consulta = "SELECT top 1 a.idlogin, a.nome, a.senha, a.administrador, a.idcliente, a.ativo, b.nome as nomecliente FROM tblogin_cliente a inner join tbclientes b
              on a.idcliente=b.idcliente WHERE a.nome='$login' and a.senha='$senha' and a.ativo=1";

*/


$celular=$_POST["telefone"];
$senha=$_POST["senha"];

if (strlen($celular)==9) {
    $celular="11".$celular;

}

$consulta="select b.nome as nomefuncionario,
                  celular,
                  senha,
                  a.idfuncionario
           from TbFuncionario a join tbusuario_android b
           on a.idfuncionario = b.idfuncionario
           where celular='$celular' and senha='$senha'";

$resultMod = odbc_exec($con,$consulta) or die(mysql_error());
    if(odbc_num_rows($resultMod)>0):
       	while($rowMod = odbc_fetch_object($resultMod)):
            $idfuncionario=$rowMod->idfuncionario;

            $_SESSION['xidfuncionario'] = $idfuncionario;
            $_SESSION['xnomefuncionario'] = $rowMod->nome;
            $_SESSION['xcelular'] = $rowMod->celular;
            $_SESSION["logado"] = true;
            
            # grava o acesso
            
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i:s');
            
            /*
            $idclientelogin=$rowMod->idlogin;

            $sql1="insert into TbLoginWeb
        			 (
                	 IdLoginCliente,
        			 DataEntrada,
        			 IdCliente
        			 )
        			 Values
        			 (
                      $idclientelogin,
        			  '$date',
                      $idcliente)";

            $query = odbc_exec($con, $sql1);
            */
            header("Location: menu.php");

        #    header("Location: ../azt/index.html");
           # header("Location: pages/tables/frmPropaganda.php");
           # abrindo o programa para selecionar contadores header("Location: pages/tables/frmGravaContadores.php");
        endwhile;
    else:
        	$_SESSION["logado"] = false;

   	        header('location: index.php');
    endif;

#odbc_free_result($consulta);
odbc_close($con);
?>
