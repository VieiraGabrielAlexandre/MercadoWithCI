
            <h1>Nome: <?= $produto["nome"] ?></h1><br>
            <strong>Preço:</strong> <?= $produto["preco"] ?><br>
            <strong>Descrição:</strong> <?= nl2br(html_escape($produto["descricao"])) ?><br>

            <h2 class="mt-4">Compre agora mesmo !</h2>
            <?php
                echo form_open("vendas/nova");

                echo form_hidden("produto_id", $produto['id']);


                echo form_label('Data de entrega','data_de_entrega');
                echo form_input([
                    'name' => 'data_de_entrega',
                    'class' => 'form-control',
                    'id' => 'data_de_entrega',
                    'maxlength' => '255',
                    'value' => '',
                ]);

                echo form_button([
                    'class' => 'btn btn-primary mt-2',
                    'content' => 'Comprar',
                    'type' => 'submit'
                ]);

                echo form_close();
            ?>
