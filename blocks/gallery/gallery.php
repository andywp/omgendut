<?php
$imageUrl  = uploadURL.'modules/gallery/';
$thumbUrl  = uploadURL.'modules/gallery/thumbs/small/';
$album=$this->db->getOne("select page_url from ".$this->table_prefix."pages where page_switch='album'  order by page_id DESC limit 1");
$albumURL=baseURL.$album;


$album=$this->db->getAll("select category_id,category_name from ".$this->table_prefix."category where category_type='gallery' limit 4 ");
$gallery='';
foreach($album as $a){
	
	
	$query    = "select image from ".$this->table_prefix."gallery_image where publish='1' and album_id ='".$a['category_id']."' order by gallery_id desc limit 1";
	$r=$this->db->getRow($query);


		$gallery.='<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="box-gallery">
							<div class="box-img">
								<img src="'.$imageUrl.$r['image'].'" alt="'.$a['category_name'].'" class="img-responsive">
							</div>
							<a href="'.$albumURL.'/'.$a['category_id'].'/'.seo_slug($a['category_name']).$this->permalink().'" class="btn btn-default btn-gallery">'.$a['category_name'].'</a>
						</div>
					</div>';

}
?>


<!-- gallery -->
<section class="gallery" >
	<h2 class="home-title text-center">GALLERY</h2>
	<div class="container">
		<div class="row row-eq-height row-img-style">
			<?= $gallery ?>	
		</div>
	</div>
</section>
<!-- // gellery-->