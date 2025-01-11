<?php

namespace view;

use controller\agency\ProjectController;
use controller\AppController;

class ViewProjectPage extends ViewGenericPage {

    // Fonction pour récupérer les données du fichier JSON
    function getProjectsData() {
        $jsonFile = 'app/data/projects.json'; // Chemin vers le fichier JSON
        if (file_exists($jsonFile)) {
            return json_decode(file_get_contents($jsonFile), true); // Décoder le JSON et retourner un tableau
        }
        return []; // Retourner un tableau vide si le fichier n'existe pas
    }

    // Fonction pour récupérer un projet en fonction de son ID
    function getProjectById($id) {
        $projects = $this->getProjectsData(); // Charger les projets depuis le fichier JSON
        foreach ($projects as $project) {
            if ($project['id'] == $id) {
                return $project; // Retourner le projet correspondant à l'ID
            }
        }
        return null; // Retourner null si le projet n'est pas trouvé
    }



	public function buildHeadContent(): string {
		$r = parent::buildHeadContent();
		$r.="<link rel=\"stylesheet\" href=\"public/css/index.css\" />";
		/*$r.="<script src=\"public/js/index_landing_fg_bg.js\"></script>";
		$r.="<script src=\"public/js/index_landing_lettersHeadband.js\"></script>";
		$r.="<script src=\"public/js/team_carrousel.js\"></script>";
		$r.="<script src=\"public/js/projets_cards_3d.js\"></script>";
		$r.="<script src=\"public/js/services_selector.js\"></script>";*/
		return $r;
	}



    public function buildMainContent(): string {
        
        // Récupérer l'ID du projet depuis l'URL
        $id = isset($_GET['id']) ? (int)$_GET['id'] : -1; // Si l'ID est présent dans l'URL, on le récupère, sinon on met -1
        
        // Récupérer le projet correspondant
        $project = $this->getProjectById($id);

        // Si le projet n'existe pas, afficher un message d'erreur
        if ($project === null) {
            return "<p>Projet non trouvé.</p>";
            //exit();
        }

        // Initialisation de la variable $r pour accumuler le HTML
        $r = "";

        // Construire le contenu HTML dans la variable $r
        /*$r .= "<!DOCTYPE html>";
        $r .= "<html lang=\"fr\">";
        $r .= "<head>";
        $r .= "<meta charset=\"UTF-8\">";
        $r .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        $r .= "<title>" . htmlspecialchars($project['label']) . " - Projet</title>";
        $r .= "<link rel=\"stylesheet\" href=\"public/css/projets.css\">";
        $r .= "</head>";
        $r .= "<body>";

        $r .= "<header>";
        $r .= "<h1>" . htmlspecialchars($project['label']) . " - Projet</h1>";
        $r .= "</header>";

        $r .= "<main>";*/
        $r .= "<section class=\"project-details\">";
        $r .= "<h2>" . htmlspecialchars($project['label']) . "</h2>";
        $r .= "<p><strong>Type:</strong> " . htmlspecialchars($project['type']) . "</p>";
        $r .= "<img src=\"public/images/" . htmlspecialchars($project['iconFileName']) . "\" alt=\"" . htmlspecialchars($project['label']) . " logo\">";
        $r .= "<img src=\"public/images/" . htmlspecialchars($project['mockupFileName']) . "\" alt=\"" . htmlspecialchars($project['label']) . " mockup\">";
        $r .= "<p>" . nl2br(htmlspecialchars($project['shortDescription'])) . "</p>";
        $r .= "</section>";
        /*$r .= "</main>";

        $r .= "</body>";
        $r .= "</html>";
*/
        //echo $r;
        return $r;

    }

}

?>