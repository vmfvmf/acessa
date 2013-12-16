<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Novo estagiário escolar',array('controller' => 'Escolares', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Editar estagiário escolar',array('controller' => 'Escolares', 'action' => 'edit',$escolar['Escolare']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>

<h1>Detalhes estagiario escolar</h1>

<h2><?=$escolar['Escolare']['nome']?></h2>

<b>Horário de entrada</b> <?=$escolar['Escolare']['horario_entrada'];?>

<br/>
<br/>

<h3>Escola</h3>
    <?=$this->Html->link($escolar['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$escolar['Escola']['id']));?>
<br/>
<br/>

