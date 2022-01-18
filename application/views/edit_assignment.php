 <div class="container">

   
 <h3 class="font-weight-bold"><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('assignment/update_assignment/'.$result['assignment_id']);?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('title');?></label> 
					<input type="text" required  name="assignment_title" value="<?php echo $result['assignment_title']; ?>"  class="form-control"   > 
			</div>
			 
		 
<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('description');?></label> 
					<textarea  name="assignment_description"  class="form-control"   ><?php echo $result['assignment_description']; ?> </textarea>
			</div>
			 <div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('due_date');?>  <?php echo $this->lang->line('date_format');?></label> 
					<input type="text" required  name="due_date" value="<?php echo $result['due_date']; ?>"  class="form-control"   > 
			</div>
			 <div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('file_upload');?></label> 
					<input type="file" required  name="userfile"    > 
			</div>
			<div class="form-group">	
			<label for="inputEmail"  ><?php echo $this->lang->line('category');?></label>  
				<select name="cid" class="form-control">
				<option value="0">--Select--</option>
				<?php foreach($categories as $cates){ ?>
				<option value="<?php echo $cates['cid']; ?>" <?php if($result['cid']==$cates['cid']){ echo "Selected";} ?>><?php echo $cates['category_name']; ?></option>
				<?php } ?>
				</select>	
			</div>
			<div class="form-group">	
			<label for="inputEmail"  ><?php echo $this->lang->line('group_name');?></label>  <br>
				
				<?php $gidz=explode(',',$result['gids']);
				
				foreach($groups as $group){ ?>
		<input type="checkbox"   name="gid[]"   value="<?php echo $group['gid']; ?>" <?php if(in_array($group['gid'],$gidz)){ echo "checked"; }?> > 	<?php echo $group['group_name']; ?>	 &nbsp; &nbsp; &nbsp;
				<?php } ?>
					
			</div>
		 

 
	<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>
