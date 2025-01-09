<?php

namespace view;

use controller\AppController;

/**
 * A View object that builds the base of the website's HMI as text in HTML format.
 * Automatically builds every needed tag for a generic page.
 */
class ViewGenericPage extends ViewHtml {

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
		$r.="";
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
		$menuItems = [
			[
				'fr' => 'Accueil',
				'en' => 'Home',
				'href' => "."
			], [
				'fr' => 'Histoire',
				'en' => 'History',
				'href' => "?#agencyStory"
			], [
				'fr' => 'Équipe',
				'en' => 'Team',
				'href' => "?#team"
			], [
				'fr' => 'Projets',
				'en' => 'Projects',
				'href' => "?#projects"
			], [
				'fr' => 'Services',
				'en' => 'Services',
				'href' => "?" . AppController::GET_PARAM_NAME_VIEWPAGE . "=services"
			]
		];
		foreach ($menuItems as $menuItem) {
			$itemLabel = '[]';
			$itemHref = '#';
			if (isset($menuItem[$this->getLanguage()])) {
				$itemLabel=$menuItem[$this->getLanguage()]; }
			if (isset($menuItem['href'])) {
				$itemHref=$menuItem['href']; }
			$r.="<li class=\"decoratedItem-1\">";
			$r.="<a class=\"decorationContainer\" href=\"$itemHref\">";
			$r.="<span>";
			$r.=$itemLabel;
			$r.="</span>";
			$r.="<div class=\"itemDecoration\">";
			$r.="</div>";
			$r.="</a>";
			$r.="</li>";
		}
    $r.="</ul>";
    $r.="</nav>";

    $r.="<div>";
		$targetLangCode = 'en';
		if ($this->getLanguage() == 'en') {
			$targetLangCode = 'fr';
		}
		$strGETParams = '';
		foreach ($_GET as $key=>$value) {
			if ($key!='lang') {
				$strGETParams.=$key . "=" .$value . "&";
			}
		}
		$strGETParams.="lang=" . $targetLangCode;
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
		$r.="<h4>Suivez-nous</h4>";
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
		$r.="<h4>Nos Services</h4>";
		$r.="<a class=\"item\" href=\"#\">Marquages publicitaires</a>";
		$r.="<a class=\"item\" href=\"#\">Services web</a>";
		$r.="<a class=\"item\" href=\"#\">Graphisme</a>";
		$r.="<a class=\"item\" href=\"#\">Impression</a>";
		$r.="</div>";
		$r.="<div class=\"column\">";
		$r.="<h4>Nous contacter</h4>";
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
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>Politique de confidentialité</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>Cookies</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"mentionslegales.html\">";
		$r.="<span>Mentions légales</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		/*$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>Aide</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>FAQ</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";*/
		$r.="<li><a class=\"decoratedItem-1 decorationContainer white\" href=\"#\">";
		$r.="<span>Contact</span>";
		$r.="<div class=\"itemDecoration\"></div></a></li>";
		$r.="</ul>";
		$r.="</div>";
		$r.="</footer>";
		return $r;
	}
	
	
}

?>
