<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Nova Escola',array('controller' => 'Escolas', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Novo Contato',array('controller' => 'Escolacontatos', 'action' => 'add',$escola['Escola']['id'],$escola['Escola']['nome'])); ?></li>
        <li><?=$this->Html->link('Novo Estagiário Escolar',array('controller' => 'Escolares', 'action' => 'add',$escola['Escola']['id'])); ?></li>
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
<h3>Contatos</h3>
<table>
    <thead>
            <td><b>CONTATO</b></td> 
            <td><b>TIPO</b></td> 
            <td><b>DESCRIÇÃO</b></td> 
            <td><b>AÇÃO</b></td>
    </thead>
<? foreach($escola['Escolacontato'] as $contato){ ?>
        <tr>
                   <td><?=$contato['contato'];?></td>
                   <td><? 
                         switch($contato['tipo']){
                                case 'C': $tipo =  'Celular';break;
                                case 'T': $tipo = 'Telefone';break;
                                case 'E': $tipo = 'Email'; break;
                         }
                         echo $tipo;
             ?></td>
                   <td><?=$contato['descricao'];?></td>
                   <td>
                    <?=$this->Html->link('Editar',array('controller' => 'Escolacontatos', 'action' => 'edit',$contato['id'],$escola['Escola']['nome'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Escolacontatos', 'action' => 'delete',$contato['id']), null, "Deseja excluir este contato?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<br/>

<h3>Estagiário Universitário Responsavel</h3>
<?=$this->Html->link($escola['Universitario']['nome'],
            array('controller' => 'Universitarios', 'action' => 'view',$escola['Universitario']['id']));?>
<br/>
<br/>

