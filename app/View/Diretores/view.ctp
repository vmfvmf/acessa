<?php
$this->set("title_for_layout", "Detalhes");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
    <ul>
        <li><?=$this->Html->link('Novo Contato',array('controller' => 'Diretorecontatos', 'action' => 'add',$diretore['Diretore']['id'],$diretore['Diretore']['nome'])); ?></li>
        <li><?=$this->Html->link('Novo Diretor',array('controller' => 'Diretores', 'action' => 'add')); ?></li>
        <li><?=$this->Html->link('Editar Diretor',array('controller' => 'Diretores', 'action' => 'edit',$diretore['Diretore']['id'])); ?></li>
    </ul>
<?php $this->end(); ?>

<h1>Detalhes Diretor</h1>

<h2><?=$diretore['Diretore']['nome']?></h2>
<br/><b>CPF</b> <?=$diretore['Diretore']['cpf'];?>


<br/>
<br/>

<h3>Escola</h3>
    <?=$this->Html->link($diretore['Escola']['nome'],array('controller' => 'Escolas', 'action' => 'view',$diretore['Escola']['id']));?>
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
<? foreach($diretore['Diretorecontato'] as $contato){ ?>
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
                    <?=$this->Html->link('Editar',array('controller' => 'Diretorecontatos', 'action' => 'edit',$contato['id'],$diretore['Diretore']['nome'])); ?>
                  |  <?=$this->Html->link('Excluir',array('controller' => 'Diretorecontatos', 'action' => 'delete',$contato['id']), null, "Deseja excluir este contato?"); ?>
                 

               </td> 
        </tr>
<?  }  ?>
</table>
<br/>
<br/>

