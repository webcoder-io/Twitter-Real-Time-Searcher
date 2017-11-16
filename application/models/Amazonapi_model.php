<?php
class Amazonapi_model extends CI_Model {
	
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		
		public function url2asins($url)
		{
			if( is_null($url) )
			{
				return false;
			}
			else
			{
				$this->load->helper('dom');
				
				$html = file_get_html($url);
				$products = $html->find('li[data-asin]');
				
				$asins_array = array(); // init
				foreach($products as $product)
				{
					$product_array = $product->attr;
					$asin = $product_array["data-asin"];
					array_push($asins_array, $asin);
				}
				
				return $asins_array;
			}
		}

		public function asin2product($asin)
		{
			if($asin!=null)
			{
				$this->load->library('amazon_ecs');
				$product = $this->ecs->lookup($asin)->Items->Item;
				return $product;
			}
		}
		
		public function xxxx($xxxx)
		{
			if(isset($product->ASIN))
				$data["ASIN"] = $product->ASIN;
			
			if(isset($product->DetailPageURL))
				$data["DetailPageURL"] = $product->DetailPageURL;
			if(isset($product->SalesRank))
				$data["SalesRank"] = $product->SalesRank;
			if(isset($product->SmallImage->URL))
				$data["SmallImageURL"] = $product->SmallImage->URL;
			if(isset($product->SmallImage->Height->_))
				$data["SmallImageHeight"] = $product->SmallImage->Height->_;
			if(isset($product->SmallImage->Width->_))
				$data["SmallImageWidth"] = $product->SmallImage->Width->_;
			if(isset($product->MediumImage->URL))
				$data["MediumImageURL"] = $product->MediumImage->URL;
			if(isset($product->MediumImage->Height->_))
				$data["MediumImageHeight"] = $product->MediumImage->Height->_;
			if(isset($product->MediumImage->Width->_))
				$data["MediumImageWidth"] = $product->MediumImage->Width->_;
			if(isset($product->LargeImage->URL))
				$data["LargeImageURL"] = $product->LargeImage->URL;
			if(isset($product->LargeImage->Height->_))
				$data["LargeImageHeight"] = $product->LargeImage->Height->_;
			if(isset($product->LargeImage->Width->_))
				$data["LargeImageWidth"] = $product->LargeImage->Width->_;
			if(isset($product->ImageSets))
				$data["ImageSets"] = $product->ImageSets;
			if(isset($product->ItemAttributes))
				$data["ItemAttributes"] = $product->ItemAttributes;
			//if(isset($product->OfferSummary))
				//$data["OfferSummary"] = $product->OfferSummary;
			if(isset($product->Offers))
				$data["Offers"] = $product->Offers;
			if(isset($product->CustomerReviews))
				$data["CustomerReviews"] = $product->CustomerReviews;
			if(isset($product->EditorialReviews))
				$data["EditorialReviews"] = $product->EditorialReviews;
			//if(isset($product->SimilarProducts))
				//$data["SimilarProducts"] = $product->SimilarProducts;
			if(isset($product->BrowseNodes->BrowseNode))
				$data["BrowseNode"] = $product->BrowseNodes->BrowseNode;
		}
		
}