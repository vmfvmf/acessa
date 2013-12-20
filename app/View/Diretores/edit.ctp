<?php
$this->set("title_for_layout", "Editando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Diretor',array('controller' => 'Diretores', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Editando Estagiário Escolar</h1>

<?php  
        $turnos = array('M' => 'M', 'T' => 'T', 'N' => 'N');
        echo     $this->Form->create('Diretore',array( 'action' => 'edit')),
                       $this->Form->input('id',array('type'=>'hidden')),
                       $this->Form->input('nome'),
                       $this->Form->input('cpf'),
                       $this->Form->input('escola_id',array('options'=>$escola)),
                       $this->Form->end('salvar');
?>