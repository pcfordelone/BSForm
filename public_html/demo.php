<?php
require_once(__DIR__."/../vendor/autoload.php");

use BSForm\Factory\AbstractTypeFactory as FF;
use BSForm\Types\HorizontalFormType;
use BSForm\Validator\Validator;
use BSForm\Validator\Validator as Assert;

// cria um novo formulário
$form = new HorizontalFormType(new Validator());

// cria um fieldset
$fieldset = FF::create(FF::FIELDSET, [
    "legend" => "Cadastro de Produto"
]);

// formas de criar estrutura Form Group
$formGroupNome = FF::create(FF::FORM_GROUP);
$formGroupDescricao = FF::create("FormGroup");
$formGroupValor = FF::create("formGroup");
$formGroupSelect = clone $formGroupNome;

// formas de criar Labels
$labelNome = FF::create(FF::LABEL, [
    "class" => "col-sm-2",
    "text"  => "Nome",
    "for"   => "inputNome"
]);
$labelDescricao = FF::create("Label", [
    "class" => "col-sm-2",
    "text"  => "Descrição",
    "for"   => "inputDescricao"
]);
$labelValor = FF::create("label", [
    "class" => "col-sm-2",
    "text"  => "Valor",
    "for"   => "inputValor"
]);
$labelSelect = FF::create(FF::LABEL, [
    "class" => "col-sm-2",
    "text"  => "Categoria",
    "for"   => "selectCategoria"
]);

// formas de criar estrutura Column
$columnNome = FF::create(FF::COLUMN, [
    "class" => "col-sm-10"
]);
$columnDescricao = FF::create("Column", [
    "class" => "col-sm-10"
]);
$columnValor = FF::create("column", [
    "class" => "col-sm-10"
]);
$columnSelect = FF::create(FF::COLUMN, [
    "class" => "col-sm-10"
]);

// formas de criar campos de forms html
$fieldNome = FF::create(FF::TEXT, [
    "id"          => "inputNome",
    "name"        => "_nome",
    "placeholder" => "Nome do Produto"
]);
$fieldDescricao = FF::create("Textarea", [
    "id"          => "inputDescricao",
    "name"        => "_descricao",
    "placeholder" => "Descrição do Produto"
]);
$fieldValor = FF::create("text", [
    "id"          => "inputValor",
    "name"        => "_valor",
    "placeholder" => "Valor do Produto"
]);
$select = FF::create(FF::SELECT, ["isRequired" => true]);
$select->addOption(FF::create(FF::SELECT_OPTION, [
    'innerText' => 'Selecione a Categoria',
    'disabled'  => true
]));
$submitButton = FF::create(FF::BUTTON, [
    "type"      => "submit",
    "innerText" => "Salvar",
    "icon"      => "glyphicon glyphicon-floppy-disk",
    "role"      => "submitButton"
])->addClass("btn-primary");


// montando estrutura do formulário
$form->addField(
    $fieldset
        ->addField(
            $formGroupNome
                ->addField($labelNome)
                ->addField($columnNome->addField($fieldNome))
        )->addField(
            $formGroupDescricao
                ->addField($labelDescricao)
                ->addField($columnDescricao->addField($fieldDescricao))
        )->addField(
            $formGroupValor
                ->addField($labelValor)
                ->addField($columnValor->addField($fieldValor))
        )->addField(
            $formGroupSelect
                ->addField($labelSelect)
                ->addField($columnSelect->addField($select))
        )->addField(
            $submitButton
        )
);

// incluindo banco de dados e objeto PDO
include "fixtures.php";

// populando categorias de acordo com a query
$categorias = $pdo->query("SELECT * FROM categorias");
foreach ($categorias as $categoria) {
    $select->addOption(
        FF::create(FF::SELECT_OPTION, [
            "label" => $categoria["categoria"],
            "value" => $categoria["id"]
        ])
    );
}

// populando form de acordo com o conteúdo do arquivo demo_data.json
$dados = json_decode(utf8_encode(file_get_contents('demo_data.json')), true);
$form->populate($dados["data"]);

// adicionando regras de validação
$form->getValidator()
    ->addRule([
        "field" => $fieldNome,
        "validator" => Assert::NOT_BLANK
    ])
    ->addRule([
        "field" => $fieldDescricao,
        "validator" => Assert::LENGTH,
        "params" => [
            "min" => 5,
            "max" => 200
            // "minMessage" => "Minha mensagem personalizada"
            // "maxMessage" => "Minha mensagem personalizada"
        ]
    ])
    ->addRule([
        "field" => $fieldValor,
        "validator" => Assert::NUMERIC
    ]);

// validando
if (!$form->getValidator()->validate()) {
    // $form->setErrorPlacement("top"); // default
    // $form->setErrorPlacement("infield");
    // $form->setErrorPlacement("bottom");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="library/Bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Form</title>
    <style>
        body {
            padding-top: 50px;
        }
        .alert {
            text-shadow: 0 1px 0 white;
        }
        .error, .error:focus {
            color: tomato;
            border: 1px solid tomato;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-sm-offset-3 col-sm-6">
        <?php echo "\n", $form->getForm(2); ?>
    </div>
</div>
<script src="library/js/jquery-1.11.1.js"></script>
<script src="library/Bootstrap/3.1.1/js/bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('input').tooltip();
        $('textarea').tooltip();
    });
</script>
</body>
</html>