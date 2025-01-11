<?php

namespace view;

use controller\AppController;
use model\data\DataManager;

/**
 * A View object that builds the base of the website's HMI as text in HTML format.
 * Automatically builds every needed tag for a generic page.
 */
class ViewGenericPage extends ViewHtml {

	protected const HREF_VALUE_VIEWPAGE_HOME =  "?";
	protected const HREF_VALUE_VIEWPAGE_SERVICES =  "?" . AppController::GET_PARAM_NAME_VIEWPAGE . "=services";
	protected const HREF_VALUE_ANCHOR_CONTACT =  "#contact";

	public function buildLogoOria(): string {
		$r = "";
		$r.="<a href=\".\">";
		$r.="<img class=\"logo-oria\" src=\"public/img/logo-oria.svg\" alt=\"ORIA\" />";
		$r.="</a>";
		return $r;
	}
	
	public function buildHeadContent(): string {
		$r = parent::buildHeadContent();
		$r.="<meta name=\"description\" content=\"" . $this->metaDescription . "\" />";
		$r.="<meta name=\"keywords\" content=\"" . $this->getMetaKeywords() . "\" />";
		return $r;
	}

	public function buildBodyContent(): string {
		$r = "";
		$r.=$this->buildHeader();
		$r.=$this->buildMain();
		$r.=$this->buildFooter();
		return $r;
	}
	public function buildHeader(): string {
		$r = "";
		$r.="<header>";
    $r.=$this->buildHeaderContent();
    $r.="</header>";
		return $r;
	}
	public function buildHeaderContent(): string {
		$r = "";
    $r.=$this->buildLogoOria();
    $r.="<nav class=\"websiteMenu\">";
    $r.="<ul class=\"row-menu\">";
		$menuItems = DataManager::loadData(
			DataManager::PATH_TO_JSON_FOLDER . 'menuItems.json'
		);
		foreach ($menuItems as $menuItem) {
			// Prepare data & keys
			$itemLabelKey = 'label-' . $this->getLanguage();
			$itemHrefKey = 'href';
			$itemLabelValue = '[]';
			$itemHrefValue = '#';
			if (isset($menuItem->$itemLabelKey)) {
				$itemLabelValue = $menuItem->$itemLabelKey; }
			if (isset($menuItem->$itemHrefKey)) {
				$itemHrefValue = $menuItem->$itemHrefKey; }

			// Special rules
			if (isset($menuItem->id) && ($menuItem->id==4)) {
				$itemHrefValue = $this::HREF_VALUE_VIEWPAGE_SERVICES;
			}

			//
			// Item View
			$r.="<li class=\"decoratedItem-1\">";
			$r.="<a class=\"decorationContainer\" href=\"$itemHrefValue\">";
			$r.="<span>";
			$r.=$itemLabelValue;
			$r.="</span>";
			$r.="<div class=\"itemDecoration\">";
			$r.="</div>";
			$r.="</a>";
			$r.="</li>";
		}
    $r.="</ul>";
    $r.="</nav>";

    $r.="<div>";
		
		$r.=$this->chooseStrLang([
			'fr' => "",
			'en' => ""
		]);
		
		$strGETParams = '';
		foreach ($_GET as $key=>$value) {
			if ($key!='lang') {
				$strGETParams.=$key . "=" .$value . "&";
			}
		}
		$strGETParams.="lang=" . $this->getOtherLanguage();
    $r.="<a id=\"lang-selector\" href=\"?" . $strGETParams . "\">" . strtoupper($this->getLanguage()) . "</a>";
		//$r.="<a class=\"hoverable-btn-1\" href=\"contact.html\">";
		$r.="<a class=\"hoverable-btn-1\" href=\"#contact\">";
		$r.="<div class=\"btn-contact\">Contact</div>";
		$r.="</a>";
		$r.="</div>";

		return $r;
	}
	public function buildMain(): string {
		$r = "";
		$r.="<main>";
		$r.=$this->buildMainContent();
		$r.="</main>";
		return $r;
	}
	public function buildMainContent(): string {
		$r = "";
		return $r;
	}
	public function buildFooter(): string {
		$r = "";
		$r.="<footer>";
		$r.="<div class=\"top-row\">";
		$r.=$this->buildLogoOria();
		$r.="<div>";
		$r.="<div class=\"columns\">";
		$r.="<div class=\"column\">";
		$r.="<h4>";
		
		$r.=$this->chooseStrLang([
			'fr' => "Suivez-nous",
			'en' => "Follow us"
		]);

		$r.="</h4>";
		$r.="<div class=\"social-icons\">";
		$r.="<a href=\"#\">";
		$r.="<img src=\"public/img/icon-facebook.svg\" alt=\"Facebook\" />";
		$r.="</a>";
		$r.="<a href=\"#\">";
		$r.="<img src=\"public/img/icon-instagram.svg\" alt=\"Instagram\" />";
		$r.="</a>";
		$r.="<a href=\"#\">";
		$r.="<img src=\"public/img/icon-tiktok.svg\" alt=\"Tiktok\" />";
		$r.="</a>";
		$r.="<a href=\"#\">";
		$r.="<img src=\"public/img/icon-linkedin.svg\" alt=\"LinkedIn\" />";
		$r.="</a>";
		$r.="</div>";
		$r.="</div>";
		$r.="<div class=\"column\">";
		$r.="<h4>";

		$r.=$this->chooseStrLang([
			'fr' => "Nos services",
			'en' => "Our services"
		]);

		$r.="</h4>";

		$servicesTypesTitles = DataManager::loadData(
			DataManager::PATH_TO_JSON_FOLDER . 'servicesTypes.json'
		);
		foreach ($servicesTypesTitles as $serviceTitle) {
			$label = '[]';
			$labelKey = 'label-' . $this->getLanguage();
			if (isset($serviceTitle->$labelKey)) {
				$label = $serviceTitle->$labelKey;
			}
			$r.="<a class=\"item\" href=\"" . $this::HREF_VALUE_VIEWPAGE_SERVICES . "\">" . $label . "</a>";
		}

		$r.="</div>";
		$r.="<div class=\"column\">";
		$r.="<h4>";
		
		$r.=$this->chooseStrLang([
			'fr' => "Nous contacter",
			'en' => "Contact us"
		]);

		$r.="</h4>";
		$r.="<a class=\"item icon-before email\" href=\"mailto:agency.oria@gmail.com\">agency.oria@gmail.com</a>";
		$r.="<a class=\"item icon-before phone\" href=\"#\">04 06 08 77 42</a>";
		$r.="<a class=\"item icon-before location\" href=\"#\">1 Rue de Chablis, 93000 Bobigny</a>";
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="<hr />";

		$r.="<div class=\"bottom-row\">";
		$r.="<ul class=\"row-menu no-padding\">";

		$servicesTypesTitles = DataManager::loadData(
			DataManager::PATH_TO_JSON_FOLDER . 'footerBottomItems.json'
		);
		foreach ($servicesTypesTitles as $serviceTitle) {
			$label = '[]';
			$href = '#';
			$labelKey = 'label-' . $this->getLanguage();
			if (isset($serviceTitle->$labelKey)) {
				$label = $serviceTitle->$labelKey;
			}
			if (isset($serviceTitle->href)) {
				$href = $serviceTitle->href;
			}

			// Special rules
			if (isset($serviceTitle->id) && ($serviceTitle->id<=2)) {
				$href = "?" . AppController::GET_PARAM_NAME_VIEWPAGE . "=legal" . $href;
			}
			
			$r.="<li>";
				$r.="<a class=\"decoratedItem-1 decorationContainer white\" href=\"$href\">";
					$r.="<span>";
						$r.="$label";
					$r.="</span>";
					$r.="<div class=\"itemDecoration\">";
					$r.="</div>";
				$r.="</a>";
			$r.="</li>";
		}
		/*$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>Aide</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>FAQ</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";*/

		$r.="</ul>";
		$r.="</div>";
		$r.="</footer>";
		return $r;
	}
	
	
}

?>
