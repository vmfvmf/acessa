<h1>Novo registro diário</h1>

<?php  
        echo    $this->Form->create('Registrodiario',array( 'action' => 'add')),
                       $this->Form->input('escola_id',array('type' => 'select','options' => $escolas)), 
                       $this->Form->input('detalhes'),
                       $this->Form->end('cadastrar');
?>