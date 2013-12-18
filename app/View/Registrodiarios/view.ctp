<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Editar Registro',array('controller' => 'Registrodiarios', 'action' => 'edit',$registro['Registrodiario']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>
<h1>Registrado em [<?=$this->Time->format($registro['Registrodiario']['created'], '%d/%m/%Y - %H:%M'); ?>]</h1>

<br/>
<b>Escola </b><?=$this->Html->link($registro['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$registro['Escola']['id']));?>
<br/>
<br/>
<b>Detalhes</b>
<br/>
<br/>
<p><?=$registro['Registrodiario']['detalhes'];?></p>
<br/>


<br/>
<br/>
<br/>


