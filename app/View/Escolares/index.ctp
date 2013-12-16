<?php

$this->set("title_for_layout", "Estagiários escolares");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo estagiário escolar',array('controller' => 'Escolares', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Estagiarios Escolares<h1>
<table>
    <thead>
        <td><?=$this->Paginator->sort('nome','NOME');?></td> 
            <td><?=$this->Paginator->sort('turno','TURNO');?></td> 
            <td><b>AÇÃO</b></td>
    </thead>
    
<? foreach($escolares as $escolar){  ?>
        <tr>
               <td><?=$this->Html->link($escolar['Escolare']['nome'],array('controller' => 'Escolares', 'action' => 'view',$escolar['Escolare']['id'])); ?></td>
               <td><?= $escolar['Escolare']['turno'];?></td>
               <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Escolares', 'action' => 'edit',$escolar['Escolare']['id'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Escolares', 'action' => 'delete',$escolar['Escolare']['id']), null, "Deseja excluir este estagiario?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<?=$this->Paginator->prev('Ant | '),$this->Paginator->next('Prox       | '),$this->Paginator->numbers();?>
<br/>
<br/>
                         
