<?php
class Catalogo_model extends CI_Model {

    public function __construct(){

    }

    public function getUsuario(){

        $sSQL  ="   SELECT id,                                ";
        $sSQL .="          nome,                              ";
        $sSQL .="          email,                             ";
        $sSQL .="          CASE tipo                          ";
        $sSQL .="               WHEN 1 THEN 'Administrador'   ";
        $sSQL .="               ELSE 'Cliente'                ";
        $sSQL .="          END as tipo                        ";
        $sSQL .="     FROM usuarios                           ";
        $sSQL .="    WHERE status = 1;                        ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();
    }

    public function setUsuario(){

        $aData = array('nome'          => $this->input->post('nome'),
                       'email'         => $this->input->post('email'),
                       'senha'         => $this->input->post('senha'),
                       'tipo'          => $this->input->post('tipo'));
        return $this->db->insert('usuarios', $aData);

    }

    public function getDoDia(){

        $sSQL  ="      SELECT DISTINCT produtos.nome,                             ";
        $sSQL .="             produtos.detalhes,                                  ";
        $sSQL .="             produtos.foto,                                      ";
        $sSQL .="             produtos_dia.valor                                  ";
        $sSQL .="        FROM produtos_dia                                        ";
        $sSQL .="  INNER JOIN produtos ON produtos.id = produtos_dia.produtos_id  ";
        $sSQL .="       WHERE produtos_dia.status = 1                             ";
        $sSQL .="         AND produtos.status = 1                                 ";
        $sSQL .="         AND produtos_dia.quantidade > 0                         ";
        $sSQL .="         AND produtos_dia.data_para_venda = current_date();      ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();
    }

    public function getDoDiaAnteriores(){

        $sSQL  ="      SELECT DISTINCT produtos.nome,                                                                    ";
        $sSQL .="             produtos.detalhes,                                                                         ";
        $sSQL .="             produtos.foto,                                                                             ";
        $sSQL .="             produtos_dia.valor                                                                         ";
        $sSQL .="        FROM produtos_dia                                                                               ";
        $sSQL .="  INNER JOIN produtos ON produtos.id = produtos_dia.produtos_id                                         ";
        $sSQL .="       WHERE produtos_dia.data_para_venda between ((current_date() - INTERVAL 1 DAY) - INTERVAL 2 DAY) AND (current_date() - INTERVAL 1 DAY) ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();
    }

    public function setAtualizarProduto($iIdProduto){

        $aData = array('status' => 2);

        $this->db->where('id', $iIdProduto);
        return $this->db->update('produtos', $aData);

    }

    public function setAtualizarProdutoDoDia($iIdProdutoDoDia){

        $aData = array('status' => 2);

        $this->db->where('id', $iIdProdutoDoDia);
        return $this->db->update('produtos_dia', $aData);

    }

    public function getVendas($bDoDiaAtual = FALSE, $bTotal = FALSE){


        $sSQL  ="       SELECT usuarios.nome                                        AS comprador,      ";
        $sSQL .="              produtos.nome                                        AS produto,        ";
        $sSQL .="              vendas_produtos_dia.quantidade                       AS quantidade,     ";
        $sSQL .="              produtos_dia.valor                                   AS valor_uni,      ";
        $sSQL .="              (vendas_produtos_dia.quantidade * produtos_dia.valor) AS valor_total    ";
        $sSQL .="         FROM vendas_produtos_dia                                                     ";
        $sSQL .="   INNER JOIN usuarios     ON usuarios.id     = vendas_produtos_dia.usuarios_id       ";
        $sSQL .="   INNER JOIN produtos_dia ON produtos_dia.id = vendas_produtos_dia.produtos_dia_id   ";
        $sSQL .="   INNER JOIN produtos     ON produtos.id     = produtos_dia.produtos_id              ";
        $sSQL .="        WHERE                                                                         ";

        if($bDoDiaAtual){
            $sSQL .="      data_venda = current_date()       ";
            $sSQL .="      AND vendas_produtos_dia.status = 1;    ";
        }else{
            $sSQL .="      vendas_produtos_dia.status = 1;        ";

        }

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();

    }

    public function setVenda(){

        // Busca a quantidade disponível para vender
        $sSQLVerifProdDia  ="      SELECT id, quantidade                               ";
        $sSQLVerifProdDia .="        FROM produtos_dia                                 ";
        $sSQLVerifProdDia .="       WHERE id  = ".$this->input->post('idprodutov').";  ";

        $rsSQLVerifProdDia = $this->db->query($sSQLVerifProdDia);
        $iIdProdutoDia = $rsSQLVerifProdDia->row();

        // Verificar se é possível vender
        if((int)$iIdProdutoDia->quantidade >= (int)$this->input->post('quantidadev')){

            // Diminuir a quantidade no estoque
            $aDataProduto = array('quantidade' =>  ($iIdProdutoDia->quantidade - $this->input->post('quantidadev')));
            $this->db->where('id', $this->input->post('idprodutov'));
            $this->db->update('produtos_dia', $aDataProduto);

            // Registrar a venda
            $aData = array('produtos_dia_id'      => $this->input->post('idprodutov'),
                           'usuarios_id'          => $this->input->post('idclientev'),
                           'quantidade'           => $this->input->post('quantidadev'),
                           'data_venda'           => date('Y-m-d'));
            return $this->db->insert('vendas_produtos_dia', $aData);

        }

        return false;

    }

    public function setProduto(){

        foreach ($this->upload->data() as $sItem => $sValor ){
            if($sItem == 'file_name'){
                $aData = array('nome'                       => $this->input->post('nomepro'),
                               'foto'                       => $sValor,
                               'detalhes'                   => $this->input->post('detalhes'));
                return $this->db->insert('produtos', $aData);
            }
        }
    }

    public function getProduto(){

        $sSQL  ="      SELECT *                       ";
        $sSQL .="        FROM produtos                ";
        $sSQL .="       WHERE produtos.status = 1 ;   ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();

    }

    public function getProdutoDoDia($bSemDataWhere = FALSE, $bVerificarQuant = FALSE){

        $sSQL  ="      SELECT produtos_dia.id,                                                             ";
        $sSQL .="             produtos.nome,                                                               ";
        $sSQL .="             DATE_FORMAT(produtos_dia.data_para_venda ,'%d/%m/%Y') AS data_para_venda ,   ";
        $sSQL .="             produtos_dia.quantidade,                                                     ";
        $sSQL .="             produtos_dia.valor                                                           ";
        $sSQL .="        FROM produtos_dia                                                                 ";
        $sSQL .="  INNER JOIN produtos ON produtos.id = produtos_dia.produtos_id                           ";
        $sSQL .="       WHERE produtos.status = 1                                                          ";

        if($bSemDataWhere){
            $sSQL .="     AND produtos_dia.data_para_venda = current_date()                                ";
        }

        if($bVerificarQuant){
            $sSQL .="     AND produtos_dia.quantidade > 0                                                  ";
        }

        $sSQL .="         AND produtos_dia.status = 1;                                                     ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();

    }

    public function setProdutoDoDia(){

        $aData = array('data_para_venda'      => implode('-', array_reverse(explode('/',$this->input->post('dia')))),
                       'quantidade'           => $this->input->post('quantidade'),
                       'valor'                => $this->input->post('valor'),
                       'produtos_id'          => $this->input->post('idproduto'));
        return $this->db->insert('produtos_dia', $aData);

    }

    public function setContato(){
        $aData = array('nome'                 => $this->input->post('nome'),
                       'celular'              => $this->input->post('celular'),
                       'email'                => $this->input->post('email'),
                       'mensagem'             => $this->input->post('mensagem'));
        return $this->db->insert('contatos', $aData);

    }

    public function getContato(){

        $sSQL = "SELECT * FROM contatos ORDER BY data_cadastro DESC;";
        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();

    }

}
