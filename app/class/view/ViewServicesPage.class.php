<?php

namespace view;

use controller\agency\BenefitController;
use controller\agency\FeatureController;
use controller\agency\ProjectController;
use model\Constants;
use view\agency\BenefitView;
use view\agency\FeatureView;
use view\agency\ProjectInRowListView;

/**
 * A View object that builds the base of the website's HMI as text in HTML format.
 * Automatically builds every needed tag for a generic page.
 */
class ViewServicesPage extends ViewGenericPage {

	/*protected $project;

	public function __construct($project) {
		$this->project = $project;
	}*/
	
	public function getPageTitleEnd(): string {
		return Constants::TITLE_VALUE_SEPARATOR_GENERIC . Constants::TITLE_VALUE_END_SERVICES;
	}

	public function buildHeadContent(): string {
		$r = parent::buildHeadContent();
		$r.="<link rel=\"stylesheet\" href=\"public/css/services.css\" />";
		$r.="<script src=\"public/js/services_processus_timeline.js\"></script>";
		$r.="<script src=\"public/js/contact_submit_ajax.js\"></script>";
		/*$r.="<script src=\"public/js/index_landing_fg_bg.js\"></script>";
		$r.="<script src=\"public/js/index_landing_lettersHeadband.js\"></script>";
		$r.="<script src=\"public/js/team_carrousel.js\"></script>";
		$r.="<script src=\"public/js/projets_cards_3d.js\"></script>";
		$r.="<script src=\"public/js/services_selector.js\"></script>";*/
		return $r;
	}

	public function buildMainContent(): string {
		$r = "";
		$r.=$this->buildLandingSection();
		$r.=$this->buildClientAdvantagesSection();
		$r.=$this->buildWebsiteNeedsSection();
		$r.=$this->buildFeaturesSection();
		$r.=$this->buildProcessSection();
		$r.=$this->buildAchievementsSection();
		$r.=$this->buildContactSection();
		return $r;
	}
	public function buildLandingSection(): string {
		$r = "";
		$r.="<section id=\"landing\">";

		/*if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$project = ProjectController::getProjectWithId($id);
			if (isset($project)) {
				//$projectView = new ProjectInRowListView(
				//	$project
				//);
				
				//var_dump($project);
				$label = "[label non trouvé]";
				if ((isset($project->label)) && ($project->label!="")) {
					$label = $project->label;
				}
				$r.="<h1>";
					$r.=$label;
				$r.="</h1>";
			} else {
				$r.="<h1>";
					$r.="projet n'existe pas";
				$r.="</h1>";
				
				foreach (ProjectController::getProjects() as $project) {
					$r.=new ProjectInRowListView($project);
				}
			}
		}*/

		$r.="<div class=\"wrapper\">";
		$r.="<div class=\"content\">";
		$r.="<div class=\"row top\">";
		$r.="<div class=\"column left\">";
		$r.="<h1>";
		$r.="Création de sites Web ";//<br />
		$r.="au-delà de l'ordinaire";
		$r.="</h1>";
		$r.="<p>";
		$r.="Construisez le socle de votre stratégie digitale de demain !";
		$r.="</p>";
		$r.="<div class=\"column contact-link\">";
		$r.="<a class=\"hoverable-btn-1\" href=\"#contact\">";
		$r.="<div class=\"btn-contact\">";
		$r.="Contactez un expert";
		$r.="</div>";
		$r.="</a>";
		$r.="<p class=\"row additionnal-info\">";
		$r.="Réponse en moins de 48h";
		$r.="</p>";
		$r.="</div>";
		$r.="</div>";
		$r.="<div class=\"column right illustration-holder\">";
		$r.="<img class=\"illustration\" src=\"public/img/services-landing-illustration.png\" alt=\"Notre expertise en webdesign.\" />";
		$r.="</div>";
		$r.="</div>";
		$r.="<div class=\"row bottom\">";
		$r.="<p>";
		$r.="Votre site manque de visibilité ? Notre refonte sur-mesure booste votre SEO, attire plus de visiteurs et génère plus de leads. Passez à l'action et transformez votre site dès aujourd'hui.";
		$r.="</p>";
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildClientAdvantagesSection(): string {
		$r = "";
		$r.="<section id=\"clientAdvantages\">";
			$r.="<div class=\"top-row\">";
				$r.="<h4 class=\"section-label\">";
					$r.="Bénéfices clients";
				$r.="</h4>";
			$r.="</div>";
			$r.="<div class=\"content-row\">";
				$r.="<div class=\"column\">";
					$r.="<h2 class=\"section-catchphrase\">";
						$r.="Révélez votre potentiel !";
					$r.="</h2>";
				$r.="</div>";
			$r.="<div class=\"benefits column\">";
		foreach (BenefitController::getClientBenefits() as /*$i=>*/$benefit) {
			$r.=new BenefitView($benefit);
			$r.="<hr />";
			/*
			$catchphrase = '';
			$description = '';
			if (isset($benefits->catchphrase)) {
				$catchphrase = $benefit->catchphrase; }
			if (isset($benefits->shortDescription)) {
				$description = $benefit->shortDescription; }
			$r.="<div class=\"benefit row\">";
			$r.="<div class=\"column\">";
			$r.="<p class=\"num\">";
			$r.=str_pad($i+1, 2, '0', STR_PAD_LEFT);
			$r.="</p>";
			$r.="<p class=\"catchphrase\">";
			$r.=$catchphrase;
			$r.="</p>";
			$r.="</div>";
			$r.="<div class=\"column\">";
			$r.="<p class=\"description\">";
			$r.=$description;
			$r.="</p>";
			$r.="</div>";
			$r.="</div>";
			*/
		}
		$r.="</div>";
		$r.="</div>";
		$r.="</section>";
		$r.=$this->buildAsideAsset1(); // WARNING: placement isn't the most prefessional
		return $r;
	}
	public function buildWebsiteNeedsSection(): string {
		$r = "";
		$r.="<section id=\"websiteNeeds\">";
		$r.="<a class=\"btn-contact\" href=\"#contact\">";
				$r.="<img src=\"public/img/services-contact-band.svg\" alt=\"Découvrez comment une refonte sur-mesure peut booster votre performance en ligne.Profitez de 30 minutes de consulting stratégique avec un expert de notre agence spécialisée en refonte de sites sur-mesure.\" />";
			$r.="</a>";
		$r.="</section>";
		return $r;
	}
	public function buildFeaturesSection(): string {
		$r = "";
		$r.="<section id=\"features\">";
			$r.="<div class=\"top-row\">";
				$r.="<h4 class=\"section-label\">";
					$r.="Nos atouts";
				$r.="</h4>";
			$r.="</div>";
			$r.="<div class=\"content-row row\">";
				$r.="<div class=\"column\">";
					$r.="<h2 class=\"section-catchphrase\">";
						$r.="Ce qui nous rend unique";
					$r.="</h2>";
					$r.="<p class=\"section-description\">";
						$r.="Chez Oria, nous ne nous contentons pas de moderniser votre site ; nous réinventons chaque détail pour en faire un outil puissant d'engagement et de conversion. Chaque composant est repensé avec soin pour offrir une expérience utilisateur fluide, intuitive, et parfaitement en phase avec l'identité de votre marque.";
					$r.="</p>";
					$r.="<p class=\"section-description\">";
						$r.="Notre accompagnement va bien au-delà de la simple conception. Tout au long du projet, nous vous guidons à chaque étape, en veillant à ce que chaque choix soutienne vos objectifs stratégiques. Le résultat ? Un site qui capte l’attention de votre audience et propulse votre croissance.";
					$r.="</p>";
					$r.="<br />"; // TO DO: see if margin is better
					$r.="<a class=\"hoverable-btn-1\" href=\"#contact\">";
						$r.="<div class=\"btn-contact\">";
							$r.="Contactez un expert";
						$r.="</div>";
					$r.="</a>";
				$r.="</div>";
				$r.="<div class=\"features column\">";
				foreach (FeatureController::getFeatures() as $feature) {
					$r.=new FeatureView($feature);
				}
				$r.="</div>";
			$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildProcessSection(): string {
		$r = "";
		$r.="<section id=\"process\">";	
		
			$r.="<div class=\"top-row\">";
				$r.="<h4 class=\"section-label\">";
					$r.="Processus";
				$r.="</h4>";
			$r.="</div>";
			$r.="<div class=\"column\">";
				$r.="<h2 class=\"section-catchphrase\">";
					$r.="Notre processus de refonte de sites !";
				$r.="</h2>";
				$r.="<div class=\"content row\">";
					$r.="<div class=\"timeline-wrapper\">";
						$r.="<img class=\"timeline\" src=\"public/img/services-processus-timeline.svg\" alt=\"Nos processus étape par étape\" />";
					$r.="</div>";
					$r.="<div class=\"processus-steps column\">";
					for ($i=1; $i<=5; $i++) { // TO DO: Implement in HTML/CSS !!!
						$r.="<img class=\"processus\" src=\"public/img/services-processus-step-$i.svg\" alt=\"Étape $i\" />";
					}
					$r.="</div>";
				$r.="</div>";
			$r.="</div>";

		$r.="</section>";
		return $r;
	}
	public function buildAchievementsSection(): string {
		$r = "";
		$r.="<section id=\"achievements\">";
			$r.="<div class=\"top-row\">";
				$r.="<h4 class=\"section-label\">";
					$r.="Cas clients";
				$r.="</h4>";
			$r.="</div>";
			$r.="<div class=\"column\">";
				$r.="<h2 class=\"section-catchphrase\">";
					$r.="Nos réalisations";
				$r.="</h2>";
				$r.="<div class=\"projects-wrapper\">";
					$r.="<div class=\"projects row\">";
					foreach (ProjectController::getProjects() as $project) {
						$r.=new ProjectInRowListView($project);
					}
					$r.="</div>";
				$r.="</div>";
			$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildContactSection(): string {
		$r = "";
		$r.="<section id=\"contact\">";
		$r.="<h2>Contactez-nous</h2>";
		$r.="<div class=\"wrapper\">";
		$r.="<div class=\"form-container left\">";
		$r.="<form id=\"contact-form\" action=\"?req=1&res=0&hl=0\" method=\"POST\">";
		$r.="<div class=\"form-group double\">";
		$r.="<div class=\"form-group required\">";
		$r.="<input type=\"text\" name=\"prenom\" placeholder=\"Votre prénom\" required />";
		$r.="</div>";
		$r.="<div class=\"form-group required\">";
		$r.="<input type=\"text\" name=\"nom\" placeholder=\"Votre nom\" required />";
		$r.="</div>";
		$r.="</div>";
		$r.="<div class=\"form-group required\">";
		$r.="<input type=\"email\" name=\"email\" placeholder=\"Votre email professionnel\" required />";
		$r.="</div>";
		$r.="<div class=\"form-group\">";
		$r.="<input type=\"text\" name=\"subject\" placeholder=\"Sujet du message\" />";
		$r.="</div>";
		$r.="<div class=\"form-group required\">";
		$r.="<textarea name=\"message\" rows=\"4\" placeholder=\"Votre message\" required></textarea>";
		$r.="</div>";
		$r.="<div class=\"button-container\">";
		$r.="<button type=\"submit\" class=\"btn-submit\">Envoyer</button>";
		$r.="</div>";
		$r.="</form>";
		$r.="</div>";
		$r.="<div class=\"info-container right\">";
		$r.="<h3>Quelques chiffres</h3>";
		$r.="<div class=\"stats\">";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-3d-companies.png\" alt=\"Collaborateurs :\" />";
		$r.="<span class=\"info\">";
		$r.="<b>+17</b>";
		$r.="<span>Entreprises</span>";
		$r.="</span>";
		$r.="</div>";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-3d-budget.png\" alt=\"Finances :\" />";
		$r.="<span class=\"info\">";
		$r.="<b>0.5M€</b>";
		$r.="<span>Budget géré</span>";
		$r.="</span>";
		$r.="</div>";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-3d-ads.png\" alt=\"Produits :\" />";
		$r.="<span class=\"info\">";
		$r.="<b>+2k</b>";
		$r.="<span>Publicités produites</span>";
		$r.="</span>";
		$r.="</div>";
		$r.="</div>";
		$r.="<h3>Nos coordonnées</h3>";
		$r.="<div class=\"contact-details\">";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-location.svg\" alt=\"Adresse :\" />";
		$r.="<span>1 Rue de Chablis, 93000 Bobigny</span>";
		$r.="</div>";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-phone.svg\" alt=\"Téléphone :\" />";
		$r.="<span>04 06 09 77 42</span>";
		$r.="</div>";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-mail.svg\" alt=\"Email :\" /> ";
		$r.="<span>agency.oria@gmail.com</span>";
		$r.="</div>";
		$r.="<div class=\"item\">";
		$r.="<img src=\"public/img/icon-clock.svg\" alt=\"Horaires :\" />";
		$r.="<span>9:00 à 13:00 et 14:00 à 19:00 du Lundi au Vendredi</span>";
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="</section>";
		return $r;
	}


	
	public function buildAsideAsset1(): string {
		$r = "";
		$r.="<div class=\"asideAsset-container\">";
		$r.="<img id=\"asideAsset-1\" src=\"public/img/services-aside-asset-1.svg\" alt=\" \" />";
		$r.="</div>";
		return $r;
	}

}

?>
