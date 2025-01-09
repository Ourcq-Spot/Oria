<?php

namespace model\agency;

use stdClass;

class Project {

  public $id;
  public $label = '';
  public $type = '';
  public $iconFileName = '';
  public $mockupFileName = '';
  public $shortDescription = '';
  public $longDescription = '';

  public function __construct(stdClass $data) {
    if (isset($data->id)) {
      $this->id = $data->id; }
    if (isset($data->label)) {
      $this->label = $data->label; }
    if (isset($data->type)) {
      $this->type = $data->type; }
    if (isset($data->iconFileName)) {
      $this->iconFileName = $data->iconFileName; }
      if (isset($data->mockupFileName)) {
        $this->mockupFileName = $data->mockupFileName; }
    if (isset($data->shortDescription)) {
      $this->shortDescription = $data->shortDescription; }
    if (isset($data->longDescription)) {
      $this->longDescription = $data->longDescription; }
  }
}

?>