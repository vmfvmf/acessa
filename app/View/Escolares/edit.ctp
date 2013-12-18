<?php
$this->set("title_for_layout", "Editando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo estagiário escolar',array('controller' => 'Escolares', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Editando Estagiário Escolar</h1>

<?php  
        $turnos = array('M' => 'M', 'T' => 'T', 'N' => 'N');
        echo     $this->Form->create('Escolare',array( 'action' => 'edit')),
                       $this->Form->input('id',array('type'=>'hidden')),
                       $this->Form->input('nome'),
                       $this->Form->input('cpf'),
                       $this->Form->input('turno', array('type'=>'select','options'=>$turnos)),
                       $this->Form->input('horario_entrada'),
                       $this->Form->input('escola_id',array('options'=>$escola)),
                       $this->Form->end('salvar');
?>