<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
<p><?php echo anchor("slideshow/admin/create", $this->lang->line('kago_add_newslide'));?>  <?php // echo anchor("slideshow/admin/export","Export");?></p>

<?php
// get the module name. We use this in the link. Then it will be used in kaimonokago controller to redirect to the module
$module=$this->uri->segment(1);

if (count($slideshow)){
	
	echo '<table id="tablesorter_product1" class="tablesorter" border="1" cellspacing="0" cellpadding="3" width="100%">';
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name')."</th><th>".$this->lang->line('kago_order').
            "</th><th>".$this->lang->line('kago_status')."</th><th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($slideshow as $key => $list){
		echo "<tr valign='top'>\n";
        //echo "<td align='center'>".form_checkbox('p_id[]',$list['id'],FALSE)."</td>";
		echo "<td align='center'>".$list['id']."</td>\n";
		echo "<td align='center'>";
        //.$list['name'].
        echo anchor('slideshow/admin/edit/'.$list['id'],$list['name']);
        echo "</td>\n";
        echo "<td align='center'>".$list['slide_order']."</td>\n";
		echo "<td align='center'>";
		echo anchor("kaimonokago/admin/changeStatus/$module/".$list['id'],$list['status'], array('class' => $list['status']));
		echo "</td>\n";
		echo "<td align='center'>";
		echo anchor('slideshow/admin/edit/'.$list['id'],$this->lang->line('kago_edit'));
        if ($list['status']=='inactive'){
		echo " | ";
		echo anchor("kaimonokago/admin/delete/$module/".$list['id'],$this->lang->line('kago_delete'),array("onclick"=>"return confirmSubmit('".$list['name']."')"));
        }
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody></table>";
	echo form_close();
}

echo "<pre>slideshow";
print_r ($slideshow);
echo "</pre>";

?>