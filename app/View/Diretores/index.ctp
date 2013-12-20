<?php

$this->set("title_for_layout", "Diretores");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Diretor',array('controller' => 'Diretores', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Diretores<h1>
<table>
    <thead>
        <td><?=$this->Paginator->sort('nome','NOME');?></td> 
            <td><?=$this->Paginator->sort('Escola.nome','Escola');?></td> 
            <td><b>AÇÃO</b></td>
    </thead>
    
<? foreach($diretores as $diretore){  ?>
        <tr>
               <td><?=$this->Html->link($diretore['Diretore']['nome'],array('controller' => 'Diretores', 'action' => 'view',$diretore['Diretore']['id'])); ?></td>
               <td><?=$this->Html->link($diretore['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$diretore['Escola']['id']));?></td>
               <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Diretores', 'action' => 'edit',$diretore['Diretore']['id'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Diretores', 'action' => 'delete',$diretore['Diretore']['id']), null, "Deseja excluir este diretos?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<?=$this->Paginator->prev('Ant | '),$this->Paginator->next('Prox       | '),$this->Paginator->numbers();?>
<br/>
<br/>
                         
