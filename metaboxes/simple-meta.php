<div class="my_meta_control">
 
	<label>You'll Be Needing</label>
	<p>
		<?php $mb->the_field('be_needing'); ?>
		<div class="customEditor"><textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea></div>
		<span>Enter in a description</span>
	</p>

	<label>How We Made It</label>
 
	<p>
		<?php $mb->the_field('how_we_made_it'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
		<span>Enter in a description</span>
	</p>

</div>