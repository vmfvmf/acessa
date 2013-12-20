<?php
$this->set("title_for_layout", "Criando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<?php $this->end(); ?>
<h1>Novo Diretor <? if($escola_id) echo "para escola ".$escola_nome;?></h1>

<?php  
        echo    $this->Form->create('Diretore',array( 'action' => 'add')),
                       $this->Form->input('nome'),
                       $this->Form->input('cpf'),
                       $this->Form->input('escola_id',array('options'=>$escola, 'selected' => $escola_id)),
                       $this->Form->end('cadastrar');
?>