<?php
$this->set("title_for_layout", "Escolas");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Nova Escola',array('controller' => 'Escolas', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Escolas<h1>


<table>
    <tr>
            <td><b><?=$this->Paginator->sort('nome','NOME');?></b></td> 
            <td><b><?=$this->Paginator->sort('cie','CIE');?></b></td> 
            <td><b><?=$this->Paginator->sort('cidade','CIDADE');?></b></td> 
            <td><b>AÇÃO</b></td>
    </tr>
    
<? foreach($escolas as $escola){  ?>
        <tr>
               <td><?=$this->Html->link($escola['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$escola['Escola']['id'])); ?></td>
               <td><?=$escola['Escola']['cie']; ?></td>
               <td><?=$escola['Cidade']['nome']; ?></td>
               <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Escolas', 'action' => 'edit',$escola['Escola']['id'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Escolas', 'action' => 'delete',$escola['Escola']['id']), null, "Deseja excluir essa escola?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<?=$this->Paginator->prev('Ant | '),$this->Paginator->next('Prox       | '),$this->Paginator->numbers();?>
<br/>
<br/>
