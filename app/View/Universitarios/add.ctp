<?php
$this->set("title_for_layout", "Criando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<?php $this->end(); ?>
<h1>Novo Estagiario Universitario</h1>

<?php  
        echo    $this->Form->create('Universitario',array( 'action' => 'add')),
                       $this->Form->input('nome'),
                       $this->Form->input('cpf'),
                       $this->Form->input('horario_entrada'),
                       $this->Form->end('cadastrar');
?>