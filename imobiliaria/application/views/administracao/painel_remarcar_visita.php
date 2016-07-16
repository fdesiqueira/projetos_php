<div class="container">
    <div class="painel">
        <?php
        $atributos = array('id' => 'form_contato');
        echo form_open(base_url('administracao/visitas/salvar_alteracao_visita'), $atributos);
        echo form_fieldset("Informações da Visita Visita");

        echo "<span class='validacoes'>" . validation_errors() . "</span>";

        echo form_hidden("id_visita", $visita[0]->id_visita);
        echo form_hidden("id_imovel", $visita[0]->id_imovel);

        echo "<div class='row'>";
        echo "<div class='form-group col-md-6'>";
        echo "<div class='form-group'>";
        echo form_label('Nome: ', 'nome');
        $data = array('name' => 'nome', 'id' => 'nome', 'value' => $visita[0]->nome, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group col-md-6'>";
        echo "<div class='form-group'>";
        echo form_label('E-mail: ', 'email');
        $data = array('name' => 'email', 'id' => 'email', 'value' => $visita[0]->email, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group col-md-4'>";
        echo "<div class='form-group'>";
        echo form_label('Telefone: ', 'telefone');
        $data = array('name' => 'telefone', 'id' => 'telefone', 'value' => $visita[0]->telefone, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group col-md-4'>";
        echo "<div class='form-group'>";
        echo form_label('Data da Visita: ', 'data');
        $data = array('type' => 'date', 'name' => 'data', 'id' => 'data', 'value' => $visita[0]->data, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group col-md-4'>";
        echo "<div class='form-group'>";
        echo form_label('Hora da Visita: ', 'hora');
        $data = array('type' => 'time', 'name' => 'hora', 'id' => 'hora', 'value' => $visita[0]->hora, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group col-md-6'>";
        echo "<div class='form-group'>";
        echo form_label('Mensagem: ', 'mensagem');
        $data = array('name' => 'mensagem', 'id' => 'mensagem', 'value' => $visita[0]->mensagem, 'disabled' => 'disabled', 'class' => 'form-control');
        echo form_textarea($data);
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo form_fieldset_close();

        echo form_fieldset("Remarcar Visita");
        echo "<div class='row'>";
        echo "<div class='form-group col-md-2'>";
        echo "<div class='form-group'>";
        echo form_label('Nova Data da Visita: ', 'nova_data');
        $data = array('type' => 'date', 'name' => 'nova_data', 'id' => 'nova_data', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group col-md-2'>";
        echo "<div class='form-group'>";
        echo form_label('Novo Horário da Visita: ', 'nova_hora');
        $data = array('type' => 'time', 'name' => 'nova_hora', 'id' => 'nova_hora', 'class' => 'form-control');
        echo form_input($data);
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</fieldset>";
        echo form_submit("btn_cadastro", "Remarcar Visita", "class='btn btn-primary'");
        echo form_fieldset_close();
        echo form_close();
        echo "</div>";
        ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#telefone').mask('(00)0000-0000', {reverse: true});
    });
</script>