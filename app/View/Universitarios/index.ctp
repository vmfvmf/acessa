<?php
$this->set("title_for_layout", "Estagiarios Universitario");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Estagiário Universitário',array('controller' => 'Universitarios', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Estagiários Universitários<h1>


<table>
    <thead>
            <td><b><?=$this->Paginator->sort('nome','NOME');?></b></td> 
            <td><b>AÇÃO</b></td>
    </thead>
    
<? foreach($universitarios as $universitario){  ?>
        <tr>
               <td><?=$this->Html->link($universitario['Universitario']['nome'],array('controller' => 'Universitarios', 'action' => 'view',$universitario['Universitario']['id'])); ?></td>
               <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Universitarios', 'action' => 'edit',$universitario['Universitario']['id'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Universitarios', 'action' => 'delete',$universitario['Universitario']['id']), null, "Deseja excluir este estagiario?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<?=$this->Paginator->prev('Ant | '),$this->Paginator->next('Prox       | '),$this->Paginator->numbers();?>
<br/>
<br/>
