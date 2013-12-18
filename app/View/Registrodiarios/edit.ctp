<h1>Editar Registro Diário</h1>

<?php  // NOT IMPLEMENTED
        echo    $this->Form->create('Registrodiario',array( 'action' => 'edit')),
                      $this->Form->input('escola_id',array('type' => 'select','options' => $escolas)), 
                       $this->Form->input('detalhes'),
                       $this->Form->input('id', array('type' => 'hidden')),
                       $this->Form->end('salvar');
?>