<h1>Sistema Acessa Escola</h1>

<?=$this->Html->link('Escolas',array('controller' => 'Escolas', 'action' => 'index')); ?>
<br/>
<?=$this->Html->link('Estagiários Escolas',array('controller' => 'Escolares', 'action' => 'index')); ?>
<br/>
<?=$this->Html->link('Estagiários Universitários',array('controller' => 'Universitarios', 'action' => 'index')); ?>
<br/>
<?=$this->Html->link('Registro Diário',array('controller' => 'Registrodiarios', 'action' => 'index')); ?>
<br/>
<?=$this->Html->link('Diretores',array('controller' => 'Diretores', 'action' => 'index')); ?>