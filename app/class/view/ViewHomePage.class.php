<?php

namespace view;

use controller\agency\ProjectController;
use controller\AppController;
use model\data\DataManager;
use view\agency\ProjectCardView;

/**
 * A View object that builds the base of the website's HMI as text in HTML format.
 * Automatically builds every needed tag for a generic page.
 */
class ViewHomePage extends ViewGenericPage {


	public function buildHeadContent(): string {
		$r = parent::buildHeadContent();
		$r.="<link rel=\"stylesheet\" href=\"public/css/index.css\" />";
		$r.="<script src=\"public/js/index_landing_fg_bg.js\"></script>";
		$r.="<script src=\"public/js/index_landing_lettersHeadband.js\"></script>";
		$r.="<script src=\"public/js/team_carrousel.js\"></script>";
		$r.="<script src=\"public/js/projets_cards_3d.js\"></script>";
		$r.="<script src=\"public/js/services_selector.js\"></script>";
		$r.="<script src=\"public/js/contact_submit_ajax.js\"></script>";
		return $r;
	}

	public function buildMainContent(): string {
		$r = "";
		$r.=$this->buildLandingSection();
		$r.=$this->buildStorySection();
		//$r.=$this->buildTeamSection();
		$r.=$this->buildProjectsSection();
		$r.=$this->buildServicesSection();
		$r.=$this->buildContactSection();
		return $r;
	}
	public function buildLandingSection(): string {
		$r = "";
		$r.="<section id=\"landing\">";
		$r.="<div class=\"foreground\"></div>";
		$r.="<div class=\"background\"></div>";
		$r.="<div id=\"lettersHeadband\" class=\"prevent-select\">";
		$r.="<div class=\"wrapper\">";
		$r.="<div class=\"lettersColumn\">";
		for ($i=0; $i<3; $i++) {
			$r.="<p>O</p><p>R</p><p>I</p><p>A</p>";
		}
		$r.="</div>";
		$r.="</div>";
		$r.="</div>";
		$r.="<div class=\"content\">";
		$r.="<h1>";

		$r.=$this->chooseStrLang([
			'fr' => "Concevoir & innover",
			'en' => "Design & innovate"
		]);
		
		$r.="<br />";
		
		$r.=$this->chooseStrLang([
			'fr' => "au-delà de l'ordinaire",
			'en' => "beyond the ordinary"
		]);
		

		$r.="</h1>";
		$r.="<p>";

		
		$r.=$this->chooseStrLang([
			'fr' => "Chez Oria, nous transformons vos idées en solutions digitales uniques.",
			'en' => "At Oria, we turn your ideas into unique digital solutions."
		]);
		$r.="<br />";
		$r.=$this->chooseStrLang([
			'fr' => "Avec un design percutant et des technologies innovantes, nous allons au-delà de l'ordinaire pour créer des expériences mémorables.",
			'en' => "With striking design and innovative technologies, we go beyond the ordinary to create memorable experiences."
		]);
		$r.="</p>";
		$r.="<p>";
		$r.=$this->chooseStrLang([
			'fr' => "Découvrez comment nous pouvons donner vie à vos ambitions.",
			'en' => "Find out how we can bring your ambitions to life."
		]);
		$r.="</p>";
		//$r.="<a class=\"hoverable-btn-1\" href=\"contact.html\">";
		$r.="<a class=\"hoverable-btn-1\" href=\"#contact\">";
		$r.="<div class=\"btn-launch\">";
		$r.=$this->chooseStrLang([
			'fr' => "Lancez votre projet",
			'en' => "Launch your project"
		]);
		$r.="</div>";
		$r.="</a>";
		$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildStorySection(): string {
		$r = "";
		$r.="<section id=\"agencyStory\">";
		$r.="<div class=\"content\">";
		$r.="<div class=\"story\">";
		$r.="<div class=\"text\">";
		$r.="<h2>";
		$r.=$this->chooseStrLang([
			'fr' => "Histoire d'Oria",
			'en' => "Oria history"
		]);
		$r.="</h2>";
		$r.="<p>";
		$r.=$this->chooseStrLang([
			'fr' => "Chez Oria, nous transformons chaque idée en une <strong>expérience digitale unique</strong>. Guidés par la <strong>créativité</strong>, l'<strong>innovation</strong> et l’excellence, nous créons des solutions interactives et immersives pour les <strong>marques ambitieuses</strong>. Avec une équipe de talents multidisciplinaires, nous combinons design, stratégie digitale et technologie de pointe pour donner vie à vos projets.",
			'en' => "At Oria, we turn every idea into a unique digital experience. Guided by creativity, innovation and excellence, we create interactive and immersive solutions for ambitious brands. With a team of multidisciplinary talents, we combine design, digital strategy and cutting-edge technology to bring your projects to life."
		]);
		$r.="<br/>";
		$r.=$this->chooseStrLang([
			'fr' => "Notre mission ? Aller <strong>au-delà de l'ordinaire</strong> et créer des expériences captivantes.",
			'en' => "Our mission? Going beyond the ordinary and creating captivating experiences."
		]);
		$r.="</p>";
		$r.="</div>";
		$r.="<div class=\"btn-launch-wrapper\">";
		$r.="<a href=\"#projects\" class=\"btn-launch black\">";
		$r.="<p class=\"value\">";
		$r.=$this->chooseStrLang([
			'fr' => "Découvrir nos projets",
			'en' => "Discover our projects"
		]);
		$r.="</p>";
		$r.="<div class=\"background\"></div>";
		$r.="</a>";
		$r.="</div>";
		$r.="</div>";
		$r.="<section id=\"keyNumbers\">";
		$r.="<h3>";
		$r.=$this->chooseStrLang([
			'fr' => "En 2024 chez Oria",
			'en' => "In 2024 at Oria"
		]);
		$r.="</h3>";
		$r.="<div class=\"listedNumbers\">";
		$r.="<div id=\"keyNumber-partners\" class=\"keyNumber\">";
		$r.="<p>";
		$r.="10";
		$r.="</p>";
		$r.="<p>";
		$r.=$this->chooseStrLang([
			'fr' => "collaborateurs",
			'en' => "co-workers"
		]);
		$r.="</p>";
		$r.="</div>";
		$r.="<div id=\"keyNumber-clients\" class=\"keyNumber\">";
		$r.="<p>";
		$r.="34";
		$r.="</p>";
		$r.="<p>";
		$r.=$this->chooseStrLang([
			'fr' => "clients",
			'en' => "customers"
		]);
		$r.="</p>";
		$r.="</div>";
		$r.="<div id=\"keyNumber-turnover\" class=\"keyNumber\">";
		$r.="<p>";
		$r.="11.7 M €";
		$r.="</p>";
		$r.="<p>";
		$r.=$this->chooseStrLang([
			'fr' => "de chiffre d'affaires",
			'en' => "in turnover"
		]);
		$r.="</p>";
		$r.="</div>";
		$r.="</div>";
		$r.="</section>";
		$r.="</div>";
		$r.="<div class=\"timeline\">";
		$r.="<img src=\"public/img/agency-story-timeline-" . $this->getLanguage() . ".svg\" alt=\"Notre histoire depuis 2024\" />";
		$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildTeamSection(): string {
		$r = "";
		$r.="<section id=\"team\">";
			$r.="<h2>";
				$r.=$this->chooseStrLang([
					'fr' => "Découvrir la dream team",
					'en' => "Discover the dream team"
				]);
			$r.="</h2>";
			$r.="<div class=\"carrousel\">";
				$r.="<div class=\"carrousel-track\">";
					$r.="<div class=\"slide1\">";
						$r.="<img src=\"public/img/team-card-adam.webp\" alt=\"collaborator 1\">";
						$r.="<img src=\"public/img/team-card-cyrielle.webp\" alt=\"collaborator 2\">";
						$r.="<img src=\"public/img/team-card-kellya.webp\" alt=\"collaborator 3\">";
						$r.="<img src=\"public/img/team-card-david.webp\" alt=\"collaborator 4\">";
					$r.="</div>";
					$r.="<div class=\"slide2\">";
						$r.="<img src=\"public/img/team-card-juan.webp\" alt=\"collaborator 5\">";
						$r.="<img src=\"public/img/team-card-linh.webp\" alt=\"collaborator 6\">";
						$r.="<img src=\"public/img/team-card-loucia.webp\" alt=\"collaborator 7\">";
						$r.="<img src=\"public/img/team-card-merwan.webp\" alt=\"collaborator 8\">";
					$r.="</div>";
					$r.="<div class=\"slide3\">";
						$r.="<img src=\"public/img/team-card-solan.webp\" alt=\"collaborator 9\">";
						$r.="<img src=\"public/img/team-card-tiffany.webp\" alt=\"collaborator 10\">";
						$r.="<img src=\"public/img/team-card-pdg.webp\" alt=\"collaborator 11\">";
					$r.="</div>";
				$r.="</div>";
				$r.="<button class=\"carrousel-btn prev\">";
					$r.="<i class=\"fas fa-arrow-left\">";
					$r.="</i>";
				$r.="</button>";
				$r.="<button class=\"carrousel-btn next\">";
					$r.="<i class=\"fas fa-arrow-right\">";
					$r.="</i>";
				$r.="</button>";
			$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildProjectsSection(): string {
		

		$r = "";
		$r.="<section id=\"projects\" class=\"preview\">";
			$r.="<h2>";
			$r.=$this->chooseStrLang([
				'fr' => "Projets",
				'en' => "Projects"
			]);
			$r.="</h2>";
			$r.="<div class=\"wrapper\">";
				$r.="<div class=\"wrapper-btn-more\">";
					$r.="<a class=\"decoratedItem-1 btn-more white afterico-right-arrow\" href=\"?#projects\">";
						$r.="<div class=\"wrapper decorationContainer\">";
							$r.="<p>";
								$r.=$this->chooseStrLang([
									'fr' => "Voir plus",
									'en' => "See more"
								]);
							$r.="</p>";
							$r.="<div class=\"itemDecoration\"></div>";
						$r.="</div>";
					$r.="</a>";
				$r.="</div>";
				$r.="<div class=\"project-row\">";

				foreach (ProjectController::getProjects(3) as $project) {
					$r.=new ProjectCardView($project);
				}

				$r.="</div>";
			$r.="</div>";
		$r.="</section>";
		return $r;
	}
	public function buildServicesSection(): string {
		$r = "";
		$r.="<section id=\"services\" class=\"preview\">";
			$r.="<h2>";
				$r.=$this->chooseStrLang([
					'fr' => "Nos services",
					'en' => "Our services"
				]);
			$r.="</h2>";
		$r.="<div class=\"subjects\">";

		$servicesTypesTitles = DataManager::loadData(
			DataManager::PATH_TO_JSON_FOLDER . 'servicesTypes.json'
		);
		foreach ($servicesTypesTitles as $key=>$serviceTitle) {
			$label = '[]';
			$labelKey = 'label-' . $this->getLanguage();
			if (isset($serviceTitle->$labelKey)) {
				$label = $serviceTitle->$labelKey;
			}
			$fieldName = '';
			if (isset($serviceTitle->field)) {
				$fieldName = $serviceTitle->field;
			}
			$iconFileName = '';
			if (isset($serviceTitle->iconFileName)) {
				$iconFileName = $serviceTitle->iconFileName;
			}
			
			$selectedValue = "";
			if ($key == 0) {
				$selectedValue = " selected";
			}
			
			$r.="<div id=\"subject-$fieldName\" class=\"item$selectedValue\">";
				$r.="<h4 class=\"subject-name\">";
					$r.=$label;
				$r.="</h4>";
				$r.="<svg class=\"icon-wrapper\" width=\"100%\" height=\"100%\" xmlns=\"http://www.w3.org/2000/svg\">";
					$r.="<defs>";
						$r.="<clipPath id=\"border-clip-1\">";
							$r.="<rect class=\"border-1\" width=\"0\" height=\"0\" />";
						$r.="</clipPath>";
					$r.="</defs>";
					$r.="<rect class=\"border-1\" clip-path=\"url(#border-clip-1)\" width=\"0\" height=\"0\" />";
					$r.="<image class=\"icon\" xlink:href=\"public/img/$iconFileName\" width=\"0\" height=\"0\" />";
				$r.="</svg>";
			$r.="</div>";
		}

		$r.="</div>";

		$r.="<div id=\"subjects-associated-btns\">";

		foreach ($servicesTypesTitles as $key=>$serviceTitle) {
			$fieldName = '';
			if (isset($serviceTitle->field)) {
				$fieldName = $serviceTitle->field;
			}
			
			$selectedValue = "";
			if ($key == 0) {
				$selectedValue = " selected";
			}
			
			$r.="<div class=\"field-$fieldName$selectedValue\">";

			if ((isset($serviceTitle->subServices)) && (is_array($serviceTitle->subServices))) {
				foreach ($serviceTitle->subServices as $subService) {
					
					$label = '';
					$labelKey = 'label-' . $this->getLanguage();
					if (isset($subService->$labelKey)) {
						$label = $subService->$labelKey;
					}
					$btnClass = '';
					if (isset($subService->btnClass)) {
						$btnClass = $subService->btnClass;
					}
					
					$r.="<a class=\"btn-$btnClass\" href=\"?" . AppController::GET_PARAM_NAME_VIEWPAGE . "=services\">";
					$r.="<p class=\"value\">";
					$r.=$label;
					$r.="</p>";
					$r.="<div class=\"icon-right-arrow\">";
					$r.="</div>";
					$r.="</a>";
				}

				$r.="</div>";
			}
		}

		$r.="</section>";
		return $r;
	}
	public function buildContactSection(): string {
		$r = "";
		$r.="<section id=\"contact\">";
			$r.="<h2>";
				$r.=$this->chooseStrLang([
					'fr' => "Contactez-nous",
					'en' => "Contact us"
				]);
			$r.="</h2>";
			$r.="<div class=\"wrapper\">";
				$r.="<div class=\"form-container left\">";
					$r.="<form id=\"contact-form\" action=\"?" . AppController::GET_PARAM_NAME_ACTION_REQUEST . "=" . AppController::ACTION_SEND_MAIL .
						"&" . AppController::GET_PARAM_NAME_RESPONSE_REQUEST . "=" . AppController::ACTION_CHECK_MAIL_SENT .
						"&hl=0\" method=\"POST\">";
						$r.="<div class=\"form-group double\">";
							$placeholder=$this->chooseStrLang([
								'fr' => "Votre prénom",
								'en' => "Your firstname"
							]);
							$r.="<div class=\"form-group required\">";
								$r.="<input type=\"text\" name=\"prenom\" placeholder=\"$placeholder\" required />";
							$r.="</div>";
							$placeholder=$this->chooseStrLang([
								'fr' => "Votre nom",
								'en' => "Your lastname"
							]);
							$r.="<div class=\"form-group required\">";
								$r.="<input type=\"text\" name=\"nom\" placeholder=\"$placeholder\" required />";
							$r.="</div>";
						$r.="</div>";
						$placeholder=$this->chooseStrLang([
							'fr' => "Votre email professionnel",
							'en' => "Your professional email"
						]);
						$r.="<div class=\"form-group required\">";
							$r.="<input type=\"email\" name=\"email\" placeholder=\"$placeholder\" required />";
						$r.="</div>";
						$placeholder=$this->chooseStrLang([
							'fr' => "Sujet du message",
							'en' => "Subject of the message"
						]);
						$r.="<div class=\"form-group\">";
							$r.="<input type=\"text\" name=\"subject\" placeholder=\"$placeholder\" />";
						$r.="</div>";
						$placeholder=$this->chooseStrLang([
							'fr' => "Votre message",
							'en' => "Your message"
						]);
						$r.="<div class=\"form-group required\">";
							$r.="<textarea name=\"message\" rows=\"4\" placeholder=\"$placeholder\" required></textarea>";
						$r.="</div>";
						$btnValue=$this->chooseStrLang([
							'fr' => "Envoyer",
							'en' => "Send"
						]);
						$r.="<div class=\"button-container\">";
							$r.="<button type=\"submit\" class=\"btn-submit\">$btnValue</button>";
						$r.="</div>";
					$r.="</form>";
				$r.="</div>";
				$r.="<div class=\"info-container right\">";
					$r.="<h3>";
						$r.=$this->chooseStrLang([
							'fr' => "Quelques chiffres",
							'en' => "Key figures"
						]);
					$r.="</h3>";
					$r.="<div class=\"stats\">";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Collaborateurs",
								'en' => "Employees"
							]);
							$r.="<img src=\"public/img/icon-3d-companies.png\" alt=\"$alt\" />";
							$r.="<span class=\"info\">";
								$r.="<b>+17</b>";
								$r.="<span>";
									$r.=$this->chooseStrLang([
										'fr' => "Entreprises",
										'en' => "Companies"
									]);	
								$r.="</span>";
							$r.="</span>";
						$r.="</div>";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Finances",
								'en' => "Finances"
							]);
							$r.="<img src=\"public/img/icon-3d-budget.png\" alt=\"$alt\" />";
							$r.="<span class=\"info\">";
								$r.="<b>0.5M€</b>";
								$r.="<span>";
									$r.=$this->chooseStrLang([
										'fr' => "Budget géré",
										'en' => "Managed budget"
									]);	
								$r.="</span>";
							$r.="</span>";
						$r.="</div>";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Produits",
								'en' => "Revenue"
							]);
							$r.="<img src=\"public/img/icon-3d-ads.png\" alt=\"$alt\" />";
							$r.="<span class=\"info\">";
								$r.="<b>+2k</b>";
								$r.="<span>";
									$r.=$this->chooseStrLang([
										'fr' => "Publicités produites",
										'en' => "Advertisements produced"
									]);	
								$r.="</span>";
							$r.="</span>";
						$r.="</div>";
					$r.="</div>";
					$r.="<h3>";
						$r.=$this->chooseStrLang([
							'fr' => "Nos coordonnées",
							'en' => "Contact details"
						]);
					$r.="</h3>";
					$r.="<div class=\"contact-details\">";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Adresse :",
								'en' => "Address:"
							]);
							$r.="<img src=\"public/img/icon-location.svg\" alt=\"$alt\" />";
							$r.="<span>1 Rue de Chablis, 93000 Bobigny</span>";
						$r.="</div>";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Téléphone :",
								'en' => "Phone number:"
							]);
							$r.="<img src=\"public/img/icon-phone.svg\" alt=\"$alt\" />";
							$r.="<span>";
								$r.=$this->chooseStrLang([
									'fr' => "04 06 09 77 42",
									'en' => "+33 4 06 09 77 42"
								]);
							$r.="</span>";
						$r.="</div>";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Email :",
								'en' => "Email:"
							]);
							$r.="<img src=\"public/img/icon-mail.svg\" alt=\"$alt\" /> ";
							$r.="<span>agency.oria@gmail.com</span>";
						$r.="</div>";
						$r.="<div class=\"item\">";
							$alt=$this->chooseStrLang([
								'fr' => "Horaires :",
								'en' => "Opening hours:"
							]);
							$r.="<img src=\"public/img/icon-clock.svg\" alt=\"$alt\" />";
							$r.="<span>";
								$r.=$this->chooseStrLang([
									'fr' => "9:00 à 13:00 et 14:00 à 19:00 du Lundi au Vendredi",
									'en' => "9:00 to 13:00 and 14:00 to 19:00 Monday to Friday"
								]);
							$r.="</span>";
						$r.="</div>";
					$r.="</div>";
			$r.="</div>";
		$r.="</section>";
		return $r;
	}

}

?>
