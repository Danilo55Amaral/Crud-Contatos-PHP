<?php

class Data
{
    /* timestamp para salvar dados tipo data do proprio php*/

    private $data_atual;

    private $timezone;

    public function __construct($data = 'now')
    {
        $this->timezone   = new DateTimeZone('America/Recife');
        $this->data_atual = new DateTime($data, $this->timezone);
    }

    public function dataAtualizacao()
    {
        $data = $this->data_atual->format("Y-m-d H:i:s");
        return "'{$data}'";
    }

    public function dataCriacao()
    {
        $data = $this->data_atual->format("Y-m-d H:i:s");
        return "'{$data}'";
    }
    public function format($format = '')
    {
        return $this->data_atual->format($format);
    }
}
