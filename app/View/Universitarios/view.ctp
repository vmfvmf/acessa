<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Novo Contato',array('controller' => 'Universitariocontatos', 'action' => 'add',$universitario['Universitario']['id'],$universitario['Universitario']['nome'])); ?></li>
        <li><?=$this->Html->link('Novo Estagiário Universitário',array('controller' => 'Universitarios', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Editar Estagiário Universitário',array('controller' => 'Universitarios', 'action' => 'edit',$universitario['Universitario']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>

<h1>Detalhes Estagiário Universitário</h1>

<h2><?=$universitario['Universitario']['nome']?></h2>
<br/><b>CPF </b><?=$universitario['Universitario']['cpf'];?>

<br/><b>Horário de entrada</b> <?=$universitario['Universitario']['horario_entrada'];?>

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

<h3>Contatos</h3>
<table>
    <thead>
            <td><b>CONTATO</b></td> 
            <td><b>TIPO</b></td> 
            <td><b>DESCRIÇÃO</b></td> 
            <td><b>AÇÃO</b></td>
    </thead>
<? foreach($universitario['Universitariocontato'] as $contato){ ?>
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
                    <?=$this->Html->link('Editar',array('controller' => 'Universitariocontatos', 'action' => 'edit',$contato['id'],$universitario['Universitario']['nome'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Universitariocontatos', 'action' => 'delete',$contato['id']), null, "Deseja excluir este contato?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<br/>

