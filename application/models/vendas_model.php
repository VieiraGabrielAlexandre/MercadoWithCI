<?php


class vendas_model extends CI_Model
{
    public function salva($venda)
    {
        $this->db->insert("vendas", $venda);
        $this->db->update("produtos", ['vendido' => 1],
            ['id' => $venda['produto']]
        );
    }
}