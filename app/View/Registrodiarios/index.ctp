<?php
$this->set("title_for_layout", "Registros");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Registro Diário',array('controller' => 'Registrodiarios', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Registros Diários<h1>


<table>
     <tr>
             <td><b><?=$this->Paginator->sort('created','CRIADO');?></b></td> 
             <td><b><?=$this->Paginator->sort('escola_id','ESCOLA');?></b></td> 
             <td><b>DETALHES</b></td> 
             <td><b>AÇÕES</b></td> 
     </tr>
<? foreach($registros as $registro){  ?>
        <tr>
               <td><?=$this->Time->format($registro['Registrodiario']['created'], '%d/%m/%Y - %H:%M'); ?></td>
               <td><?=$this->Html->link($registro['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$registro['Escola']['id']));?></td>
               <td><?=$this->Html->link($this->Text->truncate($registro['Registrodiario']['detalhes'],80),array('controller' => 'Registrodiarios', 'action' => 'view',$registro['Registrodiario']['id'])); ?></td>
               <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Registrodiarios', 'action' => 'edit',$registro['Registrodiario']['id'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Registrodiarios', 'action' => 'delete',$registro['Registrodiario']['id']), null, "Deseja excluir este registro?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<?=$this->Paginator->prev('Ant | '),$this->Paginator->next('Prox       | '),$this->Paginator->numbers();?>
<br/>
<br/>
<?
  echo    $this->Form->create('busca', array('action' => 'index')),
                $this->Form->input('palavra'),
                $this->Form->end('salvar');
  ?>