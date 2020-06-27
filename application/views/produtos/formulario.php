
        <h1>Cadastrar novo produto</h1>

        <?php
        echo form_open("produtos/novo");

        echo form_label("Nome", "nome");
        echo form_input([
            "name" => "nome",
            "class" => "form-control",
            "id" => "nome",
            "maxlength" => "255",
            "value" => set_value("nome","")
        ]);
        echo form_error("nome");
        echo form_label("Preço", "preco");
        echo form_input([
            "name" => "preco",
            "class" => "form-control",
            "id" => "preco",
            "maxlength" => "255",
            "type" => "number",
            "value" => set_value("preco","")
        ]);
        echo form_error("preco");
        echo form_label("Descrição", "descricao");
        echo form_textarea([
            "name" => "descricao",
            "class" => "form-control",
            "id" => "descricao",
            "value" => set_value("descricao","")
        ]);
        echo form_error("descricao");

        echo form_button([
            "class" => "btn btn-primary",
            "content" => "Cadastrar",
            "type" => "submit"
        ]);

        echo form_close();
        ?>