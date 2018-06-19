<div id="kboard-thumbnail-list">

	<!-- 검색폼 시작 -->
	<div class="kboard-header">
		<form id="kboard-search-form" method="get" action="<?php echo $url->set('mod', 'list')->toString()?>">
			<?php echo $url->set('category1', '')->set('category2', '')->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>
			
			<?php if($board->use_category == 'yes'):?>
			<div class="kboard-category">
				<?php if($board->initCategory1()):?>
					<select name="category1" onchange="jQuery('#kboard-search-form').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if($_GET['category1'] == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif;?>
				
				<?php if($board->initCategory2()):?>
					<select name="category2" onchange="jQuery('#kboard-search-form').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if($_GET['category2'] == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif;?>
				<!--여기에는 정렬을 추가합니다-->
				<a href="#" id="a"><span>최신등록순</span></a>
				<a href="#" id="a"><span>종료임박순</span></a>
				<a href="#" id="a"><span>빠른시작순</span></a>
				
				
				<!--끝-->
			</div>
			
		
			
			<?php endif?>
			<div class="kboard-search">
				<select name="target">
					<option value=""><?php echo __('All', 'kboard')?></option>
					<option value="title"<?php if($_GET['target'] == 'title'):?> selected="selected"<?php endif?>><?php echo __('Title', 'kboard')?></option>
					<option value="content"<?php if($_GET['target'] == 'content'):?> selected="selected"<?php endif?>><?php echo __('Content', 'kboard')?></option>
					<option value="member_display"<?php if($_GET['target'] == 'member_display'):?> selected="selected"<?php endif?>><?php echo __('Author', 'kboard')?></option>
				</select>
				<input type="text" name="keyword" value="<?php echo $_GET['keyword']?>">
				<button type="submit" class="kboard-thumbnail-button-small"><?php echo __('Search', 'kboard')?></button>
			</div>
		</form>
	</div>
	<!-- 검색폼 끝 -->
	
	<!-- 리스트 시작 -->
	<div class="kboard-list" style="border:0px!important;">
	
								<ul class="double_column">
				<?php while($content = $list->hasNext()):?><li>
			
					<div class="kboard_thumbnail_title" style="width:80%; height: 400px; overflow:hidden; margin: 0 7px 15px 7px; text-align: center ; padding-left: 5px; font-size: 20px; ><a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>"><?php $longText = $content->title; $strim = mb_strimwidth($longText, '0', '38', '...', 'utf-8'); echo $strim;?></a>
					<div class="kboard-list-thumbnail2" style="position: relative; width:100%!important; text-align: center; margin-bottom: -10px; "><div class="inner_thumbnamil" style="display: inline-block;"><a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>">                       
					<?php if($content->thumbnail_file):?><img src="<?php echo kboard_resize($content->thumbnail_file, 380, 380)?>" style="max-width: 90%;" alt="<?php echo $content->thumbnail_name?>"><?php else:?><i class="icon-picture"></i><?php endif?>                        </a></div>
					
					<div class="kboard_thumbnail_title_under" style="width:100%; height: 50px; overflow:hidden; margin: 0 7px 15px 7px; padding-left: 5px; font-size: 13px;">
					<div class="thumbnail_excerpt"><?php  $longText2 = $content->content; $excerpt2 = mb_strimwidth($longText2, '0', '58', '...', 'utf-8'); echo $excerpt2;?></div>
					<div class="thumbnail_excerpt style="font-size: 12px;"><?php  $longText2 = $content->content; $excerpt2 = mb_strimwidth($longText2, '0', '58', '...', 'utf-8'); echo $excerpt2;?></div>	
						  	 
					</div>
					</div>	
		</li>
				<?php endwhile?>
				</ul></div>
	
	<!-- 리스트 끝 -->
	
	<!-- 페이징 시작 -->
	<div class="kboard-pagination">
		<ul class="kboard-pagination-pages" style=" list-style: none!important;">
			<?php echo kboard_pagination($list->page, $list->total, $list->rpp)?>
		</ul>
	</div>
	<!-- 페이징 끝 -->
	
	<?php if($board->isWriter()):?>
	<!-- 버튼 시작 -->
	<div class="kboard-control">
		<a href="<?php echo $url->set('mod', 'editor')->toString()?>" class="kboard-thumbnail-button-small"><?php echo __('New', 'kboard')?></a>
	</div>
	<!-- 버튼 끝 -->
	<?php endif?>
	
	
	
	<div class="kboard-thumbnail-poweredby">
		 <a href="http://www.cosmosfarm.com/products/kboard" onclick="window.open(this.href); return false;" title="<?php echo __('KBoard is the best community software available for WordPress', 'kboard')?>">Powered by KBoard</a>
	</div>
</div>