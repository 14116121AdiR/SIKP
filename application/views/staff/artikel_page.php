	<div class = "left_content">
          <h3>Informasi Magang</h3>

    <table border="1">
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $u->judul ?></td>
			<td><?php echo $u->tanggal_publish ?></td>
		</tr>
	<?php } ?>
	</table>
	<br/>
	<?php 
	echo $this->pagination->create_links();
	?>
          
    </div>


	