<h1>Editar Escola</h1>

<?php  
        echo    $this->Form->create('Escola',array( 'action' => 'edit')),
                       $this->Form->input('id',array('type'=>'hidden')),
                       $this->Form->input('nome'),
                       $this->Form->input('cie'),
                       $this->Form->input('cidade_id',array('options'=>$cidades)),
                       $this->Form->input('universitario_id',array('options'=>$universitarios)),
                       $this->Form->end('salvar');
?>