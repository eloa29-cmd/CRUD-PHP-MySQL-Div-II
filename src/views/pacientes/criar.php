<?php 
require '../../../config/conexao.php';
require '../../../config/header.php';
$pdo = Conexao::conectar ();
$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$msg = '';
if ($_SERVER[ 'REQUEST_METHOD']=='POST') {
    //PACCPF  PACTEL  PACTPS  CODUSU
    // CPF, TELEFONE, PLANOSAUDE, USUARIO
    $cpf = strtoupper(filter_input(INPUT_POST, 'edtcpf'));
     $telefone = strtoupper(filter_input(INPUT_POST, 'edttelefone'));
      $planosaude = strtoupper(filter_input(INPUT_POST, 'edtplanosaude'));
       $usuario = strtoupper(filter_input(INPUT_POST, 'edtusuario'));
       $sql = "INSERT INTO  pacientes (PACCPF, PACTEL, PACTPS, CODUSU) VALUES (?,?,?,?)";
       $prp = $pdo->prepare($sql);
       if ($prp->execute ([ $cpf, $telefone, $planosaude, $usuario])) {
        $msg = '<span class = "text-sucess text-center"> Paciente cadastrado com sucesso!</span';
        }else{
            $msg = '<span class= "text-danger text-center"> Erro ao cadastrar paciente!</span>';
        }
       }

       
       ?>
<form action="" method="post">
<div class="mt-3">
    <div class="input-group mb-2">
        <label for="edtcpf">CPF:</label>
        <input type="text" name="edtcpf"
        id="edtcpf" class= "form-control">
    </div>
     <div class="input-group mb-2">
        <label for="edttelefone">TELEFONE:</label>
        <input type="text" name="edTtelefone"
        id="edttelefone" class= "form-control">
    </div>
     <div class="input-group mb-2">
        <label for="edtplanosaude">PLANOSAUDE:</label>
        <input type="text" name="edtplanosaude"
        id="edtplanosaude" class= "form-control">
    </div>
     <div class="input-group mb-2">
        <label for="edtusuario">USUARIO:</label>
        <input type="text" name="edtusuario"
        id="edtusuario" class= "form-control">
    </div>
    <button type="submit" class="btn btn-outline-dark">GRAVAR 🖨️</button>


    
</div>
</form>