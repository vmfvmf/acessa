<?php
$this->set("title_for_layout", "Editando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Estagiário Universitário',array('controller' => 'Universitario', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Editar Estagiario Escolar</h1>

<?php  
        echo     $this->Form->create('Universitario',array( 'action' => 'edit')),
                       $this->Form->input('id',array('type'=>'hidden')),
                       $this->Form->input('nome'),
                       $this->Form->input('cpf'),
                       $this->Form->input('horario_entrada'),
                       $this->Form->end('salvar');
?>