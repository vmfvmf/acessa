<?php
$this->set("title_for_layout", "Criando...");  
$this->extend('/Common/view');
$this->start('sidebar');
?>
<?php $this->end(); ?>
<h1>Novo Estagiario Escolar</h1>

<?php  
        $turnos = array('M' => 'M', 'T' => 'T', 'N' => 'N');
        echo    $this->Form->create('Escolare',array( 'action' => 'add')),
                       $this->Form->input('nome'),
                       $this->Form->input('horario_entrada'),
                       $this->Form->input('turno', array('type'=>'select','options'=>$turnos)),
                       $this->Form->input('escola_id',array('options'=>$escola, 'selected' => $escola_id)),
                       $this->Form->end('cadastrar');
?>