<h1>Nova escola</h1>

<?php  
        echo    $this->Form->create('Escola',array( 'action' => 'add')),
                       $this->Form->input('nome'),
                       $this->Form->input('cie'),
                       $this->Form->end('cadastrar');
?>