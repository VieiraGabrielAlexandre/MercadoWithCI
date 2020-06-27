<?php
    class Migration_Cria_tabela_de_vendas extends CI_Migration {
        public function up()
        {
            $this->dbforge->add_field([
                'id' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'produto' => [
                    'type' => 'INT'
                ],
                'comprador_id' => [
                    'type' => 'INT'
                ],
                'data_de_entrega' => [
                    'type' => 'DATE'
                ]
            ]);

            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('vendas');
        }

        public function down()
        {
            $this->dbforge->drop_table('vendas');
        }
    }