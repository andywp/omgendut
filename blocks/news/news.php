<?php if (!defined('basePath')) exit('No direct script access allowed');
$imgSize='';
$categoryID=9;
$query= "SELECT post_id FROM ".$this->table_prefix."posts where post_category='".$categoryID."' and publish='1' order by post_id desc limit 4";
$dataNEws=$this->db->getAll($query);
/* adodb_pr($dataNEws); */
$html='';
foreach($dataNEws as $r){
	$post = $this->post->getRow($r['post_id']);
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$post->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	/* adodb_pr($post); */
	$html.='<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="netral">
					<div class="square ratio4_3">
						<div class="square-content">
							<div class="img-wrap default">
								<figure class="effect-bubba">
									<a href="'.$post->url.'"><img src="'.$post->imageUrlLarge.'" alt="'.$post->title.'" class="img-responsive '.@$imgSize.'">
									<figcaption>
									  <div class="icon-view">
										<h3>'.$post->title.'</h3>
											<ul class="list-inline list-unstyled create">
											<li>'.date_indo($post->created,true,false).'</li>
											<li>By '.$post->author.'</li>
										</ul>
										<div class="small-news">
											'.$post->smallContent.'
										</div>
									  </div>
									</figcaption>
									</a>
								 </figure>
							</div>
						</div>
					</div>
				</div>
			</div>';
}

$promo_id=54;
$query= "SELECT post_id FROM ".$this->table_prefix."posts where post_category='".$promo_id."' and publish='1' order by post_id desc limit 1";
$post_id=$this->db->getOne($query);


$html_promo='';
if($post_id){
	$promo = $this->post->getRow($post_id);
	/* adodb_pr($promo); */
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$promo->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	
	
	
	$html_promo.='
				<div class="col-md-4 col-sm-4 col-xs-12 col-new">
					<div class="netral">
						<div class="frist-box">
							<div class="square">	
							  <div class="square-content">
								<div class="img-wrap default">
								  <figure class="effect-bubba">
									<a href="'.$promo->url.'">
									<img class="img-responsive" src="'.$promo->imageUrlLarge.'" alt="'.$post->title.'">
									<figcaption>
									  <div class="icon-view">
										<h3>'.$post->title.'</h3>
										<ul class="list-inline list-unstyled create">
											<li>'.date_indo($promo->created,true,false).'</li>
											<li>By '.$post->author.'</li>
										</ul>
										<div class="small-news">
											'.$post->smallContent.'
										</div>
									  </div>
									  </a>
									</figcaption>
								  </figure>
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
		';
		
		$col='col-md-8 col-sm-8 ';
}else{
	$col='col-md-12 col-sm-12 ';
}





?>

<!-- news -->
<section class="news-home" >
	<h2 class="home-title text-center">News From Yamaha</h2>
	<?= $html_promo ?>
	<div class="<?= $col ?> col-xs-12 col-new">
		<div class="row">
			<?= $html ?>
		</div>
	</div>	
	 <div class="clearfix"></div>
</section>
<!--// news -->