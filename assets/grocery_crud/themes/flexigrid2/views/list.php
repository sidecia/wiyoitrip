<?php 

	$column_width = (int)(80/count($columns));
	
	if(!empty($list)){
?>
		<table class="table table-bordered grocery-crud-table table-hover">
		<thead>
            <tr>
            	<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
                <th colspan="2">
                    <?php echo $this->l('list_actions'); ?> 
                </th>
                <?php }?>
				<?php foreach($columns as $column){?>
				<th class="column-with-ordering"  data-order-by="<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>">
						<?php echo $column->display_as?>					
				</th>
				<?php }?>				
			</tr>
            <tr class="filter-row gc-search-row">
        							<td style="border-right: none;">
                                            <div class="floatL t5">
            							         <input type="checkbox" class="select-all-none" />
            							     </div>
                                    </td>
        							<td style="border-left: none;">
                                        <div class="floatL">
                                            <a href="javascript:void(0);" title="Delete"
                                               class="hidden btn btn-default delete-selected-button">
                                                <i class="fa fa-trash-o text-danger"></i>
                                                <span class="text-danger">Delete</span>
                                            </a>
                                        </div>
                                        <div class="floatR">
                                            <a href="javascript:void(0);" class="btn btn-default gc-refresh">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </div>
                                        <div class="clear"></div>
                                    </td>      
                                    <?php foreach($columns as $column){?>                              											
                                            <td >
                                                <input type="text" class="form-control searchable-input floatL" placeholder="Search  <?php echo $column->field_name ?>" name="<?php echo $column->field_name != '' ? $column->display_as : '&nbsp;' ; ?>" />
                                               
                                            </td>
                                    <?php 
									}
								?>                                                                      
		</thead>		
		<tbody>
<?php foreach($list as $num_row => $row){ ?>        
		<tr>
                                        <td >                                        		
                                                <input type="checkbox" class="select-row" data-id="<?php echo $row->primary_key_value?>" />
                                        </td>
                                        <?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
        								<td >
                							<div class="only-desktops"  style="white-space: nowrap">
                                           		<?php if(!$unset_edit){?>
                                           			<a class="btn btn-default" href="<?php echo $row->edit_url?>"><i class="fa fa-pencil"></i> <?php echo $this->l('list_edit')?> </a>
                                                 <?php }?>
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Más
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                     	<?php if(!$unset_read){?>
                                                        <li>
                                                            <a href="<?php echo $row->read_url?>"><i class="fa fa-eye"></i><?php echo $this->l('list_view')?></a>
                                                        </li>
                                                        <?php }?>
                                                        <?php if(!$unset_delete){?>
                                                        <li>
                                                            <a data-target="<?php echo $row->delete_url?>" href="javascript:void(0)" title="Delete" class="delete-row">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                                <span class="text-danger"><?php echo $this->l('list_delete')?></span>
                                                            </a>
                                                         </li>
                                                        <?php }?>
                                                      </ul>
                    							</div>
                                   			 </div>
                                            <div class="only-mobiles">
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Acciones                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    	 <?php if(!$unset_edit){?>
                                                        <li>
                                                            <a href="<?php echo $row->edit_url?>"><i class="fa fa-pencil"></i><?php echo $this->l('list_edit')?> </a>
                                                        </li>
                                                        <?php }?>
                                                        <?php if(!$unset_read){?>
                                                        <li>
                                                                <a href="<?php echo $row->read_url?>"><i class="fa fa-eye"></i><?php echo $this->l('list_view')?></a>
                                                        </li>
                                                        <?php }?>
                                                        <?php if(!$unset_delete){?>
                                                        <li>
                                                            <a data-target="<?php echo $row->delete_url?>" href="javascript:void(0)" title="Delete" class="delete-row">
                                                            <i class="fa fa-trash-o text-danger"></i> <span class="text-danger"><?php echo $this->l('list_delete')?></span>
                                                            </a>
                                                        </li>
                                                        <?php }?>
                                                     </ul>
                                                </div>
                                            </div>
                                    </td>
                                	<?php }?>
								   <?php foreach($columns as $column){?>
                                    <td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
                                        <div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
                                    </td>
                                   <?php }?>
            </tr>		
<?php } ?>        
		</tbody>
        <!-- Table Footer -->
        					<tfoot>
                                <tr>
                                    <td colspan="9">

                                            <!-- "Show 10/25/50/100 entries" (dropdown per-page) -->
                                            <div class="floatL t20 l5">
                                                <div class="floatL t10">
                                                 	<?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
													<?php echo $show_lang_string; ?>                                                
                                                </div>
                                                <div class="floatL r5 l5 t3">
                                                    <select name="per_page" class="per_page form-control">
                                                               <?php foreach($paging_options as $option){?>
                                                                    <option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
                                                                <?php }?>
                                                     </select>
                                                </div>
                                                <div class="floatL t10">
                                                     <?php echo $entries_lang_string; ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!-- End of "Show 10/25/50/100 entries" (dropdown per-page) -->

                                            <!-- Buttons - First,Previous,Next,Last Page -->
                                            <div class="floatR r5">

                                                <ul class="pagination">
                                                    <li class="disabled paging-first"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                                                    <li class="prev disabled paging-previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                                    <li>
                                                        <span class="page-number-input-container">
                                                            <input type="number" value="1" class="form-control page-number-input" />
                                                        </span>
                                                    </li>
                                                    <li class="next paging-next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                                    <li class="paging-last"><a href="#"><i class="fa fa-step-forward"></i></a></li>
                                                </ul>

                                                <input type="hidden" name="page_number" class="page-number-hidden" value="1" />

                                            </div>
                                            <!-- End of Buttons - First,Previous,Next,Last Page -->

                                            <!-- "Displaying 1 to 10 of 116 items" -->
                                            
                                            <div class="floatR r10 t30">
                                                <?php $paging_starts_from = "<span class='paging-starts'>1</span>"; ?>
												<?php $paging_ends_to = '<span class="paging-ends">'. ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; ?>
                                                <?php $paging_total_results = "<span class='current-total-results'>$total_results</span>"?>
                                                <?php echo str_replace( array('{start}','{end}','{results}'),
                                                                        array($paging_starts_from, $paging_ends_to, $paging_total_results),
                                                                        $this->l('list_displaying')
                                                                       ); ?>
                                                
                                                 <span class="full-total-container hidden">
                                                            	(filtered from <span class='full-total'><?php echo $total_results?></span> total entries)               
                                                 </span>
                                            </div>                                           
                                            <div class="clear"></div>
                                    </td>
                                </tr>
        					</tfoot>
                            <!-- End of: Table Footer -->
		</table>
	
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>	
