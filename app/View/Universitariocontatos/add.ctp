<?php
$this->set("title_for_layout", "Criando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<?php $this->end(); ?>
<h1>Novo Contato para <?=$nome;?></h1>

<?php  
     $ops = array('C' => 'Celular', 'T' => 'Telefone', 'E' => 'E-mail');
        echo    $this->Form->create('Universitariocontato',array( 'action' => 'add')),
                       $this->Form->input('universitario_id',array('type' => 'hidden','value' => $universitario_id)), 
                       $this->Form->input('contato'),
                       $this->Form->input('tipo', array('type' => 'select', 'options' => $ops)),
                       $this->Form->input('descricao'),
                       $this->Form->end('salvar');
?>