<?php

class Frequencia {
    private $freq_data, $cli_id;
    
    public function getFreq_Data(){
        return $this->freq_data;
    }

    public function getCli_ID() {
        return $this->cli_id;
    }
        
    public function setFreq_Data($freq_data) {
        $this->freq_data = $freq_data;
    }
          
    public function setCli_ID($cli_id) {
        $this->cli_id = $cli_id;
    }
}

?>
