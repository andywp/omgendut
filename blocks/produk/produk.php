<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$detailURL=$this->db->getOne("select page_url from ".$this->table_prefix."pages where page_switch='produc_main'  order by page_id DESC limit 1");
$detailURL=baseURL.$detailURL;

$imagesURL=uploadURL.'modules/produk/thumbs/medium/';
$tabelProduk=$this->table_prefix."produk";
$tabelGambar=$this->table_prefix."produk_images";
$dataproduk=$this->db->getAll("select a.produk_id,nama , b.gambar from ".$tabelProduk." as a , ".$tabelGambar." as b WHERE a.produk_id=b.id_produk and a.active=1 GROUP by b.id_produk , a.category_id ORDER by a.produk_id DESC limit 3");

/* adodb_pr($dataproduk);
 */

$htmlProduk='';
foreach($dataproduk as $r){
	$htmlProduk.='<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="produk">
							<div class="box-product">
								<img class="img-responsive" alt="'.strDecode($r['nama']).'" src="'.$imagesURL.$r['gambar'].'">
							</div>
							<a href="'.$detailURL.'/'.$r['produk_id'].'/'.seo_slug(strDecode($r['nama'])).$this->permalink().'" class="btn btn-default btn-product">'.strDecode($r['nama']).'</a>
						</div>
					</div>';
}

?>

<!-- Product widget -->
<section class="section-product" >
	<div class="bg-produk">
		<div class="container">
			<div class="row row-eq-height">
				<?= $htmlProduk ?>
			</div>
			<div class="text-right">
				<a href="<?= $detailURL.$this->permalink() ?>" class="btn btn-default btn-more ">More  <i class="fas fa-play"></i></a>
			</div>
		</div>
	</div>
</section>

<!-- and produk -->