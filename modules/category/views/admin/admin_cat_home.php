<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
<p><?php echo anchor($module."/admin/create", "Create new category");?>  <?php //echo anchor($module."/admin/export","Export");?></p>

<?php

if (count($categories)){
	echo "<table id='tablesorter1' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name').
            "</th><th>".$this->lang->line('kago_status')."</th><th>".$this->lang->line('kago_parentid').
            "</th><th>".$this->lang->line('kago_lang_id')."</th><th>".$this->lang->line('kago_table_id').
            "</th><th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($categories as $key => $list){

		echo "<tr ";
        ($list['lang_id']>0)? $class="dentme" : $class = '';
        echo "class = \"".$class. "\" valign='top'>\n";
		echo "<td>".$list['id']."</td>\n";
		echo "<td>";
        //.$list['name'].
        echo anchor($module.'/admin/edit/'.$list['id'],$list['name']);
        echo "</td>\n";
		
		echo "<td align='center'>";
		echo anchor("kaimonokago/admin/changeStatus/category/".$list['id'],$list['status'], array('class' => $list['status']));
		echo "</td>\n";
		
		// echo "<td align='center'>".$list['status']."</td>\n";
		
		echo "<td align='center'>".$list['parentid']."</td>\n";
        echo "<td align='center'>".$list['lang_id']."</td>\n";
        echo "<td align='center'>".$list['table_id']."</td>\n";
		echo "<td align='center'>";
		echo anchor($module.'/admin/edit/'.$list['id'],$this->lang->line('kago_edit'));

        if ($list['status']=='inactive'){
		echo " | ";
		echo anchor($module.'/admin/delete/'.$list['id'],$this->lang->line('kago_delete'), array('class' => 'delete_link',"onclick"=>"return confirmSubmit('".$list['name']."')"));
        }

        echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
echo "<pre>category";
print_r ($categories);
echo "</pre>";
?>