<?php
$this->set("title_for_layout", "Editando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Estagiário Universitário',array('controller' => 'Universitario', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Editar Contato para <?=$nome;?></h1>

<?php  
    $ops = array('C' => 'Celular', 'T' => 'Telefone', 'E' => 'E-mail');
        echo     $this->Form->create('Universitariocontato',array( 'action' => 'edit')),
                       $this->Form->input('id',array('type'=>'hidden')),
                       $this->Form->input('universitario_id',array('type' => 'hidden')), 
                       $this->Form->input('contato'),
                       $this->Form->input('tipo', array('type' => 'select', 'options' => $ops)),
                       $this->Form->input('descricao'),
                       $this->Form->end('salvar');
?>