<div id="kboard-thumbnail-document">
	<div class="kboard-header"></div>
	
	<div class="kboard-document-wrap" itemscope itemtype="http://schema.org/Article">
		<div class="kboard-title" itemprop="name">
			<p><?php echo $content->title?></p>
		</div>
		
		
				<div class="kboard-detail"   style="background: #F5313D!important;   padding-top:4px!important; padding-bottom:4px!important;" >
			<?php if($content->category1):?>
			<div class="detail-attr detail-category1">
				<div class="detail-name"><?php echo $content->category1?></div>
			</div>
			<?php endif?>
			<?php if($content->category2):?>
			<div class="detail-attr detail-category2">
				<div class="detail-name"><?php echo $content->category2?></div>
			</div>
			<?php endif?>
			<div class="detail-attr detail-writer" style="padding-top:0; padding-bottom:0;">
				<div class="detail-name" style="color: white; font-weight: normal; font-size:13px; "><?php echo __('Author', 'kboard')?><?php echo "&nbsp;&nbsp;" ?>:</div>
				<div class="detail-value" style="color: #F5DA81; font-weight: normal; font-size:13px; "><?php echo $content->member_display?></div>
			</div>
			<div class="detail-attr detail-date" style="padding-top:0; padding-bottom:0;">
				<div class="detail-name" style="color: white; font-weight: normal; font-size:13px; "><?php echo __('Date', 'kboard')?><?php echo "&nbsp;&nbsp;" ?>:</div>
				<div class="detail-value" style="color: white; font-weight: normal; font-size:13px; "><?php echo date('Y-m-d', strtotime($content->date))?></div>
			</div>
			<div class="detail-attr detail-view" style="padding-top:0; padding-bottom:0;">
				<div class="detail-name" style="color: white; font-weight: normal; font-size:13px; "><?php echo __('Views', 'kboard')?><?php echo "&nbsp;&nbsp;" ?>:</div>
				<div class="detail-value" style="color: white; font-weight: normal; font-size:13px; "><?php echo $content->view?></div>
			</div>
			<div class="detail-attr detail-startdate" style="padding-top:0; padding-bottom:0;">
				<div class="detail-name" style="color: white; font-weight: normal; font-size:13px; ">시작일<?php echo "&nbsp;&nbsp;" ?>:</div>
				<div class="detail-value" style="color: white; font-weight: normal; font-size:13px; "><?=$content->option->startdate?></div>
			</div>
			<div class="detail-attr detail-enddate" style="padding-top:0; padding-bottom:0;">
				<div class="detail-name" style="color: white; font-weight: normal; font-size:13px; ">마감일<?php echo "&nbsp;&nbsp;" ?>:</div>
				<div class="detail-value" style="color: white; font-weight: normal; font-size:13px; "><?=$content->option->enddate?></div>
			</div>
		</div>
				<!-- ��ü �� -->
		<div class="kboard-content" itemprop="description">
			<div class="content-view">
				<?php if($content->thumbnail_file):?><p class="thumbnail-area"><a rel="lightbox" href="<?php echo get_site_url() . $content->thumbnail_file?>" alt="<?php echo $content->title?>" ><img src="<?php echo get_site_url() . $content->thumbnail_file?>" alt=""></a></p><?php endif;?>
				
				<?php echo $content->content?>
			</div>
		</div>
		
		<?php if(isset($content->attach->file1)):?>
		<div class="kboard-attach">
			<?php echo __('Attachment', 'kboard')?> : <a href="<?php echo $url->getDownloadURLWithAttach($content->uid, 'file1')?>"><?php echo $content->attach->file1[1]?></a>
		</div>
		<?php endif?>
		
		<?php if(isset($content->attach->file2)):?>
		<div class="kboard-attach">
			<?php echo __('Attachment', 'kboard')?> : <a href="<?php echo $url->getDownloadURLWithAttach($content->uid, 'file2')?>"><?php echo $content->attach->file2[1]?></a>
		</div>
		<?php endif?>
	</div>
	
	<?php if($board->isComment()):?>
	<div class="kboard-comments-area"><?php echo $board->buildComment($content->uid)?></div>
	<?php endif?>
	
	<div class="kboard-control">
		<div class="left">
			<a href="<?php echo $url->toString()?>" class="kboard-thumbnail-button-small"><?php echo __('List', 'kboard')?></a>
			<a href="<?php echo $url->getDocumentURLWithUID($content->getPrevUID())?>" class="kboard-thumbnail-button-small"><?php echo __('Prev', 'kboard')?></a>
			<a href="<?php echo $url->getDocumentURLWithUID($content->getNextUID())?>" class="kboard-thumbnail-button-small"><?php echo __('Next', 'kboard')?></a>
		<!-- 	<?php if($board->isWriter() && !$content->notice):?><a href="<?php echo $url->set('parent_uid', $content->uid)->set('mod', 'editor')->toString()?>" class="kboard-thumbnail-button-small"><?php echo __('Reply', 'kboard')?></a><?php endif?> -->
		</div>
		<?php if($board->isEditor($content->member_uid) || $board->permission_write=='all'):?>
		<div class="right">
			<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'editor')->toString()?>" class="kboard-thumbnail-button-small"><?php echo __('Edit', 'kboard')?></a>
			<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'remove')->toString()?>" class="kboard-thumbnail-button-small" onclick="return confirm('<?php echo __('Are you sure you want to delete?', 'kboard')?>');"><?php echo __('Delete', 'kboard')?></a>
		</div>
		<?php endif?>
	</div>
	
	<div class="kboard-thumbnail-poweredby">
		<a href="http://www.cosmosfarm.com/products/kboard" onclick="window.open(this.href); return false;" title="<?php echo __('KBoard is the best community software available for WordPress', 'kboard')?>">Powered by KBoard</a>
	</div>
</div>