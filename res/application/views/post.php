<?php
if (!isset($post)) {
	?>
	<p>This page was accessed incorrectly.</p>	
	<?php
} else {
	?>
	<h2><a href="<?= base_url() ?>posts/post/<?= $post['postID'] ?>"><?= $post['title'] ?></a></h2>
	<?= $post['post'] ?>
	<hr />
	<h2>Coments</h2>
	<?php foreach ($comments as $row) { ?>
		<p><strong><?= $row['username'] ?></strong>said at <?= date('m/d/Y H:i A', strtotime($row['date_added'])) ?><br /><?= $row['comment'] ?></p>
		<hr />
		<? } ?>
		<?} else { ?>
		<p>There are currently no comments.</p>
		<?} ?>
		<?php echo form_open(base_url() . 'comment/add_comment/' . $post['postID']); ?>
		<?php
		$data_form = array(
			'name' => 'comment'
		);
		echo form_textarea($data_form);
		?>
		<p><?php echo form_submit('' . 'Add Comment'); ?></p>
		<?php echo form_close(); ?>


		<?php
	}
}
?>