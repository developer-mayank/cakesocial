<div class="sidebar-container">
	<?php 
	    echo $form->create('Post', array('action' => 'search', 'class' => 'search'));
	    echo $form->input('query', array('label' => 'Find a post by typing something', 'class' => 'search-query focus'));
	    echo $form->submit('Search');
	    echo $form->end();
	?>
	</div>
	
	<div class="sidebar-container">
		<?php echo $this->element('add_new_button') ?>
    </div>