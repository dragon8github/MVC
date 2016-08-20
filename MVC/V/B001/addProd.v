 
	<div class="easyui-panel" title="商品添加" style="width:100%;height:100%">
		<div style="padding:10px 60px 20px 160px">
	    <form id="ff" method="post" >
	    	<table cellpadding="5">
	    		<?php foreach ($tb as $v): ?>
	    		<tr>
	    			<td><?php echo genInputLabel($v["COLUMN_COMMENT"]); ?>:</td>
	    			<td>
	    				<?php echo genInput($v["DATA_TYPE"],$v["IS_NULLABLE"],$v["COLUMN_NAME"],$v["CHARACTER_MAXIMUM_LENGTH"],$v["COLUMN_COMMENT"]); ?>
    				</td>
	    		</tr>
	    		<?php endforeach ?>
	    	</table>
	    </form>
	    <div style="text-align:center;padding:5px">
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">保存</a>
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
	    </div>
	    </div>
	</div>
	<script>
		function submitForm(){
			$('#ff').form('submit',{
				success:function(result)
				{
					alert(result);
				}
			});
		}
		function clearForm(){
			$('#ff').form('clear');
		}
	</script>