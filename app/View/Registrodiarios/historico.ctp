<?php
$this->set("title_for_layout", "Registros");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<li><?=$this->Html->link('Novo Registro Diário',array('controller' => 'Registrodiarios', 'action' => 'add')); ?></li>
<?php $this->end(); ?>
<h1>Histórico de Registros Diários<h1>


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
<h3>Busca</h3>
<h4>/escola<h4>
        <?
    $base_url = array('controller' => 'Registrodiarios', 'action' => 'historico');
    echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
    // add a select input for each filter. It's a good idea to add a empty value and set
    // the default option to that.
    echo $this->Form->input("escola_id", array('label' => 'Escola', 'options' => $escolas, 'empty' => '-- Todas as escolas --', 'default' => ''));
    echo $this->Form->input("detalhes");
    echo $this->Form->input("criado");//, array( 'type' => 'date',// 'dateFormat' => 'DMY', 
                        //'minYear' => 2012, 'maxYear' => 2015, 'empty' => '-- Todas as datas --'));
              //  $this->Form->year('criado', date('Y') - 100, date('Y') - 13, array('empty' => "ANO")),
               // $this->Form->month('criado', array('empty' => "MES")),
               // $this->Form->day('criado', array('empty' => 'DIA')),
    // Add a basic search
    //echo $this->Form->input("search", array('label' => 'Search', 'placeholder' => "Search..."));
     echo$this->Form->submit("Buscar");
    // To reset all the filters we only need to redirect to the base_url
    //echo $this->Html->link("Reset",$base_url);
    echo $this->Form->end();
?>
        