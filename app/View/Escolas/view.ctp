<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Novo Escola',array('controller' => 'Escolas', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Editar Escola',array('controller' => 'Escolas', 'action' => 'edit',$escola['Escola']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>
<h1>Detalhes Escola</h1>

<h2><?=$escola['Escola']['nome']?></h2>
<b>CIE </b> <?=$escola['Escola']['cie']?>
<br/><b>Cidade </b> <?=$escola['Cidade']['nome']?>
<br/>
<br/>

<h3>Estagiários Escolares</h3>
<ul>
        <? foreach($escola['Escolares'] as $estagiario){ ?>
            <li><?=$this->Html->link($estagiario['nome'],array('controller' => 'Escolares', 'action' => 'view',$estagiario['id']));?></li>
        <? } ?>
</ul>

<br/>
<h3>Estagiário Universitário Responsavel</h3>
<?=$this->Html->link($escola['Universitario']['nome'],
            array('controller' => 'Universitarios', 'action' => 'view',$escola['Universitario']['id']));?>
<br/>
