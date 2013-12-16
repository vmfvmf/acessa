<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Novo Estagiário Universitário',array('controller' => 'Universitarios', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Editar Estagiário Universitário',array('controller' => 'Universitarios', 'action' => 'edit',$universitario['Universitario']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>

<h1>Detalhes Estagiário Universitário</h1>

<h2><?=$universitario['Universitario']['nome']?></h2>

<b>Horário de entrada</b> <?=$universitario['Universitario']['horario_entrada'];?>

<br/>
<br/>

<h3>Responsável pelas escolas</h3>
<ul>
    <? foreach($universitario['Escola'] as $escola){ ?>
        <li><?=$this->Html->link($escola['nome'],array('controller' => 'Escolas', 'action' => 'view',$escola['id']));?></li>
    <? } ?>    
</ul>
<br/>
<br/>

