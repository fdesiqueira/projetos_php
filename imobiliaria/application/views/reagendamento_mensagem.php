<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="pt-br" http-equiv="Content-Language" />
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Mensagem encaminhada pelo DSW3 Imoveis</title>
    </head>
    <body>
        <h4>Reagendamento de Visita</h4>

        <p>Oi <?php $nome ?>,</p>
        <p>O Corretor reagendou a sua visita ao imóvel de código <?php $id_imovel ?>.</p>
        <p>A visita foi remarcada para o dia <?php echo dataMySQL_to_dataBr($data) ?> no horário de <?php echo $hora ?> hs.</p>
        <p>O email para contato com o <?php echo $nome ?> é <?php echo $email ?>.</p>    
        <?php
        if ($telefone) {
            echo "O telefone de contato é " . $telefone . ".";
        }
        ?>
        <p>Entre em contato com o <?php echo $nome ?> para confirmar a visita.</p>

        <table style="width: 100%">
            <tr>
                <td style="width: 145px">Nome</td>
                <td><?php echo $nome; ?></td>
            </tr>
            <tr>
                <td style="width: 145px">E-mail</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="width: 145px">Mensagem</td>
                <td><?php echo nl2br($mensagem); ?></td>
            </tr>
            <tr>
                <td style="width: 145px">Enviada em:</td>
                <td><?php echo date("d/m/Y H:i:s"); ?></td>
            </tr>
        </table>
    </body>
</html>