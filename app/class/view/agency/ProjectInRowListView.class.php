<?php

namespace view\agency;

use controller\AppController;
use model\agency\Project;
use view\View;

class ProjectInRowListView extends View {

  protected $project;

  public function __construct(Project $project) {
    $this->project = $project;
  }

  public function __toString(): string {
    $r = "";
    $id = -1;
    $label = '';
    $type = '';
    $iconFileName = '';
    $mockupFileName = '';
    if (isset($this->project->id)) {
      $id = $this->project->id; }
    if (isset($this->project->label)) {
      $label = $this->project->label; }
    if (isset($this->project->type)) {
      $type = $this->project->type; }
    if (isset($this->project->iconFileName)) {
      $iconFileName = $this->project->iconFileName; }
    if (isset($this->project->mockupFileName)) {
      $mockupFileName = $this->project->mockupFileName; }
    $r.="<a class=\"project column\" href=\"?" . AppController::GET_PARAM_NAME_VIEWPAGE . "=project&id=$id\" data-project=\"$label\">";
      $r.="<img class=\"logo\" src=\"public/img/$iconFileName\" alt=\"$label\" />";
      $r.="<div class=\"mockup-wrapper row\">";
        $r.="<img class=\"mockup\" src=\"public/img/$mockupFileName\" alt=\"Notre réalisation\" />";
      $r.="</div>";
      $r.="<div class=\"info row\">";
        $r.="<div class=\"content column\">";
          $r.="<h4 class=\"label\">";
            $r.=$label;
          $r.="</h4>";
          $r.="<p class=\"type\">";
            $r.=$type;
          $r.="</p>";
        $r.="</div>";
      $r.="</div>";
    $r.="</a>";
    return $r;
  }

}

?>