<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class vendas extends CI_Controller
{
    public function nova()
    {
        $usuario = autoriza();
        $usuario = $this->session->userdata("usuario_logado");
        $this->load->helper("date");
        $this->load->model(["vendas_model", "produtos_model", "usuarios_model"]);

        $venda = [
            'produto' => $this->input->post("produto_id"),
            'comprador_id' => $usuario['id'],
            'data_de_entrega' => dataPtBrParaMysql($this->input->post("data_de_entrega"))
        ];
        $this->vendas_model->salva($venda);

        $this->load->library("email");
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'gabrielvieira840@gmail.com';
        $config['smtp_pass'] = 'SerialKiller@1996';
        $config['protocol']  = 'smtp';
        $config['validate']  = TRUE;
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $this->email->initialize($config);

        $produto = $this->produtos_model->busca($venda['produto']);
        $vendedor = $this->usuarios_model->busca($produto['usuario_id']);

        $dados = ['produto' => $produto];
        $conteudo = $this->load->view("vendas/email.php", $dados, TRUE);

        $this->email->from("gabrielvieira840@gmail.com","Mercado");
        $this->email->to([
            $vendedor['email']
        ]);
        $this->email->subject("Seu produto foi {$produto['nome']} vendido");
        $this->email->message($conteudo);
        $this->email->send();


        $this->session->set_flashdata("success","Pedido de compra efetuado com sucesso");
        redirect("/");
    }

    public function index()
    {
        $usuario = autoriza();
        $usuario = $this->session->userdata("usuario_logado");
        $this->load->model("produtos_model");
        $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
        $dados = ["produtosVendidos" => $produtosVendidos];
        $this->load->template("vendas/index", $dados);
    }
}